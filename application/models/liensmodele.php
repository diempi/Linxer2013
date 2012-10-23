<?php

    class liensModele extends CI_Model{
        
            function getAll()
            {
                $data = array();
                
                $query = $this->db->get('liens');
                
                foreach($query->result() as $row)
                {
                    $data[] = $row;
                }
                return $data;
            }
            
            
            function preview()
            {
                $this->input->post('title');  
            }  

            function add($url)
            {
                $this->db->insert('liens',array('title' => $url));
            }  

            function deleteOne($id)
            {
                $this->db->where('id', $id);
                $this->db->delete('liens'); 
            }

        }