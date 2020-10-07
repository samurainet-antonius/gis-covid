<!-- Page Heading -->
<div class="clearfix">
	<h1 class="h3 mb-4 float-left text-gray-800">Tambah Jenis Kegiatan</h1>
	<a href="index.php?halaman=desa" class="float-right btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<div class="card">
	<div class="card-body">
		<form method="POST">
			<div class="form-group">
				<label>Jenis Kegiatan</label>
				<input type="text" class="form-control" name="nama_jenis_kegiatan" required>
			</div>
			<button class="btn btn-primary btn-sm" name="simpan">Simpan</button>
		</form>
		<?php
		if(isset($_POST['simpan'])){
			$cek = $jenis_kegiatan->tambah($_POST['nama_jenis_kegiatan']);
				echo "<script>alert('Data berhasil disimpan');location='index.php?halaman=jenis_kegiatan';</script>";
		}
		?>
	</div>
</div>