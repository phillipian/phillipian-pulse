<?php
// http://www.achari.in/php-regex-to-make-twitter-links-clickable - Based on
// email regex from http://stackoverflow.com/questions/3982483/php-regular-expression-text-url-to-html-link

function linkify($text){
  $text = preg_replace("/([\w\-\d]+\@[\w\-\d]+\.[\w\-\d]+)/", "<a href='mailto:$1'>$1</a>", $text);
  $text = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $text);
  $text = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $text);
  $text = preg_replace("/[ ]@(\w+)/", " <a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $text);
  $text = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=%23\\1\" target=\"_blank\">#\\1</a>", $text);
  return $text;
}

?>
