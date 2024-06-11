<?php
require_once getcwd() . '/../../xhprof_lib/defaults.php';
require_once XHPROF_CONFIG;
require_once XHPROF_LIB_ROOT . '/params.php';

if (false !== $controlIPs && !in_array($_SERVER['REMOTE_ADDR'], $controlIPs))
{
  die("You do not have permission to view this page.");
}

include_once XHPROF_LIB_ROOT . '/display/xhprof.php';

ini_set('max_execution_time', 100);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Xhprof <?php echo $run; ?></title>
  <link rel="stylesheet" media="all" href="/graphviz/main.css">
<!--      <link rel="stylesheet" media="all" href="/themes/viz-edit/main.css">-->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/viz.js/2.1.2/viz.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lz-string/1.5.0/lz-string.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.jsdelivr.net/npm/svg-pan-zoom@3.5.0/dist/svg-pan-zoom.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.34.2/ace.min.js"></script>
</head>
<body>

<div id="app">
  <div id="header">
  </div>
  <div id="panes">
    <div id="editor"></div>
    <div id="graph">
      <?php require_once(getcwd() . '/../../xhprof_lib/templates/graph_filter_options.php'); ?>
      <div id="output">
        <div id="error"></div>
        <?php require_once(getcwd() . '/../../xhprof_lib/templates/loader_animation.php'); ?>
      </div>
      <div id="status"></div>
    </div>
  </div>
</div>

</body>
<script src="/graphviz/js/main.js"></script>
</html>
