<?php
session_start();
ob_start();

$conn = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $conn = new PDO("sqlite:webshop.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                header("Location: adminpanel.php");
                exit();
            } else {
                $error_message = "Forkert brugernavn eller password";
            }
        } else {
            $error_message = "brugernavn findes ikke";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
ob_end_flush();
?>


<!DOCTYPE html>
<html>  
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Webshop case</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
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
  width: 300px; /* Fixed width for the container */
  display: flex;
  flex-direction: column;
  align-items: center;
  top:25%;
  border-radius: 25px;
  border: 1px solid black;
  box-shadow: 5px 10px #888888;
  padding: 20px; /* Add padding to ensure content stays inside */
}

.inputbokse{
  position: relative;
  width: 100%; /* Ensure input boxes take full width of the container */
  margin-bottom: 2vh;
}

.inputbokse input{
  width: 100%; /* Ensure input fields take full width of the container */
  font-family: 'Inter';
  background-color:rgb(248, 248, 248);
  border: 1.5px solid #ddd;
  border-radius: 10px;
  font-size: 14px;
  height: 3.5vh;
  padding-left: 30px; /* Add padding to the left to make space for the icon */
  min-width: 200px; /* Minimum width for input boxes */
}

.inputbokse i {
  position: absolute;
  left: 10px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 18px;
  color: #888;
}

/* Media query for smaller screens */
@media (max-width: 600px) {
  .input-container {
    width: 80%; /* Adjust width for smaller screens */
  }
  .inputbokse input {
    width: 100%; /* Make input boxes take full width */
  }
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
        <form method="post" action="">
        <h1>Login</h1>
            <div class="inputbokse">
                <input type="text" name="username" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="inputbokse">
                <input type="password" name="password" placeholder="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="huske">
                <label><input type="checkbox">husk mig</label>
                <a class ="logo" href="#">glemt password?</a>
            </div>

            <div class="button-container">
              <button type="submit" class="try-button">
                <span>login</span>
              </button>
            </div>

            <div class="registrer-link">
                <p>lav en account <a class = "logo" href="register.php">registrer</a></p>
            </div>
        </form>
        <?php
        if ($error_message != "") {
          echo "<p style='color: red;'>$error_message</p>";
        }
        ?>
    </div>
</body>
</html>