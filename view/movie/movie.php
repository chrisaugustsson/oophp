<?php

namespace Anax\View;

/**
 * Just testing
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
</head>

<div class="container section content">
    <h1>Filmer</h1>
    <form method="GET" class="section columns is-centered">
        <input type="text" class="input column is-4" placeholder="Sök efter filmer på titel" name="search-titel">

        <input type="submit" class="button" value="Sök">
    </form>
    <form method="GET" class="columns is-centered">
        <input type="number" class="input column is-2" placeholder="Sök på årtal, från ..." name="search-year-from"  min="1900" max="2100">
        <input type="number" class="input column is-2" placeholder="Sök på årtal, till ..." name="search-year-to" min="1900" max="2100">
        <input type="submit" class="button" value="Sök">
    </form>
    <?php if (!$resultset) : ?>
        <div class="section has-text-centered">
            <p>Ingen mathning på sökningen</p>
            <a href="? ">Visa alla</a>
        </div>
    <?php else : ?>
    <table class="table is-striped">
        <tr class="first">
            <th>Rad</th>
            <th>Id</th>
            <th>Bild</th>
            <th>Titel</th>
            <th>År</th>
            <th>Ta bort</th>
            <th>Editera</th>
        </tr>
    <?php $id = -1; foreach ($resultset as $row) :
        $id++; ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $row->id ?></td>
            <td><img class="thumb" src="<?= $row->image ?>"></td>
            <td><?= $row->title ?></td>
            <td><?= $row->year ?></td>
            <td>
                <a href="movie/delete?id=<?= $row->id ?>">
                    <i class="material-icons">
                        delete_forever
                    </i>
                </a>
            </td>
            <td>
                <a href="movie/edit?id=<?= $row->id ?>">
                    <i class="material-icons">
                        settings
                    </i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
    <?php endif; ?>
    <div>
            <a href="movie/add" class="button is-success">Lägg till film</a>
        </div>
</div>
