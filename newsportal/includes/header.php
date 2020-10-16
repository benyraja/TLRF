
  <div class="header_area">
      <div class="logo floatleft"><a href="index.php"><img src="images/logo.png" alt="" /></a></div>
      <div class="top_menu floatleft">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about-us.php">About</a></li>
          <li><a href="contact-us.php">Contact us</a></li>
          <li><a href="#">Subscribe</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
      <div class="social_plus_search floatright">
        <div class="social">
          <ul>
            <li><a href="#" class="twitter"></a></li>
            <li><a href="#" class="facebook"></a></li>
            <li><a href="#" class="feed"></a></li>
          </ul>
        </div>
        <div class="search">
		                   <form name="search" action="search.php" method="post">

            <input type="text" name="searchtitle" value="Search" id="s" />
            <input type="submit" id="searchform" value="search" />
            <input type="hidden" value="post" name="post_type" />
          </form>
        </div>
      </div>
    </div>
 <div class="main_menu_area">
      <ul id="nav">
			<?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
			while($row=mysqli_fetch_array($query))
			{
				$id = $row['id'];
				?>
                <li>
                      <a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>	
						<ul>
							<?php $querysub=mysqli_query($con,"select SubCategoryId,SubCategory from tblsubcategory where CategoryId='$id'");
							while($rowsub=mysqli_fetch_array($querysub))
							{
							?>

							<li> 
								<a href="subcategory.php?catid=<?php echo htmlentities($rowsub['SubCategoryId'])?>"><?php echo htmlentities($rowsub['SubCategory']);?></a>
							</li>
          				<?php } ?>

						</ul>
				</li>
			<?php } ?>

      </ul>
    </div>