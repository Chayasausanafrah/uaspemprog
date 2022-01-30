<?php
include ("koneksi.php");
$query_view=mysqli_query($koneksi,"select * from pelanggan");
include("header.php");
?>

<?php
echo '<a href="input_pelanggan.php" class="btn btn-danger">Tambah Pelanggan</a>';?>


<table class="table table-bordered" border="1">
  <tr>
    <td>No</td>
    <td>Nama Pelanggan</td>
    <td>No Telepon</td>
    <td>Status</td>
  </tr>

  <?php
  $no=1;
  while($tampil=mysqli_fetch_array($query_view)){?>
    <tr>
      <td><?php echo $no++;?></td>
      <td><?php echo $tampil ['nama_pelanggan'];?></td>
      <td><?php echo $tampil ['no_tlp'];?></td>
      <td><?php echo $tampil ['status'];?></td>
  </tr>
<?php }?>

</table>
<?php
include("footer.php");