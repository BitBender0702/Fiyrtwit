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

if (empty($cl["is_logged"])) {
	cl_redirect("guest");
}
else {

	if (file_exists($me["info_file"])) {

		header("Content-Description: File Transfer");
		header("Content-Type: application/octet-stream");
		header(cl_strf("Content-Disposition: attachment; filename=\"%s.html\"", $me['username']));
		header("Expires: 0");
		header("Cache-Control: must-revalidate");
		header("Pragma: public");
		header(cl_strf("Content-Length: %s", filesize($me["info_file"])));
		flush();
		readfile($me["info_file"]);

		unlink($me["info_file"]);

		cl_update_user_data($me['id'], array(
			'info_file' => ""
		));

		exit;
    }
    else {

    	header('Content-Type: application/json');

    	$data          =  array(
		    "status"   => "500",
		    "err_code" => "invalid_file_name",
		    "message"  => "Something went wrong while processing your request. Please try again later"
		);

		echo json_encode($data, JSON_PRETTY_PRINT);
		exit();
    }
}