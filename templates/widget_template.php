<?php if($i < $data->get_item_quantity()): ?>
<?php $item = $data->get_item($i); ?> 
<div class="post">
	<?php $username = getUsername($item->get_title()); ?>
	<p>
		<a href="https://twitter.com/<?php echo $username?>" class="twitter-follow-button" data-width="160px" data-show-count="false">
			Follow @<?php echo $username?>
    </a>
    <br />
		<?php echo linkify(substr($item->get_title(), strlen($username)+2)) ?> | 
		<?php echo date("D - g:ia",strtotime($item->get_date()));?>
	</p>
</div>
<?php endif;?>