<?php

    class Site extends CI_Controller{
        
        function index()
        {    
            $this->load->model('liensModele');
            $data['liens'] = $this->liensModele->getAll();
            $data['titre'] = 'Liste des liens';
            $this->load->library('javascript');
            $this->load->view('listeLiens',$data);
        }
       
        function _test() /*_ permet de rendre une fonction privee */
        {
            echo ('test');
        }
        
        function preview()
        {
            $sitetitle = $this->input->post('title');
            $ch = curl_init();
            // configuration des options

            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $sitetitle);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $reg_title = $desc= $pictures ='';  
            $res = curl_exec($ch);


            //Recuperation du titre
            if (preg_match('#<title>(.*)<\/title>#i',$res))
            {
                preg_match('#<title>(.*)<\/title>#i',$res,$reg_title);
                $title = $reg_title[1];                
            }

            //var_dump($reg_title);
            

            // Recuperation de la description
            $startchar = substr($sitetitle, 0, 4);
            if (!($startchar == 'http'))
            {
                $url = 'http://'.$sitetitle;
            }
            else
            {
                $url = $sitetitle;
            }

            if (preg_match('#<meta name=[\"|\']description["\|\'] content=["\|\'](.*)["\|\']#i',$res))
            {
                preg_match('#<meta name=[\"|\']description["\|\'] content=["\|\'](.*)["\|\']#i',$res,$desc);
                $description = $desc[1];                
            }
            

            // Recuperation des images
            if (preg_match('#<img src=["\|\']([^\'"]*)["\|\']#i',$res))
            {
                preg_match_all('#<img src=["\|\']([^\'"]*)["\|\']#i',$res,$pictures);                
            }            
            //var_dump($pictures[1]);
            $data['title'] = $sitetitle;
            $data['desc'] = $description;
            $data['link'] = $url;
            $dataout = array('titre' => $data['title'],'description' => $data['desc'], 'link'=>$data['link'] );
            $this->load->view('vueAdd.php',$dataout);
            //var_dump($dataout);
           /* echo('<p>Titre du site: '.$title.' </p>');
            echo('<p>Description: '.$description.' </p>');
            foreach ($pictures[1] as $picture ) {
                //Creation de la miniature
               /* $config['image_library'] = 'gd2';
                $config['source_image'] = '$picture';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']     = 75;
                $config['height']   = 80;
                $this->load->library('image_lib', $config);
                if ( ! $this->image_lib->resize())
                {
                    echo $this->image_lib->display_errors();
                }
                $pict = $this->image_lib->resize();
                echo('<li><img src="'.$picture.'" /></li>');
            }*/               
        }
        
        function add($dataout)
        {
            $this->load->model('liensModele');
            $this->liensModele->add($db_updated);
            $this->index();
        }

        function update()
        {
           $this->load->model('liensModele');
           $data['id'] = $this->input->post('id');
           $data['title'] = $this->input->post('title');     
           $this->liensModele->update($this->uri->segment(3));
        }
        
        function delete()
        {
            $this->load->model('liensModele');
            $id = $this->uri->segment(3);

            deleteOne($id);
            if($this->input->is_ajax_request())
                {
                    echo ("ok");
                }
            else
            {
                $data['vue']="ok";
                $this->load->view("ok");
            }
            $this->index();
        }

        function selectOne()
        {
            $this->load->model('liensModele');
            $data['lien'] = $this->liensModele->selectOne($this->uri->segment(3));
            $this->load->view('vueUpdate',$data);
            $this->liensModele->update($this->uri->segment(3));
        }        
        
    }