<?php require_once('simple_html_dom.php');
require_once('url_to_absolute.php'); ?>
<?php
$url= ("http://www.logitech.com") ;

function get_file_title($file){
$cont = file_get_contents($file);
preg_match( "/<title>(.*)<\/title>/i", $cont, $match );

return strip_tags($match[0]);
}
?>
<?php echo get_file_title("$url"); ?>

<?php $tags = get_meta_tags('http://www.logitech.com'); ?>
<?php echo ('Description: '); ?>
<?php echo $tags['description']; ?>
<?php
$html = file_get_html($url);
foreach($html->find('img') as $element) {
    $tabimag[] = url_to_absolute($url, $element->src);
}
    echo('<img src="'.$tabimag[3].'" />')
;
?>

