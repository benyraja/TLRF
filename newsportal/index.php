<?php 
session_start();
include('includes/config.php');

    ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>TamilNadu LRF</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="assets/font/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="assets/font/font.css" />
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css" media="screen" />
</head>
<body>
<div class="body_wrapper">
  <div class="center">
      <!-- Navigation -->
   <?php include('includes/header.php');?>
      

    <div class="slider_area">
      <div class="slider">
        <ul class="bxslider">
		<?php 


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.eventdate > CURRENT_TIMESTAMP and tblposts.Is_Active=1 and tblposts.CategoryId=5 order by tblposts.eventdate asc  LIMIT 3");
while ($row=mysqli_fetch_array($query)) {
?>

          <li><img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" title="<?php echo htmlentities($row['posttitle']);?>"  /></li>
		  <?php } ?>
          </ul>
      </div>
    </div>
    <div class="content_area">
      <div class="main_content floatleft">
        <div class="left_coloum floatleft">
			<?php $querycat=mysqli_query($con,"select id,CategoryName from tblcategory");
			while($rowcat=mysqli_fetch_array($querycat))
			{
				$id = $rowcat['id'];
				?>

          <div class="single_left_coloum_wrapper">
            <h2 class="title"><?php echo htmlentities($rowcat['CategoryName']);?></h2>
            <a class="more" href="category.php?catid=<?php echo htmlentities($rowcat['id'])?>">more</a>
			<?php 
        


$querypost=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=$id and tblposts.Is_Active=1 order by tblposts.id desc LIMIT 3");

$rowcount=mysqli_num_rows($querypost);
if($rowcount==0)
{
echo "No record found";
}
else {
while ($rowpost=mysqli_fetch_array($querypost)) {


?>

            <div class="single_left_coloum floatleft"> <img src="admin/postimages/<?php echo htmlentities($rowpost['PostImage']);?>" alt="<?php echo htmlentities($rowpost['posttitle']);?>" />
              <h3><?php echo htmlentities($rowpost['posttitle']);?></h3>
              <a class="readmore" href="news-details.php?nid=<?php echo htmlentities($rowpost['pid'])?>">read more</a> </div>
<?php 
}
}
 ?>

          </div>
		  <?php
		  } 
		  ?>

        </div>
        <div class="right_coloum floatright">
          <div class="single_right_coloum">
            <h2 class="title">from the desk</h2>
            <ul>
              <li>
                <div class="single_cat_right_content">
                  <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit</h3>
                  <p>Nulla quis lorem neque, mattis venen atis lectus. In interdum ull amcorper dolor eu mattis.</p>
                  <p class="single_cat_right_content_meta"><a href="#"><span>read more</span></a> 3 hours ago</p>
                </div>
              </li>
              <li>
                <div class="single_cat_right_content">
                  <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit</h3>
                  <p>Nulla quis lorem neque, mattis venen atis lectus. In interdum ull amcorper dolor eu mattis.</p>
                  <p class="single_cat_right_content_meta"><a href="#"><span>read more</span></a> 3 hours ago</p>
                </div>
              </li>
              <li>
                <div class="single_cat_right_content">
                  <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit</h3>
                  <p>Nulla quis lorem neque, mattis venen atis lectus. In interdum ull amcorper dolor eu mattis.</p>
                  <p class="single_cat_right_content_meta"><a href="#"><span>read more</span></a> 3 hours ago</p>
                </div>
              </li>
            </ul>
            <a class="popular_more" href="#">more</a> </div>
          <div class="single_right_coloum">
            <h2 class="title">editorial</h2>
            <div class="single_cat_right_content editorial"> <img src="images/editorial_img.png" alt="" />
              <h3>Lorem ipsum dolor sit amet con se cte tur adipiscing elit</h3>
            </div>
            <div class="single_cat_right_content editorial"> <img src="images/editorial_img.png" alt="" />
              <h3>Lorem ipsum dolor sit amet con se cte tur adipiscing elit</h3>
            </div>
            <div class="single_cat_right_content editorial"> <img src="images/editorial_img.png" alt="" />
              <h3>Lorem ipsum dolor sit amet con se cte tur adipiscing elit</h3>
            </div>
            <div class="single_cat_right_content editorial"> <img src="images/editorial_img.png" alt="" />
              <h3>Lorem ipsum dolor sit amet con se cte tur adipiscing elit</h3>
            </div>
          </div>
        </div>
      </div>
       <?php include('includes/sidebar.php');?>

    </div>
    <div class="footer_top_area">
      <div class="inner_footer_top"> <img src="images/add3.png" alt="" /> </div>
    </div>
	    <!-- Footer -->
 <?php include('includes/footer.php');?>

  </div>
</div>
<script type="text/javascript" src="assets/js/jquery-min.js"></script> 
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/js/jquery.bxslider.js"></script> 
<script type="text/javascript" src="assets/js/selectnav.min.js"></script> 
<script type="text/javascript">
selectnav('nav', {
    label: '-Navigation-',
    nested: true,
    indent: '-'
});
selectnav('f_menu', {
    label: '-Navigation-',
    nested: true,
    indent: '-'
});
$('.bxslider').bxSlider({
    mode: 'fade',
    captions: true
});
</script>
</body>
</html>