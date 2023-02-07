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

SELECT COUNT(*) AS total FROM `<?php echo($data['t_msgs']); ?>`
	
	WHERE `sent_to` = <?php echo($data['user_id']); ?>

	AND `seen` = '0'

	AND `sent_by` NOT IN (SELECT b1.`profile_id` FROM `<?php echo($data['t_blocks']); ?>` b1 WHERE b1.`user_id` = <?php echo($data['user_id']); ?>)

	AND `sent_by` NOT IN (SELECT b2.`user_id` FROM `<?php echo($data['t_blocks']); ?>` b2 WHERE b2.`profile_id` = <?php echo($data['user_id']); ?>)

	AND `deleted_fs1` = "N" 

	AND `deleted_fs2` = "N" 

