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

	$post_id  = fetch_or_get($_POST['post_id'], 0);
    $priv_wcr = fetch_or_get($_POST['privacy'], 'everyone');

    if (is_posnum($post_id)) {
        $post_data = cl_raw_post_data($post_id);

        if (not_empty($post_data) && $post_data["user_id"] == $me["id"] && in_array($priv_wcr, array("everyone", "mentioned", "followers"))) {
            cl_update_post_data($post_id, array(
                "priv_wcr" => $priv_wcr
            ));

            $data['code']    = 200;
            $data['message'] = "Post privacy changed successfully";
            $data['data']    = array();
        }
        else{
            $data['code']    = 400;
            $data['message'] = "Post ID is missing or invalid. Please check your details";
            $data['data']    = array();
        }
    }
    else{
        $data['code']    = 400;
        $data['message'] = "Post ID is missing or invalid. Please check your details";
        $data['data']    = array();
    }
}