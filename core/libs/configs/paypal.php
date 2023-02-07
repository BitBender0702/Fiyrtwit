<?php 
# @*************************************************************************@
# @ Software author: TWT							@
# @ Author_url 1: TWT                       @
# @ Author_url 2: TWT                      @
# @ Author E-mail: demo@mail.com                                    @
# @*************************************************************************@
# @ TWIT - Social Media Platform           @
# @ Copyright (c) All rights reserved.               @
# @*************************************************************************@

require_once(cl_full_path('core/libs/paypal/vendor/autoload.php'));

$paypal_conf = array(
 	"secret_key"      => $cl['config']['paypal_api_key'],
 	"publishable_key" => $cl['config']['paypal_api_pass']
);

$paypal_creds = new \PayPal\Auth\OAuthTokenCredential($cl['config']['paypal_api_key'], $cl['config']['paypal_api_pass']);
$paypal       = new \PayPal\Rest\ApiContext($paypal_creds);

$paypal->setConfig(array(
	'mode' => $cl['config']['paypal_mode']
));

