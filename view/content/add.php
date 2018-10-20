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
        <li><a href="../content">Visa allt</a></li>
        <li><a href="admin">Admin</a></li>
        <li><a href="create">Lägg till</a></li>
        <li><a href="pages">Visa alla sidor</a></li>
        <li><a href="blog">Blog</a></li>
    </ul>
</div>
    <form method="post">
        <fieldset>
        <legend>Create</legend>

        <p>
            <label>Title:<br>
            <input type="text" name="contentTitle" default="A Title"/>
            </label>
        </p>

        <p>
            <button type="submit" name="doCreate">Create</button>
        </p>
        </fieldset>
    </form>
</div>
