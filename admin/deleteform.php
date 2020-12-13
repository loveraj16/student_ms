<?php

    include('../dbcon.php');

    $id= $_REQUEST['sid'];

    $qry = "DELETE FROM `student` WHERE `id`='$id'";
    $run = mysqli_query($con,$qry);

    if($run==true){
        ?>  <script>
            alert('Data Deleted Successfully :)');
            window.open('deletestudent.php','_self');//_self is used to open in same page
                     //inside php after echo rem to put  ";"
            </script>
        <?php
    }
?>