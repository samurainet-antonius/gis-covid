<?php
$detail = $bantuan->detail($_GET['id']);
$kegiatan = $bantuan->kegiatan($_GET['id']);
$bantuan_dana = $bantuan->bantuan($_GET['id']);

$data_jenis_bantuan = $jenis_bantuan->tampil();
$data_jenis_kegiatan = $jenis_kegiatan->tampil();

if(isset($_GET['hapus_bantuan']))
{
  $ambil = $bantuan->hapusbantuan($_GET['hapus']);
  echo "<script>alert('Data Berhasil Di Hapus');location='index.php?halaman=detail_bantuan&id=".$_GET['id']."'</script>";
}

if(isset($_GET['hapus_kegiatan']))
{
  $ambil = $bantuan->hapus_kegiatan($_GET['hapus']);
  echo "<script>alert('Data Berhasil Di Hapus');location='index.php?halaman=detail_bantuan&id=".$_GET['id']."'</script>";
}

?>
<!-- Page Heading -->
<div class="clearfix">
	<h1 class="h3 mb-4 float-left text-gray-800">Bantuan Penduduk</h1>
	<a href="index.php?halaman=tambah_bantuan" class="float-right btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
</div>

<div class="card">
	<div class="card-body table-responsive">
		<div class="row">
      <div class="col-md-6">
        <div id="maps">

        </div>
      </div>

      <div class="col-md-6">
        <table class="table" id="tablenya">
          <tr>
            <td>NO.KK</td>
            <th><?php echo $detail['kk'] ?></th>
          </tr>

          <tr>
            <td>NIK</td>
            <th><?php echo $detail['nik'] ?></th>
          </tr>

          <tr>
            <td>NAMA LENGKAP</td>
            <th><?php echo $detail['nama'] ?></th>
          </tr>

          <tr>
            <td>JENIS KELAMIN</td>
            <th><?php echo $detail['jk'] ?></th>
          </tr>

          <tr>
            <td>PROVINSI</td>
            <th><?php echo $detail['provinsi'] ?></th>
          </tr>

          <tr>
            <td>KABUPATEN</td>
            <th><?php echo $detail['kabupaten'] ?></th>
          </tr>

          <tr>
            <td>DESA</td>
            <th><?php echo $detail['nama_desa'] ?></th>
          </tr>
        </table>
      </div>
    </div>
	</div>
</div>


<div class="card mt-5">
	<div class="card-body table-responsive">
    <div class="clearfix">
      <h3 class="float-left">Bantuan</h3>
      <a href="#" data-toggle="modal" data-target="#tambahBantuan" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <br/>
		<table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Tgl Diperoleh</th>
          <th>Nominal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($bantuan_dana as $key => $value): ?>
            <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value['nama_jenis_bantuan']; ?></td>
            <td><?php echo $value['tgl_peroleh']; ?></td>
            <td><?php echo $value['nominal']; ?></td>
            <td>
              <a href="index.php?halaman=detail_bantuan&id=<?php echo $_GET['id'] ?>&hapus_bantuan=<?php echo $value['id_detail_bantuan'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
          </td>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
	</div>
</div>


<div class="card mt-5">
	<div class="card-body table-responsive">
    <div class="clearfix">
      <h3 class="float-left">Kegiatan</h3>
      <a href="#" data-toggle="modal" data-target="#tambahKegiatan" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <br/>
		<table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Jenis</th>
          <th>Nama</th>
          <th>Tgl Kegiatan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php foreach ($kegiatan as $key => $value): ?>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value['nama_jenis_kegiatan']; ?></td>
            <td><?php echo $value['nama_kegiatan']; ?></td>
            <td><?php echo $value['tgl_kegiatan']; ?></td>
            <td>
              <a href="index.php?halaman=detail_bantuan&id=<?php echo $_GET['id'] ?>&hapus_kegiatan=<?php echo $value['id_detail_bantuan'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
          </td>
          <?php endforeach; ?>
        </tr>
      </tbody>
    </table>
	</div>
</div>


<!-- modal tambahBantuan -->
<!-- The Modal -->
<div class="modal" id="tambahBantuan">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Bantuan Dana</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form method="post">
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
    				<label>Jenis Bantuan</label>
    				<select name="id_jenis_bantuan" class="form-control" required>
    					<option value="">-- Pilih Jenis Bantuan --</option>
              <?php foreach ($data_jenis_bantuan as $key => $value): ?>
                <option value="<?php echo $value['id_jenis_bantuan'] ?>"><?php echo $value['nama_jenis_bantuan']; ?></option>
              <?php endforeach; ?>
    				</select>
    			</div>

          <div class="form-group">
    				<label>Tgl. Diperoleh</label>
    				<input type="date" class="form-control" name="tgl_peroleh" required>
    			</div>

          <div class="form-group">
    				<label>Nominal</label>
    				<input type="number" class="form-control" name="nominal" required>
    			</div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="simpanBantuan">Simpan</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>

<?php
if(isset($_POST['simpanBantuan'])){
  $cek = $bantuan->tambahDetailBantuan($_GET['id'],$_POST['id_jenis_bantuan'],$_POST['tgl_peroleh'],$_POST['nominal']);
    echo "<script>alert('Data berhasil disimpan');location='index.php?halaman=detail_bantuan&id=".$_GET['id']."';</script>";
}
?>


<!-- modal tambahBantuan -->
<!-- The Modal -->
<div class="modal" id="tambahKegiatan">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kegiatan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form method="post">
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
    				<label>Jenis Kegiatan</label>
    				<select name="id_jenis_kegiatan" class="form-control" required>
    					<option value="">-- Pilih Jenis Kegiatan --</option>
              <?php foreach ($data_jenis_kegiatan as $key => $value): ?>
                <option value="<?php echo $value['id_jenis_kegiatan'] ?>"><?php echo $value['nama_jenis_kegiatan']; ?></option>
              <?php endforeach; ?>
    				</select>
    			</div>

          <div class="form-group">
    				<label>Tgl. Diperoleh</label>
    				<input type="date" class="form-control" name="tgl_kegiatan" required>
    			</div>

          <div class="form-group">
    				<label>Nama Kegiatan</label>
    				<input type="text" class="form-control" name="nama_kegiatan" required>
    			</div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="simpanKegiatan">Simpan</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>

<?php
if(isset($_POST['simpanKegiatan'])){
  $cek = $bantuan->tambahDetailKegiatan($_GET['id'],$_POST['id_jenis_kegiatan'],$_POST['tgl_kegiatan'],$_POST['nama_kegiatan']);
    echo "<script>alert('Data berhasil disimpan');location='index.php?halaman=detail_bantuan&id=".$_GET['id']."';</script>";
}
?>
