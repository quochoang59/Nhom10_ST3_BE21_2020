<?php session_start();
if (isset($_POST['update'])) {
    
    if (isset($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $value)
        {
            //var_dump($_POST["soluong".$value['id']]);
            if (isset($_POST["soluong".$value['id']])  ) {
                $_SESSION['cart'][$value['id']]["soluong"] = $_POST["soluong".$value['id']];
                
            }
            else
            {
                
            }
        }
    }
}
?>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Nhóm 6</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style2.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                </ul>
                <ul class="header-links pull-right">
                <?php 
						if(!isset($_SESSION['username']))
						{
							echo('<li><a href="./login/login.php"><i class="fa fa-user-o"></i> Login</a></li>');
						}
						else
						{
							echo('<li><a href="./login/login.php"><i class="fa fa-user-o"></i>'.$_SESSION['username'].'</a></li>');
							echo('<li><a href="./login/logout.php"><i class="fa fa-user-o"></i> Logout</a></li>');
						}
						?>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="./img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form method="get" action="result.php">
                                <select class="input-select">
                                    <option value="0">All Categories</option>
                                    <option value="1">Description</option>
                                    <option value="1">Price</option>
                                </select>
                                <input name="keyword" class="input" placeholder="Search here">
                                <button type="submit" class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span><a href="cart_view.php">Your Cart</a> </span>
										<div class="qty"></div>
									</a>
								</div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->


</style>
    <!-- CART -->
    <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Shopping Cart</h3>
							<form action="cart_view.php" method="POST">
                            <table  style="width: 100% " >
                            <tr>
                                <th>Name</th>
                                <th>image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                            <?php
                            if(isset($_SESSION['cart']))
                                foreach($_SESSION['cart'] as $value):
                                $tong = $value['price']*$value["soluong"];
                                
                            ?>
                            <tr>
                                <td><?php echo ($value['name']); ?></td>
                                <td>
                                  <img width="100%"  height="60" src="./img/<?php echo $value['image'] ;?>" alt="">
                                </td>
                                <td><input type="number" name="soluong<?php echo($value['id']); ?>" value="<?php echo($value["soluong"]);?>" min="1" max="5" ></td>
                                <td><?php echo number_format($value['price']); ?>VNĐ</td>
                                <td><?php echo number_format($tong); ?>VNĐ</td>
                                <td><a href="delete.php?id=<?php echo($value['id'])?>">DELETE</a></td> 
                                
                                
                            </tr>
                            
                            <?php endforeach ?>
                            
                            </table>
                            
                            <button style="margin: 10px" type="submit" name="update">UPDATE CART</button>
                            
                            
                            </form>
                            
								
							
						</div>
    
    <!-- CART -->


    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <? include "footer.php";?>