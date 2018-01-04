<?php
   require_once('functions.php');
   get_header();
   $table =  str_replace('/', '_', $_GET['date']);
?>
<body>
	<?php
		$select = "SELECT * FROM {$table}";
		$query = mysqli_query($conte, $select);
	?>
	<div class="col-sm-8 col-sm-offset-2">
	<div class="section all-record">
	<div class="clearfix">
		<h2 class="pull-left">Total expenditure</h2>
		<span class="pull-right"><?= $_GET['date'];?></span>
	</div>
	<table class="table table-striped">
	    <thead>
		<tr>
		    <th>SL</th>
		    <th>Segment</th>
			<th>Total amount</th>
		</tr>
		</thead>
		<tbody>
		<?php
		    while($row = mysqli_fetch_assoc($query)) {
		?>
		<tr>
		    <td><?= $row['id'];?></td>
		    <td><?= $row['segment'];?></td>
		    <td><?= $row['amount'];?></td>
		</tr>
	    <?php } ?>
	
		</tbody>
	</table>
	</div>
	</div>
	<?php get_footer();?>