<?php
// mysql connection
require_once 'includes/db.php';
$query = "SELECT * FROM `students`";

$results = mysqli_query($conn, $query);
$records = mysqli_num_rows($results);
$msg = "";
if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "add") ? "New Record has been added successfully!" : (($msg == "del") ? "Record has been deleted successfully!" : "Record has been updated successfully!");
} else {
    $alert_msg = "";
}

?>
<!DOCTYPE html>
<html lang="en">


<?php include 'partial/head.php';?>
<body class = "car">
   <?php include 'partial/nav.php';?>
   <div class="text-center text-light font-weight-bold">
       <h1></h1>
      <h1>Which Team are you supporting? </h1>
      <h2>Click Add New to show your Support</h2>
    </div>
    <div class="container">
<?php if (!empty($alert_msg)) {?>
        <div class="alert alert-success"><?php echo $alert_msg; ?></div>
<?php }?>
    <div class="info"></div>
        <table class="table table-light table-hover table-striped">
            <thead class = "bg-danger">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Team</th>
                <th scope="col">Email</th>
                <th scope="col">Track</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
if (!empty($records)) {
    while ($row = mysqli_fetch_assoc($results)) {
        ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['course']; ?></td>
                                    <td>
                                        <a href="/crud/add.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">EDIT</a>
                                        <a href="/crud/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onClick="javascript:return confirm('Do you really want to delete?');" >DELETE</a>
                                    </td>
                                </tr>

                            <?php
}
}
?>



            </tbody>
        </table>
    </div>
</body>

<footer class="page-footer font-small stylish-color-dark bg-dark pt-4" style="position:fixed; bottom:0;width: 100%;">
      <div class="footer-copyright text-center py-3" style="background: #A9A9A9">Rutik Pol, 0120180213
      </div>
    </footer>
</html>