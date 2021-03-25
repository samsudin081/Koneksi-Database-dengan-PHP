<?php 
require_once 'koneksi.php';
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link href="asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <!-- <link href="asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link href="asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <title>Input Data Buku Tamu</title>
  </head>
  <body>
   <div class="container">
 		<div class="card-header">
 			<h3>Form Input Buku Tamu</h3>
 		</div>
 		<div class="card-body">
 			<form action="proses_insert_buku_tamu.php" method="POST">
 				<div class="form-group">
 					<input type="text" name="nama" required class="form-control" placeholder="Masukkan nama anda"> </div>
 				<div class="form-group">
 					<input type="email" name="email" required class="form-control" placeholder="Masukkan email anda"> </div>
				<div class="form-group">
 					<textarea name="pesan" required class="form-control" placeholder="Masukkan pesan kesan anda"></textarea> </div>
 				<div class="form-group">
 					<input type="submit" class="btn btn-primary btn-block" value="Kirim"/></div>
 						
			</form>
			<?php 
				$sql = "SELECT * FROM tb_tamu ORDER BY id_tamu ASC";
				$result	=$koneksi->query($sql);
			 ?>

			<table class="table table-bordered">
				<thead>
					<tr align="center">
						<th>No</th>
						<th>ID TAMU</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Pesan / Komentar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if ($result->num_rows>0) {
							$no = 1;
							while ($row = $result->fetch_assoc()){
								?>
								<tr>
									<td><?=$no;?></td>
									<td><?=$row['id_tamu'];?></td>
									<td><?=$row['nama_tamu'];?></td>
									<td><?=$row['email_tamu'];?></td>
									<td><?=$row['pesan_tamu'];?></td>
									<td align="center">
                                                <a href="index.php?url=data_calon_lihat&id=<?php echo $data['id'] ?>" class="btn btn-xs btn-info" title="Lihat">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="index.php?url=data_calon_ubah&id=<?php echo $data['id'] ?>" class="btn btn-xs btn-warning" title="Ubah">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="config/calon/proses_hapus.php?&id=<?php echo $data['id'] ?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')" >
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
								</tr>
						<?php 
								$no++;
							}
						}
					 ?>
					 
					
				</tbody>

			</table>

 		</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

  	
 