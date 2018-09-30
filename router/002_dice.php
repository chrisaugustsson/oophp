<?php

/**
 *
 */
$app->router->get("dice/", function () use ($app) {

    $app->session->delete("game");
    $app->page->add("dice/game");
    return $app->page->render();
});


/**
 *
 */
$app->router->post("dice/start-game", function () use ($app) {
    $nrOfPlayers = $app->request->getPost("nrOfPlayers") ?? 1;
    $nrOfAiPlayers = $app->request->getPost("nrOfAiPlayers") ?? 1;

    $game = new  Anax\Dice\Game($nrOfPlayers, $nrOfAiPlayers);

    $app->session->set("game", $game);

    return $app->response->redirect("dice/started");
});

/**
 *
 */
$app->router->any("GET|POST", "dice/started", function () use ($app) {

    $game = $app->session->get("game");

    if ($app->request->getPost("makeRoll")) {
        $game->makeHand();
    }

    if ($app->request->getPost("nextPlayer")) {
        $game->nextPlayer();
    }

    if ($app->request->getPost("startGame")) {
        $game->startGame();
    }

    if ($app->request->getPost("botRoll")) {
        $game->botRoll();
    }

    $data["game"] = $game;

    $app->page->add("dice/game_started", $data);

    return $app->page->render($data);
});
