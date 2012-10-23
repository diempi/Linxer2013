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

            function add()
            {
                $this->db->insert('liens',array('title' => $titre,'desc' => $description, 'link' => $link));
            }  

            function deleteOne($id)
            {
                $this->db->delete('liens',array('id' => $id));
            }
            function selectOne($id)
            {
                $query = $this->db->get_where('liens',array('id' => $id));
                return ($query->result());  
            }

            function update($id)
            {
               $this->db->where('id',$id);
               $this->db->update('liens',array('title' => $data['title']));
            }
        }