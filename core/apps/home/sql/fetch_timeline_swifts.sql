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

SELECT u.`id`, u.`username`, u.`fname`, u.`lname`, u.`avatar`, u.`swift` FROM `<?php echo($data['t_users']); ?>` u
	
	WHERE u.`swift_update` > <?php echo time(); ?>

	AND (u.`id` = <?php echo($data['user_id']); ?> OR u.`id` IN (SELECT `following_id` FROM `<?php echo($data['t_conns']); ?>` WHERE `follower_id` = <?php echo($data['user_id']); ?> AND `status` = "active"))

ORDER BY u.`swift_update` DESC;