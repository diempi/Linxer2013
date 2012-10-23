<?php
 require_once('simple_html_dom.php');
 require_once('url_to_absolute.php'); 
//La page qu'on veut utiliser
$url = ('http://www.alsacreations.com/');

//On initialise cURL
$ch = curl_init($url);
//On lui transmet la variable qui contient l'URL
curl_setopt($ch, CURLOPT_URL, $url);
//On lui demdande de nous retourner la page
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//On exécute notre requête et met le résultat dans une variable
$resultat = curl_exec($ch);
//On ferme la connexion cURL

curl_close($ch);

$page = new DOMDocument();
$page->loadHTML($resultat);

// titre du site
$titre = $page->getElementsByTagName('title')->item(0)->nodeValue;

echo('<h5>'.htmlentities($titre,ENT_COMPAT,"UTF-8").'</h5>');

//images du site 

$tabimag = array();
$html = file_get_html($url);
foreach($html->find('img') as $element) {
    $tabimag[] = url_to_absolute($url, $element->src);
}
    //echo('<img src="'.$tabimag[7].'" />')
;
$thumb = 'thumb.jpg';

$ok = make_thumb($tabimag[5],$thumb,100);



/*=================== Thumbnails=================*/
function make_thumb($src,$dest,$desired_width)
{

  /* read the source image */
  $source_image = imagecreatefromjpeg($src);
  $width = imagesx($source_image);
  $height = imagesy($source_image);
  
  /* find the "desired height" of this thumbnail, relative to the desired width  */
  $desired_height = floor($height*($desired_width/$width));
  
  /* create a new, "virtual" image */
  $virtual_image = imagecreatetruecolor($desired_width,$desired_height);
  
  /* copy source image at a resized size */
  imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
  //$dest = $dest.$virtual_image.'.jpg';
  /* create the physical thumbnail image to its destination */
  imagejpeg($virtual_image,$dest);
  return($dest);
}

/*================afficher la vignette ==============*/
echo('<img src="http://localhost/codeigniter/ci/'.$ok.'" />');
?>