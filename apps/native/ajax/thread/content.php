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

require_once(cl_full_path("core/apps/thread/app_ctrl.php"));

if ($action == 'load_thread_replys') {
	$data['err_code'] = 0;
    $data['status']   = 400;
    $offset           = fetch_or_get($_GET['offset'], 0);
    $thread_id        = fetch_or_get($_GET['thread_id'], 0);
    $replys_list      = array();
    $html_arr         = array();

    if (is_posnum($offset) && is_posnum($thread_id)) {
    	
    	$replys_list = cl_get_thread_child_posts($thread_id, 30, $offset, 'lt');

    	if (not_empty($replys_list)) {
			foreach ($replys_list as $cl['li']) {
				$html_arr[] = cl_template('timeline/post');
			}

			$data['status'] = 200;
			$data['html']   = implode("", $html_arr);
		}
    }
}
