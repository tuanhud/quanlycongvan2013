<?php
//get the q parameter from URL

$xml=("http://www.uit.edu.vn/tin-tuc/thong-tin-chung/thong-bao-chung.feed?type=rss");

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

function shortDescription($fullDescription) {
$shortDescription = ”;

$fullDescription = trim(strip_tags($fullDescription));

if ($fullDescription) {
$initialCount = 250;
if (strlen($fullDescription) > $initialCount) {
//$shortDescription = substr(strip_tags($fullDescription),0,$initialCount).”…”;
$shortDescription = substr($fullDescription,0,$initialCount).”…”;
}
else {
return $fullDescription;
}
}

return $shortDescription;
}//End of function shortDescription

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
echo("<ul>");
for ($i=0; $i<=5; $i++)
  {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc = shortDescription($item_desc);
  echo ("<li><a class='a' href='" . $item_link
  . "'>" . $item_title . "</a><b>" . $item_desc . "</b></li>");

  }
echo("</ul>");
?>