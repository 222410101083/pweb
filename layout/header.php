<?php
require 'config/db_connect.php';
require 'config/function.libs.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Website Desa Jatimulyo</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
  <link rel="stylesheet" href="assets/css/output.css">
  <link rel="stylesheet" href="assets/css/fonts.css">
  <link rel="stylesheet" href="assets/css/fontawesome-all.css">
</head>

<body>
  <header>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img class="h-8" src="assets/images/logo.png">
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
          <ul
            class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a href="index.php"
              class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                aria-current="page">Home</a>
            </li>
            <li>
              <a href="berita.php"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Berita</a>
            </li>
            <li>
              <a href="galeri.php"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Galeri</a>
            </li>
            <li>
              <a href="aduan.php"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Aduan</a>
            </li>
            <li>
              <a href="profildesa.php"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profil Desa</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- 
    <nav class="navbar">
      <div class="row">
        <div class="nav-brand">
          <a href="index.php">
            <img src="assets/images/logo.png">
          </a>
        </div>
        <div class="flex h-[100%]">
          <ul class="flex justify-start flex-nowrap m-0 p-0 text-center ">
            <li><a href="index.php"><i class="fa fa-home"></i> HOME</a></li>
            <li><a href="berita.php"><i class="fa fa-newspaper"></i> BERITA</a></li>
            <li><a href="galeri.php"><i class="fa fa-images"></i> GALERI</a></li>
          </ul>
        </div>
        <div class="nav-sisa">
          <div class="kontak">
            <a href="kontak.php"><i class="fa fa-envelope"></i> Kontak Desa</a>
          </div>
        </div>
      </div>
    </nav>
  </header> -->
    <!-- <div class="clear"></div> -->