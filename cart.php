<?php
	include("connection.php");
	session_start();
	//session_destroy();
	function display_cart(){
		global $dbc;$q = mysql_query("SELECT `id`,`image`,`name`,`desc`,`price` FROM cart WHERE `quantity` > 0");
		$num = mysql_num_rows($q);
		while($fetch = mysql_fetch_assoc($q)){
		echo '<a href="cart.php?add='.$fetch['id'].'"><img src="images/'.$fetch['image'].'" width="120" height="120" /></a>&nbsp;'; 
			
			
		}
	}
if(isset($_GET['add']) && !empty($_GET['add'])){
	$id = $_GET['add'];
	$q = mysql_query("SELECT `id`, `quantity` FROM cart WHERE `id`= '".$id."'");
	while($quantity = mysql_fetch_assoc($q)) {
		if($quantity['quantity'] != @$_SESSION['cart_'.$id]){
			echo @$_SESSION['cart_'.$id]+=1;
		}
		header('Location:index.php');
	}
	
	
}
if (isset($_GET['remove'])){
	$_SESSION['cart_'.$_GET['remove']]--;
	header('Location:index.php');
}

if (isset($_GET['delete'])){
	$_SESSION['cart_'.$_GET['delete']]=0;
	header('Location:index.php');
}
function product(){
	$net_payment=0;
	foreach($_SESSION as $name => $value){
		if($value > 0)
		{
			if(substr($name,0,5) == 'cart_'){
				$id = substr($name,5,(strlen($name-5)));
			$q = mysql_query("SELECT `id`, `shipping`, `name`, `price` FROM cart WHERE `id` = '".$id."'");
			while($get = mysql_fetch_assoc($q)){
				$total = $value * $get['price'];
				echo $get['name'].'&nbsp;<a id="roti" class="count" href="cart.php?remove='.$id.'"> - </a>'.$value.'<a id="roti" class="count" href="cart.php?add='.$id.'"> + </a>&nbsp;₹'.$total.'<a id="roti" class="count" href="cart.php?delete='.$id.'"> x </a><br />';
				
			}
			}
			$net_payment+=$total;
		}
	}
	if($net_payment < 50){
		echo"Minimum order is 50";
	}else{
		echo "Total = Rs ".$net_payment.'<br /><a href="#">Checkout</a>';
		?>
		
		
		
		<?php
	}
}

?>