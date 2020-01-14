<?php
	require 'functions.php';
		$nama = $_POST['nama'];
		var_dump($nama);
	// Ambil Data Dari Index
	$kehadiran = $_POST['kehadiran'];
	var_dump($kehadiran);
	$lingkungan = $_POST['lingkungan'];
	var_dump($lingkungan);
	$kerjasama = $_POST['kerjasama'];
	var_dump($kerjasama);
	$prakarsa = $_POST['prakarsa'];
	var_dump($prakarsa);
	

	// Ambil Data Jumlah setiap class dan seluruh class
	$jumlahRekomendasi = ambilJumlahRekomendasi();
	// var_dump($jumlahRekomendasi);
	$jumlahTidakRekomendasi = ambilJumlahTidakRekomendasi();
	// var_dump($jumlahTidakRekomendasi);
	$jumlahData = ambilJumlahData();
	// var_dump($jumlahData);


	// Ambil jumlah class berdasarkan klasifikasi value pada form
	// Rekomendasi
	$pilihkehadiran = pilihkehadiran($kehadiran);
	// var_dump($pilihkehadiran);
	$pilihLingkungan = pilihLingkungan($lingkungan);
	// var_dump($pilihLingkungan);
	$pilihKerjasama = pilihKerjasama($kerjasama);
	// var_dump($pilihKerjasama);
	$pilihPrakarsa = pilihPrakarsa($prakarsa);
	// var_dump($pilihPrakarsa);


	// Tidak Rekomendasi
	$tidakRekomendasiPilihKehadiran = tidakRekomendasiPilihKehadiran($kehadiran);
	// var_dump($tidakRekomendasiPilihKehadiran);
	$tidakRekomendasiPilihLingkungan = tidakRekomendasiPilihLingkungan($lingkungan);
	// var_dump($tidakRekomendasiPilihLingkungan);
	$tidakRekomendasiPilihKerjasama = tidakRekomendasiPilihKerjasama($kerjasama);
	// var_dump($tidakRekomendasiPilihKerjasama);
	$tidakRekomendasiPilihPrakarsa = tidakRekomendasiPilihPrakarsa($prakarsa);
	// var_dump($tidakRekomendasiPilihPrakarsa);


	$hitungRekomendasi = ($pilihkehadiran/$jumlahRekomendasi * $pilihLingkungan/$jumlahRekomendasi * $pilihKerjasama/$jumlahRekomendasi * $pilihPrakarsa/$jumlahRekomendasi) * $jumlahRekomendasi/$jumlahData;
	// var_dump($hitungRekomendasi);

	$hitungTidakRekomendasi = ($tidakRekomendasiPilihKehadiran/$jumlahTidakRekomendasi * $tidakRekomendasiPilihLingkungan/$jumlahTidakRekomendasi * $tidakRekomendasiPilihKerjasama/$jumlahTidakRekomendasi * $tidakRekomendasiPilihPrakarsa/$jumlahTidakRekomendasi) * $jumlahTidakRekomendasi/$jumlahData;
	// var_dump($hitungTidakRekomendasi);

	if ($hitungTidakRekomendasi<$hitungRekomendasi){
		echo "Rekomendasi";
	}
	else {
		echo "Tidak Rekomendasi";
	}
?>