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
    $swift_id   = fetch_or_get($_POST["swid"], false);

    if (is_array($swift_data) && isset($swift_data[$swift_id])) {
        $swift_data    = cl_delete_swift($swift_id);
        $junked_swifts = array();

        foreach ($swift_data as $i => $row) {
            if (cl_is_junked_swift($row)) {
                array_push($junked_swifts, $i);
            }
        }

        if (not_empty($junked_swifts)) {
            foreach ($junked_swifts as $junked_swid) {
                $swift_data = cl_delete_swift($junked_swid);
            }
        }
        
        cl_update_user_data($me["id"], array(
            "swift" => cl_minify_js(json($swift_data, true))
        ));
    }

    $data['code']    = 200;
    $data['message'] = "Swift successfully deleted";
    $data['data']    = array();
}