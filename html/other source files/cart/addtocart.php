<?php
	session_start();

	if(isset($_GET['ID']) & !empty($_GET['ID'])){
		if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){

			$items = $_SESSION['cart'];
			$cartitems = explode(",", $items);
			if(in_array($_GET['ID'], $cartitems)){
				header('location: preview.php?status=incart');
			}else{
				$items .= "," . $_GET['ID'];
				$_SESSION['cart'] = $items;
				header('location: store11.php?status=success');

			}

		}else{
			$items = $_GET['ID'];
			$_SESSION['cart'] = $items;
			header('location: preview.php?status=success');
		}

	}else{
		header('location: preview.php?status=failed');
	}
?>
