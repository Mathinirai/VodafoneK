<div class='all-list-user'>
	<ul class="tabs-user-activity">
	  <li class="active">
	    <a href="#" class="active" >Total Nodes</a>
	  </li>
    <li>
      <a href="#">Total Comments</a>
    </li>
  </ul>
  <!-- Showing total Nodes -->
  <div class="activity-tabs-node tab-user-content active">
    <?php foreach ($variables['all_node_created_by_user_arr'] as $key => $values): ?>
      <li><?php echo l($values['title'], $values['path']); ?></li>
    <?php endforeach; ?>
  </div>
  <!-- Showing total comments -->
  <div class="activity-tabs-comment tab-user-content" style="display: none">
	   <?php foreach ($variables['all_comments_by_user_arr'] as $key => $values): ?>
		   <li> Commented on <?php echo l($values['title'], $values['path']); ?></li>
		<?php endforeach; ?>
  </div>
</div>
