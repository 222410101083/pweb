<?php
include 'layout/header.php';

$id=$_GET['id'];
$query  = $conn->query("SELECT kategori.*, artikel.* FROM artikel LEFT JOIN kategori on artikel.id_kategori = kategori.id_kategori WHERE artikel.id_artikel = '$id'", PDO::FETCH_ASSOC);
$data   = $query->fetch();
?>

<div class="container mx-auto px-4">
  <div class="content mx-40">
    <div class="artikel-section bg-white shadow-md rounded-lg p-6">
      <div class="judul">
        <h2 class="text-2xl font-bold text-gray-800"><?=$data['judul_artikel'];?></h2>
      </div>
      <div class="attr my-2 text-gray-600">
        <p>
          <?=tanggal($data['tanggal_artikel']);?> /
          <a href="kategori.php?id=<?=$data['id_kategori'];?>" class="text-blue-500 hover:text-blue-700">
            <?=$data['nama_kategori'];?>
          </a>
        </p>
      </div>
      <div class="imgartikel my-4">
        <img src="img/<?=$data['gambar_artikel'];?>" alt="Gambar Artikel" style="width: min-content; height: auto;" class="rounded-lg">
      </div>
      <div class=" text-gray-700">
        <p class="text-xl"><?=$data['isi_artikel'];?></p>
      </div>
    </div>
  </div>
</div>

<?php require 'layout/footer.php'; ?>
