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

require_once(cl_full_path("core/apps/cpanel/posts/app_ctrl.php"));

$cl['posts']    = cl_admin_get_posts(array('limit' => 10));    
$cl['http_res'] = cl_template("cpanel/assets/publications/content");