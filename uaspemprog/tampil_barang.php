
<?php
include ("koneksi.php");
include ("header.php");

?>
<h1><center> DAFTAR BARANG </center></h1>

		<table class="table table-bordered" border="1">
	<tr>
		<td>No</td>
		<td>Nama</td>
		<td>Kategori</td>
		<td>Satuan</td>

	</tr>
	<?php
		$no=1;
		$query = "SELECT * FROM barang INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori INNER JOIN satuan ON barang.id_satuan = satuan.id_satuan";
		$sql_brg = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
		while ($data = mysqli_fetch_array($sql_brg)) {
		
	?>
	<tr>
		<td><?= $no++; ?></td>
		<td><?=$data['nama']?></td>
		<td><?=$data['nama_kategori']?></td>
		<td><?=$data['nama_satuan']?></td>
		
	</tr>
	<?php }?>

</table>
<input type='button'value='Tambah Barang'onClick='top.location="input_barang.php"'class='btn btn-danger'>
<?php
include ("footer.php");
