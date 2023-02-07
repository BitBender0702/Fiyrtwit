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

function cl_get_unconfirmed_accounts() {
	global $db;

	$db = $db->where("time", (time() - 604800), "<");
	$qr = $db->getValue(T_ACC_VALIDS, "COUNT(*)");

	if (is_posnum($qr)) {
		return $qr;
	}

	return 0;
}