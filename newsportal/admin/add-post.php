<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

// For adding post  
if(isset($_POST['submit']))
{
$event=$_POST['event'];

$posttitle=$_POST['posttitle'];
$catid=$_POST['category'];
$subcatid=$_POST['subcategory'];
$postdetails=$_POST['postdescription'];
$arr = explode(" ",$posttitle);
$url=implode("-",$arr);
if($_FILES["postimage"]["name"] != ''){
$imgfile=$_FILES["postimage"]["name"];
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg",".jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
}
if($_FILES["postdocument"]["name"] != ''){

$docfile=$_FILES["postdocument"]["name"];
// get the document extension
$extensiondoc = substr($docfile,strlen($docfile)-4,strlen($docfile));
// allowed extensions
$allowed_extensionsdoc = array(".doc",".pdf",".docx");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
}

if($_FILES["postaudio"]["name"] != ''){

$audiofile=$_FILES["postaudio"]["name"];
// get the audio extension
$extensionaudio = substr($audiofile,strlen($audiofile)-4,strlen($audiofile));
// allowed extensions
$allowed_extensionsaudio = array(".mp3",".wma",".wav",".aac");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
}
if($_FILES["postvideo"]["name"] != ''){

$videofile=$_FILES["postvideo"]["name"];
// get the video extension
$extensionvideo = substr($videofile,strlen($videofile)-4,strlen($videofile));
// allowed extensions
$allowed_extensionsvideo = array(".mp4",".avi",".3gp",".mov");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
}
       $maxsize = 5242880; // 5MB
if($_FILES["postvideo"]["name"] != ''){

if(!in_array($extensionvideo,$allowed_extensionsvideo))
{
echo "<script>alert('Invalid format. Only mp4 / avi / 3gp / mov formats are allowed');</script>";
}
else if(($_FILES['postvideo']['size'] >= $maxsize) || ($_FILES["postvideo"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
}

} else
if($_FILES["postaudio"]["name"] != ''){


if(!in_array($extensionaudio,$allowed_extensionsaudio))
{
echo "<script>alert('Invalid format. Only mp3 / wma / wav /aac formats are allowed');</script>";
}
else if(($_FILES['postaudio']['size'] >= $maxsize) || ($_FILES["postaudio"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
}

} else
if($_FILES["postdocument"]["name"] != ''){

if(!in_array($extensiondoc,$allowed_extensionsdoc))
{
echo "<script>alert('Invalid format. Only pdf / doc / docx formats are allowed');</script>";
}

} else
if($_FILES["postimage"]["name"] != ''){
 if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
}
else
{
	if($_FILES["postimage"]["name"] != ''){
		
		//rename the document file
$imgnewfile=md5($imgfile).$extension;
// Code for move document into directory
move_uploaded_file($_FILES["postimage"]["tmp_name"],"postimages/".$imgnewfile);

	}
	else {
		$imgnewfile = NULL;
	}
	if($_FILES["postdocument"]["name"] != ''){

//rename the document file
$docnewfile=md5($docfile).$extensiondoc;
// Code for move document into directory
move_uploaded_file($_FILES["postdocument"]["tmp_name"],"postdocuments/".$docnewfile);
}
	else {
		$docnewfile = NULL;
	}
	if($_FILES["postaudio"]["name"] != ''){

//rename the audio file
$audionewfile=md5($audiofile).$extensionaudio;
// Code for move audio into directory
move_uploaded_file($_FILES["postaudio"]["tmp_name"],"postaudio/".$audionewfile);
}
	else {
		$audionewfile = NULL;
	}
	if($_FILES["postvideo"]["name"] != ''){


//rename the video file
$videonewfile=md5($videofile).$extensionvideo;
// Code for move audio into directory
move_uploaded_file($_FILES["postvideo"]["tmp_name"],"postvideo/".$videonewfile);
}
	else {
		$videonewfile = NULL;
	}


$status=1;
$query=mysqli_query($con,"insert into tblposts(PostTitle,CategoryId,SubCategoryId,PostDetails,PostUrl,Is_Active,PostImage,PostDocument,eventdate,PostAudio,PostVideo) values('$posttitle','$catid','$subcatid','$postdetails','$url','$status','$imgnewfile','$docnewfile','$event','$audionewfile','$videonewfile')");
if($query)
{
$msg="Post successfully added ";
}
else{
$error="Something went wrong . Please try again.";    
} 

}
}
function imageResize($imageSrc,$imageWidth,$imageHeight) {

    $newImageWidth =980;
    $newImageHeight =350;

    $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
    imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);

    return $newImageLayer;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>TLRF | Add Post</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
 <script>
function getSubCat(val) {
  $.ajax({
  type: "POST",
  url: "get_subcategory.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
  }
  });
  if (document.getElementById("category").value == '5')

 {       
  document.getElementById("event").disabled = false;

 } else { 

         document.getElementById("event").disabled = true;
 }


  }
  </script>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include('includes/topheader.php');?>
            <!-- ========== Left Sidebar Start ========== -->
             <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Add Post </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Post</a>
                                        </li>
                                        <li>
                                            <a href="#">Add Post </a>
                                        </li>
                                        <li class="active">
                                            Add Post
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

<div class="row">
<div class="col-sm-6">  
<!---Success Message--->  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>


</div>
</div>


                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
<form name="addpost" method="post" enctype="multipart/form-data">
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Post Title</label>
<input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter title" required>
</div>



<div class="form-group m-b-20">
<label for="exampleInputEmail1">Category</label>
<select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
<option value="">Select Category </option>
<?php
// Feching active categories
$ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
while($result=mysqli_fetch_array($ret))
{    
?>
<option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
<?php } ?>

</select> 
</div>
    
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Sub Category</label>
<select class="form-control" name="subcategory" id="subcategory" required>

</select> 
</div>
         
<div class="row">
<div class="col-sm-12">
 <div class="card-box">
 <h4 class="m-b-30 m-t-0 header-title"><b>Event Date</b></h4>

	<input type="date" id="event" name="event" disabled="true">
</div>
</div>
</div>


<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
<textarea class="summernote" name="postdescription" required></textarea>
</div>
</div>
</div>


<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>
<input type="file" class="form-control" id="postimage" name="postimage"  required>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Post Document</b></h4>
<input type="file" class="form-control" id="postdocument" name="postdocument">
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Post Audio</b></h4>
<input type="file" class="form-control" id="postaudio" name="postaudio">
</div>
</div>
</div>


<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Post Video</b></h4>
<input type="file" class="form-control" id="postvideo" name="postvideo">
</div>
</div>
</div>



<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
 <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                        </form>
                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

           <?php include('includes/footer.php');?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
  <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>

    


    </body>
</html>
<?php } ?>