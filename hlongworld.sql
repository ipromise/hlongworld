-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-03-08 11:23:00
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hlongworld`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_banner`
--

CREATE TABLE IF NOT EXISTS `admin_banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示（不显示：0；显示：1）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `admin_member`
--

CREATE TABLE IF NOT EXISTS `admin_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL COMMENT '用户名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user_article`
--

CREATE TABLE IF NOT EXISTS `user_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT 'UID',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `addtime` int(11) NOT NULL COMMENT '录入时间',
  `content` blob NOT NULL COMMENT '内容',
  `updatetime` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user_member`
--

CREATE TABLE IF NOT EXISTS `user_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL COMMENT '用户名',
  `email` char(30) NOT NULL COMMENT '邮箱',
  `sendNum` int(11) NOT NULL COMMENT '发送注册邮件数',
  `checkEmail` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否已验证（0：未验证；1：已验证：）',
  `salt` char(6) NOT NULL COMMENT '盐',
  `password` char(32) NOT NULL COMMENT '密码',
  `head` varchar(100) NOT NULL COMMENT '头像',
  `mystatus` tinyint(1) NOT NULL,
  `address` varchar(200) NOT NULL COMMENT '地址',
  `signature` varchar(100) NOT NULL COMMENT '签名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user_member`
--

INSERT INTO `user_member` (`id`, `username`, `email`, `sendNum`, `checkEmail`, `salt`, `password`, `head`, `mystatus`, `address`, `signature`) VALUES
(1, 'xiaohelong', 'xiaohelong22@163.com', 1, 1, 'KjizNj', '3b06d6d297e454cbc8bdbad50589611c', 'assets/upload/img/head/header_1486378175_3034.jpg', 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
