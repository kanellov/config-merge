<?php return array(
    'db'    => array(
        'dsn'      => 'mysql:dbname=dev_db2;host=dev_server',
        'user'     => 'username',
        'password' => 'password',
        'options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
        ),
    ),
    'recaptcha' => array(
        'public_key'  => 'SOMEPUBLICKEY',
        'private_key' => 'SOMEPRIVATEKEY',
    ),
    'dompdf' => array(
        'temp_dir'            => 'cache',
        'default_font'        => 'dejavu',
        'enable_remote'       => true,
        'font_height_ratio'   => 0.95,
        'enable_html5_parser' => true,
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
