<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<script src="js/jquery.js" ></script>
<script src="js/jquery.min.js"></script>
<?php 
error_reporting(0);
session_start();
$id=$_SESSION['bidderid'];
$_SESSION['bidderid']=$id;
include('config.php');
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
		
</style>
<script>

(function(){
    'use strict';
	var $ = jQuery;
	$.fn.extend({
		filterTable: function(){
			return this.each(function(){
				$(this).on('keyup', function(e){
					$('.filterTable_no_results').remove();
					var $this = $(this), 
                        search = $this.val().toLowerCase(), 
                        target = $this.attr('data-filters'), 
                        $target = $(target), 
                        $rows = $target.find('tbody tr');
                        
					if(search == '') {
						$rows.show(); 
					} else {
						$rows.each(function(){
							var $this = $(this);
							$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
						})
						if($target.find('tbody tr:visible').size() === 0) {
							var col_count = $target.find('tr').first().find('td').size();
							var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
							$target.find('tbody').append(no_results);
						}
					}
				});
			});
		}
	});
	$('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
	$('[data-action="filter"]').filterTable();
	
	$('.container').on('click', '.panel-heading span.filter', function(e){
		var $this = $(this), 
			$panel = $this.parents('.panel');
		
		$panel.find('.panel-body').slideToggle();
		if($this.css('display') != 'none') {
			$panel.find('.panel-body input').focus();
		}
	});
	$('[data-toggle="tooltip"]').tooltip();
})
</script>
</head>
<body>
<div class="banner">
<img src="images/b1.jpg" class="img-responsive" />
</div>

<div class="menu">
<div class="container">
<ul class="list-inline">
<li><a href="view.php">View products</a></li>
<li><a href="userview.php">Bidding info</a></li>
<li><a href="bid.php" >Bid</a></li>
<li><a href="status.php" >View Bidding status</a></li>
<li><a href="chat.php" class="active" >Chat</a></li>
<li><a href="sell_rply.php">Answer</a></li>
<li><a href="logout.php">Log out</a></li>
</ul>
</div>
</div>
<div class="container">
<div class="panel panel-primary">
<form name="login" action="" method="post">
<table class="table table-hover" id="dev-table"> 
<h4 style="margin-left:15px;">Chat Option</h4>
<tr><td>Bidder Name</td><td>:</td><td><input type="text" name="bidder_name" value="" size="50" style="width:320px;" /></td></tr> 
<tr><td>Chat</td><td>: </td><td><textarea type="text" name="chat" value="" size="50" style="width:320px;height:100px" /></textarea></td></tr>
<tr align="center"><td colspan="3"><input type="submit"  value="Submit" name="submit"/></td></tr>
</table>
</form>
</div>
</div>
<?php
if(isset($_POST['submit'])&&(!empty($_POST['bidder_name'])))
{
$bidder_name=$_POST['bidder_name'];
$chat=$_POST['chat'];
$sql=mysql_query("insert into question(id,bidder_name,chat)values('','$bidder_name','$chat')");
$number=mysql_num_rows($sql);
if($number)
{
$con=mysql_query("select * from question where bidder_name='$bidder_name' and chat='$chat'");
while($row=mysql_fetch_array($con))
{
$_SESSION['id']=$row['bidder_name'];
//$_SESSION['register_no']=$register_no=$row['register_no'];
//$_SESSION['current_details']=$row['register_no'];
}
$count=mysql_num_rows($con);
if($count)
{
echo "<script type='text/javascript'>alert('Chat send successfully');</script>";
//echo "<meta http-equiv='refresh' content='0;url=student_login.php'>";
}
}
}
?>
</body>
</html>