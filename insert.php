<?php
	session_start();
	ob_start();
	if (!isset($_SESSION['user'])){
		header ("Location: login.php");
	}
		$pass_no = $_GET['pn'];
		$datetime = $_GET['dttim'];
		$p_name = $_POST['p_name'];
		$address = $_POST['address'];
		$fm_name = $_POST['fm_name'];
		$p_mobile = $_POST['p_mobile'];
		$id_typ = $_POST['id_typ'];
		$id_number = $_POST['id_number'];
		$cr_thn = $_POST['cr_thn'];
		$sec_vis = $_POST['sec_vis'];
		$purps = $_POST['purps'];
		$atdn_ofr = $_POST['atdn_ofr'];
		$rmk = $_POST['rmk'];
		/*Image File Upload code here!*/
		
		$target_dir = 'img/';
		$img_file = $_FILES["upl_pic"]["name"];
		$target_file = $target_dir.$img_file;
		$tmp_img_file =  $_FILES["upl_pic"]["tmp_name"];
		$dbh = new PDO("informix:host=172.75.100.11; service=50002; database=payroll;server=ofpkr_informix; protocol=onsoctcp; ","pay", "rim@444");
		$q = "SELECT count(*) a FROM visitor WHERE pass_no = '".$pass_no."'";
		$res = $dbh->query($q);
		$row = $res-> fetch(PDO::FETCH_OBJ);
		if ($row->A == 0)
		{
			$q = "INSERT INTO visitor 
					(pass_no,dttm,name,addr,fm_nm,mobile,id_typ,id_no,tng_cary,sec_vst,prps,atn_ofcr,rmk,pic_src)
					VALUES ('".$pass_no."','".date_format(date_create(strtotime($datetime)),'Y-m-d h:i:s')."','".$p_name."','".$address."','".$fm_name."','".$p_mobile."',
					'".$id_typ."','".$id_number."','".$cr_th."','".$sec_vis."','".$purps."','".$atdn_ofr."','".$rmk."','".$target_file."')";
			$dbh->query($q);
			if (move_uploaded_file($tmp_img_file, $target_file)) {
				//echo "The file ". htmlspecialchars( basename( $_FILES['upl_pic']["name"])). " has been uploaded.";
			}else {
				echo "Sorry, there was an error uploading your file.";
			}
		echo $datetime;
		echo date_format(date_create(strtotime($datetime)),'Y-m-d h:i:s');
		echo date('Y-m-d h:i:s',strtotime($datetime));
		}
		header ("Location: pass.php?p=".$pass_no);
?>