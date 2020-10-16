
   
   <div class="footer_bottom_area">
      <div class="footer_menu">
        <ul id="f_menu">
		<?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
			while($row=mysqli_fetch_array($query))
			{
				$id = $row['id'];
				?>
            
          <li> <a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>	
					</li>
		            				<?php } ?>

        </ul>
      </div>
      <div class="copyright_text">
        <p>Copyright &copy; 2020 The TLRF Inc. All rights reserved | Design by <a target="_blank" rel="nofollow" href="http://localhost/tlrf/newsportal/index.php">Shilpa Beny</a></p>
      </div>
    </div>
