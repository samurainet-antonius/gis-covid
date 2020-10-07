<?php
ob_start();
session_start();
ob_clean();
$db = new mysqli("localhost","root","","aplikasi-gis-covid");
// $db = new mysqli("localhost","u6411026_client","db@client123","u6411026_giscovid");

class desa{

	private $table='desa';
	private $koneksi;

	function __construct($db)
	{
		$this->koneksi = $db;
	}

	public function tampil(){

		$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." ORDER BY id_desa DESC");
		$semua=array();
		while($per_data = $ambil->fetch_assoc()){
			$semua[] = $per_data;
		}

		return $semua;
	}

	public function tambah($provinsi,$kabupaten,$kecamatan,$desa){
		$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." WHERE provinsi='$provinsi' AND kabupaten='$kabupaten' AND kecamatan='$kecamatan' AND nama_desa='$desa'");

		if($ambil->num_rows ==1){
			return 'gagal';
		}else{
			$this->koneksi->query("INSERT INTO ".$this->table." (provinsi,kabupaten,kecamatan,nama_desa)VALUES('$provinsi','$kabupaten','$kecamatan','$desa')");
			return 'berhasil';
		}
	}

	public function detail($id){

		$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." WHERE id_desa='$id'");
		$detail = $ambil->fetch_assoc();

		return $detail;
	}

	public function desa_kecamatan($kecamatan){

		$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." WHERE kecamatan='$kecamatan'");
		$semua=array();
		while($per_data = $ambil->fetch_assoc()){
			$semua[] = $per_data;
		}

		return $semua;
	}

}

$desa = new desa($db);

class jenis_kegiatan{

	private $table='jenis_kegiatan';
	private $koneksi;

	function __construct($db)
	{
		$this->koneksi = $db;
	}

	public function tampil(){

		$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." ORDER BY id_jenis_kegiatan DESC");
		$semua=array();
		while($per_data = $ambil->fetch_assoc()){
			$semua[] = $per_data;
		}

		return $semua;
	}

	public function tambah($nama_jenis_kegiatan){
		$this->koneksi->query("INSERT INTO ".$this->table." (nama_jenis_kegiatan)VALUES('$nama_jenis_kegiatan')");
	}

	public function detail($id){

		$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." WHERE id_jenis_kegiatan='$id'");
		$detail = $ambil->fetch_assoc();

		return $detail;
	}

	public function edit($nama_jenis_kegiatan,$id){

		$this->koneksi->query("UPDATE jenis_kegiatan SET nama_jenis_kegiatan='$nama_jenis_kegiatan' WHERE id_jenis_kegiatan='$id'");

	}

	function hapus($id)
	{
		$this->koneksi->query("DELETE FROM jenis_kegiatan WHERE id_jenis_kegiatan='$id'");
	}

}

$jenis_kegiatan = new jenis_kegiatan($db);

class jenis_bantuan{

	private $table='jenis_bantuan';
	private $koneksi;

	function __construct($db)
	{
		$this->koneksi = $db;
	}

	public function tampil(){

		$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." ORDER BY id_jenis_bantuan DESC");
		$semua=array();
		while($per_data = $ambil->fetch_assoc()){
			$semua[] = $per_data;
		}

		return $semua;
	}

	public function tambah($nama_jenis_bantuan){
		$this->koneksi->query("INSERT INTO ".$this->table." (nama_jenis_bantuan)VALUES('$nama_jenis_bantuan')");
	}

	public function detail($id){

		$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." WHERE id_jenis_bantuan='$id'");
		$detail = $ambil->fetch_assoc();

		return $detail;
	}

	public function edit($nama_jenis_bantuan,$id){

		$this->koneksi->query("UPDATE jenis_bantuan SET nama_jenis_bantuan='$nama_jenis_bantuan' WHERE id_jenis_bantuan='$id'");

	}

	function hapus($id)
	{
		$this->koneksi->query("DELETE FROM jenis_bantan WHERE id_jenis_bantuan='$id'");
	}

}

$jenis_bantuan = new jenis_bantuan($db);

class admin{

	private $table='admin';
	private $koneksi;

	function __construct($db)
	{
		$this->koneksi = $db;
	}

	public function tampil(){

		$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." LEFT JOIN desa ON admin.id_desa=desa.id_desa ORDER BY id_admin DESC");
		$semua=array();
		while($per_data = $ambil->fetch_assoc()){
			$semua[] = $per_data;
		}

