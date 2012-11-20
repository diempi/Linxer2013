<?php

    class Site extends CI_Controller{
            
        public function __construct()
        {
            parent:: __construct();
            $this->load->model('liensModele');
        }

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
            if(filter_var($sitetitle, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)) {
                echo 'Veuillez entrer une URL valide';
            }
            else
            {
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
                else
                {
                    $title = "Veuillez entrer un titre";
                }

                //var_dump($reg_title);
                

                // Recuperation de la description
                $startchar = substr($sitetitle, 0, 6);
                $url = $sitetitle;
                if (($startchar != 'http:/') &&  ($startchar != 'https:'))
                {
                    $url = 'http://'.$url;
                }
                if(substr($sitetitle, -1)!='/')
                {
                    $url = $url.'/';
                }
                    
                 

                if (preg_match('#<meta name=[\"|\']description["\|\'] content=["\|\'](.*)["\|\']#i',$res))
                {
                    preg_match('#<meta name=[\"|\']description["\|\'] content=["\|\'](.*)["\|\']#i',$res,$desc);
                    $description = $desc[1];                
                }
                else
                {
                    $description = 'Veuillez entrer une description';
                }
                

                // Recuperation des images
                if (preg_match('#<img src=["\|\']([^\'"]*)["\|\']#i',$res))
                {
                    preg_match_all('#<img src=["\|\']([^\'"]*)["\|\']#i',$res,$pictures);                
                }            
                //var_dump($desc);
                $data['title'] = $title;
                $data['desc'] = $description;
                $data['link'] = $url;
                $dataout = array('titre' => $title,'description' => $description, 'link'=>$url );

                $this->load->view('vueAdd.php',$dataout);

                //var_dump($dataout);
               /* echo('<p>Titre du site: '.$title.' </p>');
                echo('<p>Description: '.$description.' </p>');*/
                foreach ($pictures[1] as $picture ) {
                    //Creation de la miniature
                    if (strstr($picture, '/'))
                        {
                            /* On verifie si la cchaine commence par un . ou /*/
                            if(substr($picture, 0, 1)== '/') {
                                $picture = $url.substr($picture, 1);
                            }
                            elseif(substr($picture, 0, 1)== '.'){
                                $picture = $url.$picture;
                            }
                        }
                        else
                        {
                            $picture = $url.$picture;
                        }
                        $test = get_headers($picture);
                        //var_dump($test);
                        if(($test[0])=='HTTP/1.1 200 OK')
                        {   
                                echo('<li><img src="'.$picture.'" /></li>');    
                                                   
                        }
                    /*$config['image_library'] = 'gd';
                    $config['source_image'] = $picture;                
                    $config['new_image'] = $_SERVER['DOCUMENT_ROOT'].'/linkser/img/thumbs/'.$picture;                  
                    //$config['source_image'] = '$picture';
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']     = 75;
                    $config['height']   = 80;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config); 
                    
                    if ( ! $this->image_lib->resize())
                    {
                        echo $this->image_lib->display_errors();
                    }
                    $pict = $this->image_lib->resize();
                    */
                }                   
            }
            
        }
        
        function edit_preview()
        {
            $this->liensModele->selectOne($this->input->post('id'));
            $this->preview();        
        }
        function confirm()
        {
            $data['title'] = $this->input->post('title'); 
            $data['desc'] = $this->input->post('desc');               
            $data['link'] = $this->input->post('link');  
            $this->load->view('confirm');
        }
        function add()
        {
            //var_dump($title);
            $this->load->model('liensModele');
            $this->liensModele->add($this->input->post('title'),$this->input->post('desc'),$this->input->post('link'));                     
            redirect('site');
        }

        function update()
        {
           $data['id'] = $this->input->post('id');
           $data['title'] = $this->input->post('title'); 
           $data['desc'] = $this->input->post('desc');               
           $data['link'] = $this->input->post('link');  
           $this->liensModele->update($this->uri->segment(3));
        }
        
        function delete()
        {
            $this->liensModele->deleteOne($this->input->post('id'));

            /*deleteOne($id);
            if($this->input->is_ajax_request())
                {
                    echo ("ok");
                }
            else
            {
                $data['vue']="ok";
                $this->load->view("ok");
            }*/
            $this->index();
        }

        function selectOne()
        {
            $data['lien'] = $this->liensModele->selectOne($this->uri->segment(3));
            $this->load->view('vueUpdate',$data);
            $this->liensModele->update($this->uri->segment(3));
        }        
        
    }