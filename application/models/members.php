<?php
    class members extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }
        
        function checkMember($user,$password)
        {
            $row = $this->db->get_where('members',array('username'=>$user,'password'=>$password));
            return $row->num_rows();
        }

        /*function addMember(){
            $this->db->insert('members',array('username' => $username,'password' => $pass, 'email' => $email));
        }*/
    }
?>