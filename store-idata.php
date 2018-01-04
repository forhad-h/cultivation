<?php

require_once('config.php');	
		
if(!empty($_POST)) {
	
	if(!empty($_POST['date']) &&
	!empty($_POST['name']) &&
	!empty($_POST['uid']) &&
	!empty($_POST['deposit'])
    
	) {
		
		$table_name = str_replace('/', '_', $_POST['date']);
		
		$name = $_POST['name'];
		$uid = $_POST['uid'];
		$deposit = $_POST['deposit'];
		
		$checkt = mysqli_query($coni, "SHOW TABLES LIKE '{$table_name}'");
		
		/*store data*/
		function normal_insert() {
			$insert = "INSERT INTO {$GLOBALS['table_name']} (
			name, uid, deposit) VALUES('".$GLOBALS['name']."', '".$GLOBALS['uid']."', '".$GLOBALS['deposit']."')";
			mysqli_query($GLOBALS['coni'], $insert) or die('Error occured when data insert.');
		}
		
		function namewise_update() {
			$selecti = "SELECT * FROM {$GLOBALS['table_name']} ORDER BY id DESC LIMIT 1";
			$queryi = mysqli_query($GLOBALS['coni'], $selecti);
			$depositi = mysqli_fetch_assoc($queryi);
			
			$select_ti = "SELECT deposit FROM {$GLOBALS['table_name']} WHERE id='{$depositi['uid']}'";
			$query_ti = mysqli_query($GLOBALS['conti'], $select_ti);
			$deposit_ti = mysqli_fetch_assoc($query_ti);
			
			$total_deposit = $deposit_ti['deposit'] + $depositi['deposit'];
			
			$update = "UPDATE {$GLOBALS['table_name']} SET deposit = '{$total_deposit}' WHERE id='{$depositi['uid']}'";
			
			mysqli_query($GLOBALS['conti'], $update);
		}
		
		
		
		
	    if(mysqli_num_rows($checkt) != 1) {
			$create_table = "CREATE TABLE {$table_name} (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			uid INT(5),
			name VARCHAR(30) NOT NULL,
			deposit INT(30)
			)";
			
			if(mysqli_query($coni, $create_table)) {
			    normal_insert();
			}else {
				die('Problem in table creation');
			}
		}else {
			normal_insert();
		}
		
		/*update data center-wise*/
		$checkt = mysqli_query($conti, "SHOW TABLES LIKE '{$table_name}'");
	    if(mysqli_num_rows($checkt) != 1) {
			$create_table = "CREATE TABLE {$table_name} (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			deposit INT(30))";
			
			if(mysqli_query($conti, $create_table)) {
			
			$name_list = array('', 'Md. Mujibur Rahaman - M(Ext.)', 'ANM Jobaer - DM(Mech.)', 'Md. Abdul Kuddus - DM(Ext.)', 'Jiaul Haque - DM(TE)', 'Shahjahan Ali - (CIC)', 'Aslam - (CDA)', 'Shohag - (Guard)');
			}
			
			for($n = 1; $n <= (count($name_list)-1); $n++) {
				$insert_data = "INSERT INTO {$table_name} (name, deposit) 
				VALUES('".$name_list[$n]."', '0')";
				
				mysqli_query($conti, $insert_data);
			}
			
			namewise_update();
		}else {
			namewise_update();
		}
		
		header('Location: index.php?suc=Success');
		
}
}



