<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../index.php');
}

if (isset($_SESSION['list_pembelian'], $_SESSION['total_bayar'])) {
	foreach ($_SESSION['list_pembelian'] as $beli) {
		$barang 		= $conn->query("SELECT * FROM tb_barang WHERE nama_barang='".$beli['nama_barang']."'");
		$data_barang 	= $barang->fetch_assoc();

		$dt_tr = $conn->query("SELECT * FROM tb_transaksi WHERE id_barang = '".$data_barang['id']."' AND id_user = '".$_SESSION['id_user']."'");
		$dt_arr 	= $dt_tr->fetch_assoc();
		

		if ($dt_tr->num_rows > 0) {
			
			$jml_brg_tr  = ($dt_arr['jumlah_barang'] + $beli['jumlah']);

			$update = $conn->query("UPDATE tb_transaksi SET jumlah_barang = '".$jml_brg_tr."' WHERE id = '".$dt_arr['id']."'");

		} else {

			$transaksi 		= $conn->query("INSERT INTO `tb_transaksi`(`id`, `id_barang`, `id_user`, `jumlah_barang`, 'meja') VALUES ('','".$data_barang['id']."','".$_SESSION['id_user']."','".$beli['jumlah']."','".$beli['meja']."')");

		}


	}
	unset($_SESSION['list_pembelian'], $_SESSION['total_bayar']);
}

// Mengelurkan seluruh data barang yang ada di Databae
$sql 			= "SELECT * FROM tb_barang";
$query 			= $conn->query($sql);
$data_barang 	= $query->fetch_all(MYSQLI_ASSOC);

// Nomor untuk increment baris tabel
$no = 1;

require_once 'includes/header.php';
require_once 'includes/barang.php';
require_once 'includes/footer.php';