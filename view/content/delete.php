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
<div class="section container">
<div class="tabs">
    <ul>
        <li><a href="../content">Visa allt</a></li>
        <li><a href="admin">Admin</a></li>
        <li><a href="create">Lägg till</a></li>
        <li><a href="pages">Visa alla sidor</a></li>
        <li><a href="blog">Blog</a></li>
    </ul>
</div>
<form method="post">
    <fieldset>
    <legend>Delete</legend>

    <input type="hidden" name="contentId" value="<?= esc($content->id) ?>"/>

    <p>
        <label>Title:<br>
            <input type="text" name="contentTitle" value="<?= esc($content->title) ?>" readonly/>
        </label>
    </p>

    <p>
        <button type="submit" name="doDelete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </p>
    </fieldset>
</form>
</div>
