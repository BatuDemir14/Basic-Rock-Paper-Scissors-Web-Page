window.onload = function() {
    // Get the buttons and result paragraph elements
    var rockBtn = document.getElementById("rock");
    var paperBtn = document.getElementById("paper");
    var scissorsBtn = document.getElementById("scissors");
    var resultPara = document.getElementById("result");
  
    // Add click event listeners to the buttons
    rockBtn.addEventListener("click", function() { play("rock"); });
    paperBtn.addEventListener("click", function() { play("paper"); });
    scissorsBtn.addEventListener("click", function() { play("scissors"); });
  
    // Define the play function
    function play(playerMove) {
        // Generate a random move for the computer
        var moves = ["rock", "paper", "scissors"];
        var computerMove = moves[Math.floor(Math.random() * moves.length)];
    
        // Determine the winner
        var result;
        if (playerMove === computerMove) {
            result = "Tie!";
        } else if ((playerMove === "rock" && computerMove === "scissors") ||
                   (playerMove === "paper" && computerMove === "rock") ||
                   (playerMove === "scissors" && computerMove === "paper")) {
            result = "You win!";
        } else {
            result = "Computer wins!";
        }
    
        // Update the result paragraph element
        var playerMoveImage = "<img src='../images/" + playerMove + ".jpg' alt='" + playerMove + "'>";
        var computerMoveImage = "<img src='../images/" + computerMove + ".jpg' alt='" + computerMove + "'>";
        
        resultPara.innerHTML = "You played -> " + playerMoveImage + ". The computer played -> " + computerMoveImage + ". " + result;
    
        // Send the results to the server
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "save_results.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("player_move=" + playerMove + "&computer_move=" + computerMove + "&result=" + result);
    }
}