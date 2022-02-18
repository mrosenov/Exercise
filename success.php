<?php
include ("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FRONT SHOP - Exercise</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">FRONT SHOP - Exercise</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
<div class="container">
  <div class="row">
    <div class="col">
		<?php
			if(isset($_POST['save']))
			{	 
				 $customerName = $_POST['customerName'];
				 $customerEmail = $_POST['customerEmail'];
				 $productID = $_POST['productID'];
				 $productName = $_POST['productName'];
				 $sql = "INSERT INTO sold (productID,customerName,customerEmail) VALUES ('$productID','$customerName','$customerEmail')";
				 
				 $results = $DBConnect->query("SELECT productID FROM products WHERE productID = '$productID'");
				if($results->num_rows === 0)
				{
				   echo '
					<div class="alert alert-danger" role="alert">
					  Incorrect Product!
					</div>
				   ';
				 }
				else
				{ 
				 if (mysqli_query($DBConnect, $sql)) 
				 {
					echo '
					<div class="alert alert-success" role="alert">
					  '.$customerName.', you just bought '.$productName.'
					</div>
					';
				 } 
				}				 
				 mysqli_close($DBConnect);
			}
		?>
    </div>
  </div>
</div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
