<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script defer src="index.js"></script>

    <title>Profile </title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css">
    <style>
        .content-panel div {
            width: 50%;
        }

        .form-group-left {
            margin-right: 5px;
        }

        .form-group-right {
            margin-left: 5px;
        }

        @media screen and (max-width: 800px) {
            .content-panel div {
                width: 100%;
            }

            .double-group {
                flex-direction: column;
            }

            .form-group-left {
                margin-right: 0px;
            }

            .form-group-right {
                margin-left: 0px;
            }
        }

    </style>

</head>
<body style="background-color:#f8f9fa;">
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php' ?>
    <?php
        if($loggedin) {
    ?>
    
    <div class="container my-3">
        <?php 
            $sql = "SELECT * FROM users WHERE id='$userId'"; 
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $username = $row['username'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            $phone = $row['phone'];
            $userType = $row['userType'];
            if($userType == 0) {
                $userType = "User";
            }
            else {
                $userType = "Admin";
            }

        ?>

            <div class="content-panel my-5 d-flex align-items-center flex-column gap-3">
                <a href="partials/_logout.php"><button class="btn btn-secondary">Logout</button></a>
                <div class="border p-3" style="border: 2px solid rgba(0, 0, 0, 0.1); border-radius: 1.1rem;background-color: white;">
                    <h2 class="title text-center">Profile Information</span></h2>
                
                    <form action="partials/_manageProfile.php" method="post">
                        <div class="form-group w-100 mb-3">
                            <b><label for="username">Username</label></b>
                            <input class="form-control" id="username" name="username" type="text" disabled value="<?php echo $username ?>">
                        </div>
                        <div class="double-group d-flex w-100 mb-3">
                            <div class="form-group-left">
                                <b><label for="firstName">First Name</label></b>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required value="<?php echo $firstName ?>">
                            </div>
                            <div class="form-group-right">
                                <b><label for="lastName">Last Name</label></b>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" required value="<?php echo $lastName ?>">
                            </div>
                        </div>
                        <div class="form-group w-100 mb-3">
                            <b><label for="email">Email</label></b>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required value="<?php echo $email ?>">
                        </div>
                        <div class="double-group d-flex w-100 mb-3">
                            <div class="form-group-left">
                                <b><label for="phone">Phone No</label></b>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10" value="<?php echo $phone ?>">
                            </div>
                            <div class="form-group-right">
                                <b><label for="password">Password</label></b>    
                                <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required minlength="4" maxlength="21">
                            </div>
                        </div>
                        <button type="submit" name="updateProfileDetail" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

    <?php
        }
    ?>
    <?php require 'partials/_footer.php' ?>
    
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    
</body>

</html>
