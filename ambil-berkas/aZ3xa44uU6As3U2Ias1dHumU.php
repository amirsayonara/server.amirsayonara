<?php
	include '../Ay7jUyNhfkJha8j9.php'; //cek login
	include '../tMzAtMjEtMTYtMzAtOTU.php';//fungsi
	if(isset($_COOKIE[base64_encode('random_karakter')])){
		$decode_url = decode_url($_SERVER['REQUEST_URI']);
		$cookie = base64_decode($_COOKIE[base64_encode('random_karakter')]);
		$random = $decode_url['random'];
		$file = $decode_url['file'];
		if($cookie == $random){
			//Jika file ada maka ganti Header php sesuai type file
			$file1 = '../../server.file/file.user/'.$file;
			$file2 = '../../server.file/file.admin/'.$file;
			if(file_exists($file1)){
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename="'.basename($file1).'"');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file1));
				readfile($file1);
			}else if(file_exists($file2)){
				if ($pengguna=='admin' & $sandi=='470d1ee40a8f7af398de717c8c0c5ff7') {
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename="'.basename($file2).'"');
					header('Expires: 0');
					header('Cache-Control: must-revalidate');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file2));
					readfile($file2);
				} else {
					header('Location: ..');//jika file ada di admin tapi login sebagai user biasa
				}
			} else {
				//Jika file tidak ada
				header('Location: ..');
			}
		}else{
			//echo "Random karakter ($random) salah, silahkan diproses ulang! <a href='..'>index.php</a>";
			header('Location: ..');
		}
	}else{
		//Jika cookie tidak ada
		//echo "Maaf, sesi download anda telah berakhir! Silahkan dicoba kembali <a href='..'>index.php</a>";
		header('Location: ..');
	}
	
	/*
	@$file = $_GET['file'];
	if ($file!=false & file_exists('../../server.file/'.$file)) {
		$file = '../../server.file/'.$file;
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($file).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		readfile($file);
	}*/
?>