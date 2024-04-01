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
		// Collecting the get and post data for the form.
		$pass_no = $_GET['p'];
		
		$dbh = new PDO("informix:host=172.75.100.11; service=50002; database=payroll;server=ofpkr_informix; protocol=onsoctcp; ","pay", "rim@444");
		$q = "SELECT * FROM visitor WHERE pass_no = '".$pass_no."'";
		$res = $dbh->query($q);
		$row = $res-> fetch(PDO::FETCH_BOTH);
		foreach($dbh->query($q) as $res){
			$datetime = date_format(date_create($res[1]),'d/m/Y h:i:sA');
			$p_name = $res[2];
			$address = $res[3];
			$fm_name = $res[4];
			$p_mobile = $res[5];
			$id_typ = $res[6];
			$id_number = $res[7];
			$cr_thn = $res[8];
			$sec_vis = $res[9];
			$purps = $res[10];
			$atdn_ofr = $res[11];
			$rmk = $res[12];
			$target_file = $res[13];
		}
		/*Image File Upload code here!*/
	?>
	<body>
		<div id = "master">
			<h2>ORDNANCE FACTORY PROJECT KORWA, AMETHI</h2>
			<div class = 'pass_con'>
				<h3>Visitor Pass</h3>
				<table id = 'pass_pt'>
					<tr>
						<td colspan = 5 class = 'tb_hd'><b>Allowed for daily entry only!</b></td>
					</tr>
					<tr>
						<td colspan = 2 class = 'tb_hd'><b>Pass No.:<?php echo $pass_no;?></b></td>
						<td class = 'tb_hd'><b>Visitor's Copy</b></td>
						<td colspan = 2 class = 'tb_hd'><b>Date-Time <?php echo $datetime;?></b></td>
					</tr>
					<tr>
						<td>Name of Person:</td>
						<td colspan = 2><?php echo $p_name;?></td>
						<td rowspan = 9 colspan=2><img src= '<?php echo $target_file;?>' alt = 'pic' id = 'user_pic'/></td>
					</tr>
					<tr>
						<td>Address:</td>
						<td colspan = 2><?php echo $address;?></td>
					</tr>
					<tr>
						<td>Name of Firm:</td>
						<td colspan = 2><?php echo $fm_name;?></td>
					</tr>
					<tr>
						<td>Mobile Number:</td>
						<td colspan = 2><?php echo $p_mobile;?></td>
					</tr>
					<tr>
						<td>ID Type:</td>
						<td colspan = 2><?php echo $id_typ;?></td>
					</tr>
					<tr>
						<td>ID Number:</td>
						<td colspan = 2><?php echo $id_number;?></td>
					</tr>
					<tr>
						<td>Items Carrying(if any):</td>
						<td colspan = 2><?php echo $cr_thn;?></td>
					</tr>
					<tr>
						<td>Remarks:</td>
						<td colspan = 2><?php echo $rmk;?></td>
					</tr>
					<tr>
						<td>Visiting Section:</td>
						<td colspan = 2><?php echo $sec_vis;?></td>
					</tr>
					<tr>
						<td>Purpose of Visit:</td>
						<td colspan = 2><?php echo $purps;?></td>
					</tr>
					<tr>
						<td>Signature of Visitor</td>
						<td></td>
						<td><b>In Time</b></td>
						<td><b>Out Time</b></td>
						<td><b>Signature</b></td>
					</tr>
					<tr>
						<td rowspan = 4>Name of Attending Officer:</td>
						<td><?php echo $atdn_ofr;?></td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
					</tr>
					<tr>
						<td>.</td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
					</tr>
					<tr>
						<td>.</td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
					</tr>
					<tr>
						<td>.</td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
					</tr>
					<tr>
						<td colspan = 5 class = 'tb_hd'><b>Note: Return this Pass at the time of exit.</b></td>
					</tr>
				
				</table>
			</div>
			<hr border = 2/>
			<!-- <h2>ORDNANCE FACTORY PROJECT KORWA, AMETHI</h2>
			<div class = 'pass_con'>
				<h3>Visitor Pass</h3>
				<table id = 'pass_pt'>
					<tr>
						<td colspan = 5 class = 'tb_hd'><b>Allowed for daily entry only!</b></td>
					</tr>
					<tr>
						<td colspan = 2 class = 'tb_hd'><b>Pass No.:<?php echo $pass_no;?></b></td>
						<td class = 'tb_hd'><b>Office Copy</b></td>
						<td colspan = 2 class = 'tb_hd'><b>Date-Time <?php echo $datetime;?></b></td>
					</tr>
					<tr>
						<td>Name of Person:</td>
						<td colspan = 2><?php echo $p_name;?></td>
						<td rowspan = 9 colspan=2><img src= '<?php echo $target_file;?>' alt = 'pic' id = 'user_pic'/></td>
					</tr>
					<tr>
						<td>Address:</td>
						<td colspan = 2><?php echo $address;?></td>
					</tr>
					<tr>
						<td>Name of Firm:</td>
						<td colspan = 2><?php echo $fm_name;?></td>
					</tr>
					<tr>
						<td>Mobile Number:</td>
						<td colspan = 2><?php echo $p_mobile;?></td>
					</tr>
					<tr>
						<td>ID Type:</td>
						<td colspan = 2><?php echo $id_typ;?></td>
					</tr>
					<tr>
						<td>ID Number:</td>
						<td colspan = 2><?php echo $id_number;?></td>
					</tr>
					<tr>
						<td>Items Carrying(if any):</td>
						<td colspan = 2><?php echo $cr_thn;?></td>
					</tr>
					<tr>
						<td>Remarks:</td>
						<td colspan = 2><?php echo $rmk;?></td>
					</tr>
					<tr>
						<td>Visiting Section:</td>
						<td colspan = 2><?php echo $sec_vis;?></td>
					</tr>
					<tr>
						<td>Purpose of Visit:</td>
						<td colspan = 2><?php echo $purps;?></td>
					</tr>
					<tr>
						<td>Signature of Visitor</td>
						<td></td>
						<td><b>In Time</b></td>
						<td><b>Out Time</b></td>
						<td><b>Signature</b></td>
					</tr>
					<tr>
						<td rowspan = 4>Name of Attending Officer:</td>
						<td><?php echo $atdn_ofr;?></td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
					</tr>
					<tr>
						<td>.</td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
					</tr>
					<tr>
						<td>.</td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
					</tr>
					<tr>
						<td>.</td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
					</tr>
					<tr>
						<td colspan = 5 class = 'tb_hd'><b>Note: Return this Pass at the time of exit.</b></td>
					</tr>
				
				</table>
			</div>-->
		</div>
	</body>
</html>