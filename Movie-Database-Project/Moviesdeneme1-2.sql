-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 28 Nis 2019, 22:19:51
-- Sunucu sürümü: 10.1.37-MariaDB
-- PHP Sürümü: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `Moviesdeneme1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Acts`
--

CREATE TABLE `Acts` (
  `sname` varchar(30) NOT NULL,
  `mid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Categories`
--

CREATE TABLE `Categories` (
  `cname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Directors`
--

CREATE TABLE `Directors` (
  `dname` varchar(30) NOT NULL,
  `movieCount` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Directs`
--

CREATE TABLE `Directs` (
  `dname` varchar(30) NOT NULL,
  `mid` varchar(30) NOT NULL,
  `location` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Got_AwardsAndNominations`
--

CREATE TABLE `Got_AwardsAndNominations` (
  `name` varchar(700) NOT NULL,
  `mid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Movies`
--

CREATE TABLE `Movies` (
  `mid` varchar(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `poster` varchar(700) DEFAULT NULL,
  `releaseDate` int(10) DEFAULT NULL,
  `duration` varchar(30) DEFAULT NULL,
  `plot` varchar(700) DEFAULT NULL,
  `production` varchar(50) DEFAULT NULL,
  `IMDbVotes` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `Movies`
--

INSERT INTO `Movies` (`mid`, `title`, `poster`, `releaseDate`, `duration`, `plot`, `production`, `IMDbVotes`) VALUES
('1', 'Guardians of the Galaxy Vol. 2', 'https://m.media-amazon.com/images/M/MV5BMTg2MzI1MTg3OF5BMl5BanBnXkFtZTgwNTU3NDA2MTI@._V1_SX300.jpg', 2017, '136 min', 'The Guardians struggle to keep together as a team while dealing with their personal family issues, notably Star-Lord\'s encounter with his father the ambitious celestial being Ego.', 'Walt Disney Pictures', 458168),
('2', 'It', 'https://m.media-amazon.com/images/M/MV5BZDVkZmI0YzAtNzdjYi00ZjhhLWE1ODEtMWMzMWMzNDA0NmQ4XkEyXkFqcGdeQXVyNzYzODM3Mzg@._V1_SX300.jpg', 2017, '135 min', 'In the summer of 1989, a group of bullied kids band together to destroy a shape-shifting monster, which disguises itself as a clown and preys on the children of Derry, their small Maine town.', 'Warner Bros. Pictures', 347053);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Movie_List`
--

CREATE TABLE `Movie_List` (
  `username` varchar(20) NOT NULL,
  `movieTitle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Platform`
--

CREATE TABLE `Platform` (
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `Platform`
--

INSERT INTO `Platform` (`type`) VALUES
('IMDb'),
('Rotten');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Scored`
--

CREATE TABLE `Scored` (
  `mid` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `score` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `Scored`
--

INSERT INTO `Scored` (`mid`, `type`, `score`) VALUES
('1', 'IMDb', '7.7'),
('1', 'Rotten', '84%'),
('2', 'IMDb', '7.4'),
('2', 'Rotten', '85%');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Stars`
--

CREATE TABLE `Stars` (
  `sname` varchar(30) NOT NULL,
  `sex` varchar(30) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Type`
--

CREATE TABLE `Type` (
  `cname` varchar(30) NOT NULL,
  `mid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Users`
--

CREATE TABLE `Users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ltype` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `Users`
--

INSERT INTO `Users` (`username`, `password`, `ltype`) VALUES
('deneme1', '202cb962ac59075b964b07152d234b70', 'reg'),
('yigit', '3c1d3b16eb2ac8295dd4ad22cb56e38f', 'reg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Writers`
--

CREATE TABLE `Writers` (
  `wname` varchar(30) NOT NULL,
  `address` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Writes`
--

CREATE TABLE `Writes` (
  `wname` varchar(30) NOT NULL,
  `mid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `Acts`
--
ALTER TABLE `Acts`
  ADD PRIMARY KEY (`sname`,`mid`),
  ADD KEY `mid` (`mid`);

--
-- Tablo için indeksler `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`cname`);

--
-- Tablo için indeksler `Directors`
--
ALTER TABLE `Directors`
  ADD PRIMARY KEY (`dname`);

--
-- Tablo için indeksler `Directs`
--
ALTER TABLE `Directs`
  ADD PRIMARY KEY (`dname`,`mid`),
  ADD KEY `mid` (`mid`);

--
-- Tablo için indeksler `Got_AwardsAndNominations`
--
ALTER TABLE `Got_AwardsAndNominations`
  ADD PRIMARY KEY (`name`,`mid`),
  ADD KEY `mid` (`mid`);

--
-- Tablo için indeksler `Movies`
--
ALTER TABLE `Movies`
  ADD PRIMARY KEY (`mid`);

--
-- Tablo için indeksler `Movie_List`
--
ALTER TABLE `Movie_List`
  ADD PRIMARY KEY (`username`,`movieTitle`);

--
-- Tablo için indeksler `Platform`
--
ALTER TABLE `Platform`
  ADD PRIMARY KEY (`type`);

--
-- Tablo için indeksler `Scored`
--
ALTER TABLE `Scored`
  ADD PRIMARY KEY (`mid`,`type`),
  ADD KEY `type` (`type`);

--
-- Tablo için indeksler `Stars`
--
ALTER TABLE `Stars`
  ADD PRIMARY KEY (`sname`);

--
-- Tablo için indeksler `Type`
--
ALTER TABLE `Type`
  ADD PRIMARY KEY (`cname`,`mid`),
  ADD KEY `mid` (`mid`);

--
-- Tablo için indeksler `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`username`);

--
-- Tablo için indeksler `Writers`
--
ALTER TABLE `Writers`
  ADD PRIMARY KEY (`wname`);

--
-- Tablo için indeksler `Writes`
--
ALTER TABLE `Writes`
  ADD PRIMARY KEY (`wname`,`mid`),
  ADD KEY `mid` (`mid`);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `Acts`
--
ALTER TABLE `Acts`
  ADD CONSTRAINT `acts_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movies` (`mid`),
  ADD CONSTRAINT `acts_ibfk_2` FOREIGN KEY (`sname`) REFERENCES `Stars` (`sname`);

--
-- Tablo kısıtlamaları `Directs`
--
ALTER TABLE `Directs`
  ADD CONSTRAINT `directs_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movies` (`mid`),
  ADD CONSTRAINT `directs_ibfk_2` FOREIGN KEY (`dname`) REFERENCES `Directors` (`dname`);

--
-- Tablo kısıtlamaları `Got_AwardsAndNominations`
--
ALTER TABLE `Got_AwardsAndNominations`
  ADD CONSTRAINT `got_awardsandnominations_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movies` (`mid`);

--
-- Tablo kısıtlamaları `Movie_List`
--
ALTER TABLE `Movie_List`
  ADD CONSTRAINT `movie_list_ibfk_1` FOREIGN KEY (`username`) REFERENCES `Users` (`username`);

--
-- Tablo kısıtlamaları `Scored`
--
ALTER TABLE `Scored`
  ADD CONSTRAINT `scored_ibfk_1` FOREIGN KEY (`type`) REFERENCES `Platform` (`type`),
  ADD CONSTRAINT `scored_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `Movies` (`mid`);

--
-- Tablo kısıtlamaları `Type`
--
ALTER TABLE `Type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movies` (`mid`),
  ADD CONSTRAINT `type_ibfk_2` FOREIGN KEY (`cname`) REFERENCES `Categories` (`cname`);

--
-- Tablo kısıtlamaları `Writes`
--
ALTER TABLE `Writes`
  ADD CONSTRAINT `writes_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movies` (`mid`),
  ADD CONSTRAINT `writes_ibfk_2` FOREIGN KEY (`wname`) REFERENCES `Writers` (`wname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
