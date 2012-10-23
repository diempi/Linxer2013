<?php
$html = curl_exec($url);
$dom = new DOMDocument();
$dom->loadHTML($html);

$nodes = $dom->GetElementsByTagName('title');

echo $nodes->item(0)->nodeValue;
?>