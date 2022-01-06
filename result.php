<?php

	include "header.php";


?>
	<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						
						<!-- /aside Widget -->

						

						

						<!-- aside Widget -->
						
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->


						<!-- store products -->
						<div class="row">

							<?php if(isset($_GET['keyword']))
							{
							
								$keyword = $_GET['keyword'];
								// hiển thị 1 sản phẩm trên 1 trang
                                $perPage = 1;
                                // Lấy số trang trên thanh địa chỉ
                                if(isset($_GET['page']))
                                {
                                    $page = $_GET['page'];
                                }
                                else{
                                    $page=1;
                                }
								$search2 = $product->search2($keyword);
								$total = count($search2);
                                $url = $_SERVER['PHP_SELF']."?keyword=".$keyword;
								$search = $product->search($keyword,$page,$perPage);
							}
							foreach($search as $value):
							?>
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
										<div class="product-label">
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'])?>VND</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
										<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"><a class="btn btn-info btn-sm" href="detail.php?id=<?php echo $value ['id'] ?>">quick view </a></span></button>
										</div>
									</div>
									<div class="add-to-cart">
									<form action="cart.php?id=<?php echo($value['id'])?>" method="POST">
											<button type="submit" name="addtocart" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</form>
									</div>
								</div>
								
							</div>
								<!-- /product -->
								<?php 
							endforeach;
							?>	
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
							<?php echo $manu->paginate($url, $total, $page, $perPage);?>
								
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

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

<?php include "footer.php" ?>