<?php

if(isset($_POST['submit'])){ 

    include('../dbcon.php');

    $rolln = $_POST['rolln'];
    $nam = $_POST['nam'];
    $stander = $_POST['stander'];
    $cit = $_POST['cit'];
    $pcon = $_POST['pcon'];
    $idd= $_POST['idd'];
    $imagenam = $_FILES['simg']['name'];
    $tempnam = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempnam,"../savedimages/$imagenam");

    $qry = "UPDATE `student` SET `rollno` = '$rolln', `name` = '$nam', `city` = '$cit', `pcont` = '$pcon', `standerd` = '$stander',`image`='$imagenam' WHERE `student`.`id` = $idd;";
    $run = mysqli_query($con,$qry);

    if($run==true){
        ?>  <script>
            alert('Data Updated Successfully :)');
            window.open('updateform.php?sid=<?php echo $idd; ?>','_self');//_self is used to open in same page
                     //inside php after echo rem to put  ";"
            </script>
        <?php
    }

}

?>