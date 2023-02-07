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
	$swift_data = $me['swift'];

	if (not_empty($me["last_swift"]) && isset($swift_data[$me["last_swift"]])) {
        $swift_data     = cl_delete_swift($me["last_swift"]);
       
        cl_update_user_data($me["id"], array(
            "swift"      => cl_minify_js(json($swift_data, true)),
            "last_swift" => ""
        ));
    }

    
    $data['code']    = 200;
    $data['message'] = "Media deleted successfully";
    $data['data']    = array();
}