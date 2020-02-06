<?php

// Include config file
session_start();
require_once "dbconnect.php";

$userData = $db->faculty->findOne(array('_id' => new MongoDB\BSON\ObjectID($_SESSION['user'])));
$profileID = $db->faculty->findOne(array('_id' => new MongoDB\BSON\ObjectId($_GET['id'])));


function get_publications($db)
{
    $id = $_GET['id'];
    $result = $db->publications->find(array('authorId' => new MongoDB\BSON\ObjectId($id)));
    $all_publications = iterator_to_array($result);
    return $all_publications;
}

function get_awards($db)
{
    $id = $_GET['id'];
    $result = $db->awards->find(array('authorId' => new MongoDB\BSON\ObjectId($id)));
    $all_awards = iterator_to_array($result);
    return $all_awards;
}

//update
?>

<html>

<head>
    <title>Faculty Portal</title>
</head>

<body>
    <?php include("header.php"); ?>
    <h1>USER</h1><p><?php echo $profileID['username'];?></p>
    <h3>EMAIL</h1><p><?php echo $profileID['email'];?></p>
    <h3>DEPARTMENT</h1><p><?php echo $profileID['department'];?></p>
    <h3>CONTACT</h1><p><?php echo $profileID['contact'];?></p>
    <br><h2>Publications</h2>
    <div>
        <?php
        $all_publications = get_publications($db);
        foreach ($all_publications as $publication) {
            echo '<p><a href="profile.php?id=' . $publication['authorName'] . '"></a></p>';
            echo '<p>' . $publication['body'] . '</p>';
            echo '<hr>';
        }
        ?>
    </div>
    <h2>Awards</h2>
    <div>
        <?php
        $all_awards = get_awards($db);
        foreach ($all_awards as $award) {
            echo '<p><a href="profile.php?id=' . $award['authorName'] . '"></a></p>';
            echo '<p>' . $award['body'] . '</p>';
            echo '<hr>';
        }
        ?>
    </div>
</body>

</html>