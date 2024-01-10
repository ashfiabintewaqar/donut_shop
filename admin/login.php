<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Login</title>
    <link rel = "icon" href ="/donut_shop/img/logo.jpg" type = "image/x-icon">

<style>
    body{
        margin: 0;
        padding: 0;
	}
	.main {
		width: 100%;
		background: white;
        display: flex;
        justify-content: center;
        align-items: center;
	}

    .left-div {
        flex: 1;
        padding: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .right-div {
        flex: 2;
        height: 100vh;
        background-color: #d3d3d3;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .right-div .card {
        width: 400px;
    }

    .logo img {
        width: 300px;
    }

    @media screen and (max-width: 900px) {
        .main {
            flex-direction: column;
        }


        .right-div .card {
            width: 100%;
        }

        .logo img {
            width: 200px;
        }
    }
    /*
	#login-right {
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left {
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#00000061;
		display: flex;
		align-items: center;
	}
	#login-right .card{
		margin: auto
	}*/
</style>
</head>
<body>
    <div class="main" class="bg-dark">
        <div class="left-div">
            <div class="logo">
                <img src="/donut_shop/img/brand.jpg" alt="">
            </div>
        </div>
        <div class="right-div">
            <div class="card">
                <div class="card-body">
                <form action="partials/_handleLogin.php" method="post">
                    <div class="form-group">
                    <label for="username" class="control-label"><b>Username</b></label>
                    <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="password" class="control-label"><b>Password</b></label>
                    <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <center><button type="submit" class="btn w-100 btn-primary">Login</button></center>
                </form>
                </div>
            </div>
        </div>
    </div>  


    <?php
        if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> Invalid Credentials
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                </div>';
        }
    ?>
</body>
</html>