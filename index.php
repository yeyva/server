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

    try {
        $pdo = connectToDatabase();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (strpos($_SERVER['REQUEST_URI'], '/getScores') !== false) {
            try {
                $userId = isset($_GET['userId']) ? $_GET['userId'] : null;
                if (!$userId) {
                    echo json_encode('User ID is required');
                    exit;
                }
                $result = getStatisticByUserId($pdo, $userId);
                echo json_encode($result);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                exit;
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_SERVER['REQUEST_URI'] === '/putScores') {
            try {
                $rawData = file_get_contents("php://input");
                $data = json_decode($rawData, true);
                $userId = $data['userId'];
                $level = $data['level'];
                $wordsWithoutErrors = $data['wordsWithoutErrors'];

                putScores($pdo, $userId, $level, $wordsWithoutErrors);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                exit;   
            }   
        }
        if ($_SERVER['REQUEST_URI'] === '/getStatistic') {
            try {
                $rawData = file_get_contents("php://input");
                $data = json_decode($rawData, true);
                $id = $data['id'];
        
                $result = getStatisticByUserId($pdo, $id);
                echo json_encode($result);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                exit;   
            }   
        }
    } 
?>