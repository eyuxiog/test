-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 04 月 16 日 10:02
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `a_user`
--

CREATE TABLE IF NOT EXISTS `a_user` (
  `user` text CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `pwd` int(32) NOT NULL COMMENT '密码',
  `id` int(32) NOT NULL COMMENT 'id'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `a_user`
--

INSERT INTO `a_user` (`user`, `pwd`, `id`) VALUES
('804002', 83, 0),
('801001', 123456, 2),
('802001', 123456, 3),
('801002', 123456, 4),
('801003', 123456, 5),
('803001', 123456, 6),
('803002', 0, 0),
('803003', 25, 0),
('803004', 25, 0),
('803005', 25, 0),
('803007', 42, 0),
('803009', 0, 0),
('803011', 0, 0),
('803013', 186, 0),
('803014', 2, 0),
('804001', 0, 0),
('803015', 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `realmname`
--

CREATE TABLE IF NOT EXISTS `realmname` (
  `id` int(16) NOT NULL,
  `r_name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `area` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `realmname`
--

INSERT INTO `realmname` (`id`, `r_name`, `area`) VALUES
(1, 'www.baidu.com', '801'),
(2, 'www.taobao.com', '802'),
(3, 'www.runoob.com', '803'),
(1, 'localhost', '804');

-- --------------------------------------------------------

--
-- 表的结构 `temp_user`
--

CREATE TABLE IF NOT EXISTS `temp_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `te_user` text CHARACTER SET utf32 NOT NULL,
  `aaaa` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3613 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
