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
                $this->input->post('desc');  
                $this->input->post('link');   
            }  

            function add($title,$desc,$link)
            {
                $this->db->insert('liens',array('title' => $title,'desc' => $desc, 'link' => $link));
            }  


            function deleteOne($id)
            {
                $this->db->delete('liens',array('id' => $id));
            }
            function selectOne($id)
            {
                $query = $this->db->get_where('liens',array('id' => $id));
                return ($query->row());  
            }

            function update($data)
            {
                //var_dump($data);
                //DIE();
               $this->db->where('id',$data['id']);
               $this->db->update('liens',array('title' => $data['title'], 'desc' => $data['desc'],'link' => $data['link']));                             
            }
        }