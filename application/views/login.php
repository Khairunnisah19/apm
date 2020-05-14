<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <title>Blog Sederhana</title>
		<link rel="stylesheet" href="<?php echo base_url().'../../assets/bootstrap/css/bootstrap.css'; ?>" />
        <link rel="stylesheet" href="<?php echo base_url().'../../assets/bootstrap/css/style.css'; ?>" />
        <link rel="stylesheet" href="<?php echo base_url().'../../assets/font-awesome/css/font-awesome.css'; ?>" />
</head>	
		
<body class="bg-light">

<?php include("header.php"); ?>
<nav class="navbar navbar-default"><?php include("menu.php"); ?></nav>



<div class="container wrap">
    <div class="row">
        <div class="col-md-6">
		
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username atau email" />
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />
        </form>
        <br/><br/>    
        </div>
    </div>
</div>
    
<?php include("footer.php"); ?>

    </body>
</html>
