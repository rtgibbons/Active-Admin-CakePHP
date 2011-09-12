<div id="index_footer">
<nav class="pagination">
	<?php if($paginator->hasPrev()):?>
	<span class="first">
		<?php echo $paginator->first('« '.__('Frist', true), array(), null, array('class'=>'disabled'));?>
	</span>
	<span class="prev">
		<?php echo $paginator->prev('‹ '.__('Prev', true), array(), null, array('class'=>'disabled'));?>
	</span>
	<?php endif; ?>
	<?php echo $paginator->numbers(array('separator' => '&nbsp;'));?>
	<?php if($paginator->hasNext()):?>
		<span class="next">
			<?php echo $paginator->next(__('Next', true).' ›', array(), null, array('class'=>'disabled'));?>
	</span>
	<span class="last">
		<?php echo $paginator->last(__('Last', true).' »', array(), null, array('class'=>'disabled'));?>
	</span>
	<?php endif; ?>
</nav>
</div>
