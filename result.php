<?php
	require 'functions.php';
	$nama = $_POST['nama'];
	// var_dump($nama);
	// Ambil Data Dari Index
	$kehadiran = $_POST['kehadiran'];
	// var_dump($kehadiran);
	$lingkungan = $_POST['lingkungan'];
	// var_dump($lingkungan);
	$kerjasama = $_POST['kerjasama'];
	// var_dump($kerjasama);
	$prakarsa = $_POST['prakarsa'];
	// var_dump($prakarsa);
	
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
	
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, maximum-scale=1">
		<title>RecomTEST</title>
		<!-- <link rel="icon" href="favicon.png" type="image/png"> -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
		<link href="css/animate.css" rel="stylesheet" type="text/css">
		<script href="js/datepicker.js"></script>
		
		<!--[if lt IE 9]>
		<script src="js/respond-1.1.0.min.js"></script>
		<script src="js/html5shiv.js"></script>
		<script src="js/html5element.js"></script>
		<![endif]-->
		
	</head>
	<body>
		<!--Header_section-->
		<header id="header_wrapper">
			<div class="container">
				<div class="header_box">
					<div class="logo"><h2 style="color: #ffffff;"><strong style="color: #4c6caf">Hasil</strong> <strong>ANALISIS</strong></h2></div>
					<nav class="navbar navbar-inverse" role="navigation">
						<div class="navbar-header">
							<button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
						</div>
						<div id="main-nav" class="collapse navbar-collapse navStyle">
							<ul class="nav navbar-nav" id="mainNav">
								<li class="active"><a href="#hero_section" class="scroll-link">Data Training</a></li>
								<li><a href="#tes_asma" class="scroll-link">Perhitungan</a></li>
								<li><a href="#team" class="scroll-link">Hasil</a></li>
								<li><a href="#contact" class="scroll-link">Metode</a></li>
								<li><a href="index.php">KEMBALI</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</header>
		<!--Header_section-->
		<!--Hero_Section-->
		<section id="hero_section" class="top_cont_outer" style="background-color: #ffffff;">
			<div class="hero_wrapper">
				
				<div class="container" style="padding-bottom: 50px;padding-top: 30px;">
					<div class="hero_section">
						<div class="row">
							<h1 align="center" style="color: #4c6caf;font-family: century gothic;font-size: 60px;"><strong>Data Training</strong></h1><br>
							<table id="dtbkategori" class="table table-hover" style="color: #000000;">
								<thead >
									<tr style="font-size: 12px;">
										<th>ID </th>
										<th>Kehadiran</th>
										<th>Lingkungan</th>
										<th>Kerjasama</th>
										<th>Prakarsa</th>
										<th>Rekomendasi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									
									$tampil = "SELECT * FROM rekomendasi ORDER BY id_rekomendasi";
									$hasil = mysqli_query($mysqli,$tampil);
									while ($data=mysqli_fetch_array($hasil)) {
									echo "
									<tr style=\"font-size:12px;\">
																
																<td> $data[id_rekomendasi]</td>
																<td> $data[kehadiran]</td>
																<td> $data[lingkungan]</td>
																<td> $data[kerjasama]</td>
																<td> $data[prakarsa]</td>
																<td> $data[rekomendasi]</td>
												</tr>
												";
									}  ?>
								</tbody>
								<tfoot>
								
								</tfoot>
							</table>
						</div>
						
						
					</div>
				</div>
			</div>
		</section>
		
		<!--TesAsma-->
		<section id="tes_asma">
			<div class="inner_wrapper">
				<div class="container">
					<h2 style="margin-bottom: 0px;"><strong>PERHITUNGAN<strong></h2>
					<h1>Keterangan Class</h1>
					<table class="table table-condensed">
						<tr>
							<td>Jumlah Rekomendasi</td>
							<td>:</td>
							<td><?php echo $jumlahRekomendasi;?></td>
						</tr>
						<tr>
							<td>Jumlah Tidak Rekomendasi</td>
							<td>:</td>
							<td><?php echo $jumlahTidakRekomendasi;?></td>
						</tr>
						<tr>
							<td>Jumlah Data</td>
							<td>:</td>
							<td><?php echo $jumlahData;?></td>
						</tr>
						
					</table>


					<h1>Keterangan Rekomendasi</h1>
					<table class="table table-condensed">
						<tr>
							<td>Kehadiran</td>
							<td>:</td>
							<td><?php echo $pilihkehadiran;?></td>
						</tr>
						<tr>
							<td>Lingkungan</td>
							<td>:</td>
							<td><?php echo $pilihLingkungan;?></td>
						</tr>
						<tr>
							<td>Kerjasama</td>
							<td>:</td>
							<td><?php echo $pilihKerjasama;?></td>
						</tr>
						<tr>
							<td>Prakarsa</td>
							<td>:</td>
							<td><?php echo $pilihPrakarsa;?></td>
						</tr>
					</table>


					<h1>Keterangan Tidak Rekomendasi</h1>
					<table class="table table-condensed">
						<tr>
							<td>Kehadiran</td>
							<td>:</td>
							<td><?php echo $tidakRekomendasiPilihKehadiran;?></td>
						</tr>
						<tr>
							<td>Lingkungan</td>
							<td>:</td>
							<td><?php echo $tidakRekomendasiPilihLingkungan;?></td>
						</tr>
						<tr>
							<td>Kerjasama</td>
							<td>:</td>
							<td><?php echo $tidakRekomendasiPilihKerjasama;?></td>
						</tr>
						<tr>
							<td>Prakarsa</td>
							<td>:</td>
							<td><?php echo $tidakRekomendasiPilihPrakarsa;?></td>
						</tr>
					</table>

					<h1>Hitung Rekomendasi</h1>
					<table class="table table-condensed">
						<tr>
							<td>Rumus</td>
							<td colspan="2">(kehadiran/jumlah Rekomendasi * Lingkungan/jumlah Rekomendasi * Kerjasama/jumlah Rekomendasi * Prakarsa/jumlah Rekomendasi) * jumlah Rekomendasi/jumlah Data</td>
							
						</tr>
						<tr>
							<td>Hitung</td>
							<td colspan="2"><?php echo "($pilihkehadiran/$jumlahRekomendasi * $pilihLingkungan/$jumlahRekomendasi * $pilihKerjasama/$jumlahRekomendasi * $pilihPrakarsa/$jumlahRekomendasi) * $jumlahRekomendasi/$jumlahData"?></td>
						</tr>
						<tr>
							<td>Hasil</td>
							<td>:</td>
							<td><?php echo $hitungRekomendasi;?></td>
						</tr>
						
					</table>

					<h1>Hitung Tidak Rekomendasi</h1>
					<table class="table table-condensed">
						<tr>
							<td>Rumus</td>
							<td colspan="2">(tidak Rekomendasi Kehadiran/jumlah Tidak Rekomendasi * tidak Rekomendasi Lingkungan/jumlah Tidak Rekomendasi * tidak Rekomendasi Kerjasama/jumlah Tidak Rekomendasi * tidak Rekomendasi Prakarsa/jumlah Tidak Rekomendasi) * jumlah Tidak Rekomendasi/jumlah Data</td>
							
						</tr>
						<tr>
							<td>Hitung</td>
							<td colspan="2"><?php echo "($tidakRekomendasiPilihKehadiran/$jumlahTidakRekomendasi * $tidakRekomendasiPilihLingkungan/$jumlahTidakRekomendasi * $tidakRekomendasiPilihKerjasama/$jumlahTidakRekomendasi * $tidakRekomendasiPilihPrakarsa/$jumlahTidakRekomendasi) * $jumlahTidakRekomendasi/$jumlahData"?></td>
						</tr>
						<tr>
							<td>Hasil</td>
							<td>:</td>
							<td><?php echo $hitungTidakRekomendasi;?></td>
						</tr>
						
					</table>
				</div>
			</div>
		</section>
		<!--TesAsma---->
		<section class="page_section team" id="team"><!--main-section team-start-->
		<div class="container">
			<h1><strong style="color: #4c6caf;font-family: century gothic;font-size: 60px;">Kesimpulan</strong></h1>
			<table class="table table-hover" style="color: #000000;">
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><?php echo $nama;?></td>
				</tr>
				<tr>
					<td>Kehadiran</td>
					<td>:</td>
					<td><?php echo $kehadiran;?></td>
				</tr>
				<tr>
					<td>Lingkungan</td>
					<td>:</td>
					<td><?php echo $lingkungan;?></td>
				</tr>
				<tr>
					<td>Kerjasama</td>
					<td>:</td>
					<td><?php echo $kerjasama;?></td>
				</tr>
				<tr>
					<td>Prakarsa</td>
					<td>:</td>
					<td><?php echo $prakarsa;?></td>
				</tr>
				<tr>
					<td>Keterangan</td>
					<td>:</td>
					<td>
						<?php
						if ($hitungTidakRekomendasi<$hitungRekomendasi){
						echo "Rekomendasi";
						}
						else {
						echo "Tidak Rekomendasi";
						}
						?>
					</td>
				</tr>
			</table>
		</div>
	</section>
	<!--/Team-->
	<!--Footer-->
	<footer class="footer_wrapper" id="contact" style="margin-top: 30px;">
		<div class="container">
			<section class="page_section contact" id="contact">
				<div class="contact_section">
					<h2>METODE</h2>
					<div class="row">
						<div class="col-lg-4">
							<h2 style="font-size:20pt;">Pengetahuan</h2>
							<p style="text-align:justify;">Langkah paling awal untuk membuat sistem pakar adalah dengan menggali informasi tentang suatu masalah yang akan dipecahkan.</p>
						</div>
						<div class="col-lg-4">
							<h2 style="font-size:20pt;">Naive-Bayes</h2>
							<p style="text-align:justify;">Data yang didapatkan diolah untuk menentukan aturan sistem dalam menentukan keputusan yang ingin didapatkan.</p>
						</div>
						<div class="col-lg-4">
							<h2 style="font-size:20pt;">Keakuratan</h2>
							<p>Pada Sistem pakar ini, tingkat keakuratan masih belum maksimal karena data yang diperoleh masih sedikit sehingga masih belum dapat menggantikan pakar yang sesungguhnya.</p>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="container">
			<div class="footer_bottom"><span>Copyright © <?php echo date('Y');?> </div>
		</div>
	</footer>
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
	<script type="text/javascript" src="js/jquery.nav.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.js"></script>
	<script type="text/javascript" src="js/wow.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>