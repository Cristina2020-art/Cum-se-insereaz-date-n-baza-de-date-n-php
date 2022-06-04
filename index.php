<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Bootstrap aplication</title>
  </head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Cum se inserează date în baza de date în php</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" required placeholder="Enter your Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" required placeholder="Enter your Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control" required placeholder="Enter your Email Address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="">Designation</label>
                                        <input type="text" name="designation" class="form-control" required placeholder="Enter your Designation">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <button type="submit" name="insert_data" class="btn btn-primary">SAVE DATA</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
Now, when you click on the Submit button, the <form> contains action="code.php" so, lets go to STEP 2 to write the code: 

Step 3: Create a code.php file and paste the below code to insert data in MySQL Database in php.

<?php
session_start();
$con = mysqli_connect("localhost","root","","employees");

if(isset($_POST['insert_data']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);

    $query = "INSERT INTO employees (name,phone,email,designation) VALUES ('$name','$phone','$email','$designation') ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Inserted Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: index.php");
    }
}

?>