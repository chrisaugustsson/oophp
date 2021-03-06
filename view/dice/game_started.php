<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Dice</title>
</head>
<body>
<div class="container content">
<div class="section">
<?php if ($game->getStage() === "pre") : ?>
    <h2>Player <?= $game->currentPlayer() ?></h2>
    <h2>Make a roll to see if you get to start.</h2>
    <form method="POST">
            <div class="field">
                <input type="submit" name="makeRoll" class="button is-primary" value="Make roll">
            </div>
    </form>
<?php endif; ?>

<?php if ($game->getStage() === "begin") : ?>
    <?php foreach ($game->getPlayers() as $key => $player) : ?>
        <h2>Player <?= $key + 1 ?> got <?= $player->getScore() ?></h2>

    <?php endforeach; ?>

    <h2>Player <?= $game->getStartingPlayer(); ?> starts first</h2>
    <form method="POST">
            <div class="field">
                <input type="submit" name="startGame" class="button is-primary" value="Start Game">
            </div>
    </form>
<?php endif; ?>


<?php if ($game->getStage() === "started") : ?>
    <h3>Game started!</h3>
    <?php foreach ($game->getPlayers() as $index => $player) : ?>
        <h2>Player <?= $index + 1 ?> score: <?= $player->getScore() ?></h2>
    <?php endforeach ?>
    <h2>Current player: Player <?= $game->currentPlayer() ?></h2>
    <h2>Your score is: <?= $game->getCurrentPlayer()->getScore() ?></h2>
    <h2>Make a roll or pass it to the next player.</h2>
    <h2><?= isset($game->roundData[0]) ? $game->roundData[0] : ""; ?></h2>
    <h2>Score this round: <?= $game->roundData[2] ?></h2>
    <div class="section">
        <h2>Histogram:</h2>
        <pre><?= $game->getHistogram() ?></pre>
    </div>
    <form method="POST">
    <?php if ($game->getCurrentPlayer()->getType() !== "AI") :?>
        <?php if (!isset($game->roundData[1]) || $game->roundData[1] !== 0) : ?>
                <div class="field">
                    <input type="submit" name="makeRoll" class="button is-primary" value="Make roll">
                </div>
        <?php endif; ?>
                <div class="field">
                    <input type="submit" name="nextPlayer" class="button is-primary" value="Pass to next">
                </div>
    <?php else : ?>
                <div class="field">
                    <input type="submit" name="botRoll" class="button is-primary" value="See Bot's move">
                </div>
    <?php endif; ?>
    </form>
<?php endif; ?>

<?php if ($game->getStage() === "winner") : ?>
    <h3>GAME OVER!</h3>
    <h2>Player <?= $game->currentPlayer() ?> WON THE GAME</h2>
<?php endif; ?>


    <div class="content section">
    </div>
</div>
</div>
</body>
</html>