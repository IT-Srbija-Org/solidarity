<!doctype html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;1,6..12,400;1,6..12,500;1,6..12,600;1,6..12,700;1,6..12,800&display=swap" rel="stylesheet">
        <title><?=$title?></title>
        <link rel="stylesheet" href="/assets/frontend/css/style.css" type="text/css"/>
 /head>
<body>
<div id="mainContainer">
    <!-- output flash messages -->
    <?php if (isset($messages)) { //@todo remove this, but keep if not ajax?
        echo '<div class="messagesContainer withPadding">';
        echo $messages;
        echo '</div>';
    } ?>
    <?=$this->section('content')?>
</div>

<script src="/assets/frontend/js/global.js?v=0.0.4" type="module"></script>
<?php if (isset($jsPath) && $jsPath != ""): ?>
    <script src="<?=$jsPath?>" type="module"></script>
<?php endif; ?>
</body>
</html>