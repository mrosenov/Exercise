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
				$id = $_GET['id'];
				$Query = "SELECT * FROM products WHERE productID='$id'";
				
				if ($Result = $DBConnect->query($Query)) 
				{	
					while ($row = $Result->fetch_assoc()) 
					{
						$name = $row["name"];
						$shortDesc = $row["shortDesc"];
						$longDesc = $row["longDesc"];
						$price = $row["price"];
						$image = $row["image"];
						echo '
							<div class="card mb-3" style="max-width: 540px;">
							  <div class="row g-0">
								<div class="col-md-4">
								  <img src="'.$image.'" class="img-fluid rounded-start">
								</div>
								<div class="col-md-8">
								  <div class="card-body">
									<h5 class="card-title fw-bolder">'.$name.'</h5>
									<p class="card-text">'.$shortDesc.'</p>									
									<p class="card-text">'.$longDesc.'</p>									
									<p class="card-text fw-bolder">'.$price.'$</p>									
								  </div>
								</div>
							  </div>
							</div>						
						';
					}
				}					
				?>
    </div>
	
    <div class="col">
		<form method="post" action="success.php">
		  <div class="form-group">
			<label for="name">Name:</label>
			<input name="customerName" type="text" class="form-control" id="name">
			<?php echo '
			<input name="productID" value="'.$id.'" type="text" class="form-control" id="productID" hidden>
			<input name="productName" value="'.$name.'" type="text" class="form-control" id="productName" hidden>
			';?>
		  </div>
		  <div class="form-group" style="margin-bottom: 5px;">
			<label for="email">Email:</label>
			<input name="customerEmail" type="email" class="form-control" id="email">
		  </div>
		  <button type="submit" name="save" class="btn btn-outline-dark mt-auto">Buy</button>
		</form>
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
