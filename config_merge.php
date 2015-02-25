<?php

/**
 * ConfigMerge
 *
 * @link https://github.com/kanellov/config-merge
 * @copyright Copyright (c) 2015 Vassilis Kanellopoulos - contact@kanellov.com
 * @license https://raw.githubusercontent.com/kanellov/config-merge/master/LICENSE
 */

namespace Knlv;

/**
 * Merges configuration arrays.
 *
 * Merges files in the existing path that match given suffix. Files should
 * return array. Last suffix in array has greater priority than previous.
 *
 * @param  string $path the path containing the configuration files
 * @param  array  $suffixes array with file name suffixes
 * @param  array  $init initial configuration
 * @return array  the merged configuration array
 */
function config_merge($path, array $suffixes, array $init = array())
{
    return array_reduce(
        glob(
            realpath($path) . '/{,*.}{' . implode(',', $suffixes) . '}.php',
            GLOB_BRACE
        ),
        function ($config, $file) {
            return array_replace_recursive($config, include $file);
        },
        $init
    );
}
