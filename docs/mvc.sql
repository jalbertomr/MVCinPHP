-- phpMyAdmin SQL Dump
-- version 4.4.15.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2017 at 12:31 PM
-- Server version: 5.5.38-0+wheezy1
-- PHP Version: 5.4.45-0+deb7u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `dataid` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=376 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`dataid`, `text`) VALUES
(310, 'data1'),
(375, 'carga'),
(372, 'Justicia'),
(374, 'carga'),
(371, 'Templanza'),
(370, 'Fortaleza'),
(359, 'hola'),
(367, 'Determinar'),
(368, 'Ausencia'),
(369, 'Dolor'),
(373, 'carga'),
(363, 'carga');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `noteid` int(11) unsigned NOT NULL,
  `userid` int(11) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`noteid`, `userid`, `title`, `content`, `date_added`) VALUES
(10, 1, 'nota1', 'en mvc cont1', '2016-01-20 10:02:36'),
(23, 1, 'nota2', 'contenido2', '2016-01-20 11:09:50'),
(28, 1, 'nota5', 'cinco\naca hay', '2016-02-04 14:05:21'),
(26, 1, 'nota4', 'repetida 4\r\n', '2016-02-04 13:56:27'),
(27, 1, 'nota4', 'blabla4 editada', '2016-02-04 14:04:58'),
(30, 1, 'nota3', '333 aca', '2016-02-17 17:30:47'),
(31, 23, 'titulo2', 'titulo2 contenido', '2016-09-29 10:20:42'),
(32, 43, 'tit Vickus', 'tit Vickus Content', '2016-09-29 10:22:30'),
(33, 23, 'Beto titulo', 'Beto Titulo Coment', '2016-09-29 14:42:52'),
(34, 42, 'Una Nota', 'una nota comentario', '2016-09-29 15:14:00'),
(35, 42, 'Ota Nota', 'Otra Nota Comentario', '2016-09-29 15:14:18'),
(36, 42, 'una mas nota', 'una mas nota comment\r\n', '2016-09-29 15:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `personid` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) unsigned NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personid`, `name`, `age`, `gender`) VALUES
(1, 'Beto', 45, 'm'),
(2, 'jesse', 34, 'm'),
(3, 'Evangelina', 36, 'f'),
(4, '11', 11, 'm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` enum('default','admin','owner') NOT NULL DEFAULT 'default'
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `login`, `password`, `role`) VALUES
(1, 'jesse', '8c82827aee3d87c747b9e6afd8084e4aee54d7afb8fc90006bc1966735641b44', 'owner'),
(3, 'joe', '6a01df538cdc2d939e1460272f09c25dc5d2a30b4502fddfb9c7b4a6655a8c45', 'default'),
(23, 'Beto', '3fd58bc921ff8e44b030a21f19adc2b7aa0249dc6d24bccadaec8ca428efe9bd', 'admin'),
(39, 'abc', '4d019c48c5ffc83f2d3ad3092be984138e692326a906586adbb5743c8740cfa9', 'admin'),
(41, 'entrar', '3fd73eccac2c4d6f1ee332539eb4262a635d04326ec0adff93905d38f039eadd', 'default'),
(42, 'vickus', 'de4e265c1331f088d37b4f4842ad866eae58630e4bfaffae7b7a578b3d6825e2', 'admin'),
(44, 'jesse', '8c82827aee3d87c747b9e6afd8084e4aee54d7afb8fc90006bc1966735641b44', 'default');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`dataid`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`noteid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `dataid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=376;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `noteid` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `personid` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
