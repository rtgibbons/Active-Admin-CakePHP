<thead>						
	<tr>
		<?php foreach($keys as $key):?>
			<?php
			$class = "sortable";
			if(isset($this->params['named']['sort']) and $this->params['named']['sort'] == $key) {
				if($paginator->sortDir() == 'asc') {
					$class= "sortable sorted-asc";
				} else {
					$class = "sortable sorted-desc";
				}
			}
			?>
			<?php $paginator->options(array('url' => $this->passedArgs));?>
		<th class="<?php echo $class ?>"><?php echo $paginator->sort($key);?></th>
		<?php endforeach; ?>
		<th></th>
	</tr>
</thead>