		return $semua;
	}

	public function tambah($nama,$username,$password,$desa){
		$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." WHERE username='$username'");

		if($ambil->num_rows ==1){
			return 'gagal';
		}else{

			$password = sha1($password);

			$this->koneksi->query("INSERT INTO ".$this->table." (nama,username,password,id_desa)VALUES('$nama','$username','$password','$desa')");
			return 'berhasil';
		}
	}

	public function detail($id){

		$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." LEFT JOIN desa ON admin.id_desa=desa.id_desa WHERE id_admin='$id'");
		$detail = $ambil->fetch_assoc();

		return $detail;
	}

	public function edit($nama,$username,$password,$id_desa,$id){
		$detail = $this->detail($id);
		if($detail['username']==$username){

			if(empty($password)){
				$this->koneksi->query("UPDATE admin SET nama='$nama', username='$username', id_desa='$id_desa' WHERE id_admin='$id'");
				return 'berhasil';
			}else{
				$password = sha1($password);
				$this->koneksi->query("UPDATE admin SET nama='$nama', username='$username', id_desa='$id_desa',password='$password' WHERE id_admin='$id'");
				return 'berhasil';
			}
		}else{

			$ambil = $this->koneksi->query("SELECT * FROM ".$this->table." WHERE username='$username'");

			if($ambil->num_rows ==1){
				return 'gagal';
			}else{
				if(empty($password)){
					$this->koneksi->query("UPDATE admin SET nama='$nama', username='$username', id_desa='$id_desa' WHERE id_admin='$id'");
					return 'berhasil';
				}else{
					$password = sha1($password);
					$this->koneksi->query("UPDATE admin SET nama='$nama', username='$username', id_desa='$id_desa',password='$password' WHERE id_admin='$id'");
					return 'berhasil';
				}
			}
		}
	}

}

$admin = new admin($db);

class kegiatan{

	private $table='kegiatan';
	private $koneksi;

	function __construct($db)
	{
		$this->koneksi = $db;
	}

	public function tampil(){

		$ambil = $this->koneksi->query("SELECT * FROM kegiatan LEFT JOIN desa ON kegiatan.id_desa = desa.id_desa ORDER BY id_kegiatan DESC");
		$semua=array();
		while ($data_array = $ambil->fetch_assoc())
		{
			$semua[] = $data_array;
		}
		return $semua;
	}

	public function tampil_admin($id_desa){

		$ambil = $this->koneksi->query("SELECT * FROM kegiatan LEFT JOIN desa ON kegiatan.id_desa = desa.id_desa LEFT JOIN jenis_kegiatan ON kegiatan.id_jenis_kegiatan = jenis_kegiatan.id_jenis_kegiatan LEFT JOIN jenis_bantuan ON kegiatan.id_jenis_bantuan = jenis_bantuan.id_jenis_bantuan WHERE kegiatan.id_desa='$id_desa' ORDER BY id_kegiatan DESC");
		$semua=array();
		while ($data_array = $ambil->fetch_assoc())
		{
			$semua[] = $data_array;
		}
		return $semua;
	}

	public function tambah($id_desa,$id_jenis_kegiatan,$id_jenis_bantuan,$judul_kegiatan,$tanggal_kegiatan,$deskripsi_kegiatan,$lat_kegiatan,$lng_kegiatan,$nominal_bantuan){
		$ambil = $this->koneksi->query("SELECT * FROM kegiatan WHERE judul_kegiatan='$judul_kegiatan'");
		if($ambil->num_rows ==1){
			return 'gagal';
		}else{
			$this->koneksi->query("INSERT INTO ".$this->table." (id_desa,id_jenis_kegiatan,id_jenis_bantuan,judul_kegiatan,tanggal_kegiatan,deskripsi_kegiatan,lat_kegiatan,lng_kegiatan,$nominal_bantuan)VALUES('$id_desa','$id_jenis_kegiatan','$id_jenis_bantuan','$judul_kegiatan','$tanggal_kegiatan','$deskripsi_kegiatan','$lat_kegiatan','$lng_kegiatan','$nominal_bantuan')")or die(mysqli_error($this->koneksi));
			return 'berhasil';
		}
	}

	public function edit($id_desa,$id_jenis_kegiatan,$id_jenis_bantuan,$judul_kegiatan,$tanggal_kegiatan,$deskripsi_kegiatan,$lat_kegiatan,$lng_kegiatan,$nominal_bantuan, $id){

		$this->koneksi->query("UPDATE kegiatan SET id_desa='$id_desa', id_jenis_kegiatan='$id_jenis_kegiatan', id_jenis_bantuan='$id_jenis_bantuan', judul_kegiatan='$judul_kegiatan', tanggal_kegiatan='$tanggal_kegiatan', deskripsi_kegiatan='$deskripsi_kegiatan',lat_kegiatan='$lat_kegiatan',lng_kegiatan='$lng_kegiatan',nominal_bantuan='$nominal_bantuan' WHERE id_kegiatan='$id'");
		return 'berhasil';
	}

