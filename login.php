<?php

session_start();
    if(isset($_SESSION['uid'])){

    header('location: admin/admindash.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h5 ><a href="index.php" style="float: right; margin-right:50px; color:red;">BackToHome</a></h5><br>
    <h1 align='center'>Admin Login</h1>
    <h6 align='center'>Swagat Nahi Karoge Hamara..</h6>
    <form action="login.php" method="POST">
        <table align="center">
            <tr>
                <td>Username:</td><td><input type="text" name="uname" require></td>
            </tr>
            <tr>
                <td>Password:</td><td><input type="password" name="pass" require></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login" ></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php

include('dbcon.php');
if(isset($_POST['login'])){
   $username = $_POST['uname'] ;
   $password = $_POST['pass'];
   $qry= "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
    $run= mysqli_query($con,$qry);
    $row= mysqli_num_rows($run);
    if($row<1){
        ?>
        <script>alert("Opps! Username and Pswd not matched..");
            window.open('login.php','_self');
    </script><?php
    }
    else{
        $data= mysqli_fetch_assoc($run);
        $id=$data['id'];
        
        $_SESSION['uid']=$id;
        header('location:admin/admindash.php');

    }
}
?>