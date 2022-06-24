<?php session_start();
include_once('config.php');
require_once('header.php');

if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

?>
    <!DOCTYPE html>
    <html lang="en">
    <body>
        <main>
            <?php
            $userid = $_SESSION['id'];
            $query = mysqli_query($con, "select * from users where id='$userid'");
            while ($result = mysqli_fetch_array($query)) { ?>

                <div class="container mt-5 align-center">
                    <h4>Welcome <?php echo $result['fname'] .' '. $result['lname']; ?></h4>
                </div>

            <?php } ?>
        </main>
    <?php include('footer.php'); ?>
<?php } ?>