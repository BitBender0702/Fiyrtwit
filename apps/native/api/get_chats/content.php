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
	require_once(cl_full_path("core/apps/chat/app_ctrl.php"));

	$chants_ls = cl_get_chats(array("user_id" => $me['id']));

	if (not_empty($chants_ls)) {
		$data["code"]    = 200;
		$data["valid"]   = true;
		$data["message"] = "Chats successfully";
		$data["data"]    = $chants_ls;
	}
	else {
		$data['code']    = 204;
        $data['message'] = "No data found";
        $data['data']    = array();
	}
}