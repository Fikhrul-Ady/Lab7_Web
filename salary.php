<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
</head>
<body>
    <?php
    // Membuat form input
    echo "<h1>Form Input</h1>";
    echo "<form method='post'>";
    echo "<p>Nama: <input type='text' name='nama'></p>";
    echo "<p>Tanggal Lahir: <input type='date' name='tgl_lahir'></p>";
    echo "<p>Pekerjaan: <select name='pekerjaan'>";
    echo "<option value='Guru'>Guru</option>";
    echo "<option value='Dokter'>Dokter</option>";
    echo "<option value='Programmer'>Programmer</option>";
    echo "<option value='Pengusaha'>Pengusaha</option>";
    echo "</select></p>";
    echo "<p><input type='submit' name='submit' value='Kirim'></p>";
    echo "</form>";
    ?>

    <?php
    // Menangkap inputan dari form
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $pekerjaan = $_POST['pekerjaan'];
    ?>
    
    <?php
    // Menghitung umur berdasarkan tanggal lahir
    $tanggal = new DateTime($tgl_lahir);
    $sekarang = new DateTime();
    $umur = $sekarang->diff($tanggal);
    ?>

    <?php
    // Menentukan gaji berdasarkan pekerjaan
    switch ($pekerjaan) {
        case 'Guru':
            $gaji = 5000000;
            break;
        case 'Dokter':
            $gaji = 10000000;
            break;
        case 'Programmer':
            $gaji = 8000000;
            break;
        case 'Pengusaha':
            $gaji = 15000000;
            break;
        default:
            $gaji = 0;
    }
    ?>
    
    <?php
    // Menampilkan output dengan tab
    echo "<h1>Output</h1>";
    echo "<div class='tab'>";
    echo "<button class='tablinks' onclick='openTab(event, \"Data\")'>Data</button>";
    echo "<button class='tablinks' onclick='openTab(event, \"Grafik\")'>Grafik</button>";
    echo "</div>";

    echo "<div id='Data' class='tabcontent'>";
    echo "<p>Nama: $nama</p>";
    echo "<p>Umur: ".$umur->y." tahun</p>";
    echo "<p>Pekerjaan: $pekerjaan</p>";
    echo "<p>Gaji: Rp. ".number_format($gaji, 0, ',', '.')."</p>";
    echo "</div>";

    echo "<div id='Grafik' class='tabcontent'>";
    echo "<p>Ini adalah grafik yang menunjukkan perbandingan gaji antara pekerjaan yang berbeda.</p>";
    echo "<img src='grafik.png' alt='Grafik Gaji'>";
    echo "</div>";
    ?>

    <?php
    // Menambahkan style CSS untuk tab
    echo "<style>";
    echo ".tab { overflow: hidden; border: 1px solid #ccc; background-color: #f1f1f1; }";
    echo ".tab button { background-color: inherit; float: left; border: none; outline: none; cursor: pointer; padding: 14px 16px; transition: 0.3s; font-size: 17px; }";
    echo ".tab button:hover { background-color: #ddd; }";
    echo ".tab button.active { background-color: #ccc; }";
    echo ".tabcontent { display: none; padding: 6px 12px; border: 1px solid #ccc; border-top: none; }";
    echo ".box { border: 2px solid #000; margin: 10px; padding: 10px; background-color: #fff; }";
    echo "</style>";
    ?>

    <?php
    // Menambahkan script JS untuk tab
    echo "<script>";
    echo "function openTab(evt, tabName) {";
    echo "  var i, tabcontent, tablinks;";
    echo "  tabcontent = document.getElementsByClassName('tabcontent');";
    echo "  for (i = 0; i < tabcontent.length; i++) {";
    echo "    tabcontent[i].style.display = 'none';";
    echo "  }";
    echo "  tablinks = document.getElementsByClassName('tablinks');";
    echo "  for (i = 0; i < tablinks.length; i++) {";
    echo "    tablinks[i].className = tablinks[i].className.replace(' active', '');";
    echo "  }";
    echo "  document.getElementById(tabName).style.display = 'block';";
    echo "  evt.currentTarget.className += ' active';";
    echo "}";
    echo "</script>";
    }
    ?>

</body>
</html>