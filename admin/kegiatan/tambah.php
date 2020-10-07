<?php
$data_jenis_kegiatan = $jenis_kegiatan->tampil();
$data_jenis_bantuan = $jenis_bantuan->tampil();
?>

<!-- Page Heading -->
<div class="clearfix">
	<h1 class="h3 mb-4 float-left text-gray-800">Tambah Kegiatan Baru</h1>
	<a href="index.php?halaman=kegiatan" class="float-right btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<div class="card">
	<div class="card-body">
		<form method="POST">
			<div class="form-group">
				<label>Jenis Kegiatan</label>
				<select name="id_jenis_kegiatan" class="form-control" required>
					<option value="">-- Pilih Jenis Kegiatan --</option>
					<?php foreach ($data_jenis_kegiatan as $key => $value): ?>
						<option value="<?php echo $value['id_jenis_kegiatan']; ?>"><?php echo $value['nama_jenis_kegiatan']; ?></option>	
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Jenis Bantuan</label>
				<select name="id_jenis_bantuan" class="form-control" required>
					<option value="">-- Pilih Jenis Bantuan --</option>
					<?php foreach ($data_jenis_bantuan as $key => $value): ?>
						<option value="<?php echo $value['id_jenis_bantuan']; ?>"><?php echo $value['nama_jenis_bantuan']; ?></option>	
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Judul Kegiatan</label>
				<input type="text" class="form-control" name="judul_kegiatan" required>
			</div>
			<div class="form-group">
				<label>Tanggal Kegiatan</label>
				<input type="datetime-local" class="form-control" name="tanggal_kegiatan" required>
			</div>
			<div class="form-group">
				<label>Nominal Bantuan</label>
				<input type="number" class="form-control" name="nominal_bantuan" required>
			</div>
			<div class="form-group">
				<label>Deskripsi Kegiatan</label>
				<textarea id="editor" class="form-control" name="deskripsi_kegiatan" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label>Lokasi</label>
				<input
				id="pac-input" class="form-control" type="text"
				placeholder="Search Box" style="width: 50%;"/>
				<br/>
				<div id="map" style="width: 100%;height: 500px;"></div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="lat_kegiatan" id="lat" required>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" name="lng_kegiatan" id="lng" required>
					</div>	
				</div>
			</div>
			<button class="btn btn-primary btn-sm" value="simpan1" name="simpan1">Simpan</button>
		</form>
		<?php
		if(isset($_POST['simpan1'])){
			$cek = $kegiatan->tambah($_SESSION['admin']['id_desa'],$_POST['id_jenis_kegiatan'],$_POST['id_jenis_bantuan'],$_POST['judul_kegiatan'],$_POST['tanggal_kegiatan'],,$_POST['nominal_bantuan']$_POST['deskripsi_kegiatan'],$_POST['lat_kegiatan'],$_POST['lng_kegiatan']);

			if($cek=="gagal"){
				echo "<script>alert('Kegiatan sudah terdaftar');location='index.php?halaman=tambah_kegiatan';</script>";
			}else{
				echo "<script>alert('Data berhasil disimpan');location='index.php?halaman=kegiatan';</script>";
			}
		}
		?>
	</div>
</div>