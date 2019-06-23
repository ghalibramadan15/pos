<div class="container mt-5">
	
	<h2>Edit Data Menu</h2>
	<hr>
	
	<a href="data-barang.php" class="btn btn-primary btn-sm float-left">&larr; Kembali</a>
	<div class="clearfix"></div>
	
	<?php 
		$sql = $conn->query("SELECT * FROM tb_barang WHERE id = '".$_GET['id']."'");
		$data = $sql->fetch_assoc();
	?>

	<div class="card mt-3">
		<div class="card-header">
			Edit data <?= $data['nama_barang'] ?>
		</div>
		<div class="card-body">
			<form action="proses/edit-data-barang.php" method="POST">
				<div class="form-group">
					<label for="nama_barang">Nama Menu</label>
					<input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" class="form-control" required>
				</div>
				<input type="hidden" name="id" value="<?= $data['id'] ?>">
				<button type="submit" class="btn btn-primary float-right">Edit Data</button>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>

</div>