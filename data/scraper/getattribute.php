<?php

$string = '<div class="ds-1col node node-location view-mode-on_the_map clearfix"> <div class="field field-name-title"><h2><a href="http://www.blijvenplakkeningent.be/nl/blikvangers/vooruit-turkse-cinema">Vooruit – Turkse cinema</a></h2></div><div class="field field-name-body">In 1976 begonnen de Turkse gebroeders Alcı, die ook het eerste Turkse restaurant in Gent...</div><div class="field field-name-node-link"><a href="http://www.blijvenplakkeningent.be/nl/blikvangers/vooruit-turkse-cinema">Lees meer</a></div></div> ';
$XML = simplexml_load_string($string);

$link = $XML->xpath('//div/h2/a');
foreach($link as $result) {
  $att = $result->attributes();
  print $att['href'];
}

$contents = $XML->xpath("//div[contains(@class, 'field-name-body')]");
foreach($contents as $content) {
  print $content;
}


/*

$xpath = new DOMXpath($doc);
$filtered = $xpath->query("//*[name()='h1' or name()='h2']");
print_r($filtered);
foreach($filtered as $found) {
  echo $found;
}
*/

//echo $doc->saveHTML();
?>