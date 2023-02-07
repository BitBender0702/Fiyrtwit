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
	$lang_name = fetch_or_get($_POST['lang_name'], 0);
    $languages = array("english", "french", "german", "italian", "russian", "portuguese", "spanish", "turkish", "dutch", "ukraine", "arabic");

	if (not_empty($lang_name) && in_array($lang_name, $languages)) {
        $data["code"]    = 200;
        $data["message"] = "Language changed successfully";
        $data["data"]    = array();

		cl_update_user_data($me['id'], array(
            'language' => $lang_name
        ));
	}
	else {
		$data['code']    = 400;
        $data['message'] = "Display language name is invalid or missing";
    	$data['data']    = array();
	}
}