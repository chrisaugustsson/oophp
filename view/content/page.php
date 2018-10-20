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
<div class="section container content">
<div class="tabs">
    <ul>
        <li><a href="../../content">Visa allt</a></li>
        <li><a href="../admin">Admin</a></li>
        <li><a href="../create">Lägg till</a></li>
        <li><a href="../pages">Visa alla sidor</a></li>
        <li><a href="../blog">Blog</a></li>
    </ul>
</div>
    <article>
        <header>
            <h1><?= $res->title ?></h1>
            <p><i>Latest update: <time datetime="<?= esc($res->modified_iso8601) ?>" pubdate><?= esc($res->modified) ?></time></i></p>
        </header>
        <?= $res->data ?>
    </article>
</div>
