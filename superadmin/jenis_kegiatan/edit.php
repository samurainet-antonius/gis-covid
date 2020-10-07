<?php
$detail = $jenis_kegiatan->detail($_GET['id']);
?>
<!-- Page Heading -->
<div class="clearfix">
	<h1 class="h3 mb-4 float-left text-gray-800">Edit Jenis Kegiatan</h1>
	<a href="index.php?halaman=jenis_kegiatan" class="float-right btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<div class="card">
	<div class="card-body">
		<form method="POST">
			<div class="form-group">
				<label>Nama Jenis Kegiatan</label>
				<input type="text" class="form-control" name="nama_jenis_kegiatan" value="<?php echo $detail['nama_jenis_kegiatan']; ?>" required>
			</div>
			<button class="btn btn-success btn-sm" name="ubah">Ubah</button>
		</form>
		<?php
		if(isset($_POST['ubah'])){
			$cek = $jenis_kegiatan->edit($_POST['nama_jenis_kegiatan'],$_GET['id']);
				echo "<script>alert('Data berhasil diubah');location='index.php?halaman=jenis_kegiatan';</script>";
		}
		?>
	</div>
</div>