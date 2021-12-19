<?php

function dd(...$parameter): void
{
    $backtrace = debug_backtrace();
    $line      = $backtrace[0]['line'];
    $file      = $backtrace[0]['file'];

    echo PHP_EOL . "Export called at: {$file} ({$line})" . PHP_EOL;

    $count   = func_num_args();
    $argList = func_get_args();

    for ($i = 0; $i < $count; $i++) {
        echo "[$i]\n";
        var_export($argList[$i]);
        echo "\n";
    }

    die();
}
