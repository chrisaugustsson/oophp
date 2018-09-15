<?php
namespace Anax\Guess;

/**
 * Geuss the number game using GET
 */
require "config.php";
require __DIR__ . "/../../vendor/autoload.php";
// Set the title
$title = "Guess tha numba (GET)";

// Set request type to GET
$method = "GET";

// Set incoming if exists
$number = $_GET["number"] ?? -1;
$tries = $_GET["tries"] ?? 6;
$guess = $_GET["guess"] ?? null;

// Initiate a new game
$game = new Guess($number, $tries);

// Make a guess
$res = null;
if (isset($_GET["doGuess"])) {
    $res = $game->makeGuess($guess);
}

// Reset game
if (isset($_GET["reset"])) {
    $game->random();
}

$cheat = null;
// Reveal the right answer AKA cheat
if (isset($_GET["doCheat"])) {
    $cheat = "the right number is: " . $game->number();
}

require "views/game-get-post.php";
