-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2022 pada 16.23
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
(26, 2922, 'Mori', 'CEO', 'Berburu', '20', '26 Jan', 'doge (2).jpg'),
(28, 3011, 'Calli', 'Collage Student', 'Create Meme', '21', '29 Nov 2', 'calli.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
