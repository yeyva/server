<?php
  require 'config.php';
  require 'database.php';
  require 'functions.php';

    /* Handle CORS */

    // Specify domains from which requests are allowed
    header('Access-Control-Allow-Origin: *');

    // Specify which request methods are allowed
    header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');

    // Additional headers which may be sent along with the CORS request
    header('Access-Control-Allow-Headers: X-Requested-With,Authorization,Content-Type');

    // Set the age to 1 day to improve speed/caching.
    header('Access-Control-Max-Age: 86400');

    // Exit early so the page isn't fully loaded for options requests
    if (strtolower($_SERVER['REQUEST_METHOD']) == 'options') {
        exit();
    }

  session_start();
  $secret = 'secret-key';

  try {
    $pdo = connectToDatabase();
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
  }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);
        $username = $data['username'];
        $password = $data['password'];
        $register = $data['register'];

        if (isset($register)) {
          $user = register($pdo, $username, $password);
        } else {
          $user = checkLogin($pdo, $username, $password);
        }

        if ($user) {
          $_SESSION['username'] = $username;
          echo json_encode(array('token' => $user['id'], 'username' => $user['name']));
        } else {
          echo json_encode('error');
        }
    }
    
?>


