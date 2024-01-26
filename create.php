<?php 


$servername = "localhost";
$username = "root";
$password = "";
$database = "my_shop";
//create connection
$connection = new mysqli($servername,$username,$password,$database);


$name ="";
$email="";
$phone="";
$address="";
$errorMesssage = "";
$successMesssage = "";

if($_SERVER["REQUEST_METHOD"]=='POST'){
    $name =$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
}

do{
    if(empty($name)|| empty($email)|| empty($phone)|| empty($address)){
        $errorMesssage = "All fields are reqired";
        break;
    }

    //add new client to database
    $sql = "INSERT INTO clients (name, email, phone, address)"."VALUES('$name','$email','$phone','$address')";
    $result = $connection->query($sql);

    if(!$result){
        $errorMesssage = "Invalid quesry: " . $connection->error;
        break;
    }

    $name ="";
    $email="";
    $phone="";
    $address="";
    $successMesssage = "Client added Successfully";

    header("location: ./index.php");
    exit;

}while(false);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container my-5"></div>
    <h2>New Client</h2>


    <?php 
    if(!empty($errorMesssage)){
        echo"
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMesssage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
        </div>
        ";
    }
    ?>


    <form method="post">
        <div class="row mb-3">
            <label class="col-sm-3 form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 form-label">Phone</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
            </div>
        </div>


        <?php 
        if(!empty($successMesssage)){
        echo"
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>$successMesssage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
        </div>
        ";
        }
        ?>


        <div class="row mb-3">
           <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
           </div>
           <div class="col-sm-3 d-grid">
            <a href="./index.php" class="btn btn-outline-primary" role="button">Cancel</a>
           </div>
        </div>
    </form>
</body>
</html>