-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Lip 2016, 17:26
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `swc`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `colors`
--

CREATE TABLE `colors` (
  `idcolor` int(11) NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `colors`
--

INSERT INTO `colors` (`idcolor`, `color`) VALUES
(0, 'NONE'),
(1, 'RED'),
(2, 'BLUE'),
(3, 'WHITE'),
(4, 'YELLOW');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `events`
--

CREATE TABLE `events` (
  `idevent` int(11) NOT NULL,
  `venue` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `event` text NOT NULL,
  `raced` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `events`
--

INSERT INTO `events` (`idevent`, `venue`, `event`, `raced`) VALUES
(1, 'Vojens', 'Event 1', 1),
(2, 'Vastervik', 'Event 2', 0),
(3, 'Manchester', 'Race Off', 0),
(4, 'Manchester', 'Final', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `final`
--

CREATE TABLE `final` (
  `idrider` int(11) NOT NULL,
  `points` text NOT NULL,
  `sum` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `raceoff`
--

CREATE TABLE `raceoff` (
  `idrider` int(11) NOT NULL,
  `points` text NOT NULL,
  `sum` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `raceoff`
--

INSERT INTO `raceoff` (`idrider`, `points`, `sum`, `number`) VALUES
(6, 'w23d20', 7, 1),
(7, '226132', 16, 2),
(8, '210-1', 4, 3),
(9, '10-13', 5, 4),
(10, '', 0, 5),
(14, '334231', 16, 1),
(12, '11122', 7, 2),
(13, '31322', 11, 3),
(11, '10-33', 7, 4),
(23, '33213', 12, 1),
(22, '33333', 15, 3),
(24, '2----', 2, 2),
(21, '23211', 9, 4),
(25, '2112', 6, 5),
(28, '01101', 3, 2),
(27, 't2040', 6, 4),
(30, 'u0000', 0, 1),
(47, '0000d', 0, 3),
(46, '', 0, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `riders`
--

CREATE TABLE `riders` (
  `idrider` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `team` int(11) NOT NULL,
  `birth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `riders`
--

INSERT INTO `riders` (`idrider`, `name`, `team`, `birth`) VALUES
(1, 'Vaclav Milik', 5, 1993),
(2, 'Eduard Krcmar', 5, 1996),
(3, 'Matej Kus', 5, 1989),
(4, 'Josef Franc', 5, 1979),
(5, 'Zdenek Holub', 5, 1996),
(6, 'Grigorii Laguta', 4, 1984),
(7, 'Emil Sayfutdinov', 4, 1989),
(8, 'Andrei Kudriashov', 4, 1989),
(9, 'Artem Laguta', 4, 1990),
(10, 'Viktor Kulakov', 4, 1994),
(11, 'Kenneth Bjerre', 2, 1984),
(12, 'Leon Madsen', 2, 1988),
(13, 'Michael Jepsen Jensen', 2, 1992),
(14, 'Niels Kristian Iversen', 2, 1982),
(15, 'Fredrik Jakobsen', 2, 1998),
(16, 'Maciej Janowski', 3, 1991),
(17, 'Piotr Pawlicki', 3, 1994),
(18, 'Patryk Dudek', 3, 1992),
(19, 'Bartosz Zmarzlik', 3, 1995),
(20, 'Krystian Pieszczek', 3, 1995),
(21, 'Chris Holder', 6, 1987),
(22, 'Jason Doyle', 6, 1985),
(23, 'Sam Masters', 6, 1991),
(24, 'Max Fricke', 6, 1996),
(25, 'Brady Kurtz', 6, 1996),
(26, 'Greg Hancock', 7, 1970),
(27, 'Ryan Fisher', 7, 1983),
(28, 'Billy Janniro', 7, 1980),
(29, 'Ricky Wells', 7, 1991),
(30, 'Luke Becker', 7, 1999),
(31, 'Kevin Wolbert', 8, 1989),
(32, 'Kai Huckenbeck', 8, 1993),
(33, 'Tobias Kroner', 8, 1985),
(34, 'Martin Smolinski', 8, 1984),
(35, 'Antonio Lindback', 1, 1985),
(36, 'Fredrik Lindgren', 1, 1985),
(37, 'Andreas Jonsson', 1, 1980),
(38, 'Peter Ljung', 1, 1982),
(39, 'Joel Anderson', 1, 1996),
(40, 'Krzysztof Kasprzak', 3, 1984),
(41, 'Tai Woffinden', 9, 1990),
(42, 'Daniel King', 9, 1986),
(43, 'Craig Cook', 9, 1987),
(44, 'Robert Lambert', 9, 1998),
(45, 'Adam Ellis', 9, 1996),
(46, 'Mikkel B. Andersen', 2, 0),
(47, 'Broc Nicol', 7, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teams`
--

CREATE TABLE `teams` (
  `idteam` int(11) NOT NULL,
  `team` text COLLATE utf8_unicode_ci NOT NULL,
  `manager` text COLLATE utf8_unicode_ci NOT NULL,
  `event` text COLLATE utf8_unicode_ci NOT NULL,
  `semipoints` int(11) NOT NULL,
  `semiplace` int(11) NOT NULL,
  `sh` int(11) NOT NULL,
  `ropoints` int(11) NOT NULL,
  `roplace` int(11) NOT NULL,
  `rh` int(11) NOT NULL,
  `finalpoints` int(11) NOT NULL,
  `finalplace` int(11) NOT NULL,
  `fh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `teams`
--

INSERT INTO `teams` (`idteam`, `team`, `manager`, `event`, `semipoints`, `semiplace`, `sh`, `ropoints`, `roplace`, `rh`, `finalpoints`, `finalplace`, `fh`) VALUES
(1, 'Sweden', 'Morgan Andersson', 'Vastervik', 0, 1, 4, 0, 0, 0, 0, 0, 3),
(2, 'Denmark', 'Hans Nielsen', 'Vojens', 36, 2, 4, 41, 2, 2, 0, 0, 0),
(3, 'Poland', 'Marek Cieślak', 'Vojens', 0, 1, 2, 0, 0, 0, 0, 0, 1),
(4, 'Russia', 'Andrei Savin', 'Vojens', 32, 3, 1, 32, 3, 1, 0, 0, 0),
(5, 'Czech Republic', 'Milan Spinka', 'Vojens', 19, 4, 3, 0, 0, 0, 0, 0, 0),
(6, 'Australia', 'Mark Lemon', 'Vastervik', 0, 2, 1, 44, 1, 3, 0, 0, 2),
(7, 'USA', 'Lance King', 'Vastervik', 22, 3, 2, 9, 4, 4, 0, 0, 0),
(8, 'Germany', 'Herbert Rudolph', 'Vastervik', 19, 4, 3, 0, 0, 0, 0, 0, 0),
(9, 'Great Britain', 'Alun Rossiter', 'Final', 0, 0, 0, 0, 0, 0, 0, 0, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vastervik`
--

CREATE TABLE `vastervik` (
  `idrider` int(11) NOT NULL,
  `points` text NOT NULL,
  `sum` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `vastervik`
--

INSERT INTO `vastervik` (`idrider`, `points`, `sum`, `number`) VALUES
(21, '32123', 11, 1),
(22, '23331', 12, 4),
(23, '21002', 5, 2),
(24, '32202', 9, 3),
(25, '', 0, 5),
(26, '313622', 17, 1),
(27, '10010', 2, 2),
(28, '10100', 2, 3),
(29, '0010', 1, 4),
(30, '', 0, 5),
(31, '11000', 2, 1),
(32, '0001', 1, 2),
(33, '01111', 4, 3),
(34, '123141', 12, 4),
(35, '23233', 13, 1),
(36, 'w3332', 11, 2),
(37, '33223', 13, 3),
(38, '22223', 11, 4),
(39, '', 0, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vojens`
--

CREATE TABLE `vojens` (
  `idrider` int(11) NOT NULL,
  `points` text NOT NULL,
  `sum` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `vojens`
--

INSERT INTO `vojens` (`idrider`, `points`, `sum`, `number`) VALUES
(1, '332211', 12, 4),
(2, '00110', 2, 3),
(3, '10110', 3, 2),
(4, '00-11', 2, 1),
(5, '', 0, 5),
(6, '', 0, 0),
(7, '303363', 18, 2),
(8, '130010', 5, 3),
(9, '02222', 8, 4),
(10, '010--', 1, 1),
(11, '22R-2', 6, 1),
(12, '133R3', 10, 2),
(13, '223X41', 12, 3),
(14, '21X23', 8, 4),
(15, '', 0, 5),
(16, '212X2', 7, 1),
(17, '31233', 12, 3),
(18, '33122', 11, 2),
(19, '1233X', 9, 4),
(20, '', 0, 5);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`idcolor`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idevent`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`idrider`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`idteam`);

--
-- Indexes for table `vojens`
--
ALTER TABLE `vojens` ADD FULLTEXT KEY `points` (`points`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `colors`
--
ALTER TABLE `colors`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `events`
--
ALTER TABLE `events`
  MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `riders`
--
ALTER TABLE `riders`
  MODIFY `idrider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT dla tabeli `teams`
--
ALTER TABLE `teams`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
