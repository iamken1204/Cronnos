<?php
use cronnos\printers\Printer;
use cronnos\App;

$p = new Printer;
$title = App::$config['title'];
$content = $_SESSION['view_content'];
?>

<html>

<head>
    <title><?= $title ?></title>
    <?php $p->view('_partial/view_head.php', [], false) ?>
</head>

<body>
    <?php require($content) ?>
</body>

    <?php $p->view('_partial/view_footer.php', [], false) ?>
</html>
