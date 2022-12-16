<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 bg-success" style="margin-top:30px">
             <div class="text-center p-4 font-bold">
                <?=$title; ?>
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
             <table class="table table-hover">
                   <thead>
                    
                        <th>Name</th>
                        <th>Email</th>
                       
                   </thead>
                   <tbody>
                    <tr>
                        

                        <td> <?=$userInfo['name']; ?> </td>
                        <td> <?=$userInfo['email']; ?> </td>
                         <td>
                             <a href="<?= site_url('auth/logout');?>">Logout</a>
                         </td>
                    </tr>
                    
                   </tbody>
             </table>
        </div>
    </div>
</div>
    
</body>
</html> -->












<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ping pong game</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- <link rel="stylesheet" href="style.css"> -->

<style>
*{
    margin:0px;
    padding:0px;
    box-sizing: border-box;
}

body{
    height: 100vh;
    /* background-color: Black; */
    /* background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%); */
    /* background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); */
    /* background-image: linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%); */
    /* background-image: linear-gradient(to right, #6a11cb 0%, #2575fc 100%); */
    background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 33%, #ee609c 66%, #ee609c 100%);
}

.board{
    margin-top: 10px;
    height: 85vh;  
    width: 80vw;    
    background-color: rgb(42, 25, 117);
    border-radius: 10px;
}


.ball1{
    height: 30px;
    width: 30px;
    border-radius: 50%;
    background-color: rgb(175, 56, 173);
    position: fixed;
    top:50vh;
    left:49vw;
    
}

.paddle{
    height: 120px;
    width: 15px;
    background-color: #b465da;
    position: fixed;
    border-radius: 3px;
}

.left{
    top : 40vh;
    left: 12vw;
}
.right{
    top : 40vh;
    right: 12vw;
}

.fa-circle{
    color: #2ecc71;
    font-size: 2rem;
}

.scoreboard{
    display: flex;
    height: 60px;
    justify-content: space-evenly;
    align-items: center;
    flex: 1 1 1;
}

.separator{
    width: 4px;
    height: 70%;
    background-color: black;
}

.open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
    width: 280px;
  }
  
  .form-popup {
    display: none;
    position: fixed;
    top: 0;
    right: 15px;
    /* border: 3px solid #190b0b; */
    z-index: 0;
    border-radius: 8px;
    padding-top: 60px;
  }
  

  .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
    border-radius: 8px;
  }
  

  .form-container input[type=text], .form-container input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }
  
  .form-container input[type=text]:focus, .form-container input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }
  
  .form-container .btn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }
  
  .form-container .cancel {
    background-color: red;
  }
  
  .form-container .btn:hover, .open-button:hover {
    opacity: 1;
  }

  .nav1 {
    background: rgb(2, 0, 36);
    background: linear-gradient(
      90deg,
      rgba(72, 31, 204, 0.75) 0%,
      rgba(0, 212, 255, 1) 100%
    );
  }
  .background1 {
    position: relative;
    top: -1vh;
  
    background: rgb(2, 0, 36);
    background: linear-gradient(
      90deg,
      rgba(72, 31, 204, 0.75) 0%,
      rgba(0, 212, 255, 1) 100%
    );
  }
  .subbackground {
    display: flex;
    background-color: white;
    border-radius: 10px;
  }
  .back2 {
    margin-left: 0.4vw;
    margin-top: 2vh;
  }
  #text {
    width: 23.5vw;
    height: 75vh;
    /* border: 2px solid red; */
    margin-top: 2vh;
    margin-right: 0.4vw;
  }
  h1 {
    font-size: 5vw;
  }
  #text h6 {
    margin: 1vw;
  }
  #text h2 {
    margin-left: 1vw;
  }
  #text p {
    margin: 1vw;
  }
  
  #text h4 {
    margin: 1vw;
  }
  #social {
    width: 10vw;
    height: 8vh;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1vw;
    margin-top: 6vh;
    /* border: 2px solid red; */
  }
  .social1 {
    width: 3.5vw;
    height: 6vh;
    align-items: center;
  
    border: 2px solid blue;
  }
  #social h1 {
    font-size: 3vw;
  }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PING-PONG</a>
          <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" type = "button" onclick = "openForm()" aria-current="page" href="#">Scores</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-outline-success" type = "button" onclick = "gamestart()" aria-current="page" href="#">Start</a>
              </li>

              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                  Difficulty
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Easy</a></li>
                  <li><a class="dropdown-item" href="#">Medium</a></li>
                  <li><a class="dropdown-item" href="#">Hard</a></li>
                </ul>
              </li> -->

              

            </ul>
            <form class="d-flex" role="search">
              <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><?=$userInfo['name']; ?></a>
              </li>
              <a class="btn btn-outline-success" type="button"  href="<?= site_url('auth/logout');?>">Logout</a>
            </form>
          </div>
        </div>
      </nav>




    <!-- board -->
    <!-- scorecard -->
    <!-- left paddle -->
    <!-- ball -->
    <!-- right paddle -->

    <div class="board container">
        <div class="scoreboard">
            <div class="scoreboard_left">
                <i class="fas fa-circle"></i>
                <i class="fas fa-circle"></i>
                <i class="fas fa-circle"></i>
            </div>
            <div class="separator"></div>
            <div class="scoreboard_left">
                <i class="fas fa-circle"></i>
                <i class="fas fa-circle"></i>
                <i class="fas fa-circle"></i>
            </div>
        </div>
        <div class="paddle left"></div>
        <div class="ball1"></div>
        <div class="paddle right"></div>
    </div>

    <div class="form-popup" id="myForm">
      <form action="/action_page.php" class="form-container">
        <h3>Scores</h3>

        <hr>
    
        <label for="playerleft"><b>Player A</b></label>
        <input type="text" placeholder="--" name="playerleft" disabled>

        <label for="playerright"><b>Player B</b></label>
        <input type="text" placeholder="--" name="playerright" disabled>

        <!-- <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
    
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required> -->
    
        <!-- <button type="submit" class="btn">Login</button> -->
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>

    <!-- <script src="script.js"></script> -->
