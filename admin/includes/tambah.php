<div class="container mt-5">
	
	<h2>Tambah Data Menu</h2>
	<hr>
	
	<a href="data-barang.php" class="btn btn-primary btn-sm float-left">&larr; Kembali</a>
	<div class="clearfix"></div>

	<form action="proses/tambah_barang.php" method="POST" class="mt-3" autocomplete="off">
		<div class="form-group">
			<label for="nama_barang">Nama</label>
			<input type="text" name="nama_barang" placeholder="Nama" class="form-control" autofocus required>
		</div>
		<div class="form-group">
			<label for="jenis_barang">Jenis Barang</label>
			<select name="jenis_barang" class="form-control" required>
				<option value="">-- Pilih Jenis Barang --</option>
				<option value="makanan">Makanan</option>
				<option value="snack">Snack</option>
				<option value="minuman">Minuman</option>
			</select>
		</div>
		<div class="form-group">
			<label for="harga">Harga</label>
			<input type="number" name="harga" placeholder="Harga" class="form-control" required>
		</div>
		<button type="submit" class="btn btn-primary float-right">Tambah</button>
	</form>

</div>