<?php require_once "koneksi.php";

//perintah sql


$id = $_GET['idTamu'];



$sql = "DELETE FROM tb_tamu WHERE id_tamu='$id'";



//eksekusi perintah


// if ($conn->query($sql) === true){
// 	echo "berhasil tersimpan";
// }else{
// 	echo "gagal tersimpan";
// }

if ($conn->query($sql)===true) {
	//header("location:")
	echo "<script>
			alert('berhasil terhapus');
			location.assign('form_bukutamu.php');
		</script>";
}else{
	echo "<script>
			alert('gagal terhapus');
			location.assign('form_bukutamu.php');
		</script>";
}



 ?>