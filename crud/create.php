<!DOCTYPE HTML>
<html>
<head>
    <title>Add List Item</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Create Product</h1>
        </div>

        <?php
        if($_POST){

            // include database connection
            include 'config/database.php';

            try{

                // insert query
                $query = "INSERT INTO products SET id=:id, name=:name, description=:description, price=:price, created=:created, person=:person";

                // prepare query for execution
                $stmt = $con->prepare($query);

                // posted values
                $id=htmlspecialchars(strip_tags($_POST['id']));
                $name=htmlspecialchars(strip_tags($_POST['name']));
                $description=htmlspecialchars(strip_tags($_POST['description']));
                $price=htmlspecialchars(strip_tags($_POST['price']));
                $person=htmlspecialchars(strip_tags($_POST['person']));

                // bind the parameters
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':person', $person);

                // specify when this record was inserted to the database
                $created=date('Y-m-d H:i:s');
                $stmt->bindParam(':created', $created);

                // Execute the query
                if($stmt->execute()){
                    echo "<div class='alert alert-success'>Item was added to the list.</div>";
                }else{
                    echo "<div class='alert alert-danger'>Item couldn't be added to the list.</div>";
                }

            }

            // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
        }
        ?>
        <!-- html form here where the product information will be entered -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                  <td>ID</td>
                  <td><input type='text' name='id' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type='text' name='name' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name='description' class='form-control'></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type='text' name='price' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Person</td>
                    <td><input type='text' name='person' class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save' class='btn btn-primary' />
                        <a href='index.php' class='btn btn-danger'>Back to the list.</a>
                    </td>
                </tr>
            </table>
        </form>
    </div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
