<?php
$data_jenis_bantuan = $jenis_bantuan->tampil();
?>

<!-- Page Heading -->
<div class="clearfix">
	<h1 class="h3 mb-4 float-left text-gray-800">Tambah Bantuan Baru</h1>
	<a href="index.php?halaman=bantuan" class="float-right btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<div class="card">
	<div class="card-body">
		<form method="POST" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" class="form-control" name="nama" required>
			</div>

			<div class="form-group">
				<label>NO KK</label>
				<input type="number" class="form-control" name="kk" required>
			</div>

			<div class="form-group">
				<label>NIK</label>
				<input type="number" class="form-control" name="nik" required>
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<br/>
				<input type="radio" name="jk" required value="L"> Laki-laki
				<br/>
				<input type="radio" name="jk" required value="P"> Perempuan
			</div>
			
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" required></textarea>
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
				<label>Nominal Bantuan</label>
				<input type="number" class="form-control" name="nominal_bantuan" required>
			</div>

			<div class="form-group">
				<label>Tanggal Terima Bantuan</label>
				<input type="datetime-local" class="form-control" name="tanggal_terima_bantuan" required>
			</div>

			<div class="form-group">
				<label>Keterangan</label>
				<textarea id="editor" class="form-control" name="keterangan" required></textarea>
			</div>

			<div class="row">
				<div class="col-xl-4 col-md-6 mb-4">
					<label>Foto Tampak Depan</label>
					<center>
						<img class="profile-user-img img-thumbnail" width="150" height="150" src="../assets/admin/images_bantuan/no-image.png"  alt="Foto Tampak Depan" id="img-upload">
					</center>
					<center>
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Browse… <input type="file" id="imgInp" name="foto_tampak_depan">
								</span>
							</span>
						</div>
					</center>
				</div>
				<div class="col-xl-4 col-md-6 mb-4">
					<label>Foto Tampak Samping</label>
					<center>
						<img class="profile-user-img img-thumbnail" width="150" height="150" src="../assets/admin/images_bantuan/no-image.png"  alt="Foto Tampak Depan" id="img-upload1">
					</center>
					<center>
						<div class="input-group1">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file1">
									Browse… <input type="file" id="imgInp1" name="foto_tampak_samping">
								</span>
							</span>
						</div>
					</center>
				</div>
				<div class="col-xl-4 col-md-6 mb-4">
					<label>Foto Tampak Ruang Tamu</label>
					<center>
						<img class="profile-user-img img-thumbnail" width="150" height="150" src="../assets/admin/images_bantuan/no-image.png"  alt="Foto Tampak Depan" id="img-upload2">
					</center>
					<center>
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Browse… <input type="file" id="imgInp2" name="foto_tampak_ruang_tamu">
								</span>
							</span>
						</div>
					</center>
				</div>
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
						<input type="text" class="form-control" name="lat_bantuan" id="lat" required>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" name="lng_bantuan" id="lng" required>
					</div>	
				</div>
			</div>
			<button class="btn btn-primary btn-sm" value="simpan1" name="simpan1">Simpan</button>
		</form>
		<?php
		if(isset($_POST['simpan1'])){
			$cek = $bantuan->tambah($_SESSION['admin']['id_desa'],$_POST['nama'],$_POST['kk'],$_POST['nik'],$_POST['jk'],$_POST['alamat'],$_POST['lat_bantuan'],$_POST['lng_bantuan'],$_POST['id_jenis_bantuan'],$_POST['keterangan'],$_POST['nominal_bantuan'],$_POST['tanggal_terima_bantuan'],$_FILES['foto_tampak_samping'],$_FILES['foto_tampak_depan'],$_FILES['foto_tampak_ruang_tamu']);
			echo "<script>alert('Data berhasil disimpan');location='index.php?halaman=bantuan';</script>";
		}
		?>
	</div>
</div>