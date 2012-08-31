<?php

//sets the http header. should correct any encoding issues.
header('Content-type: text/html; charset=utf-8');

//set your timezone here
date_default_timezone_set('US/Eastern');

//title of your site
$site_title = "Phillipian Pulse | Discover the latest campus happenings";


//your site description. used for description metadata
$site_description = "The Phillipian Pulse aggregates bize-sized community news for the Phillips Academy community.";

//number of posts to display initially
$num = 15;

//number for widget
$widget_num = 5;

//number of additional posts to display each time more is loaded
$additional = 10;

//define the twitter accounts by username
$twitter_accounts = array(
	'the_phillipian',
	'phillipiannews',
	'phillipianoped',
	'phillipianarts',
	'phillipiansprts',
	'phillipianfeech',
);

$tumblr_accounts = array(
	'andoverpulse', 
	'phillipianpulse',
	//'andoverclubs',
	//'andoveralumni',
);

$twitter_hashtags = array(
    'phillipianpulse'
);

//feed selection configuration is in templates/feed_select.php

$main_tumblr_url = 'andoverpulse.tumblr.com'; //this is the account that ppl will post to

//define additional rss feeds you want to parse
$additional_sources = array(
	//'http://pipes.yahoo.com/pipes/pipe.run?_id=37614d2756c1dcbe86a3135b811c66d6&_render=rss', //AndoverPulse via Yahoo Pipes
	//'http://ericouyang.posterous.com/rss.xml',
	);
?>
