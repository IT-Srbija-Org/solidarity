<!doctype html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
    <link rel="stylesheet" href="/assets/dist/css/main.css">

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/icon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="icon.png">
</head>
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

<!--  Include 3rd party scripts -->
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!--  Include project scripts -->
<script src="assets/dist/js/main.js"></script>
<?php if (isset($jsPath) && $jsPath != ""): ?>
    <script src="<?=$jsPath?>" type="module"></script>
<?php endif; ?>
</body>
</html>