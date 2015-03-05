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
    $merge = function (array $merged, array $new) use (&$merge) {
        foreach ($new as $key => $value) {
            if (array_key_exists($key, $merged)) {
                if (is_int($key)) {
                    $merged[] = $value;
                } elseif (is_array($value) && is_array($merged[$key])) {
                    $merged[$key] = $merge($merged[$key], $value);
                } else {
                    $merged[$key] = $value;
                }
            } else {
                $merged[$key] = $value;
            }
        }
        return $merged;
    };

    return array_reduce(glob(
        realpath($path) . '/{,*.}{' . implode(',', $suffixes) . '}.php',
        GLOB_BRACE
    ), function ($config, $file) use (&$merge) {
        return $merge($config, include $file);
    }, $init);
}
