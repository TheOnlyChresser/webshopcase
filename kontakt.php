<?php

?>

<!DOCTYPE html>
<html lang="da">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Webshop case</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <style>
    /* Sprog-menu (fast position øverst til højre) */
    .language-menu {
      position: fixed;
      top: 10px;
      right: 10px;
      width: 160px;
      border: 1px solid #ccc;
      font-family: sans-serif;
      user-select: none;
      z-index: 1001;
    }
    .language-selected {
      display: flex;
      align-items: center;
      background-color: #fff;
      padding: 10px;
      cursor: pointer;
    }
    .language-selected:hover {
      color: #777;
    }
    .language-selected img {
      width: 20px;
      height: 10px;
      margin-right: 8px;
    }
    .language-dropdown {
      display: block;
      background-color: #fff;
      border: none;
    }
    .language-menu.open .language-selected {
      background-color: #f0f0f0;
    }
    .language-dropdown div {
      display: flex;
      align-items: center;
      padding: 10px;
      cursor: pointer;
    }
    .language-dropdown div:hover {
      color: #777;
    }
    .language-dropdown img {
      width: 20px;
      height: 15px;
      margin-right: 8px;
    }

    /* Generel reset og styling */
    html, body {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      text-align: center;
      box-sizing: border-box;
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
    .logo {
      height: 40px;
      width: 40px;
      background: url('https://via.placeholder.com/40') no-repeat center center;
      background-size: cover;
      margin-right: 10px;
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
    h1 {
      font-family: Helvetica, Arial, sans-serif;
      font-weight: 700;
      font-size: 6.5vw;
      margin: 0;
      line-height: 1.2;
      color: black;
    }
    h2 {
      font-family: Helvetica, Arial, sans-serif;
      font-weight: 300;
      font-size: 2vw;
      margin-top: -6vh;
      margin-bottom: 0;
      line-height: 1.2;
      color: #777;
    }
    .gradient-text {
      background: linear-gradient(90deg, #4285F4, #34A853);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      color: black; /* fallback */
    }
    .line-break {
      display: block;
      white-space: nowrap;
    }

    /* Knap styling */
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

    /* Responsivt design */
    @media screen and (max-width: 768px) {
      .topbar {
        height: 50px;
        padding: 0 15px;
      }
      .logo {
        height: 30px;
        width: 30px;
      }
      .brand {
        font-size: 20px;
      }
      .content {
        padding-top: 70px;
      }
      h1 {
        font-size: 8vw;
      }
      h2 {
        font-size: 3vw;
        margin-top: -4vh;
      }
      .language-menu {
        width: 140px;
        top: 5px;
        right: 5px;
      }
      .language-selected,
      .language-dropdown div {
        padding: 8px;
      }
      .language-selected img,
      .language-dropdown img {
        width: 18px;
      }
      .try-button span {
        padding: 10px 25px;
        font-size: 0.9rem;
      }
    }

    @media screen and (max-width: 480px) {
      h1 {
        font-size: 10vw;
      }
      h2 {
        font-size: 4vw;
      }
      .language-menu {
        width: 120px;
      }
      .language-selected,
      .language-dropdown div {
        padding: 6px;
      }
      .language-selected img,
      .language-dropdown img {
        width: 16px;
      }
      .try-button span {
        padding: 8px 20px;
        font-size: 0.8rem;
      }
    }
  </style>
</head>
<body>

  <!-- Fast topbar -->
  <div class="topbar">
    <div class="logo"></div>
    <span class="brand">Webshop</span>
    </div>
  </div>

  <!-- Indhold -->
  <div class="content">
    <h1>
      Velkommen til <span class="line-break"></span>
      <span class="gradient-text">vores</span> webshop
    </h1>
  </div>
  <h2>
    Chresten og Niklas' case i Informatik. Den bedste
    <span class="line-break">aflevering du nogensinde kommer til at se</span>
  </h2>

  <!-- Knap Container -->
    <div class="button-container">
      <a href="login.php" class="try-button">
        <span>Login nu</span>
      </a>
    </div>

  <script>
    // Funktion til at åbne/lukke sprog-dropdown
    function toggleDropdown() {
      const dropdown = document.getElementById('language-dropdown');
      const arrow = document.getElementById('dropdown-arrow');
      const menu = document.querySelector('.language-menu');

      if (dropdown.style.display === 'none' || dropdown.style.display === '') {
          dropdown.style.display = 'block';
          arrow.textContent = 'expand_less';
          menu.classList.add('open');
      } else {
          dropdown.style.display = 'none';
          arrow.textContent = 'expand_more';
          menu.classList.remove('open');
      }
    }

    // Skift sprog (omdirigering) og opdater den viste flag/tekst
    function changeLanguage(lang) {
      const selectedFlag = document.getElementById('selected-flag');
      const selectedText = document.getElementById('selected-text');

      if (lang === 'da') {
        window.location.href = 'index_da.html';
      } else {
        window.location.href = 'index.html';
      }

      if (lang === 'da') {
        selectedFlag.src = 'https://upload.wikimedia.org/wikipedia/commons/9/9c/Flag_of_Denmark.svg';
        selectedText.textContent = 'Dansk';
      } else {
        selectedFlag.src = 'https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg';
        selectedText.textContent = 'English';
      }
    }

    // Skjul dropdown ved siden indlæsning
    document.getElementById('language-dropdown').style.display = 'none';
    document.getElementById('dropdown-arrow').textContent = 'expand_more';
  </script>

</body>
</html>