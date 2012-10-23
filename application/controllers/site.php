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
            $url = $this->input->post('url');
            $ch = curl_init();
            // configuration des options

            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
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
                $title = 'Titre absent';
            }
            //var_dump($reg_title);
            

            // Recuperation de la description
            $startchar = substr($url, 0, 4);
            if (!($startchar == 'http'))
            {
                $url = 'http://'.$url;
            }

            if (preg_match('#<meta name=[\"|\']description["\|\'] content=["\|\'](.*)["\|\']#i',$res))
            {
                preg_match('#<meta name=[\"|\']description["\|\'] content=["\|\'](.*)["\|\']#i',$res,$desc);
                $description = $desc[1];                
            }
            

            // Recuperation des images
            if (preg_match('#<img src=["\|\'](.*)["\|\']#i',$res))
            {
                preg_match('#<img src=["\|\'](.*)["\|\']#i',$res,$pictures);                
            }            
            var_dump($pictures);

            echo('<p>Titre du site: '.$title.' </p>');
            echo('<p>Description: '.$description.' </p>');
           /* foreach ($pictures[0] as $picture ) {
                echo('<li>Images: '.$pictures[0].' </li>');
            }*/
            
        }
        
        function add()
        {
            $this->load->model('liensModele');
            $this->liensModele->add($this->input->post('title'));
            $this->logged();
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
        }
        
    }