<?php 
# @*************************************************************************@
# @ Software author: TWT							@
# @ Author_url 1: TWT                       @
# @ Author_url 2: TWT                      @
# @ Author E-mail: demo@mail.com                                    @
# @*************************************************************************@
# @ TWIT - Social Media Platform           @
# @ Copyright (c) All rights reserved.               @
# @*************************************************************************@

function cl_get_total_users() {
	global $db, $cl;

	$db  = $db->where('active', array('1', '2'), 'IN');
	$qr  = $db->getValue(T_USERS, 'COUNT(*)');
	$num = 0;

	if (is_posnum($qr)) {
		$num = $qr;
	}

	return $num;
}