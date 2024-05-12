<?php
require 'layout/header.php';

$query = $conn->query("SELECT kategori.* ,artikel.* FROM artikel LEFT JOIN kategori on artikel.id_kategori = kategori.id_kategori ORDER BY artikel.id_artikel DESC LIMIT 4");
?>

<section class="relative  bg-blueGray-50">
  <div class="relative pt-52 pb-52 flex content-center items-center justify-center min-h-screen-75">
    <div class="absolute top-0 w-full h-full bg-center bg-cover bg-[url('./assets/images/bg.jpg')]">
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
    <div class="container relative mx-auto">
      <div class="items-center flex flex-wrap">
        <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
          <div class="pr-12">
            <h1 class="text-white font-semibold text-5xl">
              Selamat Datang di Desa Jatimulyo
            </h1>
            <p class=" font-bold mt-4 text-lg text-white">
              Kecamatan Jenggawah, Kabupaten Jember
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
      style="transform: translateZ(0px)">
      <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
        version="1.1" viewBox="0 0 2560 100" x="0" y="0">
        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </div>
  <section class="pb-10 bg-blueGray-200 -mt-24">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap">
        <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
          <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
            <div class="px-4 py-5 flex-auto">
              <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                <i class="fas fa-award"></i>
              </div>
              <h6 class="text-xl font-semibold">Profil Desa</h6>
              <p class="mt-2 mb-4 text-blueGray-500">
                Divide details about your product or agency work into parts.
                A paragraph describing a feature will be enough.
              </p>
            </div>
          </div>
        </div>
        <div class="w-full md:w-4/12 px-4 text-center">
          <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
            <div class="px-4 py-5 flex-auto">
              <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-lightBlue-400">
                <i class="fas fa-retweet"></i>
              </div>
              <h6 class="text-xl font-semibold">Aduan</h6>
              <p class="mt-2 mb-4 text-blueGray-500">
                Keep you user engaged by providing meaningful information.
                Remember that by this time, the user is curious.
              </p>
            </div>
          </div>
        </div>
        <div class="pt-6 w-full md:w-4/12 px-4 text-center">
          <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
            <div class="px-4 py-5 flex-auto">
              <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-emerald-400">
                <i class="fas fa-fingerprint"></i>
              </div>
              <h6 class="text-xl font-semibold">Galeri</h6>
              <p class="mt-2 mb-4 text-blueGray-500">
                Write a few lines about each one. A paragraph describing a
                feature will be enough. Keep you user engaged!
              </p>
            </div>
          </div>
        </div>
      </div>
  </section>
</section>
<!-- Berita -->
<div class="pb-4 relative flex min-h-screen flex-col justify-center overflow-hidden bg-slate-100">
  <div class="min-h-12 ">
    <div class="max-w-screen-lg mx-auto">
      <h2 class="font-bold text-center text-4xl text-slate-700 font-display">
        Berita Terbaru
      </h2>
      <div class="flex flex-wrap mt-10">
        <?php
        $count = 0;
        while (($data = $query->fetch()) && $count < 4) {
          $count++;
          ?>
          <div class="w-full md:w-[24%] m-[5px] bg-white shadow-lg rounded-lg overflow-hidden"> <!-- Responsive width -->

            <img src="img/<?= $data['gambar_artikel'] ?>" class="object-cover h-52 w-full" alt="">
            <div class="p-6">
              <span class="block text-slate-400 font-semibold text-sm">
                <p>
                  <?= tanggal($data['tanggal_artikel']); ?> /
                  <a href="kategori.php?id=<?= $data['id_kategori']; ?>">
                    <?= $data['nama_kategori']; ?>
                  </a>
                </p>
              </span>
              <h3 class="mt-3 font-bold text-lg pb-4 border-b border-slate-300">
                <a href="lihat_artikel.php?id=<?= $data['id_artikel']; ?>"><?= $data['judul_artikel']; ?></a>
              </h3>
              <div class="flex mt-4 gap-4 items-center">
                <span class="flex gap-1 items-center text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                  </svg>
                  35
                </span>
                <span class="flex gap-1 items-center text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="text-sky-400 w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                  </svg>
                  20
                </span>
                <span class="flex gap-1 items-center text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 text-lime-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                  </svg>
                  15
                </span>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="text-center mt-8">
        <a href="berita.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Lihat Semua Berita
        </a>
      </div>
    </div>
  </div>
</div>
<?php require 'layout/footer.php'; ?>