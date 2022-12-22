-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 05:49 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_spbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkets`
--

CREATE TABLE `angkets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `angkets`
--

INSERT INTO `angkets` (`id`, `link`, `created_at`, `updated_at`) VALUES
(1, 'https://forms.gle/z51XHjLr2ktXWQBf8', '2022-12-21 21:48:26', '2022-12-21 21:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `nama_area`, `slug_area`, `created_at`, `updated_at`) VALUES
(1, 'Kebijakan Internal Tata Kelola SPBE', 'kebijakan-internal-tata-kelola-spbe', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(2, 'Perancangan Strategis SPBE', 'perancangan-strategis-spbe', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(3, 'Teknologi Informasi dan Komunikasi', 'teknologi-informasi-dan-komunikasi', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(4, 'Penyelenggaraan SPBE', 'penyelenggaraan-spbe', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(5, 'Penerapan Manajemen SPBE', 'penerapan-manajemen-spbe', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(6, 'Pelaksanaan Audit TIK', 'pelaksanaan-audit-tik', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(7, 'Layanan Administrasi Pemerintahan Berbasis Elektronik', 'layanan-administrasi-pemerintahan-berbasis-elektronik', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(8, 'Layanan Publik Berbasis Elektronik', 'layanan-publik-berbasis-elektronik', '2022-12-21 21:48:26', '2022-12-21 21:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kabkotas`
--

CREATE TABLE `kabkotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kabkota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_kabkota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provinsi_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kabkotas`
--

INSERT INTO `kabkotas` (`id`, `nama_kabkota`, `slug_kabkota`, `created_at`, `updated_at`, `provinsi_id`) VALUES
(1, 'Jakarta Timur', 'jakarta-timur', '2022-12-21 21:48:26', '2022-12-21 21:48:26', 21),
(2, 'Jakarta Pusat', 'jakarta-Pusat', '2022-12-21 21:48:26', '2022-12-21 21:48:26', 21),
(3, 'Jakarta Barat', 'jakarta-barat', '2022-12-21 21:48:26', '2022-12-21 21:48:26', 21),
(4, 'Semarang', 'semarang', '2022-12-21 21:48:26', '2022-12-21 21:48:26', 22),
(5, 'Solo', 'solo', '2022-12-21 21:48:26', '2022-12-21 21:48:26', 22),
(6, 'Jepara', 'jepara', '2022-12-21 21:48:26', '2022-12-21 21:48:26', 22);

-- --------------------------------------------------------

--
-- Table structure for table `kabkota_perencanaan`
--

CREATE TABLE `kabkota_perencanaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kabkota_id` int(11) NOT NULL,
  `perencanaan_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `provinsi_id` int(11) DEFAULT NULL,
  `status_persetujuan` int(11) DEFAULT NULL,
  `persentase_akhir` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_10_010326_create_perencanaans_table', 1),
(6, '2022_11_10_010455_create_usulans_table', 1),
(7, '2022_11_10_042916_create_areas_table', 1),
(8, '2022_11_29_163921_create_provinsis_table', 1),
(9, '2022_11_29_164229_create_kabkotas_table', 1),
(10, '2022_11_29_164409_create_progress_table', 1),
(11, '2022_11_29_172210_create_pics_table', 1),
(12, '2022_11_30_035112_create_perencanaan_provinsi_table', 1),
(13, '2022_12_06_081423_create_roles_table', 1),
(14, '2022_12_10_043437_create_angkets_table', 1),
(15, '2022_12_12_073201_create_kabkota_perencanaan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perencanaans`
--

CREATE TABLE `perencanaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peserta` int(11) DEFAULT NULL,
  `lama` int(11) DEFAULT NULL,
  `tanggalAwalPelaksanaan` date DEFAULT NULL,
  `tanggalAkhirPelaksanaan` date DEFAULT NULL,
  `status_kegiatan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pic_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan_provinsi`
--

CREATE TABLE `perencanaan_provinsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perencanaan_id` int(11) NOT NULL,
  `provinsi_id` int(11) DEFAULT NULL,
  `kab_id` int(11) DEFAULT NULL,
  `status_persetujuan` int(11) DEFAULT NULL,
  `persentase_akhir` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pics`
--

CREATE TABLE `pics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pics`
--

INSERT INTO `pics` (`id`, `nama_pic`, `slug_pic`, `created_at`, `updated_at`) VALUES
(1, 'Tim SPBE', 'tim-spbe', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(2, 'Admin Provinsi', 'admin-provinsi', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(3, 'Admin Kabupaten/Kota', 'admin-kabkota', '2022-12-21 21:48:26', '2022-12-21 21:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rincian_perkembangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peserta` int(11) DEFAULT NULL,
  `realisasi_kegiatan` int(11) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_tolak` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pengelolaan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pengelolaan_kabkota_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinsis`
--

CREATE TABLE `provinsis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsis`
--

INSERT INTO `provinsis` (`id`, `nama_provinsi`, `slug_provinsi`, `created_at`, `updated_at`) VALUES
(21, 'DKI Jakarta', 'dki-jakarta', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(22, 'Jawa Tengah', 'jawa-tengah', '2022-12-21 21:48:26', '2022-12-21 21:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Tim SPBE', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(2, 'Admin Provinsi', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(3, 'Admin Kabupaten/Kota', '2022-12-21 21:48:26', '2022-12-21 21:48:26'),
(4, 'Pimpinan', '2022-12-21 21:48:26', '2022-12-21 21:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `provinsi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kabkota_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_user`, `slug_user`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `pic_id`, `area_id`, `provinsi_id`, `kabkota_id`) VALUES
(1, 'Developer', 'developer', 'develops@gmail.com', NULL, '$2y$10$QcwkYRKXrQwezoy7HYtKEOo2YQoEK8WufHDQbGo7SrrlBcmYO0h5i', 0, NULL, '2022-12-21 21:48:26', '2022-12-21 21:48:26', NULL, NULL, NULL, NULL),
(2, 'Pimpinan', 'pimpinan', 'pimpinan@gmail.com', NULL, '$2y$10$jwl70ZREnKKCPxrIxiD3jeqdNEys/u1YpZYam9Kp4/aoKrdR7YwcW', 4, NULL, '2022-12-21 21:48:26', '2022-12-21 21:48:26', NULL, NULL, NULL, NULL),
(3, 'Admin Pusat', 'admin-pusat', 'pusat@gmail.com', NULL, '$2y$10$SKJT49MmTsiD3TCCrn3z5eKT4OgMft/Uv6pCxF/wWGEK0OQo3Bejm', 5, NULL, '2022-12-21 21:48:26', '2022-12-21 21:48:26', NULL, NULL, NULL, NULL),
(4, 'Kebijakan Internal Tata Kelola SPBE', 'kitkspbe', 'kitkspbe@gmail.com', NULL, '$2y$10$20FeJl1e7Y6yh/2veziloOzENZ7Bsp4QzSO6VXAykeoz3VIthkY/y', 1, NULL, '2022-12-21 21:48:26', '2022-12-21 21:48:26', 1, 1, NULL, NULL),
(5, 'DKI Jakarta', 'dki-jakarta', 'dkijakarta@gmail.com', NULL, '$2y$10$p6bcaxRepL65wp6TrcxF8u8JOi4yTJr7u3CXZnQt1/wIxYGnzPlO.', 2, NULL, '2022-12-21 21:48:26', '2022-12-21 21:48:26', 2, NULL, 21, NULL),
(6, 'Jakarta Barat', 'jakarta-barat', 'jakartabarat@gmail.com', NULL, '$2y$10$7OMbe2kxmwARwxFqesgIk.y1pScBs7sddRzwAcqvFtAPDG7JqhMTe', 3, NULL, '2022-12-21 21:48:26', '2022-12-21 21:48:26', NULL, NULL, 21, 3);

-- --------------------------------------------------------

--
-- Table structure for table `usulans`
--

CREATE TABLE `usulans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_usulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_usulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_usulan` int(11) DEFAULT NULL,
  `satuankerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peserta` int(11) DEFAULT NULL,
  `lama` int(11) DEFAULT NULL,
  `tanggalAwalPelaksanaan` date DEFAULT NULL,
  `tanggalAkhirPelaksanaan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `provinsi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kabkota_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usulans`
--

INSERT INTO `usulans` (`id`, `nama_usulan`, `slug_usulan`, `status_usulan`, `satuankerja`, `deskripsi`, `tujuan`, `peserta`, `lama`, `tanggalAwalPelaksanaan`, `tanggalAkhirPelaksanaan`, `created_at`, `updated_at`, `user_id`, `area_id`, `pic_id`, `provinsi_id`, `kabkota_id`) VALUES
(1, 'Aut sapiente.', 'ex-autem-quaerat-dicta-est-ut-eos-nihil', 0, 'Eligendi dolorem nihil.', '[\"Similique aperiam itaque atque ut aliquid autem occaecati. Qui at quidem quisquam vitae est rem. Voluptas consequatur eligendi eos earum. Veniam et rerum occaecati rerum magni. Consequatur ut iusto maxime est impedit.\",\"Maxime qui quia qui non ratione consequatur. Error placeat voluptatem quae ut consequatur tenetur qui. Velit ab voluptatem facilis recusandae.\",\"Est voluptas vel nulla neque. Dolorum veniam autem delectus. Occaecati nostrum omnis accusamus natus esse omnis. Recusandae dolore illum sunt voluptatem pariatur.\",\"Non omnis deserunt blanditiis voluptates aut iste. Eius temporibus ipsam labore vel officiis voluptatem in.\"]', 'Vel qui nisi aut corporis.', 25, 1, '1999-04-04', '1971-08-28', '2022-09-10 22:40:11', '2022-01-27 07:20:01', NULL, 7, 3, 3, 1),
(2, 'Aut reiciendis inventore ipsa deserunt perferendis nam.', 'et-harum-quia-perferendis-omnis-eos-officia', 0, 'Omnis dolores.', '[\"Voluptate nihil laborum quo dolorem quasi consequatur. Cum cumque eum quidem quia vero vero suscipit. Ut commodi expedita ea id. Sed assumenda aliquam itaque ipsa totam.\",\"Quo molestias sed et earum et rerum esse sunt. In et eum vero doloribus natus. Culpa id harum tempora.\",\"Sed recusandae qui hic. Eveniet sunt quis qui quod. Ullam eius optio maiores numquam quis qui neque.\",\"Sed incidunt quisquam ullam consequuntur placeat. Quia sunt sit quo nesciunt aut nisi. In non qui porro.\"]', 'Vitae aut nam.', 42, 1, '1996-03-14', '1971-04-09', '2022-10-22 20:02:09', '2022-07-05 22:23:39', NULL, 7, 5, 4, 3),
(3, 'Libero rerum.', 'qui-est-suscipit-sint-aut-voluptatem-repellat', 0, 'Tempore rem.', '[\"Accusamus odit quasi totam recusandae magni. Aut ut a enim unde dicta accusamus. Velit hic ea aut veritatis eveniet nam quia et. Voluptas hic eum soluta explicabo. Commodi aliquam quasi occaecati.\",\"Sed error voluptatibus dolorum ipsa aut culpa. Earum quas autem debitis magni vero. Provident enim autem quaerat consectetur est illo. Ullam quod nemo dicta aspernatur tempore quod.\",\"Et minima accusamus natus non unde. Omnis molestiae quia commodi corporis consequuntur occaecati et quod. In officiis commodi possimus odio incidunt consequatur sint cupiditate. Et illo dolores odio corrupti. Dolorem explicabo et qui.\",\"Sit quisquam eos rem et quidem sequi ut. Sunt voluptate molestiae et. Blanditiis nesciunt iusto fugiat dolores consequatur illum amet. Ut velit id ipsa error eligendi nobis quisquam.\",\"Molestiae doloribus aut qui. Omnis officiis possimus vero quibusdam. Autem harum dolores unde aperiam fuga odio.\"]', 'Omnis quis ipsam corporis.', 35, 2, '2016-07-01', '1979-05-28', '2022-12-12 00:00:14', '2022-05-12 22:35:03', NULL, 5, 8, 4, 1),
(4, 'Qui molestias dolor.', 'cupiditate-ullam-quibusdam-quia-corporis-et-quibusdam-ratione', 0, 'Voluptatibus explicabo est.', '[\"Asperiores in qui omnis voluptas quaerat architecto. Earum tenetur eius vel ex consequuntur. Sit odio voluptatem occaecati praesentium aut asperiores assumenda repudiandae. Necessitatibus consequatur sunt iste aut quia sint.\",\"Repudiandae et ratione rerum dolor blanditiis. Iste voluptate aliquid ad. Vitae laudantium ea omnis consequatur aliquid iure. Veniam quae voluptas veniam cupiditate excepturi ex.\",\"Dolores numquam nemo similique dolorem sit quidem aut. Voluptate quaerat sint enim rerum.\",\"Eos voluptatum nemo ut eos est corporis. Eligendi eligendi rem dolorem et. Consequatur aperiam qui beatae placeat repellendus consequuntur eum minus. Quisquam iusto porro sit molestias est aut.\",\"Rerum natus qui nulla labore qui. Magnam nulla ut beatae atque quaerat quo quasi est. Omnis sequi cum voluptas veritatis dolores. Itaque delectus quod iste officia accusamus porro.\"]', 'Similique possimus molestiae asperiores natus.', 69, 1, '1994-07-23', '1998-09-18', '2022-04-27 07:29:12', '2022-04-19 03:35:04', NULL, 4, 5, 2, 4),
(5, 'Cupiditate dolor qui optio eum sint.', 'qui-aut-ad-cumque-placeat-vitae-laboriosam', 0, 'Mollitia facilis nostrum.', '[\"Consequatur rerum doloremque autem tempora harum. Quae voluptatem impedit velit vel. Assumenda doloribus atque dicta at. Reiciendis asperiores deleniti quidem saepe est aliquam explicabo.\",\"Omnis qui expedita quidem. Pariatur aut rerum voluptates facere. Asperiores nisi quo cum nostrum quidem architecto. Et earum sint ea consequuntur optio. Non est nostrum esse veniam dignissimos ut est.\",\"Asperiores tempore sed voluptate vitae in. Qui dolores voluptatem at ut in commodi. Non libero est enim rerum. Cupiditate fugiat dolor quidem praesentium error rerum.\",\"Culpa hic aut impedit nemo sit ratione ea. Labore unde excepturi occaecati eius sed consectetur repudiandae. Id aspernatur ut facere atque et ducimus. Ut iste pariatur sit est molestias consequatur incidunt.\",\"Assumenda at deleniti perferendis quis suscipit. Nihil laboriosam et velit et modi. Doloremque reprehenderit quia consequatur in sed velit maiores aut.\"]', 'Iste fugiat ipsam.', 88, 4, '2020-08-08', '1984-08-29', '2022-04-23 23:41:33', '2022-06-29 04:49:25', NULL, 8, 1, 1, 4),
(6, 'Ut velit nostrum ut.', 'possimus-qui-dolorem-aut-asperiores-est-quia', 0, 'Aut maxime.', '[\"Laudantium optio eum atque et id dolorum enim. Sit quos nihil et.\",\"Dolor vero odit repellendus eaque tempore ut a. Quidem numquam quia ut eveniet ut voluptatem dolorem delectus. Voluptas animi incidunt vel error ratione est.\",\"In vel exercitationem hic sequi aut cupiditate dolores possimus. Ea quibusdam hic et beatae. Beatae necessitatibus quia expedita nobis culpa nobis ad.\",\"Dolore ea est eligendi optio. Exercitationem neque deleniti recusandae sit eum esse illum. Ab autem laborum possimus. Adipisci nihil qui et deserunt delectus possimus sunt. Non amet perferendis rerum dolorum exercitationem quia consequatur in.\",\"Beatae labore eligendi laborum deleniti. Sit eum voluptatem sunt ut sed minus. Aut ea eos odio sint sit nam. A id quia ratione veniam corporis nobis. Neque libero aut est dolorem voluptates tempora.\"]', 'Labore maxime sunt cum.', 93, 4, '2012-12-21', '1982-12-08', '2022-01-25 04:56:38', '2022-12-04 01:45:55', NULL, 1, 7, 4, 4),
(7, 'Reprehenderit quaerat aut quae.', 'aut-aut-asperiores-nobis', 0, 'Consectetur eum autem.', '[\"Voluptas aut quaerat nostrum aut velit. Consequatur eos inventore neque eos voluptatum. Iste eaque explicabo ipsum numquam. Sint eveniet nam quidem eaque ad quis voluptas.\",\"Voluptas vero excepturi qui velit qui corrupti. Omnis porro at assumenda officiis maxime. Nihil dolorem doloremque aut perferendis sequi. Hic fuga ipsa libero sit sed non labore corporis.\",\"Tempore id qui quo. Non accusamus aliquam aut sunt qui perferendis pariatur. Ad sed sequi eos harum vitae eaque expedita adipisci.\",\"Autem dolor nam fugiat blanditiis. Quidem inventore quae tempore voluptas sed commodi et. Non enim delectus voluptatem suscipit quia voluptate aperiam laudantium.\"]', 'Excepturi aut nesciunt commodi possimus dolor.', 76, 4, '1981-11-27', '1971-12-17', '2022-06-29 08:42:06', '2022-07-14 17:42:48', NULL, 6, 3, 1, 4),
(8, 'Aut commodi quasi rerum.', 'porro-ab-amet-officia-voluptatem-ducimus', 0, 'Nulla sed ut est.', '[\"Quia eaque ab velit. Corrupti tempore quo porro et laboriosam. Aliquam et quis molestias libero sit voluptas consequatur.\",\"Sit distinctio velit excepturi nemo. Qui in autem similique non dolor. Reprehenderit ea voluptatem autem eveniet vitae rem magni quod. Voluptatibus non eaque dolorum aut aut voluptate similique.\",\"Officia debitis et quam expedita. Sed eos nesciunt laboriosam accusamus. Cumque ut sit molestiae at et.\",\"Omnis et debitis sit atque eligendi repellendus mollitia. Dolorum voluptas commodi aliquid cupiditate. Qui omnis maiores et velit esse eos fugiat.\"]', 'Tenetur ratione quo et temporibus quisquam.', 85, 2, '2017-05-28', '1980-09-08', '2022-05-14 08:19:10', '2022-09-13 07:10:29', NULL, 6, 3, 1, 5),
(9, 'Dolorem eos.', 'assumenda-recusandae-voluptatem-id-debitis', 0, 'Corrupti eveniet.', '[\"Voluptatem est animi ut aut. Est qui vel aliquam laboriosam. Nesciunt harum recusandae repellendus ut exercitationem vero nemo alias.\",\"Beatae molestiae voluptas asperiores et expedita. Sed rerum unde corrupti consequatur nostrum autem. Fugit officia ipsam expedita rem magnam error tempore. Nesciunt sed provident sed sed esse.\",\"Non in et quia possimus sed sequi voluptates. Atque reprehenderit quod deleniti autem corrupti. Qui eligendi ad blanditiis quod voluptatem minima et mollitia.\",\"Placeat impedit hic ut dolorem nemo commodi maiores. Atque natus quasi sint qui qui. Necessitatibus molestiae enim illo hic doloribus sed sequi hic. Optio vero maiores maxime eum labore consequatur.\"]', 'Natus omnis corporis eos recusandae.', 49, 1, '1994-11-17', '1993-05-14', '2022-03-03 12:09:15', '2022-01-08 16:09:13', NULL, 6, 5, 4, 1),
(10, 'Quo tempore similique.', 'officiis-ratione-labore-inventore-nobis-aliquam', 0, 'Eaque doloribus porro.', '[\"Voluptas maxime odit quia voluptate. Quo voluptates architecto est qui quis sequi tempore. Minima porro sequi dolore molestiae minima.\",\"Voluptatem soluta quia quae voluptatem ipsam repellendus est. In harum rerum natus alias.\",\"Ipsum quos delectus expedita impedit error ipsa voluptas voluptatibus. Deserunt pariatur optio illo. Quo et provident quia itaque voluptas veritatis.\",\"Iusto illum repudiandae laboriosam et. Ad quam rerum qui non illum et incidunt. Non qui voluptatem debitis sunt id. Nobis temporibus ut officiis voluptatem.\",\"Expedita accusamus magni explicabo mollitia in. Dolore illum harum neque animi voluptas veniam. Cumque sed rem molestias aperiam.\"]', 'Assumenda fugiat quam.', 95, 1, '1984-12-26', '2018-06-29', '2022-11-15 17:46:05', '2022-11-08 06:45:56', NULL, 5, 6, 4, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkets`
--
ALTER TABLE `angkets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areas_nama_area_unique` (`nama_area`),
  ADD UNIQUE KEY `areas_slug_area_unique` (`slug_area`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kabkotas`
--
ALTER TABLE `kabkotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabkota_perencanaan`
--
ALTER TABLE `kabkota_perencanaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perencanaans`
--
ALTER TABLE `perencanaans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `perencanaans_slug_kegiatan_unique` (`slug_kegiatan`);

--
-- Indexes for table `perencanaan_provinsi`
--
ALTER TABLE `perencanaan_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pics`
--
ALTER TABLE `pics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsis`
--
ALTER TABLE `provinsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_slug_user_unique` (`slug_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usulans`
--
ALTER TABLE `usulans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angkets`
--
ALTER TABLE `angkets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kabkotas`
--
ALTER TABLE `kabkotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kabkota_perencanaan`
--
ALTER TABLE `kabkota_perencanaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `perencanaans`
--
ALTER TABLE `perencanaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perencanaan_provinsi`
--
ALTER TABLE `perencanaan_provinsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pics`
--
ALTER TABLE `pics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinsis`
--
ALTER TABLE `provinsis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usulans`
--
ALTER TABLE `usulans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
