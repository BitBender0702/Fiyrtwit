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

if ($action == 'load_more') {
    if (empty($cl["is_logged"])) {
        $data['status'] = 400;
        $data['error']  = 'Invalid access token';
    }
    else {
    	$data['err_code'] = 0;
        $data['status']   = 400;
        $offset           = fetch_or_get($_GET['offset'], 0);
        $html_arr         = array();

        if (is_posnum($offset)) {

            require_once(cl_full_path("core/apps/bookmarks/app_ctrl.php"));
        	
        	$bookmarks = cl_get_bookmarks($me['id'], 30, $offset);

        	if (not_empty($bookmarks)) {
    			foreach ($bookmarks as $cl['li']) {
    				$html_arr[] = cl_template('timeline/post');
    			}

    			$data['status'] = 200;
    			$data['html']   = implode("", $html_arr);
    		}
        }
    }
}