-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019 m. Vas 19 d. 17:44
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfq_laiko_rezervacija`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `rezervacijos`
--

CREATE TABLE `rezervacijos` (
  `id` int(11) NOT NULL,
  `vardas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `pavarde` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `rezervacijos_diena` date NOT NULL,
  `rezervacijos_laikas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `iraso_data` datetime NOT NULL,
  `apsilankymas` int(4) NOT NULL,
  `kurejo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `rezervacijos`
--

INSERT INTO `rezervacijos` (`id`, `vardas`, `pavarde`, `email`, `phone`, `rezervacijos_diena`, `rezervacijos_laikas`, `iraso_data`, `apsilankymas`, `kurejo_id`) VALUES
(4, 'Tadas', 'Janca', 'tadasjanca@gmail.com', '863746218', '2019-01-15', '09:30', '2019-02-13 14:27:32', 7, 0),
(95, 'Tadas', 'Janca', 'tadasjanca@gmail.com', '863746218', '2018-11-17', '10:00', '2019-02-17 20:15:46', 6, 0),
(100, 'Tadas', 'Janca', 'tadasjanca@gmail.com', '863746218', '2018-10-17', '10:30', '2019-02-17 20:55:52', 5, 0),
(103, 'Tadas', 'Janca', 'tadasjanca@gmail.com', '863746218', '2018-09-18', '09:30', '2019-02-17 23:03:53', 4, 0),
(104, 'Tadas', 'Janca', 'tadasjanca@gmail.com', '863746218', '2018-07-18', '09:00', '2019-02-17 23:03:53', 3, 0),
(105, 'Tadas', 'Janca', 'tadasjanca@gmail.com', '863746218', '2018-06-03', '09:00', '2019-02-17 23:03:53', 2, 0),
(106, 'Tadas', 'Janca', 'tadasjanca@gmail.com', '863746218', '2018-05-05', '09:00', '2019-02-17 23:03:53', 1, 0),
(124, 'Petras', 'Å½ukauskas', 'petras@gmail.com', '864321451', '2019-01-19', '16:00', '2019-02-13 14:27:32', 6, 0),
(125, 'Petras', 'Å½ukauskas', 'petras@gmail.com', '864321451', '2018-12-16', '15:30', '2019-02-13 14:27:32', 5, 0),
(126, 'Petras', 'Å½ukauskas', 'petras@gmail.com', '864321451', '2018-11-09', '10:30', '2019-02-13 14:27:32', 4, 0),
(127, 'Petras', 'Å½ukauskas', 'petras@gmail.com', '864321451', '2018-10-12', '13:30', '2019-02-13 14:27:32', 3, 0),
(128, 'Petras', 'Å½ukauskas', 'petras@gmail.com', '864321451', '2018-09-19', '17:30', '2019-02-13 14:27:32', 2, 0),
(129, 'Petras', 'Å½ukauskas', 'petras@gmail.com', '864321451', '2018-08-15', '12:30', '2019-02-13 14:27:32', 1, 0),
(130, 'Petras', 'Å½ukauskas', 'petras@gmail.com', '864321451', '2019-02-28', '12:30', '2019-02-19 11:09:53', 7, 0),
(131, 'Tadas', 'Janca', 'tadasjanca@gmail.com', '863746218', '2019-02-23', '10:30', '2019-02-13 14:27:32', 8, 0),
(132, 'Erika', 'PukÅ¡tienÄ—', 'erika@erika.lt', '864216272', '2019-03-19', '10:30', '0000-00-00 00:00:00', 6, 0),
(133, 'Erika', 'PukÅ¡tienÄ—', 'erika@erika.lt', '864216272', '2019-02-19', '10:00', '0000-00-00 00:00:00', 5, 0),
(134, 'Erika', 'PukÅ¡tienÄ—', 'erika@erika.lt', '864216272', '2019-01-16', '09:00', '0000-00-00 00:00:00', 4, 0),
(135, 'Erika', 'PukÅ¡tienÄ—', 'erika@erika.lt', '864216272', '2018-12-14', '13:00', '0000-00-00 00:00:00', 3, 0),
(136, 'Erika', 'PukÅ¡tienÄ—', 'erika@erika.lt', '864216272', '2018-11-15', '17:30', '0000-00-00 00:00:00', 2, 0),
(137, 'Erika', 'PukÅ¡tienÄ—', 'erika@erika.lt', '864216272', '2018-10-17', '12:00', '0000-00-00 00:00:00', 1, 0),
(139, 'Algirdas', 'Jogaila', 'algirdas@jogaila.lt', '86346217', '2019-01-20', '12:00', '0000-00-00 00:00:00', 6, 0),
(140, 'Algirdas', 'Jogaila', 'algirdas@jogaila.lt', '86346217', '2019-02-22', '12:30', '0000-00-00 00:00:00', 7, 0),
(141, 'Algirdas', 'Jogaila', 'algirdas@jogaila.lt', '86346217', '2018-12-19', '15:30', '0000-00-00 00:00:00', 5, 0),
(142, 'Algirdas', 'Jogaila', 'algirdas@jogaila.lt', '86346217', '2018-11-17', '14:30', '0000-00-00 00:00:00', 4, 0),
(143, 'Algirdas', 'Jogaila', 'algirdas@jogaila.lt', '86346217', '2018-10-16', '11:30', '0000-00-00 00:00:00', 3, 0),
(144, 'Algirdas', 'Jogaila', 'algirdas@jogaila.lt', '86346217', '2018-09-15', '12:00', '0000-00-00 00:00:00', 2, 0),
(145, 'Algirdas', 'Jogaila', 'algirdas@jogaila.lt', '86346217', '2018-08-14', '12:30', '0000-00-00 00:00:00', 1, 0),
(146, 'Algirdas', 'Jogaila', 'algirdas@jogaila.lt', '86346217', '2019-03-22', '14:30', '0000-00-00 00:00:00', 8, 0),
(153, 'Tadas', 'Janca', 'tadasjanca@gmail.com', '863746218', '2019-07-17', '09:30', '2019-02-19 14:24:22', 9, 3),
(154, 'Algirdas', 'Jogaila', 'algirdas@jogaila.lt', '863462176', '2019-02-19', '16:30', '2019-02-19 14:47:09', 9, 1),
(155, 'Alvydas', 'Vitulskis', 'alvydas@alvydas.lt', '867453166', '2019-02-19', '15:30', '2019-02-19 15:02:02', 1, 3),
(158, 'Vytautas', 'Petrauskas', 'vytautas@vytautas.lt', '869456413', '2019-02-23', '9:30', '0000-00-00 00:00:00', 7, 0),
(159, 'Vytautas', 'Petrauskas', 'vytautas@vytautas.lt', '869456413', '2019-01-23', '9:30', '0000-00-00 00:00:00', 6, 0),
(160, 'Vytautas', 'Petrauskas', 'vytautas@vytautas.lt', '869456413', '2018-12-23', '9:30', '0000-00-00 00:00:00', 5, 0),
(161, 'Vytautas', 'Petrauskas', 'vytautas@vytautas.lt', '869456413', '2018-11-23', '9:30', '0000-00-00 00:00:00', 4, 0),
(162, 'Vytautas', 'Petrauskas', 'vytautas@vytautas.lt', '869456413', '2018-10-23', '9:30', '0000-00-00 00:00:00', 3, 0),
(163, 'Vytautas', 'Petrauskas', 'vytautas@vytautas.lt', '869456413', '2018-09-23', '9:30', '0000-00-00 00:00:00', 2, 0),
(164, 'Vytautas', 'Petrauskas', 'vytautas@vytautas.lt', '869456413', '2018-07-23', '9:30', '0000-00-00 00:00:00', 1, 0),
(165, 'Vytautas', 'Petrauskas', 'vytautas@vytautas.lt', '869456413', '2019-03-23', '9:30', '0000-00-00 00:00:00', 8, 0),
(166, 'Viktoras', 'Å erna', 'viktoras@gmail.com', '867456125', '2019-02-23', '11:00', '2019-02-19 18:24:42', 8, 10),
(167, 'Viktoras', 'Å erna', 'viktoras@gmail.com', '867456125', '2019-01-23', '11:00', '2019-02-19 18:24:42', 7, 3),
(168, 'Viktoras', 'Å erna', 'viktoras@gmail.com', '867456125', '2018-12-23', '11:00', '2019-02-19 18:24:42', 6, 3),
(169, 'Viktoras', 'Å erna', 'viktoras@gmail.com', '867456125', '2018-11-23', '11:00', '2019-02-19 18:24:42', 5, 3),
(170, 'Viktoras', 'Å erna', 'viktoras@gmail.com', '867456125', '2018-10-23', '11:00', '2019-02-19 18:24:42', 4, 3),
(171, 'Viktoras', 'Å erna', 'viktoras@gmail.com', '867456125', '2018-09-23', '11:00', '2019-02-19 18:24:42', 3, 3),
(172, 'Viktoras', 'Å erna', 'viktoras@gmail.com', '867456125', '2018-08-23', '11:00', '2019-02-19 18:24:42', 2, 3),
(173, 'Viktoras', 'Å erna', 'viktoras@gmail.com', '867456125', '2018-07-23', '11:00', '2019-02-19 18:24:42', 1, 3),
(174, 'Kristina', 'LukauskienÄ—', 'kristina@gmail.com', '867456123', '2019-02-23', '10:30', '2019-02-19 18:39:51', 1, 3),
(175, 'Kristina', 'LukauskienÄ—', 'kristina@gmail.com', '867456123', '2019-01-23', '10:30', '2019-02-19 18:39:51', 2, 3),
(176, 'Kristina', 'LukauskienÄ—', 'kristina@gmail.com', '867456123', '2018-12-21', '10:30', '2019-02-19 18:39:51', 3, 3),
(177, 'Kristina', 'LukauskienÄ—', 'kristina@gmail.com', '867456123', '2019-11-18', '10:30', '2019-02-19 18:39:51', 4, 3),
(178, 'Alvydas', 'Ligaila', 'alvydas@alvydas.lt', '867489541', '2019-02-23', '10:30', '2019-02-19 18:41:55', 1, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `pareigos` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `lastName`, `pareigos`) VALUES
(1, 'admin', 'admin', 'Administratorius', '.', 'admin'),
(2, 'inga123', 'aa', 'Inga', 'PaukÅ¡tienÄ—', 'kirpeja'),
(3, 'kirpeja', 'kirpeja', 'Sandra', 'Å½ukauskÄ—', 'kirpeja'),
(4, 'linute', 'linacepelina', 'Lina', 'VenckienÄ—', 'kirpeja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rezervacijos`
--
ALTER TABLE `rezervacijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rezervacijos`
--
ALTER TABLE `rezervacijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
