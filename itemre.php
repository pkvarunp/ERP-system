<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #A9C9FF; background-image: linear-gradient(180deg, #A9C9FF 0%, #FFBBEC 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Item report</h4>
                    </div>
                    <div class="card-body">
                        <div class="card mt-4">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Item name</th>
                                            <th>Item category</th>
                                            <th>Item sub category</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        require 'dbcon.php';

                                        $query = "SELECT item.*, item_category.category, item_subcategory.sub_category 
                                        FROM item 
                                        INNER JOIN item_category ON item.item_category = item_category.id
                                        INNER JOIN item_subcategory  ON item.item_subcategory = item_subcategory.id";

                                        $query_run = mysqli_query($conn, $query);
                                        $num_rows = mysqli_num_rows($query_run);

                                        if ($num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                <tr>
                                                    <td><?= $row['item_name']; ?></td>
                                                    <td><?= $row['category']; ?></td>
                                                    <td><?= $row['sub_category']; ?></td>
                                                    <td><?= $row['quantity']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>No Record Found</td></tr>";
                                        }
                                    ?>

                                    </tbody>
     
                                </table>
                                <button class="button"  onclick="window.location.href='itempdf.php';">
                                Click here to download the report PDF
    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
