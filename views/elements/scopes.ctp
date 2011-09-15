<div class="scopes">
	<?php 
	$params_passed_clean = $this->passedArgs;
	
	foreach($scopes as $key => $item) {
		unset($params_passed_clean[$key]);
	}
	?>
	
	<?php foreach($scopes as $key => $item):?>
		<?php if($key == $scope):?>
			<span class="scope selected">
				<em><?php echo $item?></em>
				<?php if(isset($counts[$key])):?><span class="count"><?php echo $counts[$key]?></span><?php endif; ?>
			</span>
		<?php else: ?>
			<span class="scope">
				<?php echo $html->link($item, array_merge($params_passed_clean, array('action'=>'index', 'scope' => $key)))?>
				<?php if(isset($counts[$key])):?><span class="count"><?php echo $counts[$key]?></span><?php endif; ?>
			</span>
		<?php endif;?>
	<?php endforeach; ?>
</div>