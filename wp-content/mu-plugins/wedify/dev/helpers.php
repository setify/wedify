<?php

/**
 * A few helper functions for debugging PHP
 * See: http://top-frog.com/2011/09/27/a-few-php-dev-helper-functions/ for info
 */
$__style = '' .
    'font: normal normal 10px/1.2 menlo, monaco, monospaced;';
function pp()
{
    global $__style;
    $msg = __v_build_message(func_get_args());
    echo '<pre style="' . $__style . '">' . htmlspecialchars($msg) . '</pre>';
}

function dp()
{
    global $__style;
    $msg = __v_build_message(func_get_args(), 'var_dump');
    echo '<pre style="' . $__style . '">' . htmlspecialchars($msg) . '</pre>';
}

function ep()
{
    $msg = __v_build_message(func_get_args());
    $msg_array = explode("\n", $msg);
    foreach ($msg_array as $line) {
        error_log('**: ' . str_replace("\t", ' ', $line));
    }
}

function __v_build_message($vars, $func = 'print_r', $sep = ', ')
{
    $msgs = array();
    if (!empty($vars)) {
        foreach ($vars as $var) {
            if (is_bool($var)) {
                $msgs[] = ($var ? 'true' : 'false');
            } elseif (is_scalar($var)) {
                $msgs[] = $var;
            } else {
                switch ($func) {
                    case 'print_r':
                    case 'var_export':
                        $msgs[] = $func($var, true);
                        break;
                    case 'var_dump':
                        ob_start();
                        var_dump($var);
                        $msgs[] = ob_get_clean();
                        break;
                }
            }
        }
    }
    return implode($sep, $msgs);
}