
<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Showroom Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo4.jpg" alt="KIA Logo" class="img-responsive">
                </a>
            </div>
<div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL ?>index.php" style="color: black;">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL ?>category.php" style="color: black;"">Cars</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL ?>about.php" style="color: black;"">about</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo SITEURL ?>contact.php" style="color: black;"">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->