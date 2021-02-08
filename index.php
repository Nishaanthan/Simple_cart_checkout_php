<?php
ob_start();
session_start();
require 'connection.php';
?>
<!DOCTYPE html>
<html style="">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">

	<style>
		* {
			box-sizing: border-box;
		}

		.menu {
			float: left;
			width: 22%;
			/*background-color:#9FA9AB;*/
			margin-left: 2px;

		}

		.menuitem {

			/*background-color:#2D69EB;*/
		}

		.menuitemlist {
			padding: 5px;
			margin-top: 5px;
			/*background-color: #f1f1f1;*/
		}

		.main {
			float: left;
			width: 76%;
			overflow: hidden;
			margin-left: 0px;
		}

		.submain {
			float: left;
			width: 60%;
			overflow: hidden;
			margin-left: 0px;
			margin-right: 0px;
		}

		.right {
			/*background-color:#f1f1f1;*/
			float: left;
			width: 35%;
			margin-left: 5px;
			margin-right: 0px;
		}

		.col,
		h4,
		.close {
			background-color: #2263AC;

			text-align: center;
			font-size: 30px;
		}

		.c {
			color: red;

			text-align: center;
		}

		.panelConfig {
			float: left;
			max-width: 32.2%;
			max-hight: 50%;
			margin-left: 5px;
			margin-top: 20px;
		}

		.panelConfigs {
			float: left;
			max-width: 100%;
			max-hight: 100%;
			margin-left: 8px;
			margin-right: 10px;
			margin-bottom: 20px;
			margin-top: 20px;
		}

		@media only screen and (max-width:800px) {

			/* For tablets: */
			.main {
				width: 80%;
				padding: 10px;
			}

			.right {
				width: 100%;
			}
		}

		@media only screen and (max-width:500px) {

			/* For mobile phones: */
			.menu,
			.main,
			.right {
				width: 100%;
			}
		}

		/*these all are button*/
		@media (max-width: 768px) {
			.btn {
				font-size: 11px;
				padding: 4px 6px;
			}
		}

		@media (min-width: 768px) {
			.btn {
				font-size: 12px;
				padding: 6px 12px;
			}
		}

		@media (min-width: 992px) {
			.btn {
				font-size: 14px;
				padding: 8px 12px;
			}
		}

		@media (min-width: 1200px) {
			.btn {
				padding: 10px 16px;
				font-size: 18px;
			}
		}
	</style>
</head>

<body style="font-family:Verdana;">


	<nav class="navbar navbar-inverse">
		<div class="container-fluid">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-phone"></span> Shopping
				</a>
			</div>

			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav nav-pills navbar-right">
					<li><a href="index.php"><span class="glyphicon glyphicon-home"></a></li>
					<li>
						<div>
							<form class="navbar-form " role="search" method="post" action="index.php">
								<div class="input-group">
									<input type="text" style="height:37px; min-width:250px; display:inline-block" class="form-control " placeholder="Search" name="keyword" id="keyword">
									<div class="input-group-btn">
										<button class="btn btn-primary" style="height:37px;" type="submit"><i class="glyphicon glyphicon-search"></i></button>
									</div>
								</div>
							</form>

						</div>
					</li>
					
					<li><a href="editCart.php" id="cart"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
				</ul>

			</div>
		</div>
	</nav>


	<?php //print_r($_COOKIE); 
	?>
	<div style="overflow:hidden" class="menu">
		<div class="btn-group-vertical" class="menuitem">
			<button type="button" class="btn btn-primary "><b>Category</b></button>
			<?php
			$sql = "select * from catagories";
			if ($result = mysqli_query($con, $sql)) {
				while ($row = mysqli_fetch_row($result)) {
					echo '<button type="button" class="btn btn-default"><a href="index.php?category=' . $row[0] . '">' . $row[1] . '</a></button>';
				}
				mysqli_free_result($result);
			}
			?>
		</div>
	</div>

	<div class="main">
		<div class="tab-content ">
			<div id="home" class="tab-pane fade in active ">
				<div>
					<div class="panel panel-primary">
						<div class="panel-heading">products</div>
						<div class="panel-body">
							<?php
							require("db_rw.php");

							if (isset($_GET["brand"])) {
								$query = "select * from products where p_brand='" . $_GET["brand"] . "'";
								$_SESSION["show"] = "brand";
								$_SESSION["showNo"] = $_GET["brand"]; //get brand Number
								showMain($query);
							} else if (isset($_GET["category"])) {
								$query = "select * from products where p_cat='" . $_GET["category"] . "'";
								$_SESSION["show"] = "category";
								$_SESSION["showNo"] = $_GET["category"]; //get category Number
								showMain($query);
							} else if (isset($_GET["imgDesp"])) {
								$query = "select * from products where p_id='" . $_GET["imgDesp"] . "'";
								//$_SESSION["show"]="category";
								//$_SESSION["showNo"]=$_GET["category"]; //get category Number
								showDesp($query);
							} else if (isset($_POST["keyword"])) {
								$keyword = $_POST["keyword"];
								$query = "SELECT * FROM products WHERE p_title LIKE '%$keyword%'";
								showMain($query);
							} else {
								$query = "select * from products";
								$_SESSION['show'] = "brand";
								$_SESSION["showNo"] = "1";
								showMain($query);
							}

							function showMain($q)
							{

								$jsn = getJSONFromDB($q);
								$jd = json_decode($jsn);

								foreach ($jd as $v) {

									$title = $v->p_title;
									$img = $v->p_img;
									$price = $v->p_price;
									$pro_id = $v->p_id;
									$getbrandOrCategory = $_SESSION['show'];
									$getbrandOrCategoryNo = $_SESSION["showNo"];
									echo "<div class='container panelConfig'>
				  <div class='panel panel-primary'>
					<div class='panel-heading'>$title</div>
					<div class='panel-body'><a href='index.php?imgDesp=$pro_id'><img src='$img' style='max-width:260px; height:220px;'></a></div>
					 <div class='panel-footer'>Rs.$price
					 <button style='float:right;' id='product'  class='btn btn-info btn-xs'>
					 <a href='cart.php?url=$getbrandOrCategory&No=$getbrandOrCategoryNo&productID=$pro_id'>Add To Cart</a></button>						 
					 </div>
					</div>
			</div>";
								}
							}

							function showDesp($q)
							{

								$jsn = getJSONFromDB($q);
								$jd = json_decode($jsn);
								foreach ($jd as $v) {

									$title = $v->p_title;
									$img = $v->p_img;
									$price = $v->p_price;
									$pro_id = $v->p_id;
									$desp = $v->p_desp;
								}
								$ar = explode(";", $desp);

								echo "<div class='container panelConfigs'>
				  <div class='panel panel-primary'>
					<div class='panel-heading'>$title</div>
					<div class='panel-body'>
					<img src='$img' style='width:160px; height:220px;'></br></br></hr>";

								for ($i = 0; $i < sizeof($ar); $i++) {
									echo $ar[$i] . "</br>";
								}
								echo "
					</div>
					 <div class='panel-footer'>Rs.$price
					 <button style='float:right;' id='product'  class='btn btn-info btn-xs'>
					 <a href='cart.php?productID=$pro_id'>Add to cart</a></button>
											
					 </div>
					</div>
			</div>";
							}

							?>
						</div>
						<div class="panel-footer">Created by Bahinthan (ICT/16/808)</div>
					</div>
				</div>
			</div>
		</div>

</body>

</html>