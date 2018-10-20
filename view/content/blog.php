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
<div class="section conent container">
<div class="tabs">
    <ul>
        <li><a href="../content">Visa allt</a></li>
        <li><a href="admin">Admin</a></li>
        <li><a href="create">Lägg till</a></li>
        <li><a href="pages">Visa alla sidor</a></li>
        <li><a href="blog">Blog</a></li>
    </ul>
</div>
    <article>

    <?php foreach ($res as $row) : ?>
    <section>
        <header>
            <h1><a href="post/<?= $row->slug ?>"><?= $row->title ?></a></h1>
            <p><i>Published: <time datetime="<?= $row->published_iso8601 ?>" pubdate><?= $row->published ?></time></i></p>
        </header>
        <?= $row->data ?>
    </section>
    <?php endforeach; ?>

    </article>
</div>