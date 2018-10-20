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
<div class="tabs">
    <ul>
        <li><a href="content">Visa allt</a></li>
        <li><a href="content/admin">Admin</a></li>
        <li><a href="content/create">Lägg till</a></li>
        <li><a href="content/pages">Visa alla sidor</a></li>
        <li><a href="content/blog">Blog</a></li>
    </ul>
</div>
<table>
    <tr class="first">
        <th>Id</th>
        <th>Title</th>
        <th>Type</th>
        <th>Published</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Deleted</th>
        <th>Path</th>
        <th>Slug</th>
    </tr>
<?php $id = -1; foreach ($res as $row) :
    $id++; ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->title ?></td>
        <td><?= $row->type ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->created ?></td>
        <td><?= $row->updated ?></td>
        <td><?= $row->deleted ?></td>
        <td><?= $row->path ?></td>
        <td><?= $row->slug ?></td>
    </tr>
<?php endforeach; ?>
</table>
</div>
