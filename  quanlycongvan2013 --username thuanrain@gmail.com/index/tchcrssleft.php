<?php
//get the q parameter from URL

$xml=("http://tchc.uit.edu.vn/thong-bao/thong-bao-chung.feed?type=rss");

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

  echo ("<li><a href='" . $item_link
  . "'><b>" . $item_title . "</b></a></li>");

  }
echo("</ul>");
?>