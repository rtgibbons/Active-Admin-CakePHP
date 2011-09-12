<?php $name = Inflector::singularize($this->name); 
$model = ClassRegistry::init($name);
$display_field = $model->displayField; ?>
<div class="panel sidebar_section" id="filters_sidebar_section">
	<h3>Filters</h3>
	<div class="panel_contents">
		<?php
		$params_passed_clean = $this->passedArgs;
		unset($params_passed_clean['page']);
		?>
		<?php echo $form->create($name, array('url'=>array_merge($params_passed_clean, array('action'=>'index')),'class'=>'filter_form'));?>
			<div class="filter_form_field filter_string">
				<label>Søk <?php echo Inflector::humanize($display_field)?></label>
				<?php echo $form->input($name.'.'.$display_field, array('label'=>false, 'div'=>false)); ?>
			</div>
			<div class="filter_form_field filter_date_range">
				<label>Opprettet mellom</label>
				<?php echo $form->text($name.'.created.BETWEEN.0', array('class'=>'datepicker')); ?>
				<span class="seperator">-</span>
				<?php echo $form->text($name.'.created.BETWEEN.1', array('class'=>'datepicker')); ?>
			</div>
			<div class="buttons">
				<?php echo $form->submit('Filter', array('div'=>false, 'id'=>'SubmitBtn')) ?>
				<?php echo $html->link('Slett filtere', array('action'=>'index'), array('class'=>'clear_filters_btn clear_action')) ?>
			</div>
		</form>
	</div>
</div>