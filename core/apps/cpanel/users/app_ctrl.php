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

function cl_admin_get_users($args = array()) {
    global $cl,$me,$db;

    $args           = (is_array($args)) ? $args : array();
    $options        = array(
        "offset"    => false,
        "limit"     => 10,
        "offset_to" => false,
        "order"     => 'DESC',
        "filter"    => array(),
    );

    $args           = array_merge($options, $args);
    $offset         = $args['offset'];
    $limit          = $args['limit'];
    $order          = $args['order'];
    $filter         = $args['filter'];
    $offset_to      = $args['offset_to'];
    $data           = array();
    $t_users        = T_USERS;
    $sql            = cl_sqltepmlate('apps/cpanel/users/sql/fetch_site_users',array(
        'offset'    => $offset,
        't_users'   => $t_users,
        'limit'     => $limit,
        'offset_to' => $offset_to,
        'order'     => $order,
        'filter'    => $filter,
    ));

    $data  = array();
    $users = $db->rawQuery($sql);

    if (cl_queryset($users)) {
        foreach ($users as $row) {
            $row['url']         = cl_link($row['username']);
            $row['avatar']      = cl_get_media($row['avatar']);
            $row['last_active'] = date('d M, Y h:m',$row['last_active']);
            $banner_code        = fetch_or_get($cl['country_codes'][$row['country_id']], 'us');
            $row['banner']      = cl_banner($banner_code);
            $data[]             = $row;
        }
    }

    return $data;
}