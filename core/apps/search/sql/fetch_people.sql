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

SELECT `id`, `about`, `followers`, `following`, `posts`, `website`, `country_id`, `avatar`, `last_active`, `username`, `fname`, `lname`, `email`, `verified`, `follow_privacy` FROM `<?php echo($data['t_users']); ?>`
	
	WHERE `active` = '1'

	<?php if($data['user_id']): ?>
		AND `id` != <?php echo($data['user_id']); ?>

		AND `id` NOT IN (SELECT b1.`profile_id` FROM `<?php echo($data['t_blocks']); ?>` b1 WHERE b1.`user_id` = <?php echo($data['user_id']); ?>)

		AND `id` NOT IN (SELECT b2.`user_id` FROM `<?php echo($data['t_blocks']); ?>` b2 WHERE b2.`profile_id` = <?php echo($data['user_id']); ?>)
	<?php endif; ?>

	<?php if($data['keyword']): ?>
		AND (`username` LIKE "%<?php echo($data['keyword']); ?>%" OR `fname` LIKE "%<?php echo($data['keyword']); ?>%" OR `lname` LIKE "%<?php echo($data['keyword']); ?>%" OR `about` LIKE "%<?php echo($data['keyword']); ?>%" OR CONCAT(`fname`,' ',`lname`) LIKE "%<?php echo($data['keyword']); ?>%")
	<?php endif; ?>

	<?php if($data['offset']): ?>
		AND `id` < <?php echo($data['offset']); ?>
	<?php endif; ?>

	ORDER BY `id` DESC, `followers` DESC, `posts` DESC

<?php if(is_posnum($data['limit'])): ?>
	LIMIT <?php echo($data['limit']); ?>;
<?php endif; ?>