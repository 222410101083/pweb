<?php
require 'config/db_connect.php';
require 'config/function.libs.php';
// require_once 'db_connect.php'; // Pastikan ini adalah path yang benar ke file koneksi Anda

$q = $_GET['q'] ?? ''; // Ambil query dari URL

$query = $conn->prepare("SELECT kategori.*, artikel.* FROM artikel LEFT JOIN kategori ON artikel.id_kategori = kategori.id_kategori WHERE artikel.judul_artikel LIKE ? ORDER BY artikel.id_artikel DESC");
$query->execute(['%' . $q . '%']);

while ($data = $query->fetch()) {
    echo '<div class="grid bg-white rounded-lg shadow-md overflow-hidden">';
    echo '<div class="cover_grid_news"><img src="img/' . $data['gambar_artikel'] . '" class="w-full h-48 object-cover"></div>';
    echo '<div class="p-4">';
    echo '<div class="judul"><h3 class="text-xl font-semibold mb-2"><a href="lihat_artikel.php?id=' . $data['id_artikel'] . '" class="text-blue-500 hover:text-blue-700">' . $data['judul_artikel'] . '</a></h3></div>';
    echo '<div class="attr text-gray-600 text-sm mb-4"><p>' . tanggal($data['tanggal_artikel']) . ' / <a href="kategori.php?id=' . $data['id_kategori'] . '" class="text-blue-500 hover:text-blue-700">' . $data['nama_kategori'] . '</a></p></div>';
    echo '<div class="isi text-gray-800"><p>' . substr($data['isi_artikel'], 0, 125) . '...</p></div>';
    echo '<div class="tombol_lihat mt-4"><a href="lihat_artikel.php?id=' . $data['id_artikel'] . '" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Baca Selengkapnya</a></div>';
    echo '</div></div>';
}
?>