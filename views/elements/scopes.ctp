<div class="scopes">
	<?php 
	$params_passed_clean = $this->passedArgs;
	
	foreach($scopes as $key => $item) {
		unset($params_passed_clean[$item]);
	}
	//debug($params_passed_clean);?>
	
	<?php foreach($scopes as $key => $item):?>
		<?php if($item == $scope):?>
			<span class="scope selected">
				<em><?php echo $key?></em>
				<span class="count"></span>
			</span>
		<?php else: ?>
			<span class="scope">
				<?php echo $html->link($key, array_merge($params_passed_clean, array('action'=>'index', 'scope' => $item)))?>
				<span class="count"></span>
			</span>
		<?php endif;?>
	<?php endforeach; ?>
</div>