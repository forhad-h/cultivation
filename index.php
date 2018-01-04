<?php
   require_once('functions.php');
   get_header();
?>
<body>
    <div class="container">
	<div class="row">
		<div class="col-sm-6">
		<div class="section">
			<div class="clearfix">
			    <h2 class="pull-left">Add investment</h2>
				<div class="pull-right search-btn">
					<form method="get" action="all-investment.php"  target="_blank">
						<input type="text" name="date" id="aidate" placeholder="Enter date for search"/>
						<button type="submit" class="btn btn-xs btn-primary">All Records</button>
					</form>
					<form method="get" action="total-investment.php"  target="_blank">
						<input type="text" name="date" id="tidate" placeholder="Enter date for search"/>
						<button type="submit" class="btn btn-xs btn-primary">Total</button>
					</form>
				</div>
			</div>
			<form method="post" action="store-idata.php">
			  <div class="form-group">
				<label for="idate" class="control-label">Date</label>
				<input type="text" class="form-control" id="idate" name="date" placeholder="Date">
			  </div>
			  <div class="form-group">
				<label for="name" class="control-label">Name</label>
				<select class="form-control" id="name" name="name">
					  <option value="">Select Name</option>
					  <option id="nothing">Md. Mujibur Rahaman - M(Ext.)</option>
					  <option>ANM Jobaer - DM(Mech.)</option>
					  <option>Md. Abdul Kuddus - DM(Ext.)</option>
					  <option>Jiaul Haque - DM(TE)</option>
					  <option>Shahjahan Ali - (CIC)</option>
					  <option>Aslam - (CDA)</option>
					  <option>Shohag - (Guard)</option>
				</select>
				<input type="hidden" id="iuid" name="uid" class="form-control"/>
			  </div>
			  <div class="form-group">
				<label for="deposit" class="control-label">Deposit (Taka)</label>
				<input type="text" class="form-control" id="deposit" name="deposit" placeholder="Deposit">
			  </div>
			  <div class="form-group">
				  <button type="submit" class="btn btn-success btn-lg center-block">SUBMIT</button>
			  </div>
			</form>
		</div>
		<form action="get_icsv.php" method="get">
			<input  type="text" id="cidate" name="date">
			<input type="submit" class="btn btn-sm btn-default" value="Get CSV">
		</form>
		</div>
		<div class="col-sm-6">
		<div class="section">
		    <div class="clearfix">
				<h2 class="pull-left">Add expenditure</h2>
				<div class="pull-right search-btn">
					<form method="get" action="all-expenditure.php"  target="_blank">
						<input type="text" name="date" id="aedate" placeholder="Enter date for search"/>
						<button type="submit" class="btn btn-xs btn-primary">All Records</button>
					</form>
					<form method="get" action="total-expenditure.php"  target="_blank">
						<input type="text" name="date" id="tedate" placeholder="Enter date for search"/>
						<button type="submit" class="btn btn-xs btn-primary">Total</button>
					</form>
				</div>
			</div>
			<form method="post" action="store-edata.php">
			  <div class="form-group">
				  <label for="edate" class="control-label">Date</label>
				  <input type="text" class="form-control" id="edate" name="date" placeholder="Date">
			  </div>
			  <div class="form-group">
				<label for="segment" class="control-label">Segment</label>
				<select class="form-control" id="segment" name="segment">
					  <option value="">Select Segment</option>
					  <option>Land Lease</option>
					  <option>STP</option>
					  <option>Potato Cultivation</option>
					  <option>Cane Cultivation</option>
				</select>
				<input type="hidden" id="euid" name="uid" class="form-control"/>
			  </div>
			  <div class="form-group">
				<label for="description" class="control-label">Description</label>
				<textarea class="form-control" rows="2" id="description" name="description" placeholder="Description"></textarea>
			  </div>
			  <div class="form-group">
				<label for="amount" class="control-label">Amount (Taka)</label>
				<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
			  </div>
			  <div class="form-group">
				  <button type="submit" class="btn btn-danger btn-lg center-block">SUBMIT</button>
			  </div>
			</form>
	    </div>
		<form action="get_ecsv.php" method="get">
			<input  type="text" id="cedate" name="date">
			<input type="submit" class="btn btn-sm btn-default" value="Get CSV">
		</form>
		</div>
	</div>
	</div>
<?php get_footer();?>