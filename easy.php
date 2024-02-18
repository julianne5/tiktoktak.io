<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style.css">
	<style>
	
 </style>
</head>

<body>
    <video autoplay="" loop="" muted="">
        <source src="tiktoktaklogo1.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <div id="main">
        <h1>TIC TAC TOE</h1>  
        <p id="print" style="color: rgb(255, 255, 255);margin-top: 20px;font-size: 30px;font-family: monospace;">X: 0 - O: 0</p>        <br><br>  
        <div class="ui">
            <div class="row" id="board">
                <div class="square" id="square0"></div>
                <div class="square" id="square1"></div>
                <div class="square" id="square2"></div>
                <div class="square" id="square3"></div>
                <div class="square" id="square4"></div>
                <div class="square" id="square5"></div>
                <div class="square" id="square6"></div>
                <div class="square" id="square7"></div>
                <div class="square" id="square8"></div>
                <div class="square" id="square9"></div>
                <div class="square" id="square10"></div>
                <div class="square" id="square11"></div>
                <div class="square" id="square12"></div>
                <div class="square" id="square13"></div>
                <div class="square" id="square14"></div>
                <div class="square" id="square15"></div>
                <div class="square" id="square16"></div>
                <div class="square" id="square17"></div>
                <div class="square" id="square18"></div>
                <div class="square" id="square19"></div>
                <div class="square" id="square20"></div>
                <div class="square" id="square21"></div>
                <div class="square" id="square22"></div>
                <div class="square" id="square23"></div>
                <div class="square" id="square24"></div>
                <div class="square" id="square25"></div>
                <div class="square" id="square26"></div>
                <div class="square" id="square27"></div>
                <div class="square" id="square28"></div>
                <div class="square" id="square29"></div>
            </div>
        </div>
    <button id="but" onclick="restartButton()" style="
    margin-top: 15px;
">RESET</button>
<button class="button back-button" onclick="goHome()">Back</button>
    <script src="easy.js"></script>
    <div class="popup" id="winPopup">
        <div class="popup-inner">
          <h2 id="popupWinnerText"></h2>
          <button id="playAgainButton" onclick="restartGame()">Play Again</button>
        </div>
      </div>
      
</div>
</body>
</html>