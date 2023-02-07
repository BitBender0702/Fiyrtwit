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

SELECT * FROM `<?php echo($data['t_ads']); ?>`
	
	WHERE `user_id` = <?php echo($data['user_id']); ?>

	AND `status` IN ('active', 'inactive')

	<?php if($data['type'] == 'active'): ?>
		AND `status` = 'active' AND `approved` = 'Y'
	<?php elseif($data['type'] == 'inactive'): ?>
		AND `status` = 'inactive' AND `approved` = 'Y'
	<?php elseif($data['type'] == 'pending'): ?>
		AND `status` IN ('inactive', 'active') AND `approved` = 'N'
	<?php endif; ?>

	ORDER BY `clicks` DESC, `views` DESC

<?php if($data['offset']): ?>
	LIMIT <?php echo($data['offset']); ?>, <?php echo($data['offset'] + 10); ?>;
<?php else: ?>
	LIMIT <?php echo($data['limit']); ?>;
<?php endif; ?>