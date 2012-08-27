<?php
require_once('includes/config.php');
require_once('includes/all.php');

//define which feeds are selectable
$selectables = array(
	'@The_Phillipian' => $sources[0],
	'@PhillipianNews' => $sources[1],
	'@PhillipianOpEd' => $sources[2],
	'@PhillipianArts' => $sources[3],
	'@PhillipianSprts' => $sources[4],
	'@PhillipianFeech' => $sources[5],
	'Andover Pulse' => $sources[6],
	'Phillipian Pulse' => $sources[7],
);
?>
<form id="feed-select" action="custom_filter.php" method="POST">
<h4>Filter:</h4>
<?php foreach($selectables as $key=>$value): ?>
	<span>
	<?php if(substr($value, 0, 1) == '@'): ?>
	<input name="feed[]" value="<?php echo $value;?>" type="checkbox" class="feed-checkbox twitter" checked="checked"/><?=$key?>
	<?php else: ?>
	<input name="feed[]" value="<?php echo $value;?>" type="checkbox" class="feed-checkbox" checked="checked"/><?=$key?>
	<?php endif; ?>
	</span>
<?php endforeach; ?>
</form>