<?php
/*
* Filename: widget.php
* Displays a widget that can be embedded as an iframe
*
*/
require_once('includes/config.php');
require_once('includes/widget_init.php');
?>
<html>
<head>
	<link href="/css/widget_style.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" type="text/css">
</head>
<div class="widget-top">
		From the <a href="http://pulse.phillipian.net" target="_top">Phillipian Pulse</a>
</div>
<div class="widget-body">
	<div class="scrollable">
		<?php for($i = 0; $i < $widget_num; $i++): ?>
			<?php include('templates/widget_template.php'); ?>
		<?php endfor; ?>
		<a class="more" href="http://pulse.phillipian.net" target="_top">Read more on the Phillipian Pulse... </a>
	</div>
</div>
<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
<script type="text/javascript" src="/js/slimScroll.min.js"></script>
<script type="text/javascript">
$(function(){
    $('.scrollable').slimScroll({
        height: '240px'
    });
});
</script>
</html>