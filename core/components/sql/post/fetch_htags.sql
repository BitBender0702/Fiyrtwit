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

SELECT * FROM `<?php echo($data['t_htags']); ?>`
	
	WHERE `posts` > 0

	AND (`time` >= <?php echo strtotime("this week"); ?> OR `time` >= <?php echo strtotime("last day of previous month 00:00"); ?> OR `time` >= <?php echo strtotime(date("Y:01:01 00:00:00")); ?> OR `time` > 0)

	ORDER BY `time` DESC, `posts` DESC

<?php if($data['offset']): ?>
	LIMIT <?php echo($data['limit']); ?> OFFSET <?php echo($data['offset']); ?>;
<?php else: ?>
	LIMIT <?php echo($data['limit']); ?>;
<?php endif; ?>