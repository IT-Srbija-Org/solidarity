<!doctype html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>

	<meta name="title" content="Mreža solidarnosti - IT Srbija">
	<meta name="description" content="Mreža solidarnosti je inicijativa IT Srbije za direktnu finansijsku podršku nastavnicima i vannastavnom osoblju čija je plata umanjena zbog obustave rada. Pridruži se, doniraj i podrži one koji se bore za bolje obrazovanje!">
	<meta name="keywords" content="Mreža solidarnosti, IT Srbija, prosveta, donacije, podrška nastavnicima, solidarnost, pomoć nastavnicima, obustava rada, direktna podrška">
	<!-- Open Graph -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://msforms.djavolak.info/donorForm">
	<meta property="og:title" content="Mreža solidarnosti - IT Srbija">
	<meta property="og:description" content="Direktna podrška nastavnicima čija je plata umanjena zbog obustave rada. Uključi se, doniraj, podrži solidarnost u prosveti!">
	<meta property="og:image" content="/assets/img/social.webp">

	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://msforms.djavolak.info/donorForm">
	<meta property="twitter:title" content="Mreža solidarnosti - IT Srbija">
	<meta property="twitter:description" content="Direktna finansijska pomoć nastavnicima u obustavi rada. Pridruži se IT Srbiji u inicijativi solidarnosti!">
	<meta property="twitter:image" content="/assets/img/social.webp">

	<link rel="canonical" href="https://msforms.djavolak.info/donorForm">

	<link rel="icon" href="/assets/img/favicon.ico" sizes="any">
	<link rel="apple-touch-icon" href="/assets/img/favicon.png">

    <link rel="stylesheet" href="/assets/dist/css/main.css">
</head>
<body>
<div id="mainContainer">
	<header id="it-page-header" role="banner">
		<div id="it-page-header-inner" class="">
			<a class="it-header-logo-link" href="https://msforms.djavolak.info/donorForm" rel="home">
				<img src="/assets/img/logo.webp" alt="Mreža Solidarnosti - IT Srbija">
			</a>
			<nav class="it-header-navigation" role="navigation" aria-label="Top Menu">
				<ul class="it-menu">
					<li class="it-menu-item">
						<a class="it-menu-item-link" href="https://mrezasolidarnosti.org/">
							<span class="it-menu-item-text">Mreža Solidarnosti</span>
						</a>
					</li>
					<li class="menu-item">
						<a href="https://msforms.djavolak.info/donorForm">
							<span class="it-menu-item-text">Postani donor</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
    <!-- output flash messages -->
    <?php if (isset($messages)) { //@todo remove this, but keep if not ajax?
        echo '<div class="messagesContainer withPadding">';
        echo $messages;
        echo '</div>';
    } ?>
    <?=$this->section('content')?>
</div>

<!--  Include 3rd party scripts -->
<script src="assets/dist/js/plugins/jquery.min.js"></script>

<!--  Include project scripts -->
<!--<script src="assets/dist/js/main.js"></script>-->
<script src="assets/dist/js/main.js"></script>
<?php if (isset($jsPath) && $jsPath != ""): ?>
    <script src="<?=$jsPath?>" type="module"></script>
<?php endif; ?>
</body>
</html>