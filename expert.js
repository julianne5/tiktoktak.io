const board = document.getElementById('board');
const squares = document.getElementsByClassName('square');
const players = ['X', 'O'];
let currentPlayer = players[0];
let playerScores = {
    'X': 0,
    'O': 0
};
const endMessage = document.createElement('h2');
endMessage.style.fontFamily = 'sans-serif';
endMessage.style.marginTop = '300px';
endMessage.style.textAlign = 'center';
endMessage.style.color = '#ffffff';
board.after(endMessage);

const winning_combinations = [
    // Horizontal combinations
    [0, 1, 2, 3, 4, 5],
    [6, 7, 8, 9, 10, 11],
    [12, 13, 14, 15, 16, 17],
    [18, 19, 20, 21, 22, 23],
    [24, 25, 26, 27, 28, 29],

    // Vertical Combinations
    [0, 6, 12, 18, 24],
    [1, 7, 13, 19, 25],
    [2, 8, 14, 20, 26],
    [3, 9, 15, 21, 27],
    [4, 10, 16, 22,28],
    [5, 11, 17, 23, 29],

    // Diagonal Combinations
    // Two
    [1, 6],
    [4, 11],
    [18, 25],
    [23, 28],
    // Three
    [2, 7, 12],
    [3, 10, 17],
    [12, 19, 26],
    [17, 22, 27],
    // Four
    [3, 8, 13, 18],
    [2, 9, 16, 23],
    [6, 13, 20, 27],
    [11, 16, 21, 26],
    // Five
    [0, 7, 14, 21, 28],
    [1, 8, 15, 22, 29],
    [4, 9, 14, 19, 24],
    [5, 10, 15, 20, 25],
];

function updateScores() {
    const printElement = document.getElementById('print');
    printElement.textContent = `X: ${playerScores['X']} - O: ${playerScores['O']}`;
    printElement.style.color = '#ffffff';
    printElement.style.marginTop = '20px';
    printElement.style.fontSize = '30px'; // Set the font size here
}

// Display initial scores at the start of the game
updateScores();

for (let i = 0; i < squares.length; i++) {
    squares[i].addEventListener('click', () => {
        if (squares[i].textContent !== '' || currentPlayer === 'O') {
            return;
        }
        squares[i].textContent = currentPlayer;
        if (checkWin(currentPlayer)) {
            playerScores[currentPlayer]++;
            updateScores();
            if (playerScores[currentPlayer] === 5) {
                openWinPopup(`${currentPlayer} wins the game with 5 points!`);
                setTimeout(resetGame, 3000);
            } else {
                openRoundWinPopup(`${currentPlayer} wins this round!`);
                setTimeout(resetBoard, 2000);
            }
            return;
        }
        if (checkTie()) {
            openRoundWinPopup(`Game is tied!`);
            setTimeout(resetBoard, 2000);
            return;
        }
        currentPlayer = (currentPlayer === players[0]) ? players[1] : players[0];
        if (currentPlayer === 'O') {
            // AI's turn
            const difficulty = getSelectedDifficulty();
            makeMoveAI(difficulty);
        }
    });
}

function checkWin(currentPlayer) {
    for (let i = 0; i < winning_combinations.length; i++) {
        const combination = winning_combinations[i];
        let hasWin = true;

        for (let j = 0; j < combination.length; j++) {
            const squareIndex = combination[j];
            if (squares[squareIndex].textContent !== currentPlayer) {
                hasWin = false;
                break;
            }
        }

        if (hasWin) {
            return true;
        }
    }

    return false;
}

function checkTie() {
    for (let i = 0;  i < squares.length; i++) {
        if (squares[i].textContent === '') {
            return false;
        }
    }
    return true;
}

function resetBoard() {
    for (let i = 0; i < squares.length; i++) {
        squares[i].textContent = '';
    }
    currentPlayer = players[0];
}

function resetGame() {
    playerScores = {
        'X': 0, 'O': 0
    };
    updateScores();
    resetBoard();
}

function makeMoveAI(difficulty) {
    // Call the appropriate AI function based on the selected difficulty
    if (difficulty === 'Expert') {
        startAIGame3();
    } else if (difficulty === 'Expert') {
        startAIGame3(); // Corrected to call startAIGame2 for Difficult
    } else if (difficulty === 'Expert') {
        startAIGame3();
    }
}

function startAIGame3() {
    const emptySquares = getEmptySquares();
    let bestMove = getBestMove(emptySquares);
    squares[bestMove].textContent = currentPlayer;

    if (checkWin(currentPlayer)) {
        playerScores[currentPlayer]++;
        updateScores();
        if (playerScores[currentPlayer] === 5) {
            openWinPopup(`${currentPlayer} wins the game with 5 points!`);
            setTimeout(resetGame, 3000);
        } else {
            openRoundWinPopup(`${currentPlayer} wins this round!`);
            setTimeout(resetBoard, 2000);
        }
        return;
    }
    if (checkTie()) {
        openRoundWinPopup(`Game is tied!`);
        setTimeout(resetBoard, 2000);
        return;
    }

    currentPlayer = players[0];
}

