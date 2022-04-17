<?php

include "koneksi.php";
include "excel_reader2.php";

$target = basename($_FILES['filemahasiswa']['name']);
move_uploaded_file($_FILES['filemahasiswa']['tmp_name'], $target);

chmod($_FILES['filemahasiswa']['name'], 0777);


$data = new Spreadsheet_Excel_Reader($_FILES['filemahasiswa']['name'], false);

$jumlah_baris = $data->rowcount($sheet_index = 0);


$berhasil = 0;
for($i = 2; $i <= $jumlah_baris; $i++)
{
	
	$Nim = $data->val($i, 1);
	$Nama = $data->val($i, 2);
	$Jk = $data->val($i, 3);
	$Prodi = $data->val($i, 4);
	$Alamat = $data->val($i, 5);
	$Kota = $data->val($i, 6);
	$Email = $data->val($i, 7);

	
	if($Nim != "" && $Nama != "" && $Jk != "" && $Prodi != "" && $Alamat != "" && $Kota != "" && $Email != ""){
		
		mysqli_query($koneksi, "INSERT INTO tmahasiswa VALUES ('', '$Nim', '$Nama', '$Jk', '$Prodi', '$Alamat', '$Kota', '$Email') ");
		$berhasil++;
	}
}


unlink($_FILES['filemahasiswa']['name']);



header("location:index.php?berhasil=$berhasil");

?>