<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
</head>
<div class="section content container has-text-centered">
<h2>Före formatering</h2>
    <p><?= $unformattedText ?></p>

    <h2>Efter formatering</h2>
    <p><?= $formattedText ?></p>
</div>

<div class="section content container has-text-centered">
<?= $markdown ?>
</div>
