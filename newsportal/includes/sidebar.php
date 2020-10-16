 <div class="sidebar floatright">
        <div class="single_sidebar"> <img src="images/add1.png" alt="" /> </div>
        <div class="single_sidebar">
          <div class="news-letter">
            <h2>Sign Up for Newsletter</h2>
            <p>Sign up to receive our free newsletters!</p>
            <form action="#" method="post">
              <input type="text" value="Name" id="name" />
              <input type="text" value="Email Address" id="email" />
              <input type="submit" value="SUBMIT" id="form-submit" />
            </form>
            <p class="news-letter-privacy">We do not spam. We value your privacy!</p>
          </div>
        </div>
        <div class="single_sidebar">
          <div class="popular">
            <h2 class="title">Latest Post</h2>
            <ul>
			 <?php
$queryside=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 5");
while ($rowside=mysqli_fetch_array($queryside)) {

?>
              <li>
			 

                <div class="single_popular">
                  <h3><?php echo htmlentities($rowside['posttitle']);?> <a href="news-details.php?nid=<?php echo htmlentities($rowside['pid'])?>" class="readmore">Read More</a></h3>
                </div>
				
              </li>
			              <?php } ?>

            </ul>
            <a class="popular_more">more</a> </div>
        </div>
        <div class="single_sidebar"> <img src="images/add1.png" alt="" /> </div>
        <div class="single_sidebar">
          <h2 class="title">ADD</h2>
          <img src="images/add2.png" alt="" /> </div>
      </div> 
  
  
  
  
  
  
  
  
  
  
  
