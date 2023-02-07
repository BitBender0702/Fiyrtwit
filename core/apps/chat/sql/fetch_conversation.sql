/*
@*************************************************************************@
@ Software author: TWT							  @
@ Author_url 1: TWT                       @
@ Author_url 2: TWT                      @
@ Author E-mail: demo@mail.com                                    @
@*************************************************************************@
@ TWIT - Social Media Platform           @
@ Copyright (c) All rights reserved.               @
@*************************************************************************@
*/

SELECT * FROM `<?php echo($data['t_msgs']); ?>` 

	WHERE ((`sent_by` = <?php echo($data['user_one']); ?> AND `sent_to` = <?php echo($data['user_two']); ?> AND `deleted_fs1` = 'N') OR (`sent_to` = <?php echo($data['user_one']); ?> AND `sent_by` = <?php echo($data['user_two']); ?> AND `deleted_fs2` = 'N'))

	<?php if($data['offset']): ?>

		<?php if($data['offset_to'] == 'gt'): ?>
			AND `id` >  <?php echo($data['offset']); ?>
		<?php endif; ?>

		<?php if($data['offset_to'] == 'lt'): ?>
			AND `id` <  <?php echo($data['offset']); ?>
		<?php endif; ?>

	<?php endif; ?>

	<?php if(not_empty($data['ids']) && is_array($data['ids']) && are_all($data['ids'], "numeric")): ?>
		AND `id` IN (<?php echo implode(",", $data['ids']); ?>)
	<?php endif; ?>

	<?php if($data['new']): ?>
		AND `seen` = 0 
	<?php endif; ?>

	ORDER BY `id` <?php echo($data['order']); ?> 

<?php if($data['limit']): ?>
	LIMIT <?php echo($data['limit']); ?>;
<?php endif; ?>