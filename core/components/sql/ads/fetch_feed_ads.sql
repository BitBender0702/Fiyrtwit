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
      
SELECT a.`id`, a.`user_id`, a.`cover`, a.`company`, a.`target_url`, a.`views`, a.`time`, a.`description`, a.`cta`, u.`username`, u.`verified`, CONCAT(u.`fname`, ' ', u.`lname`) AS name FROM `<?php echo($data['t_ads']); ?>` a
	 
	INNER JOIN `<?php echo($data['t_users']); ?>` u ON a.`user_id` = u.`id`

	<?php if(not_empty($data['ad_id'])): ?>

		WHERE a.`status` != 'orphan' AND a.`id` = <?php echo($data['ad_id']); ?>
		
	<?php else: ?>

		WHERE a.`status` = 'active'

		AND a.`approved` = 'Y'

		AND u.`active` = '1'

		AND u.`wallet` > 0

		<?php if(not_empty($data['udata'])): ?>
			AND (a.`audience` LIKE '%<?php echo($data["udata"]["country_id"]); ?>%')
		<?php endif; ?>
		
	<?php endif; ?>

ORDER BY RAND() LIMIT 1;
