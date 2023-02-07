<?php 
# @*************************************************************************@
# @ Software author: TWT                           @
# @ Author_url 1: TWT                       @
# @ Author_url 2: TWT                      @
# @ Author E-mail: demo@mail.com                                    @
# @*************************************************************************@
# @ TWIT - Social Media Platform           @
# @ Copyright (c) All rights reserved.               @
# @*************************************************************************@

if (empty($cl['is_logged'])) {
	$data         = array(
		'code'    => 401,
		'data'    => array(),
		'message' => 'Unauthorized Access'
	);
}
else {
	cl_db_delete_item(T_SESSIONS, array(
		"user_id"  => $me["id"],
		"platform" => "mobile_ios"
	));

	cl_db_delete_item(T_SESSIONS, array(
		"user_id"  => $me["id"],
		"platform" => "mobile_android"
	));

	$data         = array(
		'valid'   => true,
		'code'    => 200,
		'message' => 'Signout successful',
		'data'    => array()
	);
}