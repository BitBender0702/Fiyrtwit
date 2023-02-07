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
    $data['err_code'] = "invalid_req_data";
    $data['status']   = 400;
    $offset           = fetch_or_get($_GET['offset'], 0);
    $users_list       = array();
    $html_arr         = array();

    if (is_posnum($offset)) {
        
        $users_list = cl_get_hot_topics(30, $offset);

        if (not_empty($users_list)) {
            foreach ($users_list as $cl['li']) {
                $html_arr[] = cl_template('trending/includes/list_item');
            }

            $data['status'] = 200;
            $data['html']   = implode("", $html_arr);
        }
    }
}