function getBestMove(emptySquares) {
    // Check if AI can win in the next move
    for (let i = 0; i < emptySquares.length; i++) {
        const potentialMove = emptySquares[i];
        squares[potentialMove].textContent = currentPlayer;
        if (checkWin(currentPlayer)) {
            squares[potentialMove].textContent = ''; // Undo move
            return potentialMove;
        }
        squares[potentialMove].textContent = ''; // Undo move
    }

    // Check if player can win in the next move and block
    for (let i = 0; i < emptySquares.length; i++) {
        const potentialMove = emptySquares[i];
        squares[potentialMove].textContent = players[1]; // Assume player's move
        if (checkWin(players[1])) {
            squares[potentialMove].textContent = ''; // Undo move
            return potentialMove;
        }
        squares[potentialMove].textContent = ''; // Undo move
    }

    // Check if player 1 can win in the next move and block
    for (let i = 0; i < emptySquares.length; i++) {
        const potentialMove = emptySquares[i];
        squares[potentialMove].textContent = players[0]; // Assume player 1's move
        if (checkWin(players[0])) {
            squares[potentialMove].textContent = ''; // Undo move
            return potentialMove;
        }
        squares[potentialMove].textContent = ''; // Undo move
    }

    // Check for two diagonal combinations
    const diagonalCombinations = [
        [1, 6],
        [4, 11],
        [18, 25],
        [23, 28],
    ];

    for (let i = 0; i < diagonalCombinations.length; i++) {
        const diagonalCombination = diagonalCombinations[i];

        const userInDiagonal = diagonalCombination.some(index => squares[index].textContent === players[1]);

        if (!userInDiagonal) {
            const emptyDiagonalSquares = diagonalCombination.filter(index => emptySquares.includes(index));

            if (emptyDiagonalSquares.length === 2) {
                return emptyDiagonalSquares[0]; // Block the diagonal combination
            }
        }
    }


    // Try to create a winning move for AI
    for (let i = 0; i < emptySquares.length; i++) {
        const potentialMove = emptySquares[i];
        squares[potentialMove].textContent = currentPlayer;
        if (checkWin(currentPlayer)) {
            squares[potentialMove].textContent = ''; // Undo move
            return potentialMove;
        }
        squares[potentialMove].textContent = ''; // Undo move
    }

    // Counteract player 1's strategic moves (if any)
    for (let i = 0; i < emptySquares.length; i++) {
        const potentialMove = emptySquares[i];
        squares[potentialMove].textContent = players[0]; // Assume player 1's move
        if (checkWin(players[0])) {
            squares[potentialMove].textContent = currentPlayer; // Block player 1's winning move
            return potentialMove;
        }
        squares[potentialMove].textContent = ''; // Undo move
    }

    // For simplicity, choose a random move if no strategic move is identified
    const randomIndex = Math.floor(Math.random() * emptySquares.length);
    return emptySquares[randomIndex];
}


function getSelectedDifficulty() {
    // Hardcoding the selected difficulty to 'Difficult'
    return 'Expert';
}

function getEmptySquares() {
    const emptySquares = [];
    for (let i = 0; i < squares.length; i++) {
        if (squares[i].textContent === '') {
            emptySquares.push(i);
        }
    }
    return emptySquares;
}

// Function to open the round win popup
function openRoundWinPopup(winner) {
    const roundWinPopup = document.getElementById("winPopup");
    const popupWinnerText = document.getElementById("popupWinnerText");
    popupWinnerText.textContent = winner;
    roundWinPopup.style.display = "block";

    // Automatically close the popup after a delay (e.g., 2 seconds)
    setTimeout(() => {
        roundWinPopup.style.display = "none";
        nextRound();
    }, 2000);
}

// Function to start the next round
function nextRound() {
    // Reset the board for the next round
    resetBoard();

    // Check if any player has reached 5 scores
    if (playerScores['X'] === 5 || playerScores['O'] === 5) {
        // If yes, open the final win popup for the overall winner
        const overallWinner = (playerScores['X'] === 5) ? 'X' : 'O';
        openWinPopup(`${overallWinner} wins the game with 5 points!`);
    } else {
        // If not, continue with the game
        currentPlayer = players[0];
    }
}

// Function to open the final win popup
function openWinPopup(winner) {
    const winPopup = document.getElementById("winPopup");
    const popupWinnerText = document.getElementById("popupWinnerText");
    popupWinnerText.textContent = winner;

    // Display the play again button in the final win popup
    const playAgainButton = document.getElementById("playAgainButton");
    playAgainButton.style.display = "block";

    winPopup.style.display = "block";
}

// Function to close the win popup
function closeWinPopup() {
    const winPopup = document.getElementById("winPopup");
    const playAgainButton = document.getElementById("playAgainButton");

    winPopup.style.display = "none";
    playAgainButton.style.display = "none";
}

// Function to restart the game
function restartGame() {
    closeWinPopup();
    resetGame();
}

function goHome() {
    window.location.href = "index.php";
  }

// Add the following event listener for the reset button
document.getElementById('but').addEventListener('click', resetGame);