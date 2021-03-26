<?php require_once "koneksi.php";

//perintah sql
//start session
session_start();

$id=$_POST['id'];
$nama = $_POST['nama'];
$email= $_POST['email'];
$pesan= $_POST['pesan'];


$sql = "UPDATE tb_tamu SET nama_tamu='$nama',email_tamu='$email',pesan_tamu='$pesan' WHERE id_tamu='$id'";
// $sql = "INSERT INTO tb_tamu VALUES ('', '$nama', '$email', '$pesan')";



//eksekusi perintah


// if ($conn->query($sql) === true){
// 	echo "berhasil tersimpan";
// }else{
// 	echo "gagal tersimpan";
// }

if ($conn->query($sql)===true) {
	$_SESSION['update_status'] = 1;
	$_SESSION['update_message'] = '<strong>Berhasil!!</strong> Data berhasil terupdate';
	header("location: form_bukutamu.php");
	//echo "<script>
			//alert('berhasil terupdate');
			//location.assign('form_bukutamu.php');
		//</script>";
}else{
	$_SESSION['update_status'] = 0;
	$_SESSION['update_message'] = '<strong>Berhasil!!</strong> Data berhasil terupdate';
	header("location: form_bukutamu.php");
	//echo "<script>
			//alert('gagal terupdate');
			//location.assign('form_bukutamu.php');
		//</script>";
}



 ?>