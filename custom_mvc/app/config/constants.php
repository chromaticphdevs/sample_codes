<?php

    #################################################
	##             THIRD-PARTY APPS                ##
    #################################################

    const MAILER_AUTH = [
        'username' => ' ############# ',
        'password' => '#############',
        'host'     => '#############',
        'name'     => '#############',
        'port'     => '#############',
        'replyTo'  => '#############',
        'replyToName' => '#############'
    ];

    const ITEXMO = [
        'key' => '#############',
        'pwd' => '#############'
    ];

    #################################################
	##             EXTENDED APPS                   ##
	#################################################
	const APP_EXTENSIONS = [
		'cxbook' => [
			'base_controller' => 'Accounts',
			'base_method'     => 'index'
        ]
    ];

    define('APP_EXTENSIONS_PATH' , APPROOT.DS.'softwares');

	#################################################
	##             SYSTEM CONFIG                ##
    #################################################


    define('GLOBALS' , APPROOT.DS.'classes/globals');

    define('SITE_NAME' , 'CUSTOM MVC');

    define('KEY_WORDS' , '#############');


    define('DESCRIPTION' , '#############');

    define('AUTHOR' , SITE_NAME);
?>
