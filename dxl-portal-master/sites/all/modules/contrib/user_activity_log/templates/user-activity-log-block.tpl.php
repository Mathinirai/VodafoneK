<?php

/**
 * @file
 * Theme file to handle user activity log block display.
 */
?>
<?php if (isset($variables['total_node']) || isset($variables['total_comments'])): ?>
	<ul>
		<li><?php echo t('Total nodes created (@totalnodes)', array('@totalnodes' => $total_node)) ?></li>
		<li><?php echo t('Total comments (@totalcomments)', array('@totalcomments' => $total_comments)) ?></li>
	</ul>
<?php endif; ?>
<?php if (isset($variables['latest_node_created_by_user_arr'])): ?>
	<h3><?php echo t('Recent Created Nodes'); ?></h3>
	<ul>
	<?php foreach ($variables['latest_node_created_by_user_arr'] as $key => $values): ?>
	 <li><?php echo l($values['title'], $values['path']); ?></li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>
<?php if (isset($variables['total_comments_by_user_arr'])): ?>
	<h3><?php echo t('Recent Comments'); ?></h3>
	<ul>
	<?php foreach ($variables['total_comments_by_user_arr'] as $key => $values): ?>
	 <li> Commented on <?php echo l($values['title'], $values['path']); ?></li>
	<?php endforeach; ?>
	</ul>
	<div><?php echo l(t('Show more'), '/list_all_user_activity_item'); ?></div>
 <?php endif; ?>
