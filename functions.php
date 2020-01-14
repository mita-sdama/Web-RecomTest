<?php

// Koneksi ke database
$server = "localhost";
$username = "root";
$passwords = "";
$database = "ai_pilihketua";

$mysqli = mysqli_connect($server, $username, $passwords, $database);

// Check Error, jikalau error tutup koneksi dengan mysql

if (mysqli_connect_errno()){
	echo "Koneksi gagal, ada masalah pada : ".mysqli_connect_error();
	exit();
	mysqli_close($mysqli);
}

function query($query){
	global $mysqli;
	$result = mysqli_query($mysqli, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

// Rekomendasi
function ambilJumlahRekomendasi() {
	$jumlahRekomendasi = query('SELECT COUNT(rekomendasi) FROM rekomendasi WHERE rekomendasi="iya"');
	$jumlahRekomendasi = (int)$jumlahRekomendasi[0]["COUNT(rekomendasi)"];
	return $jumlahRekomendasi;
}

function pilihKehadiran($kehadiran){
	$pilihkehadiran = query("SELECT COUNT(kehadiran) FROM rekomendasi WHERE rekomendasi='iya' AND kehadiran='".$kehadiran."' ");
	$pilihkehadiran = (int)$pilihkehadiran[0]["COUNT(kehadiran)"];
	return $pilihkehadiran;
}

function pilihLingkungan($lingkungan){
	$pilihLingkungan = query("SELECT COUNT(lingkungan) FROM rekomendasi WHERE rekomendasi='iya' AND lingkungan='".$lingkungan."'");
	$pilihLingkungan = (int)$pilihLingkungan[0]["COUNT(lingkungan)"];
	return $pilihLingkungan;
}

function pilihKerjasama($kerjasama){
	$pilihKerjasama = query("SELECT COUNT(kerjasama) FROM rekomendasi WHERE rekomendasi='iya' AND kerjasama='".$kerjasama."'");
	$pilihKerjasama = (int)$pilihKerjasama[0]["COUNT(kerjasama)"];
	return $pilihKerjasama;
}

function pilihPrakarsa($prakarsa){
	$pilihPrakarsa = query("SELECT COUNT(prakarsa) FROM rekomendasi WHERE rekomendasi='iya' AND prakarsa='".$prakarsa."'");
	$pilihPrakarsa = (int)$pilihPrakarsa[0]["COUNT(prakarsa)"];
	return $pilihPrakarsa;
}


// Tidak Rekomendasi
function ambilJumlahTidakRekomendasi() {
	$jumlahTidakRekomendasi = query('SELECT COUNT(rekomendasi) FROM rekomendasi WHERE rekomendasi="tidak"');
	$jumlahTidakRekomendasi = (int)$jumlahTidakRekomendasi[0]["COUNT(rekomendasi)"];
	return $jumlahTidakRekomendasi;
}

function tidakRekomendasiPilihKehadiran($kehadiran){
	$tidakRekomendasiPilihkehadiran = query("SELECT COUNT(kehadiran) FROM rekomendasi WHERE rekomendasi='tidak' AND kehadiran='".$kehadiran."' ");
	$tidakRekomendasiPilihkehadiran = (int)$tidakRekomendasiPilihkehadiran[0]["COUNT(kehadiran)"];
	return $tidakRekomendasiPilihkehadiran;
}

function tidakRekomendasiPilihLingkungan($lingkungan){
	$tidakRekomendasiPilihLingkungan = query("SELECT COUNT(lingkungan) FROM rekomendasi WHERE rekomendasi='tidak' AND lingkungan='".$lingkungan."'");
	$tidakRekomendasiPilihLingkungan = (int)$tidakRekomendasiPilihLingkungan[0]["COUNT(lingkungan)"];
	return $tidakRekomendasiPilihLingkungan;
}

function tidakRekomendasiPilihKerjasama($kerjasama){
	$tidakRekomendasiPilihKerjasama = query("SELECT COUNT(kerjasama) FROM rekomendasi WHERE rekomendasi='tidak' AND kerjasama='".$kerjasama."'");
	$tidakRekomendasiPilihKerjasama = (int)$tidakRekomendasiPilihKerjasama[0]["COUNT(kerjasama)"];
	return $tidakRekomendasiPilihKerjasama;
}

function tidakRekomendasiPilihPrakarsa($prakarsa){
	$tidakRekomendasiPilihPrakarsa = query("SELECT COUNT(prakarsa) FROM rekomendasi WHERE rekomendasi='tidak' AND prakarsa='".$prakarsa."'");
	$tidakRekomendasiPilihPrakarsa = (int)$tidakRekomendasiPilihPrakarsa[0]["COUNT(prakarsa)"];
	return $tidakRekomendasiPilihPrakarsa;
}


// Ambil Jumlah Data
function ambilJumlahData(){
	$jumlahData = query("SELECT COUNT(rekomendasi) FROM rekomendasi");
	$jumlahData = (int)$jumlahData[0]["COUNT(rekomendasi)"];
	return $jumlahData;
}

?>