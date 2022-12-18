-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2022 pada 11.46
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cardapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datachar`
--

CREATE TABLE `datachar` (
  `id` int(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `hobi` varchar(255) NOT NULL,
  `umur` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datachar`
--

INSERT INTO `datachar` (`id`, `id_card`, `name`, `stat`, `hobi`, `umur`, `ttl`, `file`) VALUES
(14, 2922, 'Mori', 'CEO', 'Mainin Sapi', '19', '29 Nov', 'https://mystickermania.com/cdn/stickers/we-bare-bears/wbb-ice-bear-leech-512x512.png'),
(18, 3011, 'Ichi', 'Collage Student', 'Basketball', '20', '1 May', 'https://img.freepik.com/free-icon/pikachu_318-196537.jpg?w=2000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datachar`
--
ALTER TABLE `datachar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datachar`
--
ALTER TABLE `datachar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