	function hapus_kegiatan($id)
	{
		$this->koneksi->query("DELETE FROM kegiatan WHERE id_kegiatan='$id'");
	}

	public function detail($id){

		$ambil = $this->koneksi->query("SELECT * FROM kegiatan LEFT JOIN desa ON kegiatan.id_desa = desa.id_desa WHERE kegiatan.id_kegiatan='$id' ORDER BY id_kegiatan DESC");
		$detail = $ambil->fetch_assoc();

		return $detail;
	}

	public function tampil_kegiatan_by_desa($id_desa){

		$ambil = $this->koneksi->query("SELECT * FROM kegiatan LEFT JOIN desa ON kegiatan.id_desa = desa.id_desa WHERE kegiatan.id_desa='$id_desa' ORDER BY id_kegiatan DESC");
		$semua=array();
		while($per_data = $ambil->fetch_assoc()){
			$semua[] = $per_data;
		}

		return $semua;
	}

}

$kegiatan = new kegiatan($db);

class bantuan{

	private $table='bantuan';
	private $koneksi;

	function __construct($db)
	{
		$this->koneksi = $db;
	}

	public function tampil(){

		$ambil = $this->koneksi->query("SELECT * FROM bantuan LEFT JOIN desa ON bantuan.id_desa = desa.id_desa LEFT JOIN jenis_bantuan ON bantuan.id_jenis_bantuan = jenis_bantuan.id_jenis_bantuan ORDER BY id_bantuan DESC");
		$semua=array();
		while ($data_array = $ambil->fetch_assoc())
		{
			$semua[] = $data_array;
		}
		return $semua;
	}

	public function tampil_admin($id_desa){

		$ambil = $this->koneksi->query("SELECT * FROM bantuan LEFT JOIN desa ON bantuan.id_desa = desa.id_desa LEFT JOIN jenis_bantuan ON bantuan.id_jenis_bantuan = jenis_bantuan.id_jenis_bantuan WHERE bantuan.id_desa='$id_desa' ORDER BY id_bantuan DESC");
		$semua=array();
		while ($data_array = $ambil->fetch_assoc())
		{
			$semua[] = $data_array;
		}
		return $semua;
	}

	public function tambah($id_desa,$nama,$kk,$nik,$jk,$alamat,$lat_bantuan,$lng_bantuan,$id_jenis_bantuan,$keterangan,$nominal_bantuan,$tanggal_terima_bantuan,$samping,$depan,$ruang_tengah)
	{


		move_uploaded_file($samping['tmp_name'], "../assets/admin/img/bantuan/".$samping['name']);
		move_uploaded_file($depan['tmp_name'], "../assets/admin/img/bantuan/".$depan['name']);
		move_uploaded_file($ruang_tengah['tmp_name'], "../assets/admin/img/bantuan/".$ruang_tengah['name']);

		$this->koneksi->query("INSERT INTO ".$this->table." (id_desa,nama,kk,nik,jk,alamat,lat_bantuan,lng_bantuan,id_jenis_bantuan,keterangan,nominal_bantuan,tanggal_terima_bantuan,foto_tampak_depan,foto_tampak_samping,foto_tampak_ruang_tamu)VALUES('$id_desa','$nama','$kk','$nik','$jk','$alamat','$lat_bantuan','$lng_bantuan','$id_jenis_bantuan','$keterangan','$nominal_bantuan','$tanggal_terima_bantuan','$depan[name]','$samping[name]','$ruang_tengah[name]')")or die(mysqli_error($this->koneksi));

	}

	public function detail($id){

		$ambil = $this->koneksi->query("SELECT * FROM bantuan LEFT JOIN desa ON bantuan.id_desa = desa.id_desa WHERE bantuan.id_bantuan='$id' ORDER BY id_bantuan DESC");
		$detail = $ambil->fetch_assoc();

		return $detail;
	}

	public function kegiatan($id){

		$semua=array();

		$ambil = $this->koneksi->query("SELECT * FROM detail_kegiatan LEFT JOIN jenis_kegiatan ON detail_kegiatan.id_jenis_kegiatan = jenis_kegiatan.id_jenis_kegiatan WHERE detail_kegiatan.id_bantuan='$id' ORDER BY id_bantuan DESC")or die(mysqli_error($this->koneksi));
		while($detail = $ambil->fetch_assoc()){
			$semua[] = $detail;
		}

		return $semua;
	}

	public function bantuan($id){

		$semua=array();

		$ambil = $this->koneksi->query("SELECT * FROM detail_bantuan LEFT JOIN jenis_bantuan ON detail_bantuan.id_jenis_bantuan = jenis_bantuan.id_jenis_bantuan WHERE detail_bantuan.id_bantuan='$id' ORDER BY id_bantuan DESC")or die(mysqli_error($this->koneksi));
		while($detail = $ambil->fetch_assoc()){
			$semua[] = $detail;
		}

		return $semua;
	}

