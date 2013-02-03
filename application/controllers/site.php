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

            $sitetitle = $this->input->post('siteurl');
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
                    /*if(substr($sitetitle, 0, 3) != 'www')
                    {
                        $url = 'http://www'.$url;
                    }
                    else
                    {*/
                        $url = 'http://'.$url;
                   /* }*/
                }
                /*if(substr($sitetitle, -1)!='/')
                {
                    $url = $url.'/';
                }*/
                    
                 

                if (preg_match('#<meta name=[\"|\']description["\|\'] content=["\|\'](.*)["\|\']#i',$res))
                {
                    preg_match('#<meta name=[\"|\']description["\|\'] content=["\|\'](.*)["\|\']#i',$res,$desc);
                    $description = $desc[1];                
                }
                else
                {
                    $description = 'Veuillez entrer une description';
                }
                
                //Recuperation des images
                // Appel du helper
                echo ('Titre'.$title);
                echo ('Description'.$description);
                $this->load->helper('images_helper');
                echo get_picts($res,$url);

                $this->load->view('vueAdd.php',$title,$description,$Tabm);

          
                //Assignation des valeurs 
                $data['title'] = $title;
                $data['desc'] = $description;
                $data['link'] = $url;
                

                  
            }
            
        }
        
        function edit_preview()
        {
            //$this->liensModele->selectOne($this->input->post('id'));
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
           $this->load->model('liensModele');
           $data['id'] = $this->input->post('id'); 
           $data['title'] = $this->input->post('title');
           $data['desc'] = $this->input->post('desc');               
           $data['link'] = $this->input->post('link');  
           $this->liensModele->update($data);
           redirect('site');
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
            $this->load->model('liensModele');
            $data['lien'] = $this->liensModele->selectOne($this->uri->segment(3));
            //var_dump($data);
            //DIE();
            $this->load->view('vueUpdate',$data);
            //$this->liensModele->update($this->input->post('id'));
        }       
        
    }