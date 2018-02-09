-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mar 2017 pada 11.25
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p.o.s_berhasil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_barang` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_26_102514_create_table_supplier2s', 1),
(4, '2017_03_26_102857_create_table_barangs', 1),
(5, '2017_03_26_102927_create_table_transaksis', 1),
(6, '2017_03_26_102954_create_table_notifikasis', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasis`
--

CREATE TABLE `notifikasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `pesan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier2s`
--

CREATE TABLE `supplier2s` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_supplier` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier2s`
--

INSERT INTO `supplier2s` (`id`, `nama_supplier`, `alamat`, `no_hp`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'cv. kacangxyz', 'jl. teratai no. 2121', '09877711', '2017-03-27 07:37:18', '2017-03-30 01:42:22', 1),
(2, 'cv. kacang atom garuda', 'jl. atom', '0888', '2017-03-27 07:59:33', '2017-03-30 03:24:36', 1),
(3, 'cv. bhineka', 'jl. atomz', '087666', '2017-03-27 08:04:34', '2017-03-27 08:04:34', 1),
(5, 'cv. bhineka tunggal', 'jl. tunggal agung', '08654', '2017-03-27 08:09:20', '2017-03-27 08:09:20', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'maryadi Adminx', 'maryadi071@gmail.com', '$2y$10$6JPFWSoE0Qj54PGaaK2AXuNwHcufGpfAHo2E4bwPMnlT/mB1LC3KK', 'admin', 'BMqI5zlXdfjbZHd71iZ3M60ZGzxxJFXZymgh5KdP1Mb1M6oW6qxbXas3lb5l', '2017-03-18 15:22:53', '2017-03-31 01:18:25'),
(2, 'operator1 _', 'operator@gmail.com', '$2y$10$b10zUFO38U9UktmDvtH5/erDud8rnhT83/eycU3a2CIMJoA1zxplO', 'operator', 'H9IEd0DbKTizoTRvIYcy9kOYk5EWmiKa1KYAt4YmdZ1HZKFHIuyMuFDm6Wzv', '2017-03-18 15:27:53', '2017-03-31 01:25:51'),
(3, 'maryadi operator2', 'maryadioperator@gmal.com', '$2y$10$ddcuE8MWPYS0QfQtbOAi3uZWvXo3VQCbr0KMDSA3wahByjhe4Etw2', 'operator', 'XPOuC076HZacvGSUZHCemJErmZCBT2pwHphMjWmIecnYhJ2Bvf40xnhyRx2F', '2017-03-20 23:37:25', '2017-03-31 01:09:08'),
(4, 'maryadi operator2', 'maryadioperator2@gmal.com', '$2y$10$wbMd.scUg/.H1VPICUwXte46eGykutSGhw1pY56swyYY9VFIMqub.', 'operator', 'Tfj987ym2KvH9T1HjZGeivtvW08b16eJlTBKxpaR9iQP5N6SZIEBeaUo2MVm', '2017-03-20 23:39:54', '2017-03-20 23:39:54'),
(5, 'operator3', 'operator3@gmail.com', '$2y$10$/cvlF6K/PMZr6O.TbBfJ7OfuYkSFA3TqeC9grqnO8xx6Y2JRGjdIi', 'Pilih Level', NULL, '2017-03-29 07:23:39', '2017-03-29 07:23:39'),
(6, 'operator4', 'operator4@gmail.com', '$2y$10$Wtsh1BBEa6aDr2RHQAHBxere8JURJZNJNVYII97XbAj4YEh2bSJqi', 'Pilih Level', 'A4BKd04fxvFCp3K7JcAsneGZBDcAYP9TbPuUHNQPZazRVLH86k8HnH0FQYYe', '2017-03-29 07:24:46', '2017-03-29 07:24:46'),
(7, 'operator5', 'operator5@gmail.com', '$2y$10$nAx0fpDKhz7kaZpx8hPx/OzPBd0ibnZLj3yArlNvqkFvQ0HncTT7i', 'operator', 'cV1rTKfC82QB88Zsc149E2pFYX1QWtyjyFnmkNPSrHjFRs4LhIfFrHz8qK6R', '2017-03-29 08:20:12', '2017-03-29 08:20:12'),
(8, 'operator6', 'operator6@gmail.com', '$2y$10$ZKYIbFXGlihquCG7RCJ7/ObCcJutn8GNRmTncEqY.h8fTKZzpHg3.', 'operator', 'hIYqmByfICzSMmPXfWbshqEr1X3t0qfVs3h5zWafJHQzljfcAVyJGuhVoalT', '2017-03-29 08:29:48', '2017-03-29 08:29:48'),
(9, 'operator7', 'operator7@gmail.com', '$2y$10$6R2oybqeMsGqnQ0yfMC/BOcrXKgNGFT9pju0PKCBpPZVXs95fj472', 'operator', NULL, '2017-03-29 09:00:18', '2017-03-29 09:00:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_user_id_foreign` (`user_id`),
  ADD KEY `barangs_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasis`
--
ALTER TABLE `notifikasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasis_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `supplier2s`
--
ALTER TABLE `supplier2s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier2s_user_id_foreign` (`user_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`),
  ADD KEY `transaksis_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notifikasis`
--
ALTER TABLE `notifikasis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier2s`
--
ALTER TABLE `supplier2s`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier2s` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifikasis`
--
ALTER TABLE `notifikasis`
  ADD CONSTRAINT `notifikasis_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `supplier2s`
--
ALTER TABLE `supplier2s`
  ADD CONSTRAINT `supplier2s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
