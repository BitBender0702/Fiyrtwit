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

SELECT r.`id`, u.`email`, u.`avatar`, u.`last_active`, u.`verified`, u.`username`, r.`full_name`, r.`text_message`, r.`video_message`, r.`time`

	FROM `<?php echo($data['t_reqs']) ?>` r

	INNER JOIN `<?php echo($data['t_users']); ?>` u ON r.`user_id` = u.`id`

	WHERE r.`id` = <?php echo($data['req_id']); ?>

LIMIT 1;