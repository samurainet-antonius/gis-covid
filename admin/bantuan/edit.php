<!-- Page Heading -->
<?php $detail = $bantuan->detail($_GET['id']); ?>
<?php $data_jenis_bantuan = $jenis_bantuan->tampil(); ?>
<div class="clearfix">
	<h1 class="h3 mb-4 float-left text-gray-800">Edit Bantuan</h1>
	<a href="index.php?halaman=bantuan" class="float-right btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<div class="card">
	<div class="card-body">
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" class="form-control" name="nama" required value="<?php echo $detail['nama'] ?>">
			</div>

			<div class="form-group">
				<label>NO KK</label>
				<input type="number" class="form-control" name="kk" required value="<?php echo $detail['kk'] ?>">
			</div>

			<div class="form-group">
				<label>NIK</label>
				<input type="number" class="form-control" name="nik" required value="<?php echo $detail['nik'] ?>">
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<br/>
				<input type="radio" name="jk" required value="L" <?php if($detail['jk']=="L"){echo "checked";} ?>> Laki-laki
				<br/>
				<input type="radio" name="jk" required value="P" <?php if($detail['jk']=="P"){echo "checked";} ?>> Perempuan
			</div>
			
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" required><?php echo $detail['alamat'] ?></textarea>
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
				<label>Nominal Bantuan</label>
				<input type="number" class="form-control" name="nominal_bantuan" required value="<?php echo $detail['nominal_bantuan'] ?>">
			</div>

			<div class="form-group"> 
				<label>Tanggal Terima Bantuan</label>
				<?php $tanggal_terima_bantuan = date('Y-m-d\TH:i:s', strtotime($detail['tanggal_terima_bantuan'])) ?>
				<input type="datetime-local" class="form-control" name="tanggal_terima_bantuan" value="<?php echo $tanggal_terima_bantuan; ?>">
			</div>

			<div class="form-group">
				<label>Keterangan</label>
				<textarea id="editor" class="form-control" name="keterangan"><?php echo $detail['keterangan'] ?></textarea>
			</div>

			<div class="row">
				<div class="col-xl-4 col-md-6 mb-4">
					<label>Foto Tampak Depan</label>
					<center>
						<?php if (empty($detail['foto_tampak_depan'])): ?>
							<img class="profile-user-img img-thumbnail" width="150" height="150" src="../assets/admin/img/bantuan/no-image.png"  alt="Foto Tampak Depan" id="img-upload">
						<?php else: ?>
							<img class="profile-user-img img-thumbnail" width="150" height="150" src="../assets/admin/img/bantuan/<?php echo $detail['foto_tampak_depan']; ?>"  alt="Foto Tampak Depan" id="img-upload">
						<?php endif ?>
					</center>
					<center>
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Browse… <input type="file" required id="imgInp" name="foto_tampak_depan">
								</span>
							</span>
						</div>
					</center>
				</div>
				<div class="col-xl-4 col-md-6 mb-4">
					<label>Foto Tampak Samping</label>
					<center>
						<?php if (empty($detail['foto_tampak_samping'])): ?>
							<img class="profile-user-img img-thumbnail" width="150" height="150" src="../assets/admin/img/bantuan/no-image.png"  alt="Foto Tampak Depan" id="img-upload1">
						<?php else: ?>
							<img class="profile-user-img img-thumbnail" width="150" height="150" src="../assets/admin/img/bantuan/<?php echo $detail['foto_tampak_samping']; ?>"  alt="Foto Tampak Depan" id="img-upload1">
						<?php endif ?>
					</center>
					<center>
						<div class="input-group1">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file1">
									Browse… <input type="file" required id="imgInp1" name="foto_tampak_samping">
								</span>
							</span>
						</div>
					</center>
				</div>
				<div class="col-xl-4 col-md-6 mb-4">
					<label>Foto Tampak Ruang Tamu</label>
					<center>
						<?php if (empty($detail['foto_tampak_ruang_tamu'])): ?>
							<img class="profile-user-img img-thumbnail" width="150" height="150" src="../assets/admin/img/bantuan/no-image.png"  alt="Foto Tampak Depan" id="img-upload2">
						<?php else: ?>
							<img class="profile-user-img img-thumbnail" width="150" height="150" src="../assets/admin/img/bantuan/<?php echo $detail['foto_tampak_ruang_tamu']; ?>"  alt="Foto Tampak Depan" id="img-upload2">
						<?php endif ?>
					</center>
					<center>
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Browse… <input type="file" required id="imgInp2" name="foto_tampak_ruang_tamu">
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
						<input type="text" class="form-control" name="lat_bantuan" id="lat" required value="<?php echo $detail['lat_bantuan'] ?>">
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" name="lng_bantuan" id="lng" required value="<?php echo $detail['lng_bantuan'] ?>">
					</div>	
				</div>
			</div>
			<button class="btn btn-success btn-sm" name="ubah">Ubah</button>
		</form>

		<?php
		if(isset($_POST['ubah']))
		{
			$cek = $bantuan->edit($_SESSION['admin']['id_desa'],$_POST['nama'],$_POST['kk'],$_POST['nik'],$_POST['jk'],$_POST['alamat'],$_POST['lat_bantuan'],$_POST['lng_bantuan'],$_POST['keterangan'],$_POST['id_jenis_bantuan'],$_POST['nominal_bantuan'],$_POST['tanggal_terima_bantuan'],$_FILES['foto_tampak_samping'],$_FILES['foto_tampak_depan'],$_FILES['foto_tampak_ruang_tamu'],$_GET['id']);
			echo "<script>alert('Data berhasil diubah');location='index.php?halaman=bantuan';</script>";
		}
		?>
	</div>
</div>