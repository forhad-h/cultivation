<?php

require_once('config.php');	
		
if(!empty($_POST)) {
	
	if(!empty($_POST['date']) &&
	!empty($_POST['segment']) &&
	!empty($_POST['uid']) &&
	!empty($_POST['description']) &&
	!empty($_POST['amount'])
    
	) {
		
		$table_name = str_replace('/', '_', $_POST['date']);
		
		$segment = $_POST['segment'];
		$uid = $_POST['uid'];
		$description = $_POST['description'];
		$amount = $_POST['amount'];
		
		$checkt = mysqli_query($cone, "SHOW TABLES LIKE '{$table_name}'");
		
		/*store data*/
		function normal_insert() {
			$insert = "INSERT INTO {$GLOBALS['table_name']} (
			uid, segment, description, amount) VALUES('".$GLOBALS['uid']."', '".$GLOBALS['segment']."', '".$GLOBALS['description']."', '".$GLOBALS['amount']."')";
			mysqli_query($GLOBALS['cone'], $insert) or die('Error occured when data insert.');
		}
		
		function segmentwise_update() {
			$selecte = "SELECT * FROM {$GLOBALS['table_name']} ORDER BY id DESC LIMIT 1";
			$querye = mysqli_query($GLOBALS['cone'], $selecte);
			$amounte = mysqli_fetch_assoc($querye);
			
			$select_te = "SELECT amount FROM {$GLOBALS['table_name']} WHERE id='{$amounte['uid']}'";
			$query_te = mysqli_query($GLOBALS['conte'], $select_te);
			$amount_te = mysqli_fetch_assoc($query_te);
			
			$total_amount = $amount_te['amount'] + $amounte['amount'];
			
			$update = "UPDATE {$GLOBALS['table_name']} SET amount = '{$total_amount}' WHERE id='{$amounte['uid']}'";
			
			mysqli_query($GLOBALS['conte'], $update);
		}
		
		
		
		
	    if(mysqli_num_rows($checkt) != 1) {
			$create_table = "CREATE TABLE {$table_name} (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			uid INT(5),
			segment VARCHAR(30) NOT NULL,
			description TEXT,
			amount INT(30)
			)";
			
			if(mysqli_query($cone, $create_table)) {
			    normal_insert();
			}else {
				die('Problem in table creation');
			}
		}else {
			normal_insert();
		}
		
		/*update data center-wise*/
		$checkt = mysqli_query($conte, "SHOW TABLES LIKE '{$table_name}'");
	    if(mysqli_num_rows($checkt) != 1) {
			$create_table = "CREATE TABLE {$table_name} (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			segment VARCHAR(30) NOT NULL,
			amount INT(30))";
			
			if(mysqli_query($conte, $create_table)) {
			
			$name_list = array('', 'Land Lease', 'STP', 'Potato Cultivation', 'Cane Cultivation');
			}
			
			for($n = 1; $n <= (count($name_list)-1); $n++) {
				$insert_data = "INSERT INTO {$table_name} (segment, amount) 
				VALUES('".$name_list[$n]."', '0')";
				
				mysqli_query($conte, $insert_data);
			}
			
			segmentwise_update();
		}else {
			segmentwise_update();
		}
		
		header('Location: index.php?suc=Success');
		
}
}



