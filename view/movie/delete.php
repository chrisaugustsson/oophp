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
    <form action="delete" method="POST" class=" is-centered">
        <input readonly class="input content is-2" type="hidden" name="id" value="<?= $resultset[0]->id ?>">
        <label class="label">Titel</label>
        <input readonly class="input content is-2" type="text" name="title" value="<?= $resultset[0]->title ?>">
        <label class="label">Year</label>
        <input readonly class="input content is-2" type="text" name="year" value="<?= $resultset[0]->year ?>">
        <label class="label">Image</label>
        <input readonly class="input content is-2" type="text" name="image" value="<?= $resultset[0]->image ?>">
        <input type="submit" class="button is-danger" value="DELETE">
    </form>
</div>
