<div id="index_footer">
Download:&nbsp;<a href="/admin/customers.csv?order=id_desc&amp;page=2">CSV</a>&nbsp;<a href="/admin/customers.xml?order=id_desc&amp;page=2">XML</a>&nbsp;<a href="/admin/customers.json?order=id_desc&amp;page=2">JSON</a>
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
