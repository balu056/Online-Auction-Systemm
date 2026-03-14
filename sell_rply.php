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
<li><a href="chat.php">Chat</a></li>
<li><a href="sell_rply.php" class="active">Answer</a></li>
<li><a href="logout.php">Log out</a></li>
</ul>
</div>
</div>
<div class="container">
           <div class="panel panel-primary">
		   <div class="panel-heading">
						<h3 class="panel-title">View Reply</h3>
						<div class="pull-right" style="margin-top:-15px;">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter" />
					</div>
		   
		   
		   <table class="table table-hover" id="dev-table">
          <tr><td>ID</td><td>Seller name</td><td>Chat</td></tr>
          <div>
		  <div>
		  <div>
		  <div>
		  <?php
		$t=mysqli_query($conn,"select * from chat");
		while($j=mysqli_fetch_array($t))
		{
		$id=$j['id'];
		$sname=$j['sname'];
		$answer=$j['answer'];
			
echo "<tr><td>$id</td><td>$sname</td><td>$answer</td></tr>";
				}
				?>
                </table>
             </div>           
         </div>
	</div>	
</div>
</div>
</div>
</body>
</html>
