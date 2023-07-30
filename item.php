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

    <title>Item CRUD</title>
</head>
<body style="   background-color: #A9C9FF;
background-image: linear-gradient(180deg, #A9C9FF 0%, #FFBBEC 100%);
  ">
  
    <div class="container mt-4">

       

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item Details
                         
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Item_code</th>
                                    <th>Item_category</th>
                                    <th>Item_subcategory</th>
                                    <th>Item_name</th>
                                    <th>Quantity</th>
                                    <th>Unit_price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT item.*,item_category.category,item_subcategory.sub_category
                                    FROM item
                                    INNER JOIN item_category ON item.item_category = item_category.id
                                    INNER JOIN item_subcategory ON item.item_subcategory = item_subcategory.id";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $item)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $item['id']; ?></td>
                                                <td><?= $item['item_code']; ?></td>
                                                <td><?= $item['category']; ?></td>
                                                <td><?= $item['sub_category']; ?></td>
                                                <td><?= $item['item_name']; ?></td>
                                                <td><?= $item['quantity']; ?></td>
                                                <td><?= $item['unit_price']; ?></td>
                                                <td>
                                                   
                                                    <a href="iedit.php?id=<?= $item['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="icode.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_item" value="<?=$item['id'];?>" class="btn btn-danger btn-sm">Delete</button>
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