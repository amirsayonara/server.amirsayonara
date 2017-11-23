<!DOCTYPE html>
<html>
	<head>
		<title>Server Amir Sayonara</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="images/favicon.ico" rel="icon"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<!--header-->
		<div class="header-w3l">
			<h1>Server Amir Sayonara</h1>
		</div>
<?php
include 'yUkTpeU8nhllp.php'; //koneksi
include 'tMzAtMjEtMTYtMzAtOTU.php';//fungsi
@$hal = $_GET['hal'];
switch ($hal) {
case 'masuk':
	@$pengguna = $_SESSION['pengguna'];
	@$sandi = $_SESSION['sandi'];
	if (($pengguna=='admin' & $sandi=='470d1ee40a8f7af398de717c8c0c5ff7')|($pengguna=='user' & $sandi=='ee11cbb19052e40b07aac0ca060c23ee')) {
		header('Location: .');
	} ?>
		<div class="w32">
			<p>Silahkan masuk untuk melihat isi server</p>
		</div>	
		<!--main-->
		<div class="main-content-agile">
			<div class="sub-main-w3">	
				<form action="?hal=test_masuk" method="post">
					<input placeholder="Nama Pengguna" name="pengguna" class="user" type="text" required=""><br>
					<input  placeholder="Sandi" name="sandi" class="pass" type="password" required=""><br>
					<?php if (@$_SESSION['salah']) { ?>
					<div class="w32">
					<p>Nama pengguna dan kata sandi tidak cocok.</p>
					</div> <?php } ?>
					<input type="submit" value="">
				</form>
			</div>
		</div>
		<script>document.getElementsByName('pengguna')[0].value="<?php echo @$_SESSION['salah'] ?>";</script>
		<script>document.getElementsByName('pengguna')[0].select();</script>
		<!--//main-->
	<?php
break;

case 'test_masuk':
	if (!isset($_POST['pengguna']) & !isset($_POST['sandi'])) {
		header('Location: ?hal=masuk');
		break;
	}
	$pengguna = $_POST['pengguna'];
	$sandi = md5($_POST['sandi']);
	if (($pengguna=='admin' & $sandi=='470d1ee40a8f7af398de717c8c0c5ff7')|($pengguna=='user' & $sandi=='ee11cbb19052e40b07aac0ca060c23ee')) {
		$_SESSION['pengguna'] = $pengguna;
		$_SESSION['sandi'] = $sandi;
		unset($_SESSION['salah']);
		header('Location: .');
	} else {
		$_SESSION['salah'] = $pengguna;
		header('Location: ?hal=masuk');
	}
break;

case 'keluar':
	$_SESSION['pengguna'] = $_SESSION['sandi'] = false;
	header('Location: ?hal=masuk');
break;

case 'pindah':
	include 'Ay7jUyNhfkJha8j9.php'; //cek login
	if ($pengguna=='admin' & $sandi=='470d1ee40a8f7af398de717c8c0c5ff7'){
		$file=$_GET['file'];
		$r = explode('&',base64_decode($file))[1];
		$file = explode('&',base64_decode($file))[0];
		$c = 'r='.base64_decode($_COOKIE[base64_encode('random_karakter')]);
		$tujuan = $file;
		if ($r==$c) {
			$tanda = $_GET['tanda'];
			$spl = explode('.', $file);
			if(file_exists('../server.file/file.user/'.$file) & $tanda==0) {
				if(file_exists('../server.file/file.admin/'.$tujuan))
					$tujuan = $spl[0].' - (2).'.$spl[1];
				rename('../server.file/file.user/'.$file, '../server.file/file.admin/'.$tujuan);
			} else if(file_exists('../server.file/file.admin/'.$file) & $tanda==1){
				if(file_exists('../server.file/file.user/'.$tujuan))
					$tujuan = $spl[0].' - (2).'.$spl[1];
				rename('../server.file/file.admin/'.$file, '../server.file/file.user/'.$tujuan);
			}
		}
	} header('Location: .');

case 'hapus':
	include 'Ay7jUyNhfkJha8j9.php'; //cek login
	if ($pengguna=='admin' & $sandi=='470d1ee40a8f7af398de717c8c0c5ff7'){
		$file=$_GET['file'];
		$r = explode('&',base64_decode($file))[1];
		$file = explode('&',base64_decode($file))[0];
		$c = 'r='.base64_decode($_COOKIE[base64_encode('random_karakter')]);
		$tujuan = $file;
		if ($r==$c) {
			$tanda = $_GET['tanda'];
			$spl = explode('.', $file);
			if(file_exists('../server.file/file.user/'.$file) & $tanda==0) {
				unlink('../server.file/file.user/'.$file);
			} else if(file_exists('../server.file/file.admin/'.$file) & $tanda==1){
				if(file_exists('../server.file/file.user/'.$tujuan))
					$tujuan = $spl[0].' - (2).'.$spl[1];
				unlink('../server.file/file.admin/'.$file);
			}
		}
	} header('Location: .');

case 'upload':
	include 'Ay7jUyNhfkJha8j9.php'; //cek login
	$i = 0;
	foreach ($_FILES['file']['name'] as $nama) {
		if ($pengguna=='admin' & $sandi=='470d1ee40a8f7af398de717c8c0c5ff7')
			$tujuan = '../server.file/file.admin/';
		else $tujuan = '../server.file/file.user/';
		if (file_exists($tujuan.$nama)) {
			$spl = explode('.', $nama);
			$tujuan = $tujuan.$spl[0].' - (2).'.$spl[1];
		} else  $tujuan = $tujuan.$nama;
		$asal = $_FILES['file']['tmp_name'][$i];
		move_uploaded_file($asal, $tujuan);
		$i++;
	} header('Location:.');
	
default:
	unset($_SESSION['salah']);
	include 'Ay7jUyNhfkJha8j9.php'; //cek login
	$d = dir("../server.file/file.user/");
	echo '<div class="w32"><p>Anda masuk sebagai ';
	if ($pengguna=='admin' & $sandi=='470d1ee40a8f7af398de717c8c0c5ff7')
		echo 'Administrator';
	else
		echo 'User standard';
	echo '. Berikut isi dari server ini:</p></div>';
	echo "<table><tr><th>No</th><th>Nama File</th><th>Akses</th></tr>";
	//echo "Path: " . $d->path . "\n";
	//echo "<br>";
	$c = 1;$random_karakter = random_karakter();
	while (false !== ($entry = $d->read())) {
		if ($entry!='.' & $entry!='..') {
			echo "<tr><td><center>".$c."</center></td><td>{$entry}";
			echo " (".FileSizeConvert(filesize('../server.file/file.user/'.$entry)).")";
			echo "</td><td><center>";
			@setcookie(base64_encode('random_karakter'), base64_encode($random_karakter), time()+120);
			if ($pengguna=='admin' & $sandi=='470d1ee40a8f7af398de717c8c0c5ff7') { ?>
				<a onclick="location.href='/?hal=pindah&file=<?php echo base64_encode($entry.'&r='.$random_karakter) ?>&tanda=0'">Pindah ke Admin</a><br><br>
				<a onclick="location.href='/?hal=hapus&file=<?php echo base64_encode($entry.'&r='.$random_karakter) ?>&tanda=0'">Hapus</a><br><br>
			<?php } ?>
			<a onclick="location.href='/ambil-berkas?<?php echo base64_encode("file=".$entry."&random=".$random_karakter) ?>'">Unduh</a>
		<?php $c++;}
		echo "</center></td></tr>";
	} if ($pengguna=='admin' & $sandi=='470d1ee40a8f7af398de717c8c0c5ff7') {
		echo "<tr><td colspan='3'><center><b>Berkas Admin</b></center></td></tr>";
		$d = dir("../server.file/file.admin/");
		while (false !== ($entry = $d->read())) {
			if ($entry!='.' & $entry!='..') {
				echo "<tr><td><center>".$c."</center></td><td>{$entry}";
				echo " (".FileSizeConvert(filesize('../server.file/file.admin/'.$entry)).")";
				echo "</td><td><center>";
				@setcookie(base64_encode('random_karakter'), base64_encode($random_karakter), time()+120);
				if ($pengguna=='admin' & $sandi=='470d1ee40a8f7af398de717c8c0c5ff7') { ?>
				<a onclick="location.href='/?hal=pindah&file=<?php echo base64_encode($entry.'&r='.$random_karakter) ?>&tanda=1'">Pindah ke User</a><br><br>
				<a onclick="location.href='/?hal=hapus&file=<?php echo base64_encode($entry.'&r='.$random_karakter) ?>&tanda=1'">Hapus</a><br><br>
				<?php } ?>
				<a onclick="location.href='/ambil-berkas?<?php echo base64_encode("file=".$entry."&random=".$random_karakter) ?>'">Unduh</a>
			<?php $c++;}
			echo "</center></td></tr>";
		}		
	} $d->close();?>
	<tr><td colspan='2'><form enctype='multipart/form-data' action='?hal=upload' method='post'><label onmouseover="this.style.cursor='pointer';" style="border: 1px solid white; padding: 0px 5px;border-radius: 3px;"><input style="display: none;" name="file[]" multiple required type="file" onchange="var tmp; if (this.files.length>1) tmp='&nbsp;'+this.files.length+' file dipilih'; else tmp = '&nbsp;'+this.value.replace('C:\\fakepath\\', ''); document.getElementById('pesan').innerHTML=tmp;"/>Pilih file</label><span id="pesan">&nbsp;Tidak ada file yang dipilih</span><td><center><input style="border: 1px solid white;color: white; border-radius: 3px;background-color: transparent;" onmouseover="this.style.cursor='pointer';" type='submit' value='Upload' onclick="var tmp=document.getElementsByName('file[]')[0]; if (tmp.files.length>0) return true; else {document.getElementById('pesan').innerHTML=' Silahkan pilih file/beberapa file terlebih dahulu'; return false;}" /></form></center></td></tr></table><br>
	<input class="terro_kaluarrah" type="submit" value="" onclick="location.href='?hal=keluar'">
	<?php
break;
	
}
?>
		<!--footer-->
		<div class="footer">
			<p>Copyright Â© Server Amir Sayonara | All rights reserved.</p>
		</div>
		<!--//footer-->

	</body>
</html>