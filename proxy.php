<?php
$url = "https://election.adaderana.lk/local-authorities-election-2025/";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
$html = curl_exec($ch);
curl_close($ch);

libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($html);
libxml_clear_errors();

$xpath = new DOMXPath($doc);
$nodes = $xpath->query("//*[contains(@class, 'row') and contains(@class, 'small-gutter')]");

if ($nodes->length > 0) {
    echo $doc->saveHTML($nodes[0]);
} else {
    echo "Election content not found.";
}
?>