<script>
        // alert("script connected");

function openForm() {
    document.getElementById("myForm").style.display = "inline-block";
}
   
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

x = true, y = true;
let ball = document.querySelector(".ball1");
let board = document.querySelector(".board");
let boardBounds = board.getBoundingClientRect();

let leftpaddle = document.querySelector(".left");
let rightpaddle = document.querySelector(".right");

let leftplayerlives = 3;
let rightplayerlives = 3;
let leftplayerscore = 0;
let rightplayerscore = 0;


document.addEventListener("keydown", function(e){
    if(e.key == "q"){
        movepaddle(leftpaddle, -window.innerHeight*0.06);

    }else if(e.key == "z"){
        movepaddle(leftpaddle, window.innerHeight*0.06);
        
    }else if(e.key == "ArrowUp"){
        movepaddle(rightpaddle, -window.innerHeight*0.06);
        
    }else if(e.key == "ArrowDown"){
        movepaddle(rightpaddle, window.innerHeight*0.06);  
    }
})

function setColor(idx){
    let allicons = document.querySelectorAll(".fas.fa-circle");
    allicons[idx].style.color = "#2980b9";
}

function movepaddle(cpaddle, change){
    let cpaddlebounds = cpaddle.getBoundingClientRect();
    if(cpaddlebounds.top + change >= boardBounds.top && cpaddlebounds.bottom + change <= boardBounds.bottom){

        cpaddle.style.top = cpaddlebounds.top + change + "px" ;
    }
}

function moveBall(){
    let ballcord = ball.getBoundingClientRect();
    let ballTop = ballcord.top;
    let ballLeft = ballcord.left;
    let ballRight = ballcord.right;
    let ballBottom = ballcord.bottom;

    let hastouchedleft = ballLeft < boardBounds.left;
    let hastouchedright = ballRight > boardBounds.right;

    if(hastouchedleft || hastouchedright){
        if(hastouchedleft){
            leftplayerlives--;
            
            setColor(leftplayerlives);

            if(leftplayerlives == 0){
                alert("Game over, Player 🅱 won!");
                rightplayerscore += 10;
                document.location.reload();
            }
            else{
                return resetgame();
            }
        }
        else{
            rightplayerlives--;
            setColor(3 + rightplayerlives);
            if(rightplayerlives == 0){
                alert("Game over, Player 🅰 won!");
                leftplayerscore += 10;
                document.location.reload();
            }
            else{
                return resetgame();
            }
        }
        
        function resetgame(){
            ball.style.top = window.innerHeight*0.45+"px";
            ball.style.left = window.innerWidth*0.45+"px";

            requestAnimationFrame(moveBall);
        }
    }

    if(ballTop<=boardBounds.top || ballBottom>=boardBounds.bottom){
        y=!y;
    }

    // if(ballLeft<=boardBounds.left || ballRight>=boardBounds.right){
    //     x=!x;
    // }

    let leftpaddlebounds = leftpaddle.getBoundingClientRect();
    let rightpaddlebounds = rightpaddle.getBoundingClientRect();

    if(ballLeft <= leftpaddlebounds.right && ballRight >= leftpaddlebounds.left && ballTop + 30 >= leftpaddlebounds.top && ballBottom - 30 <= leftpaddlebounds.bottom){
        x = !x;
    }
    if(ballLeft <= rightpaddlebounds.right && ballRight >= rightpaddlebounds.left && ballTop + 30 >= rightpaddlebounds.top && ballBottom - 30 <= rightpaddlebounds.bottom){
        x = !x;
    }

    ball.style.top = y==true?ballTop+1+"px":ballTop-1+"px";
    ball.style.left = x==true?ballLeft+4+"px":ballLeft-4+"px";
    requestAnimationFrame(moveBall);  
}
function gamestart(){
  requestAnimationFrame(moveBall);
}
    </script>
</body>

</html> 