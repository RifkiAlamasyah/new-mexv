<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>New Mexv</title>
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <style>
	 .navbar-fixed {
            position: fixed !important;
            box-shadow: none !important;
			width:100%;
			animation: slideDown 0.5s ease;
        }

	.content-fixed {
		 margin-top : 200px;
	}	
		
		@keyframes slideDown {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(0);
            }
        }
		
  </style>
</head>

<body>
<?= view('components/navbar'); ?>
<?= $this->renderSection('content') ?>
<?= view('components/footer'); ?>
	<!-- Jquery dan Bootsrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
	 
  </script>

</body>

</html>