<?php
namespace Anax\Guess;

/**
 * Geuss the number game using GET
 */
require "config.php";
require __DIR__ . "/../../vendor/autoload.php";
// Set the title
$title = "Guess tha numba (POST)";

// Set request type to POST
$method = "POST";

// Set incoming if exists
$number = $_POST["number"] ?? -1;
$tries = $_POST["tries"] ?? 6;
$guess = $_POST["guess"] ?? null;

// Initiate a new game
$game = new Guess($number, $tries);

// Make a guess
$res = null;
if (isset($_POST["doGuess"])) {
    $res = $game->makeGuess($guess);
}

// Reset game
if (isset($_POST["reset"])) {
    $game->random();
}

$cheat = null;
// Reveal the right answer AKA cheat
if (isset($_POST["doCheat"])) {
    $cheat = "the right number is: " . $game->number();
}

require "views/game-get-post.php";
