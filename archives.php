<?php require('includes/config.php'); ?>
<?php
//ob_start();
//session_start();

//database credentials


if (!isset($_GET['year'])) {
    die("Invalid year specified.");
}
else {
    $year = (int)$_GET['year'];
}

$result = $db->query("SELECT postDate, postID, postTitle FROM blog_posts WHERE YEAR(postDate) = '$year' ORDER BY postID DESC");

while ($row = $result->fetch()) {

	$date = date("Y-m-d", strtotime($row['postDate']));
	
	$id = $row['postID'];
    $title = stripslashes($row['postTitle']);

	?>

    <p><?php echo $date; ?><br /><a href="viewpost.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></p>
    <?php
    

}
?>