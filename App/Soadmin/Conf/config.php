<?php
return array(
	//'配置项'=>'配置值'
	#'url_api' => 'http://220.248.57.238:7788',
	'url_api' => 'http://192.168.1.131',
	'call_url'=> 'http://192.168.1.131/yms/index.php/Soadmin/Callapi/ajax_call_api',
	'Template_pre' => 'http://192.168.1.131/yms/index.php/'.'Soadmin/',
	'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
        'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
	'bq_url' => "/yms/Public/Home/arclist",
);
