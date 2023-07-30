<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_item']))
{
    $item_id = mysqli_real_escape_string($conn, $_POST['delete_item']);

    $query = "DELETE FROM item WHERE id='$item_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "item Deleted Successfully";
        header("Location: item.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "item Not Deleted";
        header("Location: item.php");
        exit(0);
    }
}

if(isset($_POST['update_item']))
{
    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);

    $item_code = mysqli_real_escape_string($conn, $_POST['item_code']);
    $item_category = mysqli_real_escape_string($conn, $_POST['item_category']);
    $item_subcategory= mysqli_real_escape_string($conn, $_POST['item_subcategory']);
    $item_name= mysqli_real_escape_string($conn, $_POST['item_name']);
    $quantity= mysqli_real_escape_string($conn, $_POST['quantity']);
    $unit_price= mysqli_real_escape_string($conn, $_POST['unit_price']);


    $query = "UPDATE `item` SET `item_code`='$item_code', `item_category`='$item_category', `item_subcategory`='$item_subcategory', `item_name`='$item_name', `quantity`='$quantity', `unit_price`='$unit_price' WHERE `id`='$item_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "item Updated Successfully";
        header("Location: item.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "item Not Updated";
        header("Location: item.php");
        exit(0);
    }

}




?>