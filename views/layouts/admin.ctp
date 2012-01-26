<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-type"/>
		<title><?php echo $title_for_layout; ?></title>
		<?php
			echo $html->css('/active_admin/css/active_admin');
			echo $javascript->link('/active_admin/js/active_admin_vendor');
			echo $javascript->link('/active_admin/js/active_admin');
			echo $scripts_for_layout;
		?>
	</head>
	<?php
	$items = array(
		'Posts'=>'posts',
		'Categories'=>'categories',
		'Comments'=>'comments',
		'Users'=>'users',
		);
	?>
	<body class="">
		<div id="wrapper">
			<div id="header">
				<h1 id="site_title"><?php echo $html->link('Site', "/"); ?></h1>
				<ul class="tabbed_navigation" id="tabs">
						<?php foreach($items as $key => $item): ?>
						<li<?php if($this->params['controller'] == $item) echo " class='current'"?>><?php echo $html->link($key, '/admin/' . $item); ?></li>
						<?php endforeach; ?>
				</ul>
				<p id="utility_nav">
					<?php
					echo $html->tag('span', $user['User']['username']);
					echo $html->link(__('Logout',true), array('controller'=>'users', 'action'=>'logout', 'admin'=>false));
					
					?>
					</p>
			</div>
			<div id="title_bar">
				<span class="breadcrumb">
					<?php echo $html->link('Admin', array('controller'=>'apis', 'action'=>'index')); ?>
					<span class="breadcrumb_sep">/</span>
				</span>
				<h1 id="page_title"><?php echo $html->link($this->name, array('controller'=>$this->params['controller'], 'action'=>'index')); ?></h1>
				<div class="action_items">
					<?php if($this->action == 'admin_index' || $this->action == 'admin_view'): ?>
					<span class="action_item"><?php echo $html->link('New '. Inflector::singularize($this->name), array('controller'=>$this->params['controller'], 'action'=>'admin_add'))?></span>
					<?php endif; ?>
					<span class="action_item"><?php echo $html->link('Clear cache', array('controller'=>'apis', 'action'=>'admin_clear_cache'))?></span>
				</div>
			</div>
			<div class="with_sidebar" id="active_admin_content">
				<div id="main_content_wrapper">
					<div id="main_content">
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->Session->flash('auth'); ?>
					<?php 
					if($this->action == 'admin_index') {
						echo $this->element('paging_info', array('plugin'=>'active_admin'));
					}
					echo $content_for_layout;
					
					if($this->action == 'admin_index') {
						echo $this->element('paging', array('plugin'=>'active_admin'));
					}
					
					?>
					</div><!-- end main_content -->
				</div>
				<div id="sidebar">
					<?php 
					if($this->action == 'admin_index') {
						
						$file = new File(ELEMENTS . strtolower($this->name) . '_filter.ctp');
						if ($file->exists()) { 
							echo $this->element(strtolower($this->name) . '_filter');
						} else {
							echo $this->element('sidebar_filter', array('plugin'=>'active_admin'));
						}
					}
					if($this->action == 'admin_add' || $this->action == 'admin_edit') {
						
						$file = new File(ELEMENTS . strtolower($this->name) . '_edit_info.ctp');
						if ($file->exists()) { 
							echo $this->element(strtolower($this->name) . '_edit_info');
						}
					}
					
					?>
					
				</div>
			</div>
			<div id="footer">
				<p>Powered by <a href="http://www.activeadmin.info">Active Admin</a> 0.3.0</p>
			</div>
		</div>
	</body>
</html>
