<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<script src="js/jquery.js" ></script>
<script src="js/jquery.min.js"></script>
<?php 
session_start();
include('config.php');
$id=$_SESSION['sellerid'];
$_SESSION['sellerid']=$id;
?>

<style>
.banner
{
	margin:20px;
}
    	.row{
		    margin-top:40px;
		    padding: 0 10px;
		}
		.clickable{
		    cursor: pointer;   
		}
 .panel-primary .panel-heading  {
		font-size: 15px;
		background-color:#367d44;
		border-color:#367d44;
		}
		.panel-primary   {
				border-color:#367d44;
		}
		.panel-heading div {
		font-size: 15px;
		
		}
		.panel-heading div span{
			margin-left:5px;
		}
		.panel-body{
			display: none;
		}
		.menu
		{
			margin-top:100px;
		}
		.menu a
		{
			font-size:22px;
			color:#367d44;
			margin-right:20px;
			text-decoration:none;
		}
		.menu .active
		{
			background-color:#367d44;
			padding:10px;
			border-radius:3px;
			text-decoration:none;
			color:#fff;
		}
		.width
		{
			width:400px;
			margin-top:50px;
		}
		
</style>

</head>
<body>


<div class="banner">
<img src="images/b1.jpg" class="img-responsive" />
</div>

<div class="menu">
<div class="container">
<ul class="list-inline">
<li><a href="add.php">Add new products</a></li>
<li ><a href="remove.php"  class="active">Remove products</a></li>
<li><a href="app.php">View bidding application</a></li>
<li><a href="view_chat.php">View</a></li>
<li><a href="sell_chat.php">Chat</a></li>
<li><a href="logout.php">Log out</a></li>
</ul>
</div>
</div>

<div class="container">
<div class="width">

<h3>Remove product</h3>
						<form  method="post" enctype="multipart/form-data">
                                   <div class="form-group">
                                     <label>Prod name</label>
										<input type="text" name="prodname"   class="form-control" placeholder="Product name" >
									</div>
                                    
								                                                                                                                                   
                                  	<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="remove"   class="form-control btn btn-register" value="Remove">
											</div>
										</div>
									</div>
							
    </form>
   </div>	
        
</div>





<?php
if(isset($_POST['remove']))
{

	$prodname=$_POST['prodname'];
	$sql="Delete from product where prodname='$prodname'";
	$res=mysqli_query($conn,$sql);
	if($res)
	{
		echo '<script>alert("Successfully removed");</script>';
		
	}
	
}
ob_end_flush();
?>

  </html>
</body>