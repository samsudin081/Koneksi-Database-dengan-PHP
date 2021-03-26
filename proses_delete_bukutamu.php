<?php require_once "koneksi.php";

//perintah sql
session_start();

$id = $_GET['idTamu'];



$sql = "DELETE FROM tb_tamu WHERE id_tamu='$id'";



//eksekusi perintah


// if ($conn->query($sql) === true){
// 	echo "berhasil tersimpan";
// }else{
// 	echo "gagal tersimpan";
// }

if ($conn->query($sql)===true) {
	$_SESSION['update_status'] = 1;
	$_SESSION['update_message'] = '<strong>Berhasil!!</strong> Data berhasil terhapus';
	header("location: form_bukutamu.php");
	//echo "<script>
			//alert('berhasil terupdate');
			//location.assign('form_bukutamu.php');
		//</script>";
}else{
	$_SESSION['update_status'] = 0;
	$_SESSION['update_message'] = '<strong>Berhasil!!</strong> Data berhasil terhapus';
	header("location: form_bukutamu.php");
	//echo "<script>
			//alert('gagal terupdate');
			//location.assign('form_bukutamu.php');
		//</script>";
}




 ?>