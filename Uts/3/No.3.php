<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>UTS 3</title>
</head>

<body>

    <h2>Soal NO.3</h2>
    <h5 align="center">Tyas Adi</h5>

    <table>
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Ukuran</th>
            <th>Contact</th>
            <th>Warna</th>
        </tr>

        <?php

			$json_data = file_get_contents("produk.json");
			$products = json_decode($json_data, true);
			if(count($products) != 0){
				foreach ($products as $product) {
					?>
        <tr>
            <td>
                <img src="<?php echo $product['gambar']; ?>" alt="">
            </td>
            <td>
                <?php echo $product['nama']; ?>
            </td>
            <td>
                <?php echo $product['harga']; ?>;
            </td>
            <td>
                <?php echo $product['ukuran']; ?>
            </td>
            <td>
                <?php echo $product['contact']; ?>
            </td>
            <td>
                <select name="warna" id="warna">
                    <option value="pilih warna">Pilih Warna</option>
                    <option value="Putih">Putih</option>
                    <option value="Biru">Hijau</option>
                    <option value="merah">Biru</option>
                </select>
            </td>
        </tr>
        <?php
				}
			}
		?>
    </table>
</body>

</html>