<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Dice</title>
</head>
<body>
<div class="container content">
<div class="section">
    <h3>Start a new game</h3>
    <form method="POST" action="dice/start-game">
            <div class="field">
                <label class="label">Enter number of players:</label>
                <input class="input" type="number" id="nrOfPlayers" name="nrOfPlayers" value=0>
            </div>
            <div class="field">
                <label class="label">Enter number of bots:</label>
                <input class="input" type="number" id="nrOfAiPlayers" name="nrOfAiPlayers" value=0>
                <input type="submit" name="doGuess" class="button is-primary" value="Enter">
            </div>
    </form>
    <div class="content section">
    </div>
</div>
</div>
</body>
</html>