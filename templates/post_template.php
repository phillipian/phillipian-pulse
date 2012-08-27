<?php if($data->get_item_quantity() < $num) $num = $data->get_item_quantity(); ?>

<?php if($i < $data->get_item_quantity()): ?>

<?php $item = $data->get_item($i); ?> 
	<?php //print_r($item); ?>
  
	<?php if($i == 0): // if first item, start day wrapper?>
		<?php $current_day = date("F j, Y", strtotime( $item->get_date() )); ?>
		<div class="day">
      <div class="day-date rounded">
        <div class="mobile-date">
          <?php echo date("D, F j", strtotime( $item->get_date() )); ?>
        </div>
        <div class="day-of-week">
          <?php echo date("D", strtotime( $item->get_date() )); ?>
        </div>
        <div class="month-day">
          <?php echo date("F j", strtotime( $item->get_date() )); ?>
        </div>
      </div>
    <?php // closing </div> created later ?>
	<?php endif; ?>
  
	<?php if(date("F j, Y", strtotime( $item->get_date() )) != $current_day): // new day, start day wrapper?>
		<?php $current_day = date("F j, Y",strtotime($item->get_date()));?>
		</div> <?php // closing </div> for day wrapper ?>
    <div class="day">
      <div class="day-date rounded">
        <div class="mobile-date">
          <?php echo date("D, F j", strtotime( $item->get_date() )); ?>
        </div>
        <div class="day-of-week">
          <?php echo date("D", strtotime( $item->get_date() )); ?>
        </div>
        <div class="month-day">
          <?php echo date("F j", strtotime( $item->get_date() )); ?>
        </div>
      </div>
    <?php // closing </div> created later ?>
	<?php endif; ?>
  
	<?php $account = getAccount($item->get_feed()->get_link()); //attempt to grab tumblr account ?>
  
	<?php if(substr($item->get_link(), 0, 18) == "http://twitter.com"): // it's a tweet!?>
    <div class="post twitter rounded">
      <?php $username = getUsername($item->get_title()); ?>
      <div class="post-top">
        <span class="time">
          <?php echo date("g:ia",strtotime($item->get_date()));?>
        </span>
        - Tweet -
        <a href="http://twitter.com/<?php echo $username?>">@<?php echo $username?></a>
        <?php if($type !== 'tweets'): ?>
          <a class="filter" href="tweets.php">View just tweets</a>
        <?php endif;?>
      </div>
      
      <div class="content">
        <div class="profile-image">
          <a href="http://twitter.com/<?php echo $username?>">
            <img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $username?>&size=bigger">
          </a>
        </div>
        <p>
          <?php echo linkify(substr($item->get_title(), strlen($username) + 2)); ?>
        </p>
      </div>
     
      <div class="post-bottom">
       <a href="https://twitter.com/<?php echo $username?>" class="twitter-follow-button" data-width="280px">
        Follow @<?php echo $username?>
       </a>
      </div>
    </div>
  
	<?php elseif((substr($item->get_description(), 0, 7) == "<iframe") or (substr($item->get_description(), 0, 6) == "<embed") or (substr($item->get_description(), 0, 7) == "<object")): // it's a tumblr video! ?>
			<div class="post video rounded">
				<div class="post-top">
          <span class="time">
            <?php echo date("g:ia",strtotime($item->get_date()));?>
          </span>
          - <?php echo $item->get_feed()->get_title()?> Video -
          <?php if($type !== 'pulse_posts'): ?>
            <a class="filter" href="posts.php?type=<?php echo $account; ?>">
              View just <?php echo $item->get_feed()->get_title()?>
            </a>
          <?php endif;?>
        </div>
        
				<div class="content">
					<?php echo $item->get_content()?>
				</div>
        
				<div class="post-bottom">
          <a class="comment-link" href="../<?php echo $item->get_link()?>#disqus_thread" name="<?php echo $item->get_link()?>">
            Comments
          </a>
          <a href="#hide-comments" class="hide-comments">
            Hide Comments
          </a>
          <div id="fb-root"></div>
          <fb:like href="<?php echo $item->get_link()?>" send="true" layout="button_count" width="120px" show_faces="false" font=""></fb:like>
        </div>
			</div>
      
	<?php elseif(substr($item->get_content(), 0, 10) == '<img src="'): // it's a tumblr image! ?>
	<div class="post photo rounded">
		<div class="post-top">
      <span class="time">
        <?php echo date("g:ia",strtotime($item->get_date()));?>
      </span>
      - <?php echo $item->get_feed()->get_title()?> Photo - 
      <?php if($type !== 'pulse_posts'): ?>
        <a class="filter" href="posts.php?type=<?php echo $account; ?>">
          View just <?php echo $item->get_feed()->get_title()?>
        </a>
      <?php endif;?>
    </div>
    
		<div class="content">
			<?php echo $item->get_content()?>
		</div>
    
		<div class="post-bottom">
      <a class="comment-link" href="../<?php echo $item->get_link()?>#disqus_thread" name="<?php echo $item->get_link()?>">
        Comments
      </a>
      <a href="#hide-comments" class="hide-comments">
        Hide Comments
      </a>
      <div id="fb-root"></div>
      <fb:like href="<?php echo $item->get_link()?>" send="true" layout="button_count" width="120px" show_faces="false" font=""></fb:like>
    </div>
	</div>	
  
	<?php else: // it's a standard post! ?>
	<div class="post standard rounded">
		<div class="post-top">
      <span class="time">
        <?php echo date("g:ia",strtotime($item->get_date()));?>
      </span>
      - <?php echo $item->get_feed()->get_title()?> -
      <?php if($type !== 'pulse_posts'): ?>
        <a class="filter" href="posts.php?type=<?php echo $account; ?>">
          View just <?php echo $item->get_feed()->get_title()?>
        </a>
      <?php endif;?>
    </div>
    
		<div class="content">
			<?php echo $item->get_content()?>
		</div>
    
		<div class="post-bottom">
      <a class="comment-link" href="../<?php echo $item->get_link()?>#disqus_thread" name="<?php echo $item->get_link()?>">
        Comments
      </a>
      <a href="#hide-comments" class="hide-comments">
        Hide Comments
      </a>
      <div id="fb-root"></div>
      <fb:like href="<?php echo $item->get_link()?>" send="true" layout="button_count" width="120px" show_faces="false" font=""></fb:like>
    </div>
	</div>
	
  <?php endif; // end template if-elseif chooser?>

  <?php if($i == $num- 1) echo "</div>"; //closing div tag for last day displayed. minus one since array starts at 0 ?>
  
<?php endif; //end wrapper if?>

<?php if($i == $data->get_item_quantity() - 1): ?>
	<div class="no-more">
    <p>No more items to display</p>
  </div>
	<script language="javascript" type="text/javascript">
		$('#more').hide();
	</script>
<?php endif;?>