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

    <title>Item Edit</title>
</head>
<body style="   background-color: #A9C9FF;
background-image: linear-gradient(180deg, #A9C9FF 0%, #FFBBEC 100%);
  ">
  
    <div class="container mt-5">

        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item Edit 
                            <a href="item.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $item_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM item WHERE id='$item_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $item = mysqli_fetch_array($query_run);
                                ?>
                                <form action="icode.php" method="POST">
                                    <input type="hidden" name="item_id" value="<?= $item['id']; ?>">

                                    <div class="mb-3">
                                        <label>Item_code</label>
                                        <input type="text" name="item_code" value="<?=$item['item_code'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Item_category</label>
                                        <select id="item_category" name="item_category" class="form-control" >
            <option value="1">Printers</option>
            <option value="2">Laptops</option>
            <option value="3">Gadgets</option>
            <option value="4">Ink bottels</option>
            <option value="5">Cartridges</option>
        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Item_subcategory</label>
                                        <select id="item_subcategory" name="item_subcategory" class="form-control">
            <option value="1">HP</option>
            <option value="2">Dell</option>
            <option value="3">Lenovo</option>
            <option value="4">Acer</option>
            <option value="5">Samsung</option>
                            </select>
                                    </div>
                                   
                                    <div class="mb-3">
                                        <label>Item-name</label>
                                        <input type="text" name="item_name" value="<?=$item['item_name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="text" name="quantity" value="<?=$item['quantity'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Unit_price</label>
                                        <input type="text" name="unit_price" value="<?=$item['unit_price'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_item" class="btn btn-primary">
                                            Update item
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