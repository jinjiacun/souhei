<?php
return array(
	//'配置项'=>'配置值'
	'url_api' => 'http://192.168.1.131',
	'call_url'=> 'http://192.168.1.131/yms/Index.php/Home/Callapi/ajax_call_api',
	'user_photo_url' => "http://192.168.1.31:8310/",
	'bq_url' => "/yms/Public/Home/arclist",
        'SESSION_AUTO_START' =>true,
	'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
    'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
    'ERROR_PAGE' =>'/Public/error.html',
    'user_url' => "http://192.168.1.31:8300/Api/SetUserAvatarByUid",
    'SESSION_OPTIONS' =>  array('name'=>'session_id','expire'=>432000),  
);
