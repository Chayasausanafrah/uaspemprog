<?php
include("koneksi.php");

if(isset($_POST['save'])){
$query_input=mysqli_query($koneksi,"insert into transaksi(nama_transaksi,tgl_transaksi,harga,qty,id_barang,diskon,id_pelanggan)
values(
'".$_POST['nama_transaksi']."',
'".$_POST['tgl_transaksi']."',
'".$_POST['harga']."',
'".$_POST['qty']."',
'".$_POST['id_barang']."',
'".$_POST['diskon']."',
'".$_POST['id_pelanggan']."')");

if($query_input){
header('location:tampil_transaksi.php');
}else{
	echo mysqli_error();
}
}
include("header.php");
?>
<form method="POST">
<table class="table table-bordered" border="1">
	<tr>
		<td>Nama Transaksi</td>
		<td><input type="text" name="nama_transaksi" class="form-control"></td>
	</tr>
	<tr>
		<td>Tanggal Transaksi</td>
		<td><input type="date" name="tgl_transaksi" class="form-control"></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td><input type="text" name="harga" class="form-control"></td>
	</tr>
    <tr>
		<td>Qty</td>
		<td><input type="number" name="qty" class="form-control"></td>
	</tr>
    <tr>
		<td>id_barang</td>
		<td><select class="form-control" name="id_barang">
			<option value="">-----Pilih-----</option>
			<?php 
			$sql_kategori = mysqli_query ($koneksi, "Select * from barang" ) or die
			(mysql_error($koneksi));
			while ($kategri = mysqli_fetch_array($sql_kategori)) {
				echo '<option value="'.$kategri['id_barang'].'">'.$kategri['nama'].'</option>';
			} ?>
		</select></td>
	</tr>
    <tr>
		<td>Diskon</td>
		<td><input type="number" name="diskon" class="form-control"></td>
	</tr>
    <tr>
		<td>id_pelanggan</td>
		<td><select name="id_pelanggan" class="form-control">
			<option value="">-----Pilih-----</option>
			<?php 
			$sql_satuan = mysqli_query ($koneksi, "Select * from pelanggan" ) or die
			(mysql_error($koneksi));
			while ($satuan = mysqli_fetch_array($sql_satuan)) {
				echo '<option value="'.$satuan['id_pelanggan'].'">'.$satuan['nama_pelanggan'].'</option>';
			} ?>
	</tr>
	<tr>
		<td><input type="submit" name="save" class="btn btn-danger"></td>
	</tr>
</table>
</form>
</form><input type='button'value='Tambah Pelanggan'onClick='top.location="input_pelanggan.php"'class="btn btn-danger">
<?php
include("footer.php");