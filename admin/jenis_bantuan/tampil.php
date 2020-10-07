<?php
$data_jenis_bantuan = $jenis_bantuan->tampil();
?>
<!-- Page Heading -->
<div class="clearfix">
	<h1 class="h3 mb-4 float-left text-gray-800">Jenis Bantuan</h1>
	<a href="index.php?halaman=tambah_jenis_bantuan" class="float-right btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
</div>
<div class="card">
	<div class="card-body table-responsive">
		<?php if (!empty($data_jenis_bantuan)): ?>
			
			<table class="table-bordered table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Jenis Bantuan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data_jenis_bantuan as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['nama_jenis_bantuan']; ?></td>
							<td>
								<a href="index.php?halaman=edit_jenis_bantuan&id=<?php echo $value['id_jenis_bantuan']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-alt"></i></a>
								<a href="index.php?halaman=hapus_jenis_bantuan&id=<?php echo $value['id_jenis_bantuan']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php else: ?>
				<div class="alert alert-info">
					Belum ada data jenis bantuan.
				</div>
			<?php endif ?>
		</div>
	</div>