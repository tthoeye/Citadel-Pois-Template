<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>An XHTML 1.0 Strict standard template</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
</head>
<body>
<?php

  //echo "Getting JSON data";
  $json = file_get_contents('http://www.blijvenplakkeningent.be/nl/views/ajax?view_name=locations&view_display_id=attachment_1');
  $json = strip_tags($json);
  $json = preg_replace('/[^(\x20-\x7F)]*/','', $json);
  $domain = 'http://www.blijvenplakkeningent.be';
  //print($json);
  $obj = json_decode($json);
  $features = $obj[0]->settings->leaflet[0]->features;
  foreach ($features as $feature) {
    $XML = simplexml_load_string($feature->popup);
    $link = $XML->xpath('//div/h2/a');

    $contents = $XML->xpath("//div[contains(@class, 'field-name-body')]");

    print($feature->lat);
    print ";";
    print($feature->lon);
    print ";";
    print(strip_tags($feature->label));
    print ";";
    foreach($link as $result) {
      $att = $result->attributes();
      print str_replace('/nl/blikvangers', $domain . '/nl/blikvangers', $att['href']);
    }
    print ";";
    foreach($contents as $content) {
      print $content;
    }
    print "<br/>";
  }
  
?>
</body>
</html>