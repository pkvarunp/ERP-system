<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_customer']))
{
    $customer_id = mysqli_real_escape_string($conn, $_POST['delete_customer']);

    $query = "DELETE FROM customer WHERE id='$customer_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "customer Deleted Successfully";
        header("Location: customer.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "customer Not Deleted";
        header("Location: customer.php");
        exit(0);
    }
}

if(isset($_POST['update_customer']))
{
    $customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);

    $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $cnum = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $district= mysqli_real_escape_string($conn, $_POST['district']);

    $query = "UPDATE customer SET first_name='$fname', last_name ='$lname', contact_no='$cnum', district='$district' WHERE id='$customer_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "customer Updated Successfully";
        header("Location: customer.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "customer Not Updated";
        header("Location: customer.php");
        exit(0);
    }

}




?>