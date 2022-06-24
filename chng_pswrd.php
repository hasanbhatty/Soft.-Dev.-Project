<?php session_start();
include_once('config.php');
include_once('header.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
   //Update Password  
    if (isset($_POST['update'])) {
        $oldpassword = $_POST['currentpassword'];
        $newpassword = $_POST['newpassword'];
        $sql = mysqli_query($con, "SELECT password FROM users where password='$oldpassword'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            $userid = $_SESSION['id'];
            $ret = mysqli_query($con, "update users set password='$newpassword' where id='$userid'");
            echo "<script>alert('Password Changed Successfully !!');</script>";
            echo "<script type='text/javascript'> document.location = 'chng_pswrd.php'; </script>";
        } else {
            echo "<script>alert('Old Password not match !!');</script>";
            echo "<script type='text/javascript'> document.location = 'chng_pswrd.php'; </script>";
        }
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <script language="javascript" type="text/javascript">
            function valid() {
                if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.changepassword.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>

    </head>

    <body>
        <main>
            <div class="container-fluid px-4">


                <h1 class="mt-4">Change Password</h1>
                <div class="card mb-4">
                    <form method="post" name="changepassword" onSubmit="return valid();">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Current Password</th>
                                    <td><input class="form-control" id="currentpassword" name="currentpassword" type="password" value="" required /></td>
                                </tr>
                                <tr>
                                    <th>New Password</th>
                                    <td><input class="form-control" id="newpassword" name="newpassword" type="password" value="" required /></td>
                                </tr>
                                <tr>
                                    <th>Confirm Password</th>
                                    <td colspan="3"><input class="form-control" id="confirmpassword" name="confirmpassword" type="password" required /></td>
                                </tr>

                                <tr>
                                    <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Change</button></td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>


            </div>
        </main>
        <?php include('footer.php'); ?>
    <?php } ?>