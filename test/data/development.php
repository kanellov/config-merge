<?php return array(
    'db'    => array(
        'dsn'      => 'mysql:dbname=dev_db2;host=dev_server',
    ),
    'mail' => array(
        'name'              => 'mail',
        'host'              => 'mail.server',
        'connection_class'  => 'plain',
        'connection_config' => array(
            'username' => 'some_user',
            'password' => 'some_pass',
        ),
    ),
);
