<?php
	session_start();
	ob_start();
	if (!isset($_SESSION['user'])){
		header ("Location: login.php");
	}
	if (!isset($_POST['submit'])){
?>	
	<center>
	<form action = '' method = 'POST'>
		<label for = 's_dt'> FROM </label>
		<input type = 'date' name = 's_dt' id = 's_dt'>
		<label for = 'e_dt'> TO </label>
		<input type = 'date' name = 'e_dt' id = 'e_dt'>
		<input type = 'submit' name = 'submit' value = 'submit'/>
	</form>
	</center>
<?php
	}else{
?>
	<style>
		table{
			border: 2px solid black;
			border-collapse:collapse;
		}
		tr td{
			border:1px solid black;
		}
	</style>
	<center>
<?php
	$s = date_format(date_create($_POST['s_dt'].'00:00:00'),'Y-m-d H:i:s');
	$e = date_format(date_create($_POST['e_dt'].'23:59:59'),'Y-m-d H:i:s');
	$dbh = new PDO("informix:host=172.75.100.11; service=50002; database=payroll;server=ofpkr_informix; protocol=onsoctcp; ","pay", "rim@444");
	$qry = "SELECT * FROM visitor WHERE dttm >= '".$s."' AND dttm <= '".$e."' ORDER BY dttm DESC";
	//echo $qry;
	$rs = $dbh->query($qry);
	$row = $rs->fetch(PDO::FETCH_BOTH);
?>
	<h2>Visitor's Pass Report</h2>
	<table>
		<tr>
			<td>Pass Number</td>
			<td>Date Time</td>
			<td>Name</td>
			<td>Address</td>
			<td>Firm Name</td>
			<td>Mobile</td>
			<td>ID Type</td>
			<td>ID Number</td>
			<td>Things Carring</td>
			<td>Section Visit</td>
			<td>Purpose</td>
			<td>Attending Officer</td>
			<td>Remark</td>
			<td>Photo</td>
			<td>Preview</td>
		</tr>
<?php		
	foreach($dbh->query($qry) as $rs){
		echo "<tr>";
		echo "<td>".$rs[0]."</td>";
		echo "<td>".date_format(date_create($rs[1]),'d/m/Y h:i:s')."</td>";
		echo "<td>".$rs[2]."</td>";
		echo "<td>".$rs[3]."</td>";
		echo "<td>".$rs[4]."</td>";
		echo "<td>".$rs[5]."</td>";
		echo "<td>".$rs[6]."</td>";
		echo "<td>".$rs[7]."</td>";
		echo "<td>".$rs[8]."</td>";
		echo "<td>".$rs[9]."</td>";
		echo "<td>".$rs[10]."</td>";
		echo "<td>".$rs[11]."</td>";
		echo "<td>".$rs[12]."</td>";
		echo "<td><img src = '".$rs[13]."' alt = 'pic' width = '80px' height = '100px'/></td>";
		echo "<td><a href = 'pass.php?p=".$rs[0]."' >Click</a></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</center>";
	}
?>