<?php

session_start();
require_once("dbconnect.php");

if (!isset($_POST['body'])) {
    exit;
}

$user_id = $_SESSION['user'];
$user_data = $db->faculty->findOne(array('_id' => $user_id));
$body = substr($_POST['body'], 0, 140);

$db->publications->insertOne(array(
    'authorId' => $user_id,
    'authorName' => $user_data['username'],
    'body' => $body
));

header("Location: home.php");
