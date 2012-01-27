# Active Admin for CakePHP

Based on Active Admin for RoR (http://activeadmin.info/). This plugin for CakePHP gives you the same administration interface for the PHP framework. It also uses Nik Chankov's Filter component (http://nik.chankov.net).

## Install

1 - Clone the project as "active_admin" into your apps plugins-folder

2 - Copy the active_admin/views/layouts/admin.ctp into your app's layout-folder

### Prepare your app's controllers

3 - The Filter component is needed for filtering of records:

    var $components = array('ActiveAdmin.Filter');

4 - For the admin_index function:

    function admin_index() {
    $this->paginate['Post']['order'] = array('Post.date' => 'desc');
    $this->Post->recursive = 0;
    // Add this 
    $filter = $this->Filter->process($this);
    $this->set('posts', $this->paginate(null, $filter));
    }

5 - And update your view/(controller)/admin_index.ctp views, using a table-header element that enable table-sorting:

    <table cellpadding="0" cellspacing="0">
    <?php echo $this->element('table_header', array('plugin'=>'active_admin','keys'=>array('id', 'title', 'slug','created', 'modified'))); ?>
    	<?php
    	$i = 0;
    	foreach ($posts as $post):
    		$class = null;
    		if ($i++ % 2 == 0) {
    			$class = ' class="even"';
    		}
    	?>
    	<tr<?php echo $class;?>>
    		<td><?php echo $post['Post']['id']; ?>&nbsp;</td>
    		<td><?php echo $post['Post']['title']; ?> (<?php echo count($api['Feed'])?>)</td>
    		<td><?php echo $post['Post']['slug']; ?>&nbsp;</td>
    		<td><?php echo $post['Post']['created']; ?>&nbsp;</td>
    		<td><?php echo $post['Post']['modified']; ?>&nbsp;</td>
    		<td class="actions">
    			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $post['Post']['id'])); ?>
    			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $post['Post']['id'])); ?>
    			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['Post']['id'])); ?>
    		</td>
    	</tr>
    <?php endforeach; ?>
    </table>