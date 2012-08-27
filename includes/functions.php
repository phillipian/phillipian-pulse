<?php
// http://www.achari.in/php-regex-to-make-twitter-links-clickable - Based on
// http://stackoverflow.com/questions/626692/automatically-create-email-link-from-a-static-text - for mailto: links

function linkify($text){
  $text = preg_replace("/(\S+@\S+\.\S+)/i", "<a href='mailto:$1'>$1</a>", $text);
	$text = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $text);
	$text = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $text);
	$text = preg_replace("/[ ]@(\w+)/", " <a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $text);
	$text = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=%23\\1\" target=\"_blank\">#\\1</a>", $text);
	return $text;
}

?>
