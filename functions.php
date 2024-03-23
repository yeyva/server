<?php
    function getScores($pdo, $userId) {
        $result = $pdo->query('SELECT * FROM scores WHERE name = "Guest"');
        $scores = ['name' => 'Guest', 'score' => 100];
        header('Content-Type: application/json');
        echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }

    function putScores($pdo, $userId, $level, $wordsWithoutErrors) {
        $sql = 'insert into game_scores(level, user_id, words_completed) VALUES (?, ?, ?)';
        $pdo->prepare($sql)->execute([$level, $userId, $wordsWithoutErrors]);
        $result = $pdo->query('SELECT * FROM scores WHERE name = "Guest"');
        header('Content-Type: application/json');
        echo json_encode('Ok');
        exit;
    }

    function checkLogin($pdo, $username, $password) {
        $sql = 'SELECT * FROM users WHERE name = :username AND password = :password';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = $stmt->fetch();
        
        return $user;
    }

    function register($pdo, $username, $password) {
        $sql = 'INSERT INTO users (name, password) VALUES (:username, :password)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = checkLogin($pdo, $username, $password);
        return $user;
    }

    function getStatisticByUserId($pdo, $userId) {
        $sql = 'SELECT level, MAX(words_completed) AS max_words_completed FROM game_scores WHERE user_id = ? GROUP BY level';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userId]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
?>