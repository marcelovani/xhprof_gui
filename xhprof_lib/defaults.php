<?php
$XHPROF_ROOT = realpath(dirname(__FILE__) .'/..');

if (!defined('XHPROF_LIB_ROOT')) {
  define('XHPROF_LIB_ROOT', dirname(__FILE__));
}

if (!defined('XHPROF_CONFIG')) {
  define('XHPROF_CONFIG', $XHPROF_ROOT . '/config.php');
}
