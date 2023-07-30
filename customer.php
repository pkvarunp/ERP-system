<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Customer CRUD</title>
</head>
<body style="   background-color: #A9C9FF;
background-image: linear-gradient(180deg, #A9C9FF 0%, #FFBBEC 100%);
  ">
  
    <div class="container mt-4">

       

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Details
                         
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Contact number</th>
                                    <th>District</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT customer.* ,district.district
                                    FROM customer
                                    INNER JOIN district ON customer.district = district.id";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $customer)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $customer['id']; ?></td>
                                                <td><?= $customer['title']; ?></td>
                                                <td><?= $customer['first_name']; ?></td>
                                                <td><?= $customer['last_name']; ?></td>
                                                <td><?= $customer['contact_no']; ?></td>
                                                <td><?= $customer['district']; ?></td>
                                                <td>
                                                   
                                                    <a href="cedit.php?id=<?= $customer['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_customer" value="<?=$customer['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>