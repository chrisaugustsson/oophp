<?php
namespace Anax\Guess;

/**
 * Geuss the number game using GET
 */
require "config.php";
require __DIR__ . "/../../vendor/autoload.php";

// Set the title
$title = "Guess tha numba (SESSION)";

// Set request type to POST
$method = "POST";

// Start new session
session_start();
session_regenerate_id();

if (isset($_POST["destroy"])) {
    // Unset all of the session variables.
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();
    echo "The session is destroyd";
}

// Set incoming if exists
$guess = $_POST["guess"] ?? null;

// Initiate a new game
$game = $_SESSION["game"] ?? null;
if (!$game) {
    $game = new Guess();
    $_SESSION["game"] = $game;
}

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

require "views/game-session.php";
