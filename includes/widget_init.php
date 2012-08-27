<?php
/*
* Filename: includes/widget_init.php
*
*/
require_once('simplepie.php');
require_once('functions.php');

foreach ($twitter_accounts as $username) {
	$sources[] = "http://twitter.com/statuses/user_timeline/$username.rss";
}

//creates new SimplePie object
$data = new SimplePie();

//sets the urls
$data->set_feed_url($sources);

//if you add ?cache=false to the end of the url, it will temporarily disable caching. Useful for testing

if (isset ($_GET['cache']))
{
	$disabled = $_GET['cache'];
	if ($disabled  == 'false') {
		$data->enable_cache(false);
	}
}

$strip_htmltags = $data->strip_htmltags;

// add these tags. Removed br tag for cleanness
$data->strip_htmltags(array_merge($strip_htmltags, array('br', 'div')));

//sets cache location
$data->set_cache_location('cache');
//SimplePie magic
$data->init();

//function grabs the Twitter username based on the status provided by the RSS feed
function getUsername($status) {
	$pos = strpos($status, ':');
	return strtolower(substr($status, 0, $pos));
}

//function grabs account name from feed url
function getAccount($url) {
	$account = substr($url, 0, -12);
	return substr($account, 7);
}
?>