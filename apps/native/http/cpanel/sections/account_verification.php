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

require_once(cl_full_path("core/apps/cpanel/account_verification/app_ctrl.php"));

$cl['requests_total'] = cl_admin_get_verification_requests_total();    
$cl['requests']       = cl_admin_get_verification_requests(array('limit' => 7));    
$cl['http_res']       = cl_template("cpanel/assets/account_verification/content");