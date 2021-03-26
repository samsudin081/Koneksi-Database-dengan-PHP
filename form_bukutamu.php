<?php 
require_once 'koneksi.php';

session_start();

 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <title>Hello, world!</title>
    <style>
    	body{
    		margin:100px 500px;
 		
    	}
    	
    </style>
  </head>
  <body>
    <h3>Form Buku Tamu</h3>


					  <form action="proses_insert_bukutamu.php" method="POST" >
					  	<fieldset>					   		
					    			<div class="form-group">
									  <label for="Nama">Nama</label>
									  <input type="text" name="nama" id="disabledTextInput" class="form-control" placeholder="Masukan Nama Anda" required="">
					    			</div>
					     			<div class="form-group">
									  <label for="Nama">E-mail</label>
									  <input type="text" name="email" id="disabledTextInput" class="form-control" placeholder="Masukan E-mail Anda" required="">
					    			</div>
					    			<div class="form-group">
									      <label for="pesan">Pesan</label>
									      <input type="text" name="pesan" id="disabledTextInput" class="form-control" placeholder="Masukan pesan Anda" required="">
					    			</div>
				
					    			<button type="submit" class="btn btn-primary"  align="center">kirim</button><br><br>
					  	</fieldset>
					</form>
					<?php 
						if(isset($_SESSION['update_status'])){ ?>
						<div class="<?=$_SESSION ['gak_sama'];?>" role="alert">
					<?= $_SESSION['update_message'];?>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  		<span aria-hidden="true">&times;</span>
  						</button>
					</div>
				<?php }

					unset($_SESSION['update_status']);

				 ?>
					

<table class="table table-bordered" id="myTable">
	<thead>
		<tr>
			<th>No</th><th>ID tamu</th><th>Nama</th><th>Email</th><th>pesan/komentar</th><th>Action</th>
		</tr>

	</thead>
	<tbody>
			<?php 
			$sql="SELECT * FROM tb_tamu ORDER BY id_tamu ASC";
			$result=$conn->query($sql);
			if($result->num_rows > 0){
				$no=1;
				while($row = $result->fetch_assoc()){ ?>
						<tr>
							<td><?=$no;?></td>
							<td><?=$row['id_tamu']; ?></td>
							<td><?=$row['nama_tamu']; ?></td>
							<td><?=$row['email_tamu']; ?></td>
							<td><?=$row['pesan_tamu']; ?></td>
							<td align="center">
                                               
                                                <a href="form_edit_bukutamu.php?idTamu=<?=$row['id_tamu']?>" class="btn btn-xs btn-warning disabled" title="Ubah" >
                                                    <i class="fa fa-pencil"></i>
                                                    	

                                                </a>
                                                 	<button type="button" class="btn  btn-xs btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="<?=$row['id_tamu']; ?>" data-nama="<?=$row['nama_tamu']; ?>" data-email="<?=$row['email_tamu']; ?>" data-pesan="<?=$row['pesan_tamu']; ?>"><i class="fa fa-pencil"></i></button>
                                               
                                                <a href="proses_delete_bukutamu.php?idTamu=<?=$row['id_tamu'];?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')" >
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
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="proses_update_bukutamu.php" method="POST" >
			<fieldset>			
				<div class="form-group">
				
					<input type="text" name="id"  id="disabledTextInput" class="form-control edit-id" placeholder="Masukan ID Anda" required="" readonly="" >
				</div>
				<div class="form-group">
					<label for="Nama">Nama</label>
					<input type="text" name="nama" id="disabledTextInput" class="form-control edit-nama" placeholder="Masukan Nama Anda" required="" >
				</div>
				<div class="form-group">
					<label for="Nama">E-mail</label>
					<input type="text" name="email" id="disabledTextInput" class="form-control edit-email" placeholder="Masukan E-mail Anda" required="" >
				</div>
				<div class="form-group">
					<label for="pesan">Pesan</label>
					<input type="text" name="pesan" id="disabledTextInput" class="form-control edit-pesan" placeholder="Masukan pesan Anda" required="" >				      
				</div>
				
				<button type="submit" class="btn btn-primary" align="center" onclick=" return confirm('Apakah anda yakin ingin mengedit?')" >kirim</button><br><br>
			</fieldset>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>




	
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<!--     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->

<script>
			$(document).ready(function(){
				$('#myTable').DataTable({


				});

			
		
		$('#exampleModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget)
			  var id = button.data('id')
			  var nama = button.data('nama')
			  var email = button.data('email')
			  var pesan = button.data('pesan')

			   // Button that triggered the modal
			 //var recipient = button.data('whatever') // Extract info from data-* attributes
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this)
			 // modal.find('.modal-title').text('New message to ' + recipient)
			 // modal.find('.modal-body input').val(recipient)
			  modal.find('.modal-body .edit-id').val(id)
			  modal.find('.modal-body .edit-nama').val(nama)
			  modal.find('.modal-body .edit-email').val(email)
			  modal.find('.modal-body .edit-pesan').val(pesan)
})
		$('.alert').delay(500).fadeOut(2000);
	});

</script>




    
  </body>
</html>