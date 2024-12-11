<?php
// include('php/query.php');
// session_start();
include('query.php');
include("header.php");

?>


<?php

if(isset($_GET['checkout'])){
		$uid =   $_SESSION['userid'];
		$uname = $_SESSION['username'];
		if(isset($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $key){
			$pid   =    $key['proId']  ;
			$pname =	$key['proName']  ;
			$pqty  = 	$key['proQty']  ;
			$price =	$key['proPrice'] ;
		}}

		$myQuery = mysqli_query($con,"insert into orders(uid,uname,pid,pname,pprice,pqty) values ('$uid','$uname','$pid','$pname','$price','$pqty')");
		echo "<script>alert('order placed successfully');
		location.assign('index.php')</script>";
		unset($_SESSION['cart']);
}

?>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
								<th class="column-1">Product Id</th>
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
<?php
if(isset($_SESSION['cart'])){
	foreach($_SESSION['cart'] as $key => $value){
		$total = $value['proQty']*$value['proPrice'];
		?>
		
		<tr class="table_row">
								<td class="column-1"><?php echo $value['proId']?></td>
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="../adminpanel/img/<?php echo $value['proImage']?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $value['proName']?></td>
									<td class="column-3"><?php echo $value['proPrice']?></td>
									<td class="column-4">
									<?php echo $value['proQty']?>
									</td>
									<td class="column-5"><?php echo $total?></td>
								</tr><?php
	}
}
?>

								

							
							</table>
						</div>

						
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									$79.65
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo  $_SESSION['userid']?>hello
								</span>
							</div>
						</div>
							<?php
							if(isset($_SESSION['username'])){

							?>
						<a href="?checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout 
							<!-- <?php echo $_SESSION['userid']?> -->
							<input type="hidden" value='<?php echo $_SESSION['username']?>'>
						</a>
						<?php
						}
						else{
							?>
								<a href="login.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							    Proceed to Checkout
						</a>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</form>
		
	
		

	<?php
include("footer.php");
?>