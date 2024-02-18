function mode() {
    window.location.href = "mode.php";
  }
  
  function exitGame() {
    if (confirm('Are you sure you want to exit?')) {
        alert('Thanks for playing!');
        window.close();
    }
  }
  
  function startHumanGame() {
    window.location.href = "game.html";
  }
  
  function showDifficultyPopup() {
    window.location.href = "difficulty.php";
  }
  
  function easy() {
    window.location.href = "easy.php";
  }

  function hard() {
    window.location.href = "hard.php";
  }

  function expert() {
    window.location.href = "expert.php";
  }


  function startAIGame(difficulty) {
    // Logic to start the AI game with the selected difficulty
  
    switch (difficulty) {
        case 'Easy':
            window.location.href = "easy.html";
        case 'Difficult':
            targetPage = 'gameDifficult.html';
            break;
        case 'Expert':
            targetPage = 'gameExpert.html';
            break;
    }
  
    if (targetPage) {
        window.location.href = targetPage;
    }
  }
  
  function goHome() {
    window.location.href = "index.php";
  }
  
  // Add the following event listener for the reset button
  document.getElementById('but').addEventListener('click', resetGame);