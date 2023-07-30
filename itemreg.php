
<?php 
$db_host="localhost";
$db_user="username";
$db_password="password";
$db_name="erp";


$conn = new mysqli($db_host,$db_user,$db_password,$db_name);

if($conn->connect_error){
    die("connection faild");
}

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $item_code = $_POST['item_code'];
    $item_category = $_POST['item_category'];
    $item_subcategory = $_POST['item_subcategory'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    
    
   
    
    $sql = "INSERT INTO `item` (`item_code`, `item_category`, `item_subcategory`, `item_name`, `quantity`, `unit_price`) 
    VALUES ('$item_code', '$item_category', '$item_subcategory', '$item_name', '$quantity', '$unit_price')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registered Successfully")</script>';
    } else {
        echo '<script>alert("Failed to Register")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>item registration</title>
   
    <script src="registrationi.js"   defer></script>
    <link rel="stylesheet" href="registrationj.css">
   
    
</head>
<body>
    <div class="back">
    <div class="container">
        <form id="form"   method="POST" onsubmit=" validateInputs()" >
            <h1>Item Registration</h1>

            <div class="input-control">
                <label for="item_code">Item code</label>
                <input id="item_code" name="item_code" type="text">
                <div class="error"></div>
            </div>

            <div class="input-control">
            <label for="item_category">Item category</label>
        <select id="item_category" name="item_category">
            <option value="1">Printers</option>
            <option value="2">Laptops</option>
            <option value="3">Gadgets</option>
            <option value="4">Ink bottels</option>
            <option value="5">Cartridges</option>
        </select>
        <div class="error"></div>
            </div>
            <div class="input-control">
            <label for="item_subcategory">Item category</label>
        <select id="item_subcategory" name="item_subcategory">
            <option value="1">HP</option>
            <option value="2">Dell</option>
            <option value="3">Lenovo</option>
            <option value="4">Acer</option>
            <option value="5">Samsung</option>
        </select>
        <div class="error"></div>
            </div>
            
            <div class="input-control">
                <label for="item_name">Item name</label>
                <input id="item_name" name="item_name" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="quantity">Quantity</label>
                <input id="quantity" name="quantity" type="number">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="unit_price">Unit price</label>
                <input id="unit_price" name="unit_price" type="number">
                <div class="error"></div>
            </div>
            
          
            <button type="submit" >Register</button>
            <button type="submit"   onclick="window.location.href='item.php';">Edit</button>
        </form>
    </div>
</div>

</body>
</html>