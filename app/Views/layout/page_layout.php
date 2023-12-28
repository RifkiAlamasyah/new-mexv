<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Protal Berita Codeigniter</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">MEXV</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= (current_url(true)->getPath() == '/index.php/') ? 'active' : '' ?>" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (current_url(true)->getPath() == '/index.php/login') ? 'active' : '' ?>" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (current_url(true)->getPath() == '/our-product') ? 'active' : '' ?>" href="/our-product">Our Product</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php 
var_dump(current_url(true)->getPath());

?>


	<!-- <header class="jumbotron jumbotron-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="h1">Portal Berita Codeigniter</h1>
				</div>
			</div>
		</div>
    </header> -->
    
    <?= $this->renderSection('content') ?>

	<footer class="jumbotron jumbotron-fluid mt-5 mb-0">
		<div class="container text-center">Copyright &copy <?= Date('Y') ?> CI News</div>
	</footer>

	<!-- Jquery dan Bootsrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>