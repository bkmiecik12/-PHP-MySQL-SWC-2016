--
-- Baza danych: `swc`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `riders`
--

CREATE TABLE `riders` (
  `idrider` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `team` int(11) NOT NULL,
  `birth` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `riders`
--

INSERT INTO `riders` (`idrider`, `name`, `team`, `birth`, `number`) VALUES
(1, 'Vaclav Milik', 5, 1993, 4),
(2, 'Eduard Krcmar', 5, 1996, 3),
(3, 'Matej Kus', 5, 1989, 2),
(4, 'Josef Franc', 5, 1979, 1),
(5, 'Zdenek Holub', 5, 1996, 5),
(6, 'Grigorii Laguta', 4, 1984, 1),
(7, 'Emil Sayfutdinov', 4, 1989, 2),
(8, 'Andrei Kudriashov', 4, 1989, 3),
(9, 'Artem Laguta', 4, 1990, 4),
(10, 'Viktor Kulakov', 4, 1994, 5),
(11, 'Kenneth Bjerre', 2, 1984, 1),
(12, 'Leon Madsen', 2, 1988, 2),
(13, 'Michael Jepsen Jensen', 2, 1992, 3),
(14, 'Niels Kristian Iversen', 2, 1982, 4),
(15, 'Fredrik Jakobsen', 2, 1998, 5),
(16, 'Maciej Janowski', 3, 1991, 1),
(17, 'Piotr Pawlicki', 3, 1994, 3),
(18, 'Patryk Dudek', 3, 1992, 2),
(19, 'Bartosz Zmarzlik', 3, 1995, 4),
(20, 'Krystian Pieszczek', 3, 1995, 5),
(21, 'Chris Holder', 6, 1987, 1),
(22, 'Jason Doyle', 6, 1985, 4),
(23, 'Sam Masters', 6, 1991, 2),
(24, 'Max Fricke', 6, 1996, 3),
(25, 'Brady Kurtz', 6, 1996, 5),
(26, 'Greg Hancock', 7, 1970, 1),
(27, 'Ryan Fisher', 7, 1983, 2),
(28, 'Billy Janniro', 7, 1980, 3),
(29, 'Ricky Wells', 7, 1991, 4),
(30, 'Luke Becker', 7, 1999, 5),
(31, 'Kevin Wolbert', 8, 1989, 1),
(32, 'Kai Huckenbeck', 8, 1993, 2),
(33, 'Tobias Kroner', 8, 1985, 3),
(34, 'Martin Smolinski', 8, 1984, 4),
(35, 'Antonio Lindback', 1, 1985, 1),
(36, 'Fredrik Lindgren', 1, 1985, 2),
(37, 'Andreas Jonsson', 1, 1980, 3),
(38, 'Peter Ljung', 1, 1982, 4),
(39, 'Joel Anderson', 1, 1996, 5);

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
(1, 'Sweden', 'Morgan Andersson', 'Vastervik', 0, 0, 4, 0, 0, 0, 0, 0, 0),
(2, 'Denmark', 'Hans Nielsen', 'Vojens', 36, 2, 4, 0, 0, 0, 0, 0, 0),
(3, 'Poland', 'Marek Cieślak', 'Vojens', 39, 1, 2, 0, 0, 0, 0, 1, 0),
(4, 'Russia', 'Andrei Savin', 'Vojens', 32, 3, 1, 0, 0, 0, 0, 0, 0),
(5, 'Czech Republic', 'Milan Spinka', 'Vojens', 19, 4, 3, 0, 0, 0, 0, 0, 0),
(6, 'Australia', 'Mark Lemon', 'Vastervik', 0, 0, 1, 0, 0, 0, 0, 0, 0),
(7, 'USA', 'Lance King', 'Vastervik', 0, 0, 2, 0, 0, 0, 0, 0, 0),
(8, 'Germany', 'Herbert Rudolph', 'Vastervik', 0, 0, 3, 0, 0, 0, 0, 0, 0),
(9, 'Great Britain', 'Alun Rossiter', 'Final', 0, 0, 0, 0, 0, 0, 0, 2, 0);

--
-- Indeksy dla zrzutów tabel
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `riders`
--
ALTER TABLE `riders`
  MODIFY `idrider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT dla tabeli `teams`
--
ALTER TABLE `teams`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
