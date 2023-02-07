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

SELECT COUNT(*) AS total FROM `<?php echo($data['t_notifs']); ?>`
	
	WHERE `recipient_id` = <?php echo($data['user_id']); ?>

	<?php if($data['type'] == "notifs"): ?>
		AND `subject` IN ('reply','subscribe', 'like', 'repost', 'verified', 'visit', 'subscribe_request', 'subscribe_accept', 'ad_approval')
	<?php else: ?>
		AND `subject` = 'mention'
	<?php endif; ?>

	AND `notifier_id` NOT IN (SELECT b.`profile_id` FROM `<?php echo($data['t_blocks']); ?>` b WHERE b.`user_id` = <?php echo($data['user_id']); ?>)