<?php

?>

<!DOCTYPE html>
<html>  
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Webshop case</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <!-- Google Fonts: Syne (til topbaren) og Roboto (til AI-boksen) -->
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@800&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+Display:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
    html, body {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      text-align: center;
      box-sizing: border-box;
      overflow-y: visible;
    }

    /* Fast topbar */
    .topbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 60px;
      background: white;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      padding: 0 20px;
      z-index: 1000;
    }
    .gradient-text {
      background: linear-gradient(90deg, #4285F4, #34A853);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      color: black; /* fallback */
    }
      .logo{
      color: black;
      border: none;
      background-color: white;
      z-index: 1;
    }
    .logo a{
        color:black;
    }
    .logo:hover a {
      background: linear-gradient(45deg,rgb(66, 107, 244), #34A853);
      background-clip: text;
      color: transparent;
    }
    .brand {
      font-family: 'Syne', sans-serif;
      font-weight: 800;
      font-size: 24px;
      color: black;
    }
    .content {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50vh;
      padding-top: 80px; /* plads til topbaren */
    }
    .button-container {
      margin-top: 30px;
    }
    .try-button {
      display: inline-block;
      border-radius: 30px;
      padding: 2px; /* Bestemmer tykkelsen af gradient-rammen */
      background: linear-gradient(45deg, #4285F4, #34A853);
      text-decoration: none;
      transition: background 0.3s ease;
    }
    .try-button span {
      display: block;
      border-radius: 28px; /* 2px mindre end den ydre for at passe inden i rammen */
      background: #fff;
      padding: 12px 30px;
      font-size: 1rem;
      font-weight: bold;
      color: #4285F4;
      transition: background 0.3s ease, color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
    }
    .try-button:hover span {
      background: linear-gradient(45deg, #4285F4, #34A853);
      color: #fff;
      box-shadow: 0 0 15px rgba(66, 133, 244, 0.7);
      transform: translateY(-2px);
    }
    .button-container {
      z-index: 2;
      position: ;
      left:20%;
      top: 10px
    }
    .try-button {
      display: inline-block;
      border-radius: 30px;
      padding: 10px; /* Bestemmer tykkelsen af gradient-rammen */
      padding-bottom:5px;
      padding-top:5px;
      background: linear-gradient(45deg, #4285F4, #34A853);
      text-decoration: none;
      transition: background 0.3s ease;
    }
    .try-button span {
      display: block;
      border-radius: 28px; /* 2px mindre end den ydre for at passe inden i rammen */
      background: #fff;
      padding: 12px 30px;
      font-size: 1rem;
      font-weight: bold;
      color: #4285F4;
      transition: background 0.3s ease, color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
    }
    .try-button:hover span {
      background: linear-gradient(45deg,rgb(167, 244, 66), #34A853);
      color: #fff;
      box-shadow: 0 0 15px rgba(226, 244, 66, 0.7);
      transform: translateY(-2px);
    }
    .input-field {
      flex-grow: 1;
      font-family: 'Inter';
      padding-left: 12px;
      padding-top: 12px;
      padding-right: 50px;
      padding-bottom: 50px;
      background-color: #fff;
      border: 1.5px solid #ddd;
      border-radius: 20px;
      outline: none;
      font-size: 15px;
      resize: none;
      min-height: 40vh;
      max-height: 50vh;
      box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.01) 0px 9px 9px 0px, rgba(0, 0, 0, 0.06) 0px 2px 5px 0px;
    }
    .input-field h1{
        font-size: 15;
        
    }
    .input-container{
      position: relative;
      margin: 0 auto;
      width: 30%;
      display: flex;
      align-items: center;
      z-index: 10;
      top:25%;
    }
    .inputbokse{
      left:1.8%;
      flex-direction: column;
      position:relative;
      justify-content: center;
      overflow-y: hidden;
      margin-bottom: 2vh;
      resize:none;
    }

    .inputbokse input{
      flex-grow: 1;
      font-family: 'Inter';
      background-color:rgb(248, 248, 248);
      border: 1.5px solid #ddd;
      border-radius: 10px;
      font-size: 14px;
      height: 3.5vh;
      width: 25vh;
    }
        </style>
    </head>
    <body>
    <!-- Fast topbar -->
    <div class="topbar">
        <button class="logo">
            <a href="index.php">
            <span class="material-icons">chevron_left</span>
            </a>
        </button>
        <span class="brand">Webshop</span>
    </div>
    <div class="input-container">
        <form action="">
        <h1>Login</h1>
            <div class="inputbokse">
                <input type="text" placeholder="username" required>
                <i class='bx bxs-user' ></i>
            </div>
            <div class="inputbokse">
                <input type="password" placeholder="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="huske">
                <label><input type="checkbox">husk mig</label>
                <a class ="logo" href="#">glemt password?</a>
            </div>

            <button type="submit" class="try-button"><a href="ikkeadmin.php">login</a></button>

            <div class="registrer-link">
                <p>lav en account <a class = "logo" href="#">registrer</a></p>
            </div>
        </form>
    </div>
    </body>
</html>