	public function edit($id_desa,$nama,$kk,$nik,$jk,$alamat,$lat_bantuan,$lng_bantuan,$keterangan,$id_jenis_bantuan,$nominal_bantuan,$tanggal_terima_bantuan,$samping,$depan,$ruang_tengah,$id){

		move_uploaded_file($samping['tmp_name'], "../assets/admin/img/bantuan/".$samping['name']);
		move_uploaded_file($depan['tmp_name'], "../assets/admin/img/bantuan/".$depan['name']);
		move_uploaded_file($ruang_tengah['tmp_name'], "../assets/admin/img/bantuan/".$ruang_tengah['name']);

		$this->koneksi->query("UPDATE bantuan SET nama='$nama',kk='$kk',nik='$nik',jk='$jk',alamat='$alamat',lat_bantuan='$lat_bantuan',lng_bantuan='$lng_bantuan',keterangan='$keterangan',id_jenis_bantuan='$id_jenis_bantuan',nominal_bantuan='$nominal_bantuan',tanggal_terima_bantuan='$tanggal_terima_bantuan', foto_tampak_depan='$depan[name]', foto_tampak_samping='$samping[name]',foto_tampak_ruang_tamu='$ruang_tengah[name]' WHERE id_bantuan='$id'")or die(mysqli_error($this->koneksi));

	}

	public function hapus_bantuan($id)
	{
		$this->koneksi->query("DELETE FROM bantuan WHERE id_bantuan='$id'");
	}

	public function hapus_kegiatan($id)
	{
		$this->koneksi->query("DELETE FROM detail_kegiatan WHERE id_bantuan='$id'");
	}

	public function hapusbantuan($id)
	{
		$this->koneksi->query("DELETE FROM detail_bantuan WHERE id_bantuan='$id'");
	}

	public function tambahDetailBantuan($id,$id_jenis_bantuan,$tgl,$nominal){
		$this->koneksi->query("INSERT INTO detail_bantuan (id_bantuan,id_jenis_bantuan,tgl_peroleh,nominal)VALUES('$id','$id_jenis_bantuan','$tgl','$nominal')");
	}


	public function tambahDetailKegiatan($id,$id_jenis_kegiatan,$tgl,$nama_kegiatan){
		$this->koneksi->query("INSERT INTO detail_kegiatan (id_bantuan,id_jenis_kegiatan,tgl_kegiatan,nama_kegiatan)VALUES('$id','$id_jenis_kegiatan','$tgl','$nama_kegiatan')");
	}

	public function tampil_bantuan_by_desa($id_desa){

		$ambil = $this->koneksi->query("SELECT * FROM bantuan LEFT JOIN desa ON bantuan.id_desa = desa.id_desa WHERE bantuan.id_desa='$id_desa' ORDER BY id_bantuan DESC");
		$semua=array();
		while($per_data = $ambil->fetch_assoc()){
			$semua[] = $per_data;
		}

		return $semua;
	}

}

$bantuan = new bantuan($db);

class kategori{

	private $table='kategori';
	private $koneksi;

	function __construct($db)
	{
		$this->koneksi = $db;
	}

	public function tampil(){

		$ambil = $this->koneksi->query("SELECT * FROM kategori_kegiatan ORDER BY nama_kategori_kegiatan ASC");
		$semua=array();
		while ($data_array = $ambil->fetch_assoc())
		{
			$semua[] = $data_array;
		}
		return $semua;
	}

}

$kategori = new kategori($db);

class login{

	private $koneksi;

	function __construct($db)
	{
		$this->koneksi = $db;
	}

	function login_superadmin ($username, $password)
	{
		$password = sha1($password);

		$ambil = $this->koneksi->query("SELECT * FROM superadmin WHERE username='$username' AND password='$password'");

		$hitung = $ambil->num_rows;
		if ($hitung > false)
		{
			$pecah = $ambil->fetch_array();
			unset($pecah['password']);
			$_SESSION['superadmin'] = $pecah;

			return 'berhasil';
		}
		else
		{
			return 'gagal';
		}
	}

	function login_admin ($username, $password)
	{
		$password = sha1($password);

		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");

		$hitung = $ambil->num_rows;
		if ($hitung > false)
		{
			$pecah = $ambil->fetch_array();
			unset($pecah['password']);
			$_SESSION['admin'] = $pecah;

			return 'berhasil';
		}
		else
		{
			return 'gagal';
		}
	}

}

$login = new login($db);

?>
