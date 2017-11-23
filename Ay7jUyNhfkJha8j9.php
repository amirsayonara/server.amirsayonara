<?php
	include 'yUkTpeU8nhllp.php'; //koneksi
	if (!isset($_SESSION['pengguna'])) $_SESSION['pengguna'] = false;
	if (!isset($_SESSION['sandi'])) $_SESSION['sandi'] = false;
	$pengguna = $_SESSION['pengguna'];$sandi = $_SESSION['sandi'];
	if ((($pengguna=='admin' & $sandi=='470d1ee40a8f7af398de717c8c0c5ff7')|($pengguna=='user' & $sandi=='ee11cbb19052e40b07aac0ca060c23ee'))==false) {
		header('Location: ?hal=masuk');
	}
?>