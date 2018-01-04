<?php
   require_once('functions.php');
   get_header();
   $table =  str_replace('/', '_', $_GET['date']);
?>
<body>
	<?php
		$select = "SELECT * FROM {$table} ORDER BY id DESC";
		$query = mysqli_query($cone, $select);
	?>
	<div class="col-sm-8 col-sm-offset-2">
	<div class="section all-record">
	<div class="clearfix">
		<h2 class="pull-left">All expenditure</h2>
		<span class="pull-right"><?= $_GET['date'];?></span>
	</div>
	<table class="table table-striped">
	    <thead>
		<tr>
		    <th>ID</th>
		    <th>Segment</th>
		    <th>Description</th>
			<th>Amount</th>
		</tr>
		</thead>
		<tbody>
		<?php
		    while($row = mysqli_fetch_assoc($query)) {
		?>
		<tr>
		    <td><?= $row['id'];?></td>
		    <td><?= $row['segment'];?></td>
		    <td><?= $row['description'];?></td>
		    <td><?= $row['amount'];?></td>
		</tr>
	    <?php } ?>
	
		</tbody>
	</table>
	</div>
	</div>
	<?php get_footer();?>