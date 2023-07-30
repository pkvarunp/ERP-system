<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>customer Edit</title>
</head>
<body style="   background-color: #A9C9FF;
background-image: linear-gradient(180deg, #A9C9FF 0%, #FFBBEC 100%);
  ">
  
    <div class="container mt-5">

        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>customer Edit 
                            <a href="customer.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $customer_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM customer WHERE id='$customer_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $customer = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="customer_id" value="<?= $customer['id']; ?>">

                                    <div class="mb-3">
                                        <label>First name</label>
                                        <input type="text" name="first_name" value="<?=$customer['first_name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Last name</label>
                                        <input type="text" name="last_name" value="<?=$customer['last_name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Contact number</label>
                                        <input type="text" name="contact_no" value="<?=$customer['contact_no'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>District</label>
                                        <input type="text" name="district" value="<?=$customer['district'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_customer" class="btn btn-primary">
                                            Update customer
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>