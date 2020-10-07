<?php
if(isset($_GET['id']))
{
  $ambil = $jenis_bantuan->hapus($_GET['id']);
  echo "<script>alert('Data Berhasil Di Hapus');location='index.php?halaman=jenis_bantuan'</script>";
}
?>