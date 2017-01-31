<?php
require_once('../../../private/initialize.php');

$id = $_GET['id'];
$users_result = find_user_by_id($id);
// No loop, only one result
$user = db_fetch_assoc($users_result);

if(isset($_POST['delete'])) {
	delete_user($user);
	redirect_to('index.php');
}
?>

<?php $page_title = 'Staff: User ' . $user['first_name'] . " " . $user['last_name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="show.php?id=<?php echo $user['id']; ?>">Back to Users Details</a><br />

  <h1>Are you sure you want to permanently delete the User: <?php echo $user['first_name'] . " " . $user['last_name']; ?></h1>

  <form action="delete.php?id=<?php echo $user['id']; ?>" method="post">

    <input name = "delete" type = "submit" id = "delete" value = "Delete">
  </form>
  
  <br />

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>