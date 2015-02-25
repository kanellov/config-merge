<?php return array(
    'db'    => array(
        'dsn'      => 'mysql:dbname=production_db;host=production_server',
        'options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
        ),
    ),
    'dompdf' => array(
        'temp_dir'            => 'cache',
        'default_font'        => 'dejavu',
        'enable_remote'       => true,
        'font_height_ratio'   => 0.95,
        'enable_html5_parser' => true,
    ),
);
