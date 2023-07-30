<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #A9C9FF;
             background-image: linear-gradient(180deg, #A9C9FF 0%, #FFBBEC 100%);">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Invoice item report</h4>
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Invoice number</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Item name</th>
                                    <th>Item code</th>
                                    <th>Item category</th>
                                    <th>Item unit price</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                            require 'dbcon.php';

                            if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];

                                $query = "SELECT invoice.*, customer.first_name, item.*, invoice_master.item_id, item_category.category 
                                FROM invoice  
                                INNER JOIN customer ON invoice.customer = customer.id 
                                INNER JOIN invoice_master  ON invoice.id = invoice_master.id
                                INNER JOIN item  ON item.id = invoice_master.item_id
                                INNER JOIN item_category  ON item.item_category = item_category.id
                                WHERE date BETWEEN '$from_date' AND '$to_date'";
                                          
                                          $query_run = mysqli_query($conn, $query);

                                          if(mysqli_num_rows($query_run) > 0)
                                          {
                                              foreach($query_run as $row)
                                              {
                                            ?>
                                            <tr>
                                                <td><?= $row['invoice_no']; ?></td>
                                                <td><?= $row['date']; ?></td>
                                                <td><?= $row['first_name']; ?></td>
                                                <td><?= $row['item_name']; ?></td>
                                                <td><?= $row['item_code']; ?></td>
                                                <td><?= $row['category']; ?></td>
                                                <td><?= $row['unit_price']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No Record Found</td></tr>";
                                    }

                                  
                                    
                                } else {
                                    echo "Error in the prepared statement: " . $conn->error;
                                }

                              
                                $conn->close();
                            
                            ?>
                           
                            </tbody>
                        </table>
       </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
