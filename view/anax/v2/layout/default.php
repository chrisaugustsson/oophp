<?php

namespace Anax\View;

/**
 * A layout rendering views in defined regions.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

$title = ($title ?? "No title") . ($baseTitle ?? " | No base title defined");

?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
    <script type="text/javascript" src="../htdocs/js/bulma-carousel.min.js"></script>

<?php if (isset($favicon)) : ?>
    <link rel="icon" href="<?=$favicon?>">
<?php endif;?>

<?php if (isset($stylesheets)) : ?>
    <?php foreach ($stylesheets as $stylesheet) : ?>
        <link rel="stylesheet" type="text/css" href="<?=asset($stylesheet)?>">
    <?php endforeach;?>
<?php endif;?>

</head>
<body>

<!-- navbar -->
<?php if (regionHasContent("navbar")) : ?>
    <div class="navbar is-spaced is-success">
        <div class="navbar-brand">
            <?php renderRegion("header")?>
        </div>
        <div class="navbar-menu">
            <?php renderRegion("navbar")?>
        </div>
    </div>
<?php endif;?>

<!-- main -->
<?php if (regionHasContent("main")) : ?>
    <main class="wrap-main">
        <?php renderRegion("main")?>
    </main>
<?php endif;?>

<!-- footer -->
<?php if (regionHasContent("footer")) : ?>
<div class="footer has-shadow has-background-success">
    <div class="content has-text-centered">
        <?php renderRegion("footer")?>
    </div>
</div>
<?php endif;?>

<?php if (isset($stylesheets)) : ?>
    <?php foreach ($javascripts as $javascript) : ?>
    <script async src="<?=asset($javascript)?>"></script>
    <?php endforeach;?>
<?php endif;?>

</body>
</html>
