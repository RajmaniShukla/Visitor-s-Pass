<?php
	session_start();
	ob_start();
	if (!isset($_SESSION['user'])){
		header ("Location: login.php");
	}
?>

<html>
	<head>
		<title>GATE PASS</title>
		<link rel = "stylesheet" href = "style/mysheet.css"/>
		<script type = "text/javascript" src = "script/myscript.js"></script>
	</head>
	<?php
		$datetime = date("d/m/Y h:iA");
		$pass_no = date("ymd");
		$dbh = new PDO("informix:host=172.75.100.11; service=50002; database=payroll;server=ofpkr_informix; protocol=onsoctcp; ","pay", "rim@444");
		$q = "SELECT MAX(pass_no) a FROM visitor WHERE pass_no[1,6] = '".$pass_no."'";
		//echo $q;
		$res = $dbh->query($q);
		$row = $res-> fetch(PDO::FETCH_OBJ);
		if ($row->A != '')
			$pass_no = $row->A + 1;
		else 
			$pass_no .= '0001';
		//phpinfo();
	?>
	<body>
		<ul>
			<li class = 'nav'><a href = 'logout.php'> Logout</a></li>
			<li class = 'nav'><a href = 'report.php'> Visitor Pass Report</a></li>
		</ul>
		<div id = 'con'>
			<h2>ORDNANCE FACTORY PROJECT KORWA, AMETHI</h2>
			
				<table id = 'pass_tb'>
				<?php echo "<form action = 'insert.php?pn=".$pass_no."&dttim=".$datetime."' method = 'POST' enctype='multipart/form-data'>";?>
					<tr id = 'tb_hd'>
						<td>Pass No.:<?php echo $pass_no;?></td>
						<td colspan=2>Date-Time: <?php echo $datetime;?></td>
					</tr>
					<tr>
						<td colspan = 3> <hr/><input type='text' name = 'p_name' placeholder = "Name of Person*" required /></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='text' name = 'address' placeholder = "Address*" required /></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='text' name = 'fm_name' placeholder = "Name of Firm"/></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='text' name = 'p_mobile' placeholder = "Mobile Number/Contact Nunber*" required /></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='text' name = 'id_typ' placeholder = "ID Type*: AADHAR,PAN,DL,etc..." required /></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='text' name = 'id_number' placeholder = "ID Number*" required /></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='text' name = 'cr_thn' placeholder = "Items Carrying(if any) comma seperated" /></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='text' name = 'purps' placeholder = "Purpus of Visit*" required /></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='text' name = 'sec_vis' placeholder = "Visiting Section"/></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='text' name = 'atdn_ofr' placeholder = "Name of Attending Officer"/></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='text' name = 'rmk' placeholder = "Remark..."/></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='file' name = 'upl_pic' accept = "image/*" required id = 'upl_pic'/></td>
					</tr>
					<tr>
						<td colspan = 3> <input type='submit' name = 'submit' value="Submit"/></td>
					</tr>
				</form>
				</table>
		<div>
	</body>
<html>
