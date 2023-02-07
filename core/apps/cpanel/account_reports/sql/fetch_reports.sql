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

SELECT r.`id`, r.`profile_id`, r.`user_id`, r.`reason`, r.`seen`, r.`time`, CONCAT(u1.`fname`, ' ', u1.`lname`) AS u1_name, u1.`username` AS u1_username, u1.`verified` AS u1_verified, u1.`avatar` AS u1_avatar, CONCAT(u2.`fname`, ' ',  u2.`lname`) AS u2_name, u2.`username` AS u2_username,u2.`verified` AS u2_verified, u2.`avatar` AS u2_avatar FROM `<?php echo($data['t_reports']);?>` r
	
	INNER JOIN `<?php echo($data['t_users']);?>` u1 ON r.`user_id` = u1.`id`

	INNER JOIN `<?php echo($data['t_users']);?>` u2 ON r.`profile_id` = u2.`id`

	WHERE u2.`active` IN ('1', '2')

	<?php if($data['offset']): ?>
		<?php if($data['offset_to'] == 'gt'): ?>
			AND r.`id` > <?php echo($data['offset']); ?>
		<?php else: ?>
			AND r.`id` < <?php echo($data['offset']); ?>
		<?php endif; ?>	
	<?php endif; ?>

ORDER BY r.`id` <?php echo fetch_or_get($data['order'], 'DESC');?>

LIMIT <?php echo fetch_or_get($data['limit'], 7);?>