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

if (empty($cl['is_logged'])) {
	$data         = array(
		'code'    => 401,
		'data'    => array(),
		'message' => 'Unauthorized Access'
	);
}
else {
	require_once(cl_full_path("core/apps/home/app_ctrl.php"));

	$swifts = cl_timeline_swifts();

	if (not_empty($swifts)) {
		$data["code"]    = 200;
		$data["data"]    = $swifts;
		$data["message"] = "Swifts fetched successfully";
	}

	else {
		$data["code"]    = 404;
		$data["data"]    = array();
		$data["message"] = "No swifts available yet";
	}
}