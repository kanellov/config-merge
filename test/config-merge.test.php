<?php
require __DIR__ . '/../vendor/autoload.php';

use \FUnit as fu;

fu::test("Test config_merge with two files", function () {
    $config = \Knlv\config_merge(__DIR__ . '/data', array('global', 'local'));
    $expected = include __DIR__ . '/data/config_out1.php';
    fu::equal($config, $expected);
});

fu::test("Test config_merge with three files", function () {
    $config = \Knlv\config_merge(__DIR__ . '/data', array('global', 'local', 'development'));
    $expected = include __DIR__ . '/data/config_out2.php';
    fu::equal($config, $expected);
});
