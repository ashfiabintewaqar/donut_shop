<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script defer src="index.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css">
    <title>Search</title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
    <style>
    .search-container {
        background-color: white;
        width: 85%;
        margin: 50px auto;
        border: 2px solid lightgray;
        border-radius: 25px;
    }
    .home-link {
        text-decoration: none; 
        color: gray;
    }

    .home-link:hover {
        color: #ff6e0c;
        text-decoration: underline; 
    }

    .navigation {
        cursor: pointer;
    }
    </style>
</head>
<body style="background-color:#f8f9fa;">
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php' ?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $search = $_POST["search"];
    
    $sql = "select * from donut where donutName LIKE '%$search%'"; 
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="container search-container" style="margin-bottom: 20px; padding: 50px;">
        <div class="navigation"><a href="index.php" class="home-link">Home</a> > <span style="color: #ff6e0c;">Search</span></div>
        <h1 style="font-size: 32px; color: #24282B; margin: 30px 0px; font-weight: 700;">Search results for <span style="color: #ff6e0c; text-decoration: underline; font-weight: 700;">"<?php echo $search ?>"</span></h1>
        <div class="row">
            <?php
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $donutId = $row['donutId'];
                        $donutName = $row['donutName'];
                        $donutPrice = $row['donutPrice'];
                        $donutDesc = $row['donutDesc'];
                        ?>

                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 item mb-4">
                            <div class="card h-100" style="border-radius: 20px;">
                                <img class="card-img-top" src="img/donut-<?php echo $donutId ?>.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: bold; text-align: center; margin: 5px 0px; width: 10 0%; color: rgb(17, 17, 17);">
                                        <?php echo $donutName ?>
                                    </h5>
                                    <p class="card-text" style="font-size: 14px; margin: 0px 0px; color: rgb(147, 147, 147);text-align: center;border-bottom: 1px solid lightgrey;padding-bottom: 20px;"> 
                                        <?php echo $donutDesc ?>
                                    </p>
                                    <p style="color: rgb(255, 110, 12); font-size: 18px; text-align: center; font-weight: 700; height: 38px; margin: 4px 0; display: flex;flex-direction: column;justify-content: flex-end;align-items: center;"> Rs. 
                                        <?php echo $donutPrice ?>
                                    </p>
                                    <?php
                                    if($loggedin) {
                                        $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE donutId = '$donutId' AND `userId`='$userId'";
                                        $quaResult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaResult);
                                        if($quaExistRows == 0) { 
                                    ?>
                                            <form action="partials/_manageCart.php" method="POST">
                                              <input type="hidden" name="itemId" value="<?php echo $donutId ?>">
                                              <button type="submit" name="addToCart" class="add-to-cart">Add to Cart</button>
                                        <?php } else { ?>
                                            <a href="viewCart.php" style="text-decoration: none;">
                                              <button class="add-to-cart">Go to Cart</button>
                                            </a>
                                    <?php } 
                                    } else { ?>
                                        <button class="add-to-cart" data-toggle="modal" data-target="#loginModal">Add to Cart</button>
                                    <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } } else {
                        ?> <h6>No result found<h6> <?php
                    } ?>
                </div>
            </div>
<?php
}    
?>
<?php require 'partials/_footer.php' ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    
</body>
</html>
