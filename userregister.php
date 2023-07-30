
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
    $title = $_POST['title'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cnum = $_POST['cnum'];
    $dis = $_POST['dis'];
    
    
   
    
    $sql = "INSERT INTO `customer` (`title`, `first_name`, `last_name`, `contact_no`, `district`) 
            VALUES ('$title', '$fname', '$lname', '$cnum', '$dis')";
    
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
    <title>user registration</title>
   
    <script src="registration.js"   defer></script>
    <link rel="stylesheet" href="registrationj.css">
   
    
</head>
<body>
    <div class="back">
    <div class="container">
        <form id="form"   method="POST" onsubmit=" validateInputs()" >
            <h1> User Registration</h1>


            <div class="input-control">
            <label for="title">Title</label>
        <select id="title" name="title">
            <option value="Mr">Mr</option>
            <option value="Mrs">Mrs</option>
            <option value="Miss">Miss</option>
            <option value="Dr">Dr</option>
        </select>
        <div class="error"></div>
            </div>
            
            <div class="input-control">
                <label for="fname">First name</label>
                <input id="fname" name="fname" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="lname">Last name</label>
                <input id="lname" name="lname" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="cnum">Contact number</label>
                <input id="cnum" name="cnum" type="text">
                <div class="error"></div>
            </div>
          
            <div class="input-control">
            <label for="item_category">District</label>
        <select id="dis" name="dis">
            <option value="1">	
Ampara</option>
            <option value="2">Anuradhapura</option>
            <option value="3">Badulla</option>
            <option value="4">Batticaloa</option>
            <option value="5">	
Colombo</option>
            <option value="6">	
Galle</option>
            <option value="7">Gampaha</option>
            <option value="8">Hambantota</option>
            <option value="9">Jaffna</option>
            <option value="10">Kalutara</option>
            <option value="11">Tincomalee</option>
            <option value="12">	
Kandy</option>
            <option value="13">	
Kegalle</option>
            <option value="14">Kilinochchi</option>
            <option value="15">Kurunegala</option>
            <option value="16">Mannar</option>
            <option value="17">	
Matale</option>
            <option value="18">Matara</option>
            <option value="19">Moneragala</option>
            <option value="20">Mullaitivu</option>
            <option value="21">Nuwara Eliya</option>
            <option value="22">Polonnaruwa</option>
            <option value="23">Puttalam</option>
            <option value="24">Rathnapura</option>
            <option value="25">Vavuniya</option>
        </select>
                <div class="error"></div>
            </div>
            <button type="submit" >Register</button>
            <button type="submit"   onclick="window.location.href='customer.php';">Edit</button>
        </form>
    </div>
</div>

</body>
</html>