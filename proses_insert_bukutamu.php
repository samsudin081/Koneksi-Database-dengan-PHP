<?php require_once "koneksi.php";

//perintah sql


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
	//header("location:")
	echo "<script>
			alert('berhasil tersimpan');
			location.assign('form_bukutamu.php');
		</script>";
}else{
	echo "<script>
			alert('gagal tersimpan');
			location.assign('form_bukutamu.php');
		</script>";
}



 ?>