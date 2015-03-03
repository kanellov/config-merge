# config-merge

[![Build Status](https://travis-ci.org/kanellov/config-merge.svg?branch=master)](https://travis-ci.org/kanellov/config-merge)

A simple function that merges configuration files.

# Example
In the following example *.local.php files override the *.global.php files.

configuration file /some/path/a.global.php

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

configuration file /some/path/b.local.php

    <?php return array(
      'db'    => array(
          'dsn'      => 'mysql:dbname=dev_db;host=dev_server',
          'user'     => 'username',
          'password' => 'password',
      ),
      'recaptcha' => array(
          'public_key'  => 'SOMEPUBLICKEY',
          'private_key' => 'SOMEPRIVATEKEY',
      ),
    );
   
merge the configuration files using

    $config = \Knlv\config_merge('/some/path', array('global', 'local'));
    
the returned configuration 

    array(
      'db'    => array(
          'dsn'      => 'mysql:dbname=dev_db;host=dev_server',
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
    );

