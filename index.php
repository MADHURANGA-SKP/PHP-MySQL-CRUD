<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>My shop</title>
</head>
<body>
    <div class="container">
        <h2 class="">List of Clients</h2>
        <a href="./create.php" class="btn btn-primary" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr class="">
                    <th class="">ID</th>
                    <th class="">Name</th>
                    <th class="">Email</th>
                    <th class="">Phone</th>
                    <th class="">Address</th>
                    <th class="">Created At</th>
                    <th class="">Action</th>
                </tr>
            </thead>
            <tbody class="">
                <?php 
                

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "my_shop";

                //create connection
                $connection = new mysqli($servername,$username,$password,$database);

                //check connection
                if($connection->connect_error){
                    die("connection Failed".$connection->connect_error);
                }

                //read all row from database table
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if(!$result){
                    die("Invalid query: " . $connection->error);
                }

                //read adata of each row
                while($row = $result->fetch_assoc()){
                    echo"
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a href='./edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                        <a href='./delete.php?id=$row[id]' class='btn btn-primary btn-sm'>Delete</a>
                    </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>