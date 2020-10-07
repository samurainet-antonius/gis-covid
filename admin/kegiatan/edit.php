<?php
$detail = $kegiatan->detail($_GET['id']);
$data_jenis_kegiatan = $jenis_kegiatan->tampil();
$data_jenis_bantuan = $jenis_bantuan->tampil();
?>

<!-- Page Heading -->
<div class="clearfix">
	<h1 class="h3 mb-4 float-left text-gray-800">Edit Kegiatan Baru</h1>
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
						<option value="<?php echo $value['id_jenis_kegiatan']; ?>" <?php if ($value['id_jenis_kegiatan']==$detail['id_jenis_kegiatan']) {echo "selected";} ?>><?php echo $value['nama_jenis_kegiatan']; ?></option>	
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Jenis Bantuan</label>
				<select name="id_jenis_bantuan" class="form-control" required>
					<option value="">-- Pilih Jenis Bantuan --</option>
					<?php foreach ($data_jenis_bantuan as $key => $value): ?>
						<option value="<?php echo $value['id_jenis_bantuan']; ?>" <?php if ($value['id_jenis_bantuan']==$detail['id_jenis_bantuan']) {echo "selected";} ?>><?php echo $value['nama_jenis_bantuan']; ?></option>	
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Judul Kegiatan</label>
				<input type="text" class="form-control" name="judul_kegiatan" value="<?php echo $detail['judul_kegiatan']; ?>">
			</div>
			<div class="form-group"> 
				<label>Tanggal Kegiatan</label>
				<?php $tanggal_kegiatan = date('Y-m-d\TH:i:s', strtotime($detail['tanggal_kegiatan'])) ?>
				<input type="datetime-local" class="form-control" name="tanggal_kegiatan" value="<?php echo $tanggal_kegiatan; ?>">
			</div>
			<div class="form-group">
				<label>Nominal Bantuan</label>
				<input type="text" class="form-control" name="nominal_bantuan" value="<?php echo $detail['nominal_bantuan']; ?>">
			</div>
			<div class="form-group">
				<label>Deskripsi Kegiatan</label>
				<textarea id="editor" class="form-control" name="deskripsi_kegiatan" rows="3"><?php echo $detail['deskripsi_kegiatan']; ?></textarea>
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
						<input type="text" class="form-control" name="lat_kegiatan" id="lat" required value="<?php echo $detail['lat_kegiatan'] ?>">
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" name="lng_kegiatan" id="lng" required value="<?php echo $detail['lng_kegiatan'] ?>">
					</div>	
				</div>
			</div>
			<button class="btn btn-success btn-sm" value="ubah" name="ubah">Ubah</button>
		</form>
		<?php
		if(isset($_POST['ubah'])){
			$cek = $kegiatan->edit($_SESSION['admin']['id_desa'],$_POST['id_jenis_kegiatan'],$_POST['id_jenis_batua'],$_POST['judul_kegiatan'],$_POST['tanggal_kegiatan'],$_POST['nominal_bantuan'],$_POST['deskripsi_kegiatan'], $_POST['lat_kegiatan'],$_POST['lng_kegiatan'],$_GET['id']);

			if($cek=="gagal"){
				echo "<script>alert('Kegiatan sudah terdaftar');location='index.php?halaman=edit_kegiatan';</script>";
			}else{
				echo "<script>alert('Data berhasil diubah');location='index.php?halaman=kegiatan';</script>";
			}
		}
		?>
	</div>
</div>