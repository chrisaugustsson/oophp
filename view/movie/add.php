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
<div class="container section content">
    <h1>Editera</h1>
    <form action="add" method="POST" class=" is-centered">
        <label class="label">Titel</label>
        <input class="input content is-2" type="text" name="title" placeholder="Skriv in titel...">
        <label class="label">Year</label>
        <input class="input content is-2" type="text" name="year" placeholder="Skriv in årtal...">
        <label class="label">Image</label>
        <input class="input content is-2" type="text" name="image" placeholder="Skriv in bild url...">
        <input type="submit" class="button is-success" value="Send">
    </form>
</div>