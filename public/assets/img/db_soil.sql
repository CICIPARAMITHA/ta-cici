-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Jul 2023 pada 11.58
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_soil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sensor`
--

CREATE TABLE `sensor` (
  `sensor_id` int(11) NOT NULL,
  `soil` varchar(255) DEFAULT NULL,
  `temperatur` varchar(255) DEFAULT NULL,
  `humidity` varchar(255) DEFAULT NULL,
  `jam` varchar(255) DEFAULT NULL,
  `tgl` varchar(255) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sensor`
--

INSERT INTO `sensor` (`sensor_id`, `soil`, `temperatur`, `humidity`, `jam`, `tgl`, `bulan`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '11', '11', '11', '09', NULL, '07', '2023', '2023-07-19 02:31:24', '2023-07-19 02:31:24'),
(2, '11', '11', '11', '09', NULL, '07', '2023', '2023-07-19 02:32:59', '2023-07-19 02:32:59'),
(3, '11', '11', '11', '09', NULL, '07', '2023', '2023-07-19 02:33:17', '2023-07-19 02:33:17'),
(4, '765', '24', '55', '09', NULL, '07', '2023', '2023-07-19 02:36:07', '2023-07-19 02:36:07'),
(5, '765', '24', '55', '09', NULL, '07', '2023', '2023-07-19 02:36:35', '2023-07-19 02:36:35'),
(6, '765', '24', '55', '09', 'Wed', '07', '2023', '2023-07-19 02:37:05', '2023-07-19 02:37:05'),
(7, '765', '24', '55', '09', '19', '07', '2023', '2023-07-19 02:37:22', '2023-07-19 02:37:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`sensor_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sensor`
--
ALTER TABLE `sensor`
  MODIFY `sensor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
