-- mysql script
-- getest in phpmyadmin

CREATE DATABASE IF NOT EXISTS `pubs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pubs`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `authors`
--

CREATE TABLE `authors` (
  `au_id` varchar(11) NOT NULL,
  `au_lname` varchar(40) NOT NULL,
  `au_fname` varchar(20) NOT NULL,
  `phone` char(12) NOT NULL DEFAULT 'UNKNOWN',
  `address` varchar(40) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `zip` char(5) DEFAULT NULL,
  `contract` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `authors`
--

INSERT INTO `authors` (`au_id`, `au_lname`, `au_fname`, `phone`, `address`, `city`, `state`, `zip`, `contract`) VALUES
('409-56-7008', 'Bennet', 'Abraham', '415 658-9932', '6223 Bateman St.', 'Berkeley', 'CA', '94705', b'1'),
('213-46-8915', 'Green', 'Marjorie', '415 986-7020', '309 63rd St. #411', 'Oakland', 'CA', '94618', b'1'),
('238-95-7766', 'Carson', 'Cheryl', '415 548-7723', '589 Darwin Ln.', 'Berkeley', 'CA', '94705', b'1'),
('998-72-3567', 'Ringer', 'Albert', '801 826-0752', '67 Seventh Av.', 'Salt Lake City', 'UT', '84152', b'1'),
('899-46-2035', 'Ringer', 'Anne', '801 826-0752', '67 Seventh Av.', 'Salt Lake City', 'UT', '84152', b'1'),
('722-51-5454', 'DeFrance', 'Michel', '219 547-9982', '3 Balding Pl.', 'Gary', 'IN', '46403', b'1'),
('807-91-6654', 'Panteley', 'Sylvia', '301 946-8853', '1956 Arlington Pl.', 'Rockville', 'MD', '20853', b'1'),
('893-72-1158', 'McBadden', 'Heather', '707 448-4982', '301 Putnam', 'Vacaville', 'CA', '95688', b'0'),
('724-08-9931', 'Stringer', 'Dirk', '415 843-2991', '5420 Telegraph Av.', 'Oakland', 'CA', '94609', b'0'),
('274-80-9391', 'Straight', 'Dean', '415 834-2919', '5420 College Av.', 'Oakland', 'CA', '94609', b'1'),
('756-30-7391', 'Karsen', 'Livia', '415 534-9219', '5720 McAuley St.', 'Oakland', 'CA', '94609', b'1'),
('724-80-9391', 'MacFeather', 'Stearns', '415 354-7128', '44 Upland Hts.', 'Oakland', 'CA', '94612', b'1'),
('427-17-2319', 'Dull', 'Ann', '415 836-7128', '3410 Blonde St.', 'Palo Alto', 'CA', '94301', b'1'),
('672-71-3249', 'Yokomoto', 'Akiko', '415 935-4228', '3 Silver Ct.', 'Walnut Creek', 'CA', '94595', b'1'),
('267-41-2394', 'O\'Leary', 'Michael', '408 286-2428', '22 Cleveland Av. #14', 'San Jose', 'CA', '95128', b'1'),
('472-27-2349', 'Gringlesby', 'Burt', '707 938-6445', 'PO Box 792', 'Covelo', 'CA', '95428', b'1'),
('527-72-3246', 'Greene', 'Morningstar', '615 297-2723', '22 Graybar House Rd.', 'Nashville', 'TN', '37215', b'0'),
('172-32-1176', 'White', 'Johnson', '408 496-7223', '10932 Bigge Rd.', 'Menlo Park', 'CA', '94025', b'1'),
('712-45-1867', 'del Castillo', 'Innes', '615 996-8275', '2286 Cram Pl. #86', 'Ann Arbor', 'MI', '48105', b'1'),
('846-92-7186', 'Hunter', 'Sheryl', '415 836-7128', '3410 Blonde St.', 'Palo Alto', 'CA', '94301', b'1'),
('486-29-1786', 'Locksley', 'Charlene', '415 585-4620', '18 Broadway Av.', 'San Francisco', 'CA', '94130', b'1'),
('648-92-1872', 'Blotchet-Halls', 'Reginald', '503 745-6402', '55 Hillsdale Bl.', 'Corvallis', 'OR', '97330', b'1'),
('341-22-1782', 'Smith', 'Meander', '913 843-0462', '10 Mississippi Dr.', 'Lawrence', 'KS', '66044', b'0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `discounts`
--

CREATE TABLE `discounts` (
  `discounttype` varchar(40) NOT NULL,
  `stor_id` char(4) DEFAULT NULL,
  `lowqty` smallint(6) DEFAULT NULL,
  `highqty` smallint(6) DEFAULT NULL,
  `discount` decimal(4,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `discounts`
--

INSERT INTO `discounts` (`discounttype`, `stor_id`, `lowqty`, `highqty`, `discount`) VALUES
('Initial Customer', NULL, NULL, NULL, '10.50'),
('Volume Discount', NULL, 100, 1000, '6.70'),
('Customer Discount', '8042', NULL, NULL, '5.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `employee`
--

CREATE TABLE `employee` (
  `emp_id` char(9) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `minit` char(1) DEFAULT NULL,
  `lname` varchar(30) NOT NULL,
  `job_id` int(11) NOT NULL DEFAULT '1',
  `job_lvl` int(11) NOT NULL DEFAULT '10',
  `pub_id` char(4) NOT NULL DEFAULT '9952',
  `hire_date` char(8) NOT NULL DEFAULT '19950818'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `employee`
--

INSERT INTO `employee` (`emp_id`, `fname`, `minit`, `lname`, `job_id`, `job_lvl`, `pub_id`, `hire_date`) VALUES
('PTC11962M', 'Philipe', 'T', 'Cramer', 2, 215, '9952', '19891111'),
('AMD15433F', 'Ann', 'M', 'Devon', 3, 200, '9952', '19910716'),
('F-C16315M', 'Francisco', '', 'Chang', 4, 227, '9952', '19901103'),
('LAL21447M', 'Laurence', 'A', 'Lebihan', 5, 175, '0736', '19900603'),
('PXH22250M', 'Paul', 'X', 'Henriot', 5, 159, '0877', '19930819'),
('SKO22412M', 'Sven', 'K', 'Ottlieb', 5, 150, '1389', '19910405'),
('RBM23061F', 'Rita', 'B', 'Muller', 5, 198, '1622', '19931009'),
('MJP25939M', 'Maria', 'J', 'Pontes', 5, 246, '1756', '19890301'),
('JYL26161F', 'Janine', 'Y', 'Labrune', 5, 172, '9901', '19910526'),
('CFH28514M', 'Carlos', 'F', 'Hernadez', 5, 211, '9999', '19890421'),
('VPA30890F', 'Victoria', 'P', 'Ashworth', 6, 140, '0877', '19900913'),
('L-B31947F', 'Lesley', '', 'Brown', 7, 120, '0877', '19910213'),
('ARD36773F', 'Anabela', 'R', 'Domingues', 8, 100, '0877', '19930127'),
('M-R38834F', 'Martine', '', 'Rance', 9, 75, '0877', '19920205'),
('PHF38899M', 'Peter', 'H', 'Franken', 10, 75, '0877', '19920517'),
('DBT39435M', 'Daniel', 'B', 'Tonini', 11, 75, '0877', '19900101'),
('H-B39728F', 'Helen', '', 'Bennett', 12, 35, '0877', '19890921'),
('PMA42628M', 'Paolo', 'M', 'Accorti', 13, 35, '0877', '19920827'),
('ENL44273F', 'Elizabeth', 'N', 'Lincoln', 14, 35, '0877', '19900724'),
('MGK44605M', 'Matti', 'G', 'Karttunen', 6, 220, '0736', '19940501'),
('PDI47470M', 'Palle', 'D', 'Ibsen', 7, 195, '0736', '19930509'),
('MMS49649F', 'Mary', 'M', 'Saveley', 8, 175, '0736', '19930629'),
('GHT50241M', 'Gary', 'H', 'Thomas', 9, 170, '0736', '19880809'),
('MFS52347M', 'Martin', 'F', 'Sommer', 10, 165, '0736', '19900413'),
('R-M53550M', 'Roland', '', 'Mendel', 11, 150, '0736', '19910905'),
('HAS54740M', 'Howard', 'A', 'Snyder', 12, 100, '0736', '19881119'),
('TPO55093M', 'Timothy', 'P', 'O\'Rourke', 13, 100, '0736', '19880619'),
('KFJ64308F', 'Karin', 'F', 'Josephs', 14, 100, '0736', '19921017'),
('DWR65030M', 'Diego', 'W', 'Roel', 6, 192, '1389', '19911216'),
('M-L67958F', 'Maria', '', 'Larsson', 7, 135, '1389', '19920327'),
('PSP68661F', 'Paula', 'S', 'Parente', 8, 125, '1389', '19940119'),
('MAS70474F', 'Margaret', 'A', 'Smith', 9, 78, '1389', '19880929'),
('A-C71970F', 'Aria', '', 'Cruz', 10, 87, '1389', '19911026'),
('MAP77183M', 'Miguel', 'A', 'Paolino', 11, 112, '1389', '19921207'),
('Y-L77953M', 'Yoshi', '', 'Latimer', 12, 32, '1389', '19890611'),
('CGS88322F', 'Carine', 'G', 'Schmitt', 13, 64, '1389', '19920707'),
('PSA89086M', 'Pedro', 'S', 'Afonso', 14, 89, '1389', '19901224'),
('A-R89858F', 'Annette', '', 'Roulet', 6, 152, '9999', '19900221'),
('HAN90777M', 'Helvetius', 'A', 'Nagy', 7, 120, '9999', '19930319'),
('M-P91209M', 'Manuel', '', 'Pereira', 8, 101, '9999', '19890109'),
('KJJ92907F', 'Karla', 'J', 'Jablonski', 9, 170, '9999', '19940311'),
('POK93028M', 'Pirkko', 'O', 'Koskitalo', 10, 80, '9999', '19931129'),
('PCM98509F', 'Patricia', 'C', 'McKenna', 11, 150, '9999', '19890801');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_desc` varchar(50) NOT NULL DEFAULT 'New Position - title not formalized yet',
  `min_lvl` int(11) NOT NULL,
  `max_lvl` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_desc`, `min_lvl`, `max_lvl`) VALUES
(1, 'New Hire - Job not specified', 10, 10),
(2, 'Chief Executive Officer', 200, 250),
(3, 'Business Operations Manager', 175, 225),
(4, 'Chief Financial Officier', 175, 250),
(5, 'Publisher', 150, 250),
(6, 'Managing Editor', 140, 225),
(7, 'Marketing Manager', 120, 200),
(8, 'Public Relations Manager', 100, 175),
(9, 'Acquisitions Manager', 75, 175),
(10, 'Productions Manager', 75, 165),
(11, 'Operations Manager', 75, 150),
(12, 'Editor', 25, 100),
(13, 'Sales Representative', 25, 100),
(14, 'Designer', 25, 100);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `publishers`
--

CREATE TABLE `publishers` (
  `pub_id` char(4) NOT NULL,
  `pub_name` varchar(40) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `country` varchar(30) DEFAULT 'USA'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `publishers`
--

INSERT INTO `publishers` (`pub_id`, `pub_name`, `city`, `state`, `country`) VALUES
('0736', 'New Moon Books', 'Boston', 'MA', 'USA'),
('0877', 'Binnet & Hardley', 'Washington', 'DC', 'USA'),
('1389', 'Algodata Infosystems', 'Berkeley', 'CA', 'USA'),
('9952', 'Scootney Books', 'New York', 'NY', 'USA'),
('1622', 'Five Lakes Publishing', 'Chicago', 'IL', 'USA'),
('1756', 'Ramona Publishers', 'Dallas', 'TX', 'USA'),
('9901', 'GGG&G', 'Mönchen', NULL, 'Germany'),
('9999', 'Lucerne Publishing', 'Paris', NULL, 'France');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roysched`
--

CREATE TABLE `roysched` (
  `title_id` varchar(6) NOT NULL,
  `lorange` int(11) DEFAULT NULL,
  `hirange` int(11) DEFAULT NULL,
  `royalty` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `roysched`
--

INSERT INTO `roysched` (`title_id`, `lorange`, `hirange`, `royalty`) VALUES
('BU1032', 0, 5000, 10),
('PC1035', 10001, 50000, 18),
('BU2075', 0, 1000, 10),
('PS2091', 1001, 5000, 12),
('PS2106', 5001, 10000, 14),
('MC3021', 10001, 12000, 22),
('TC3218', 14001, 50000, 24),
('PC8888', 0, 5000, 10),
('PS7777', 0, 5000, 10),
('PS3333', 15001, 50000, 16),
('BU1111', 8001, 10000, 14),
('PS1372', 40001, 50000, 18);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sales`
--

CREATE TABLE `sales` (
  `stor_id` char(4) NOT NULL,
  `ord_num` varchar(20) NOT NULL,
  `ord_date` char(8) NOT NULL,
  `qty` smallint(6) NOT NULL,
  `payterms` varchar(12) NOT NULL,
  `title_id` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `sales`
--

INSERT INTO `sales` (`stor_id`, `ord_num`, `ord_date`, `qty`, `payterms`, `title_id`) VALUES
('7066', 'QA7442.3', '19940913', 75, 'ON invoice', 'PS2091'),
('7067', 'D4482', '19940914', 10, 'Net 60', 'PS2091'),
('7131', 'N914008', '19940914', 20, 'Net 30', 'PS2091'),
('8042', '423LL922', '19940914', 15, 'ON invoice', 'MC3021'),
('6380', '722a', '19940913', 3, 'Net 60', 'PS2091'),
('8042', 'P723', '19930311', 25, 'Net 30', 'BU1111'),
('7896', 'QQ2299', '19931028', 15, 'Net 60', 'BU7832'),
('7066', 'A2976', '19930524', 50, 'Net 30', 'PC8888'),
('7131', 'P3087a', '19930529', 25, 'Net 60', 'PS7777'),
('7067', 'P2121', '19920615', 40, 'Net 30', 'TC3218');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stores`
--

CREATE TABLE `stores` (
  `stor_id` char(4) NOT NULL,
  `stor_name` varchar(40) DEFAULT NULL,
  `stor_address` varchar(40) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `zip` char(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `stores`
--

INSERT INTO `stores` (`stor_id`, `stor_name`, `stor_address`, `city`, `state`, `zip`) VALUES
('7066', 'Barnum\'s', '567 Pasadena Ave.', 'Tustin', 'CA', '92789'),
('7067', 'News & Brews', '577 First St.', 'Los Gatos', 'CA', '96745'),
('7131', 'Doc-U-Mat: Quality Laundry and Books', '24-A Avogadro Way', 'Remulade', 'WA', '98014'),
('8042', 'Bookbeat', '679 Carson St.', 'Portland', 'OR', '89076'),
('6380', 'Eric the Read Books', '788 Catamaugus Ave.', 'Seattle', 'WA', '98056'),
('7896', 'Fricative Bookshop', '89 Madison St.', 'Fremont', 'CA', '90019');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `titleauthor`
--

CREATE TABLE `titleauthor` (
  `au_id` varchar(11) NOT NULL,
  `title_id` varchar(6) NOT NULL,
  `au_ord` tinyint(4) DEFAULT NULL,
  `royaltyper` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `titleauthor`
--

INSERT INTO `titleauthor` (`au_id`, `title_id`, `au_ord`, `royaltyper`) VALUES
('409-56-7008', 'BU1032', 1, 60),
('486-29-1786', 'PC9999', 1, 100),
('712-45-1867', 'MC2222', 1, 100),
('172-32-1176', 'PS3333', 1, 100),
('238-95-7766', 'PC1035', 1, 100),
('213-46-8915', 'BU2075', 1, 100),
('998-72-3567', 'PS2091', 1, 50),
('722-51-5454', 'MC3021', 1, 75),
('899-46-2035', 'MC3021', 2, 25),
('807-91-6654', 'TC3218', 1, 100),
('274-80-9391', 'BU7832', 1, 100),
('427-17-2319', 'PC8888', 1, 50),
('846-92-7186', 'PC8888', 2, 50),
('756-30-7391', 'PS1372', 1, 75),
('724-80-9391', 'PS1372', 2, 25),
('267-41-2394', 'BU1111', 2, 40),
('672-71-3249', 'TC7777', 1, 40),
('267-41-2394', 'TC7777', 2, 30),
('472-27-2349', 'TC7777', 3, 30),
('648-92-1872', 'TC4203', 1, 100);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `titles`
--

CREATE TABLE `titles` (
  `title_id` varchar(6) NOT NULL,
  `title` varchar(80) NOT NULL,
  `type` char(12) NOT NULL DEFAULT 'UNDECIDED',
  `pub_id` char(4) DEFAULT NULL,
  `price` decimal(4,2) DEFAULT NULL,
  `advance` decimal(10,2) DEFAULT NULL,
  `royalty` int(11) DEFAULT NULL,
  `ytd_sales` int(11) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `titles`
--

INSERT INTO `titles` (`title_id`, `title`, `type`, `pub_id`, `price`, `advance`, `royalty`, `ytd_sales`, `notes`) VALUES
('PC8888', 'Secrets of Silicon Valley', 'popular_comp', '1389', '20.00', '8000.00', 10, 4095, 'Muckraking reporting on the world\'s largest computer hardware and software manufacturers.'),
('BU1032', 'The Busy Executive\'s Database Guide', 'business', '1389', '19.99', '5000.00', 10, 4095, 'An overview of available database systems with emphasis on common business applications. Illustrated.'),
('PS7777', 'Emotional Security: A New Algorithm', 'psychology', '0736', '7.99', '4000.00', 10, 3336, 'Protecting yourself and your loved ones from undue emotional stress in the modern world. Use of computer and nutritional aids emphasized.'),
('PS3333', 'Prolonged Data Deprivation: Four Case Studies', 'psychology', '0736', '19.99', '2000.00', 10, 4072, 'What happens when the data runs dry?  Searching evaluations of information-shortage effects.'),
('BU1111', 'Cooking with Computers: Surreptitious Balance Sheets', 'business', '1389', '11.95', '5000.00', 10, 3876, 'Helpful hints on how to use your electronic resources to the best advantage.'),
('MC2222', 'Silicon Valley Gastronomic Treats', 'mod_cook', '0877', '19.99', '0.00', 12, 2032, 'Favorite recipes for quick, easy, and elegant meals.'),
('TC7777', 'Sushi, Anyone?', 'trad_cook', '0877', '14.99', '8000.00', 10, 4095, 'Detailed instructions on how to make authentic Japanese sushi in your spare time.'),
('TC4203', 'Fifty Years in Buckingham Palace Kitchens', 'trad_cook', '0877', '11.95', '4000.00', 14, 15096, 'More anecdotes from the Queen\'s favorite cook describing life among English royalty. Recipes, techniques, tender vignettes.'),
('PC1035', 'But Is It User Friendly?', 'popular_comp', '1389', '22.95', '7000.00', 16, 8780, 'A survey of software for the naive user, focusing on the \'friendliness\' of each.'),
('BU2075', 'You Can Combat Computer Stress!', 'business', '0736', '2.99', '10125.00', 24, 18722, 'The latest medical and psychological techniques for living with the electronic office. Easy-to-understand explanations.'),
('PS2091', 'Is Anger the Enemy?', 'psychology', '0736', '10.95', '2275.00', 12, 2045, 'Carefully researched study of the effects of strong emotions on the body. Metabolic charts included.'),
('PS2106', 'Life Without Fear', 'psychology', '0736', '7.00', '6000.00', 10, 111, 'New exercise, meditation, and nutritional techniques that can reduce the shock of daily interactions. Popular audience. Sample menus included, exercise video available separately.'),
('MC3021', 'The Gourmet Microwave', 'mod_cook', '0877', '2.99', '15000.00', 24, 22246, 'Traditional French gourmet recipes adapted for modern microwave cooking.'),
('TC3218', 'Onions, Leeks, and Garlic: Cooking Secrets of the Mediterranean', 'trad_cook', '0877', '20.95', '7000.00', 10, 375, 'Profusely illustrated in color, this makes a wonderful gift book for a cuisine-oriented friend.'),
('BU7832', 'Straight Talk About Computers', 'business', '1389', '19.99', '5000.00', 10, 4095, 'Annotated analysis of what computers can do for you: a no-hype guide for the critical user.'),
('PS1372', 'Computer Phobic AND Non-Phobic Individuals: Behavior Variations', 'psychology', '0877', '21.59', '7000.00', 10, 375, 'A must for the specialist, this book examines the difference between those who hate and fear computers and those who don\'t.');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`au_id`);

--
-- Indexen voor tabel `discounts`
--
ALTER TABLE `discounts`
  ADD KEY `stor_id` (`stor_id`);

--
-- Indexen voor tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `pub_id` (`pub_id`);

--
-- Indexen voor tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexen voor tabel `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`pub_id`);

--
-- Indexen voor tabel `roysched`
--
ALTER TABLE `roysched`
  ADD KEY `title_id` (`title_id`);

--
-- Indexen voor tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`stor_id`,`ord_num`,`title_id`),
  ADD KEY `title_id` (`title_id`);

--
-- Indexen voor tabel `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`stor_id`);

--
-- Indexen voor tabel `titleauthor`
--
ALTER TABLE `titleauthor`
  ADD PRIMARY KEY (`au_id`,`title_id`),
  ADD KEY `title_id` (`title_id`);

--
-- Indexen voor tabel `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`title_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;