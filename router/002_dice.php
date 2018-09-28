<?php

/**
 *
 */
$app->router->get("dice/", function () use ($app) {

    $_SESSION = [];
    $app->page->add("dice/game");

    return $app->page->render();
});

/**
 *
 */
$app->router->post("dice/", function () use ($app) {

    if (!isset($_SESSION["game"])) {
        $nrOfPlayers = $_POST["nrOfPlayers"];
        $nrOfAiPlayers = $_POST["nrOfAiPlayers"];

        $game = new  Anax\Dice\Game($nrOfPlayers, $nrOfAiPlayers);

        $_SESSION["game"] = $game;
    } else {
        $game = $_SESSION["game"];
    }

    if (isset($_POST["makeRoll"])) {
        $game->makeHand();
    }

    if (isset($_POST["nextPlayer"])) {
        $game->nextPlayer();
    }

    if (isset($_POST["startGame"])) {
        $game->startGame();
    }

    if (isset($_POST["botRoll"])) {
        $game->botRoll();
    }

    $data["game"] = $game;

    $app->page->add("dice/game_started", $data);

    return $app->page->render($data);
});
