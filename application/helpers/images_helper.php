<?php  
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if ( ! function_exists('get_picts'))
    {
        function get_images($var = '')
        {
            return $var;
        }   
    }

    function get_picts($res,$url)
    {
        //$absUrl = '';
        //$pictures = '';
         //Recuperation des images
        /*if (preg_match('#<img src=["\|\']([^\'"]*)["\|\']#i',$url)){
            preg_match_all('#<img src=["\|\']([^\'"]*)["\|\']#i',$url,$pictures);                
        }  */
        preg_match_all('#<img src=["\|\']([^\'"]*)["\|\']#i',$res,$pictures); 


echo (microtime());
    foreach ($pictures[1] as $picture ) {
                    //Verification de l'url de l'image
                 /*   if (strstr($picture, '/'))
                        {
                            // On verifie si la chaine commence par un . ou / 
                            if(substr($picture, 0, 1)== '/') {
                                $picture = $url.substr($picture, 1);
                            }
                            elseif(substr($picture, 0, 1)== '.'){
                                $picture = $url.$picture;
                            }
                        }*/

                        echo ($picture);
                        echo ($url);
                        $absUrl = url_to_absolute($url,$picture);

                        $url_test = get_headers($absUrl);
                        
                        //On verifie si l'image existe

                        //var_dump($test);
                        if(($url_test[0])=='HTTP/1.1 200 OK')
                        {   
                                echo('<li><img src="'.$absUrl.'" /></li>');    
                                                   
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
        echo microtime();
    }  
    
?>