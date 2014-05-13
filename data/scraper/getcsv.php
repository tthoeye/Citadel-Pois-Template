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
  //print($json);
  $obj = json_decode($json);
  $features = $obj[0]->settings->leaflet[0]->features;
  foreach ($features as $feature) {
    print($feature->lat);
    print ";";
    print($feature->lon);
    print ";";
    print(strip_tags($feature->label));
    print ";";
    print(strip_tags($feature->popup));
    print "<br/>";
  }
  
?>
</body>
</html>