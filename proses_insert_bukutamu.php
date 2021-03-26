<?php require_once "koneksi.php";

//perintah sql
session_start();

$nama = $_POST['nama'];
$email= $_POST['email'];
$pesan= $_POST['pesan'];



$sql = "INSERT INTO tb_tamu VALUES ('', '$nama', '$email', '$pesan')";


//eksekusi perintah


// if ($conn->query($sql) === true){
// 	echo "berhasil tersimpan";
// }else{
// 	echo "gagal tersimpan";
// }

if ($conn->query($sql)===true) {
	$_SESSION['update_status'] = 1;
	$_SESSION['gak_sama']="alert alert-primary alert-dismissible fade show";
	$_SESSION['update_message'] = '<strong>Berhasil!!</strong> Data Berhasil dimasukan ';
	header("location: form_bukutamu.php");
	//echo "<script>
			//alert('berhasil terupdate');
			//location.assign('form_bukutamu.php');
		//</script>";
}else{ 
	$_SESSION['update_status'] = 0;
	$_SESSION['gak_sama']="alert alert-danger alert-dismissible fade show";
	$_SESSION['update_message'] = '<strong>Berhasil!!</strong> Data Gagal Dimasukan';
	header("location: form_bukutamu.php");
	//echo "<script>
			//alert('gagal terupdate');
			//location.assign('form_bukutamu.php');
		//</script>";
}


 ?>