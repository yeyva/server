<?php
    require 'config.php';
    require 'database.php';
    require 'functions.php';
    session_start();

    try {
      $pdo = connectToDatabase();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $username = $_POST['uname'];
        $password = $_POST['psw'];
        $_SESSION['username'] = $username;

        register($pdo, $username, $password);

        header('Location: member.php');
        exit;
    }
?>