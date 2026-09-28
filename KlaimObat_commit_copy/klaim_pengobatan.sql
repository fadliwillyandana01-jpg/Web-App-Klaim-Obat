-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2026 pada 17.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klaim_pengobatan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ci_session:21776df1316d3b7e875dbbb59d643b6c', '::1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739303335363834353b5f63695f6f6c645f696e7075747c613a323a7b733a333a22676574223b613a303a7b7d733a343a22706f7374223b613a323a7b733a383a22757365726e616d65223b733a373a227a7a7a5f63656b223b733a383a2270617373776f7264223b733a373a227a7a7a5f63656b223b7d7d5f5f63695f766172737c613a323a7b733a31333a225f63695f6f6c645f696e707574223b733a333a226e6577223b733a353a226572726f72223b733a333a226e6577223b7d6572726f727c733a32383a22557365726e616d6520617461752070617373776f72642073616c6168223b),
('ci_session:75ed595e07b20efb7d5f6da1dc0b929d', '::1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739303335383135353b5f63695f70726576696f75735f75726c7c733a35343a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f6b6172796177616e2f6d65646963616c2d636c61696d223b757365725f69647c733a323a223134223b656d706c6f7965655f69647c733a313a2233223b757365726e616d657c733a393a226b6172796177616e20223b726f6c657c733a383a226b6172796177616e223b6c6f676765645f696e7c623a313b),
('ci_session:8b4cf78b69d739daf5198bfdea349689', '::1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739303430313236303b5f63695f70726576696f75735f75726c7c733a33373a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f7573657273223b757365725f69647c733a313a2231223b656d706c6f7965655f69647c4e3b757365726e616d657c733a353a2261646d696e223b726f6c657c733a353a2261646d696e223b6c6f676765645f696e7c623a313b737563636573737c733a32313a225573657220626572686173696c2064696861707573223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('ci_session:8f2a329c3b497323454178001255b8ec', '::1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739303335363834383b5f63695f6f6c645f696e7075747c613a323a7b733a333a22676574223b613a303a7b7d733a343a22706f7374223b613a323a7b733a383a22757365726e616d65223b733a373a227a7a7a5f63656b223b733a383a2270617373776f7264223b733a373a227a7a7a5f63656b223b7d7d5f5f63695f766172737c613a323a7b733a31333a225f63695f6f6c645f696e707574223b733a333a226e6577223b733a353a226572726f72223b733a333a226e6577223b7d6572726f727c733a32383a22557365726e616d6520617461752070617373776f72642073616c6168223b),
('ci_session:a536bd0625bf8b6e1ce077ff977e86f4', '::1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739303335383135353b5f63695f70726576696f75735f75726c7c733a35363a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f6b6172796177616e2f6368616e67652d70617373776f7264223b757365725f69647c733a323a223134223b656d706c6f7965655f69647c733a313a2233223b757365726e616d657c733a393a226b6172796177616e20223b726f6c657c733a383a226b6172796177616e223b6c6f676765645f696e7c623a313b5f5f63695f766172737c613a303a7b7d),
('ci_session:aa1c7f1ce0cdf1518a23305c0cc5e607', '::1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739303335363834343b5f63695f70726576696f75735f75726c7c733a33373a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f6c6f67696e223b5f5f63695f766172737c613a303a7b7d),
('ci_session:b31415db131860d81f90b5469bcaa3b8', '::1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739303335363834393b5f5f63695f766172737c613a303a7b7d5f63695f70726576696f75735f75726c7c733a33373a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f6c6f67696e223b),
('ci_session:ccba3142b4db14232ea72d7dda9b048a', '::1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739303335373238343b),
('ci_session:ccd4783f1a328655f4efed5675cfaf3c', '::1', 4294967295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739303335373238323b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `claim_approvals`
--

CREATE TABLE `claim_approvals` (
  `approval_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `approved_by` int(11) NOT NULL,
  `approval_role` enum('HRD','KEUANGAN') NOT NULL,
  `status` enum('APPROVED','REJECTED') NOT NULL,
  `note` text DEFAULT NULL,
  `approval_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `claim_limits`
--

CREATE TABLE `claim_limits` (
  `claim_limit_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `max_claim_amount` decimal(12,2) NOT NULL,
  `used_amount` decimal(12,2) DEFAULT 0.00,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `claim_limits`
--

INSERT INTO `claim_limits` (`claim_limit_id`, `employee_id`, `year`, `max_claim_amount`, `used_amount`, `created_at`, `updated_at`) VALUES
(1, 3, '2026', 0.00, 0.00, '2026-09-25 17:42:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dependents`
--

CREATE TABLE `dependents` (
  `dependent_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `relationship` enum('SUAMI','ISTRI','ANAK') NOT NULL,
  `birth_date` date NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dependents`
--

INSERT INTO `dependents` (`dependent_id`, `employee_id`, `full_name`, `relationship`, `birth_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Budi Junior', 'ANAK', '2015-05-20', 1, '2026-02-10 18:13:23', NULL),
(2, 1, 'Siti Aminah', 'ISTRI', '1990-08-12', 1, '2026-02-10 18:13:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_nik` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `base_salary` decimal(12,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_nik`, `full_name`, `position`, `department`, `base_salary`, `created_at`) VALUES
(1, 'EMP001', 'Budi Santoso', 'Staff', 'IT', 5000000.00, '2026-01-31 17:46:49'),
(2, 'EMP-1770787016', 'karyawan', 'Staff', 'Umum', 0.00, '2026-02-11 12:16:56'),
(3, '', 'karyawan ', 'Staff', 'Umum', 0.00, '2026-09-25 23:07:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medical_claims`
--

CREATE TABLE `medical_claims` (
  `claim_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `dependent_id` int(11) DEFAULT NULL,
  `claim_date` date NOT NULL,
  `claim_amount` decimal(12,2) NOT NULL,
  `claim_description` text DEFAULT NULL,
  `receipt_file` varchar(255) NOT NULL,
  `status` enum('PENGAJUAN','DISETUJUI_HRD','DITOLAK_HRD','DIBAYARKAN_KEUANGAN') DEFAULT 'PENGAJUAN',
  `created_at` datetime DEFAULT current_timestamp(),
  `approved_at` datetime DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `medical_claims`
--

INSERT INTO `medical_claims` (`claim_id`, `employee_id`, `dependent_id`, `claim_date`, `claim_amount`, `claim_description`, `receipt_file`, `status`, `created_at`, `approved_at`, `paid_at`, `updated_at`) VALUES
(2, 1, 1, '2026-01-31', 150000.00, NULL, 'bukti.jpeg', 'DIBAYARKAN_KEUANGAN', '2026-01-31 17:48:23', '2026-02-10 13:03:20', '2026-09-25 16:04:18', NULL),
(3, 1, 1, '2026-01-31', 150000.00, NULL, 'bukti.jpeg', 'DITOLAK_HRD', '2026-01-31 17:48:23', '2026-02-11 03:54:21', NULL, NULL),
(4, 1, 2, '2026-01-31', 150000.00, 'pengambilan obat', 'bukti.jpeg', 'PENGAJUAN', '2026-01-31 17:48:23', '2026-02-10 13:03:20', NULL, NULL),
(5, 3, NULL, '2026-09-24', 120000.00, 'demam', '1790358212_a6461f13dc94a12f0064.jpg', 'PENGAJUAN', '2026-09-25 17:43:32', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` enum('ADMIN','HRD','KEUANGAN','KARYAWAN') NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `force_reset` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `employee_id`, `username`, `password_hash`, `full_name`, `role`, `is_active`, `last_login`, `created_at`, `updated_at`, `force_reset`) VALUES
(1, NULL, 'admin', '$2y$10$.ftAasRyEXnox6KgUS9AwOwZAQdKsGCWcWkESFkIdICjUOrmDBKZu', 'Administrator', 'ADMIN', 1, '2026-02-10 18:01:10', '2026-01-30 13:40:44', '2026-02-10 18:01:10', 0),
(12, NULL, 'HRD', '$2y$10$f1/JRsDrW4/Jc4.jSB4.DOqErMqdgko8jrQM624Sf5726TwrN4TF.', '', 'HRD', 1, NULL, '2026-09-25 14:56:38', NULL, 1),
(13, NULL, 'keuangan', '$2y$10$Tgt0NdC2wOa.3Csy53s.8uOQguNG2OClkyTdyk7fdbqWHJ8t9ZD1C', '', 'KEUANGAN', 1, NULL, '2026-09-25 15:00:45', NULL, 1),
(14, 3, 'karyawan ', '$2y$10$4xIfl45b8avo7hEDXB/yz.rU8piv8YO84Q5/NX/vhlLXp/ks3dbDy', '', 'KARYAWAN', 1, NULL, '2026-09-25 16:06:46', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `claim_approvals`
--
ALTER TABLE `claim_approvals`
  ADD PRIMARY KEY (`approval_id`),
  ADD KEY `claim_id` (`claim_id`),
  ADD KEY `approved_by` (`approved_by`);

--
-- Indeks untuk tabel `claim_limits`
--
ALTER TABLE `claim_limits`
  ADD PRIMARY KEY (`claim_limit_id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`,`year`);

--
-- Indeks untuk tabel `dependents`
--
ALTER TABLE `dependents`
  ADD PRIMARY KEY (`dependent_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employee_nik` (`employee_nik`);

--
-- Indeks untuk tabel `medical_claims`
--
ALTER TABLE `medical_claims`
  ADD PRIMARY KEY (`claim_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `dependent_id` (`dependent_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `claim_approvals`
--
ALTER TABLE `claim_approvals`
  MODIFY `approval_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `claim_limits`
--
ALTER TABLE `claim_limits`
  MODIFY `claim_limit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dependents`
--
ALTER TABLE `dependents`
  MODIFY `dependent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `medical_claims`
--
ALTER TABLE `medical_claims`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `claim_approvals`
--
ALTER TABLE `claim_approvals`
  ADD CONSTRAINT `claim_approvals_ibfk_1` FOREIGN KEY (`claim_id`) REFERENCES `medical_claims` (`claim_id`),
  ADD CONSTRAINT `claim_approvals_ibfk_2` FOREIGN KEY (`approved_by`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `claim_limits`
--
ALTER TABLE `claim_limits`
  ADD CONSTRAINT `claim_limits_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Ketidakleluasaan untuk tabel `dependents`
--
ALTER TABLE `dependents`
  ADD CONSTRAINT `dependents_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `medical_claims`
--
ALTER TABLE `medical_claims`
  ADD CONSTRAINT `medical_claims_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `medical_claims_ibfk_2` FOREIGN KEY (`dependent_id`) REFERENCES `dependents` (`dependent_id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
