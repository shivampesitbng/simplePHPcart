<?php include("cart.php"); 
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
		<title>Shopping Cart</title>
		<link rel="icon" type="image" href="images/cart.png" />
		
	</head>
	<body>
		<header id="heading">
				<!--img id="logo" src="images/1.png" height="65" width="140" />
				<h1>TheProgrammingNerd1</h1-->
		</header>
			<div id="main_div">
				<h3>Shopping Cart</h3>
					<div id="division">
								<section id="main_section">
									<?php display_cart(); ?>
								
								</section>
								<aside id="side">
									<span class="your_cart">Your Cart</span>&nbsp;<br>
									<?php product(); ?>
								
								</aside>
					</div>
			</div>
		
		
		</header>
	</body>
<html>