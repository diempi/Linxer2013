<?php
    class main extends CI_Controller
    {
        function index()
       {
              $form_data['error'] = false;
            if(!$this->session->userdata('is_signed_in'))
            {
                $form_data['error'] = $this->session->flashdata('error')? $this->session->flashdata('error') : false ;
                $data['content'] = $this->load->view('signin',$form_data,true);
                $this->load->view('layout',$data);                
            }
            else
            {
                 redirect('site/index');               
            }
       }
       
       function signin()
       {
            $this->load->model('members');
            $u = $this->input->post('user');
            $p = sha1($this->input->post('mdp'));
            
            if($this->members->checkMember($u,$p))
            {
                $this->session->set_userdata('is_signed_in',true);
                redirect('site/index');
            }
            else
            {
                $this->session->set_userdata('is_signed_in',false);
                $this->session->set_flashdata('error','Veuillez entrer votre identifiant');
                redirect('main/index');
            }
       }
       
       function signoff()
       {
            $this->session->set_userdata('is_signed_in',false);
            $this->session->sess_destroy();
             redirect('main/index');
       }
       
    } 