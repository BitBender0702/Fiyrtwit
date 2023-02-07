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
	require_once(cl_full_path("core/apps/bookmarks/app_ctrl.php"));

    $offset    = fetch_or_get($_GET['offset'], null);
    $offset    = (is_posnum($offset)) ? $offset : null;
    $limit     = fetch_or_get($_GET['page_size'], 15);
    $limit     = (is_posnum($limit)) ? $limit : null;
    $bookmarks = cl_get_bookmarks($me['id'], $limit, $offset);

    if (not_empty($bookmarks)) {
        $data['code']    = 200;
        $data['message'] = "Bookmarks fetched successfully";
        $data['data']    = $bookmarks;
    }
    else {
    	$data['code']    = 204;
        $data['message'] = "No data found";
        $data['data']    = array();
    }
}