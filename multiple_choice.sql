﻿-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2018 lúc 05:45 PM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `multiple_choice`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `email`, `middlename`, `address`, `remember_token`, `status`) VALUES
(1, 'dương', '123', '$2y$10$0dFpXcwjoP0C08xWQatiJe.vEpekIB/kLYQCinGcZOnaG3mqXq.nq', 'duongyt1998@gmail.com', 'nguyễn tùng', 'aaaaaa', '1ranlvOGuatzqw298xxgLEn3m148TU39tzHLNuAQPPcmwjWYtp6jtHIxKwHU', 1),
(6, 'nguyễn tùng dương', 'duong12', '$2y$10$.bYZZjSdTcTlcZxZqR.y1OOdrMHCPq5r2f7R5XeKAoTbZm4zhN8qK', 'duongyt1998@gmail.com', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `examquestion`
--

CREATE TABLE `examquestion` (
  `id` int(10) UNSIGNED NOT NULL,
  `idExam` int(10) UNSIGNED NOT NULL,
  `code` int(10) UNSIGNED NOT NULL,
  `idQuestion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `examquestion`
--

INSERT INTO `examquestion` (`id`, `idExam`, `code`, `idQuestion`) VALUES
(1456, 1, 1, 32),
(1454, 1, 1, 33),
(1458, 1, 1, 34),
(1462, 1, 1, 35),
(1460, 1, 1, 36),
(1578, 1, 1, 37),
(1574, 1, 1, 38),
(1580, 1, 1, 39),
(1582, 1, 1, 40),
(1576, 1, 1, 41),
(1698, 1, 1, 42),
(1700, 1, 1, 43),
(1694, 1, 1, 44),
(1696, 1, 1, 45),
(1702, 1, 1, 46),
(1822, 1, 1, 47),
(1820, 1, 1, 48),
(1818, 1, 1, 49),
(1814, 1, 1, 50),
(1816, 1, 1, 51),
(1936, 1, 1, 52),
(1940, 1, 1, 53),
(1942, 1, 1, 54),
(1938, 1, 1, 55),
(1934, 1, 1, 56),
(1468, 1, 2, 32),
(1470, 1, 2, 33),
(1466, 1, 2, 34),
(1464, 1, 2, 35),
(1472, 1, 2, 36),
(1584, 1, 2, 37),
(1592, 1, 2, 38),
(1588, 1, 2, 39),
(1590, 1, 2, 40),
(1586, 1, 2, 41),
(1704, 1, 2, 42),
(1708, 1, 2, 43),
(1712, 1, 2, 44),
(1710, 1, 2, 45),
(1706, 1, 2, 46),
(1828, 1, 2, 47),
(1832, 1, 2, 48),
(1826, 1, 2, 49),
(1830, 1, 2, 50),
(1824, 1, 2, 51),
(1952, 1, 2, 52),
(1944, 1, 2, 53),
(1950, 1, 2, 54),
(1946, 1, 2, 55),
(1948, 1, 2, 56),
(1478, 1, 3, 32),
(1476, 1, 3, 33),
(1482, 1, 3, 34),
(1480, 1, 3, 35),
(1474, 1, 3, 36),
(1596, 1, 3, 37),
(1598, 1, 3, 38),
(1602, 1, 3, 39),
(1600, 1, 3, 40),
(1594, 1, 3, 41),
(1714, 1, 3, 42),
(1722, 1, 3, 43),
(1718, 1, 3, 44),
(1716, 1, 3, 45),
(1720, 1, 3, 46),
(1842, 1, 3, 47),
(1838, 1, 3, 48),
(1836, 1, 3, 49),
(1840, 1, 3, 50),
(1834, 1, 3, 51),
(1960, 1, 3, 52),
(1958, 1, 3, 53),
(1962, 1, 3, 54),
(1956, 1, 3, 55),
(1954, 1, 3, 56),
(1484, 1, 4, 32),
(1492, 1, 4, 33),
(1490, 1, 4, 34),
(1488, 1, 4, 35),
(1486, 1, 4, 36),
(1606, 1, 4, 37),
(1604, 1, 4, 38),
(1608, 1, 4, 39),
(1610, 1, 4, 40),
(1612, 1, 4, 41),
(1728, 1, 4, 42),
(1726, 1, 4, 43),
(1730, 1, 4, 44),
(1732, 1, 4, 45),
(1724, 1, 4, 46),
(1846, 1, 4, 47),
(1844, 1, 4, 48),
(1852, 1, 4, 49),
(1848, 1, 4, 50),
(1850, 1, 4, 51),
(1972, 1, 4, 52),
(1968, 1, 4, 53),
(1970, 1, 4, 54),
(1964, 1, 4, 55),
(1966, 1, 4, 56),
(1496, 1, 5, 32),
(1494, 1, 5, 33),
(1500, 1, 5, 34),
(1502, 1, 5, 35),
(1498, 1, 5, 36),
(1614, 1, 5, 37),
(1618, 1, 5, 38),
(1616, 1, 5, 39),
(1622, 1, 5, 40),
(1620, 1, 5, 41),
(1738, 1, 5, 42),
(1736, 1, 5, 43),
(1740, 1, 5, 44),
(1734, 1, 5, 45),
(1742, 1, 5, 46),
(1858, 1, 5, 47),
(1860, 1, 5, 48),
(1856, 1, 5, 49),
(1854, 1, 5, 50),
(1862, 1, 5, 51),
(1974, 1, 5, 52),
(1980, 1, 5, 53),
(1976, 1, 5, 54),
(1978, 1, 5, 55),
(1982, 1, 5, 56),
(1508, 1, 6, 32),
(1506, 1, 6, 33),
(1504, 1, 6, 34),
(1510, 1, 6, 35),
(1512, 1, 6, 36),
(1632, 1, 6, 37),
(1624, 1, 6, 38),
(1626, 1, 6, 39),
(1628, 1, 6, 40),
(1630, 1, 6, 41),
(1744, 1, 6, 42),
(1746, 1, 6, 43),
(1752, 1, 6, 44),
(1748, 1, 6, 45),
(1750, 1, 6, 46),
(1870, 1, 6, 47),
(1864, 1, 6, 48),
(1868, 1, 6, 49),
(1866, 1, 6, 50),
(1872, 1, 6, 51),
(1990, 1, 6, 52),
(1988, 1, 6, 53),
(1984, 1, 6, 54),
(1986, 1, 6, 55),
(1992, 1, 6, 56),
(1520, 1, 7, 32),
(1518, 1, 7, 33),
(1514, 1, 7, 34),
(1516, 1, 7, 35),
(1522, 1, 7, 36),
(1638, 1, 7, 37),
(1642, 1, 7, 38),
(1636, 1, 7, 39),
(1640, 1, 7, 40),
(1634, 1, 7, 41),
(1762, 1, 7, 42),
(1756, 1, 7, 43),
(1758, 1, 7, 44),
(1754, 1, 7, 45),
(1760, 1, 7, 46),
(1880, 1, 7, 47),
(1878, 1, 7, 48),
(1874, 1, 7, 49),
(1882, 1, 7, 50),
(1876, 1, 7, 51),
(1996, 1, 7, 52),
(1998, 1, 7, 53),
(2002, 1, 7, 54),
(1994, 1, 7, 55),
(2000, 1, 7, 56),
(1530, 1, 8, 32),
(1532, 1, 8, 33),
(1526, 1, 8, 34),
(1524, 1, 8, 35),
(1528, 1, 8, 36),
(1652, 1, 8, 37),
(1646, 1, 8, 38),
(1648, 1, 8, 39),
(1644, 1, 8, 40),
(1650, 1, 8, 41),
(1768, 1, 8, 42),
(1766, 1, 8, 43),
(1772, 1, 8, 44),
(1764, 1, 8, 45),
(1770, 1, 8, 46),
(1888, 1, 8, 47),
(1886, 1, 8, 48),
(1892, 1, 8, 49),
(1884, 1, 8, 50),
(1890, 1, 8, 51),
(2006, 1, 8, 52),
(2004, 1, 8, 53),
(2008, 1, 8, 54),
(2012, 1, 8, 55),
(2010, 1, 8, 56),
(1536, 1, 9, 32),
(1534, 1, 9, 33),
(1540, 1, 9, 34),
(1538, 1, 9, 35),
(1542, 1, 9, 36),
(1658, 1, 9, 37),
(1656, 1, 9, 38),
(1660, 1, 9, 39),
(1662, 1, 9, 40),
(1654, 1, 9, 41),
(1774, 1, 9, 42),
(1782, 1, 9, 43),
(1776, 1, 9, 44),
(1780, 1, 9, 45),
(1778, 1, 9, 46),
(1902, 1, 9, 47),
(1894, 1, 9, 48),
(1896, 1, 9, 49),
(1898, 1, 9, 50),
(1900, 1, 9, 51),
(2022, 1, 9, 52),
(2020, 1, 9, 53),
(2018, 1, 9, 54),
(2016, 1, 9, 55),
(2014, 1, 9, 56),
(1544, 1, 10, 32),
(1548, 1, 10, 33),
(1550, 1, 10, 34),
(1552, 1, 10, 35),
(1546, 1, 10, 36),
(1672, 1, 10, 37),
(1666, 1, 10, 38),
(1668, 1, 10, 39),
(1664, 1, 10, 40),
(1670, 1, 10, 41),
(1786, 1, 10, 42),
(1790, 1, 10, 43),
(1792, 1, 10, 44),
(1784, 1, 10, 45),
(1788, 1, 10, 46),
(1912, 1, 10, 47),
(1906, 1, 10, 48),
(1904, 1, 10, 49),
(1910, 1, 10, 50),
(1908, 1, 10, 51),
(2030, 1, 10, 52),
(2026, 1, 10, 53),
(2032, 1, 10, 54),
(2028, 1, 10, 55),
(2024, 1, 10, 56),
(1558, 1, 11, 32),
(1562, 1, 11, 33),
(1556, 1, 11, 34),
(1554, 1, 11, 35),
(1560, 1, 11, 36),
(1674, 1, 11, 37),
(1680, 1, 11, 38),
(1676, 1, 11, 39),
(1678, 1, 11, 40),
(1682, 1, 11, 41),
(1794, 1, 11, 42),
(1798, 1, 11, 43),
(1800, 1, 11, 44),
(1802, 1, 11, 45),
(1796, 1, 11, 46),
(1914, 1, 11, 47),
(1920, 1, 11, 48),
(1922, 1, 11, 49),
(1916, 1, 11, 50),
(1918, 1, 11, 51),
(2036, 1, 11, 52),
(2034, 1, 11, 53),
(2042, 1, 11, 54),
(2038, 1, 11, 55),
(2040, 1, 11, 56),
(1566, 1, 12, 32),
(1570, 1, 12, 33),
(1572, 1, 12, 34),
(1564, 1, 12, 35),
(1568, 1, 12, 36),
(1690, 1, 12, 37),
(1688, 1, 12, 38),
(1684, 1, 12, 39),
(1686, 1, 12, 40),
(1692, 1, 12, 41),
(1812, 1, 12, 42),
(1810, 1, 12, 43),
(1804, 1, 12, 44),
(1808, 1, 12, 45),
(1806, 1, 12, 46),
(1930, 1, 12, 47),
(1924, 1, 12, 48),
(1932, 1, 12, 49),
(1928, 1, 12, 50),
(1926, 1, 12, 51),
(2052, 1, 12, 52),
(2050, 1, 12, 53),
(2044, 1, 12, 54),
(2048, 1, 12, 55),
(2046, 1, 12, 56);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idTopic` int(10) UNSIGNED NOT NULL,
  `time` int(10) UNSIGNED NOT NULL,
  `status` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exams`
--

INSERT INTO `exams` (`id`, `code`, `name`, `idTopic`, `time`, `status`) VALUES
(1, 1, 'Giữa kì', 2, 15, 1),
(1, 2, 'Giữa kì', 2, 15, 1),
(1, 3, 'Giữa kì', 2, 15, 1),
(1, 4, 'Giữa kì', 2, 15, 1),
(1, 5, 'Giữa kì', 2, 15, 1),
(1, 6, 'Giữa kì', 2, 15, 1),
(1, 7, 'Giữa kì', 2, 15, 1),
(1, 8, 'Giữa kì', 2, 15, 1),
(1, 9, 'Giữa kì', 2, 15, 1),
(1, 10, 'Giữa kì', 2, 15, 1),
(1, 11, 'Giữa kì', 2, 15, 1),
(1, 12, 'Giữa kì', 2, 15, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `A` text COLLATE utf8_unicode_ci NOT NULL,
  `B` text COLLATE utf8_unicode_ci NOT NULL,
  `C` text COLLATE utf8_unicode_ci NOT NULL,
  `D` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `idTopic` int(10) UNSIGNED NOT NULL,
  `level` int(1) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `idadmin` int(10) UNSIGNED NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `name`, `A`, `B`, `C`, `D`, `answer`, `idTopic`, `level`, `comment`, `idadmin`, `status`) VALUES
(1, '1+0=?', '1', '2', '3', '4', 'A', 1, 1, 'không cần giải thích', 1, 0),
(3, '<p>1+3=?</p>', '<p>5</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', 'D', 1, 1, NULL, 1, 1),
(4, '2+2=?', '1', '2', '3', '4', 'D', 1, 1, NULL, 1, 1),
(5, '2+3=?', '2', '3', '4', '5', 'D', 1, 1, NULL, 1, 1),
(6, '5-4=?', '1', '2', '3', '4', 'A', 1, 2, NULL, 1, 1),
(7, '10-5=?', '2', '3', '4', '5', 'D', 1, 2, NULL, 1, 1),
(8, '5+6=?', '10', '11', '12', '13', 'B', 1, 2, NULL, 1, 1),
(9, '9+9=?', '18', '19', '20', '21', 'A', 1, 2, NULL, 1, 1),
(10, '10+10=?', '20', '21', '22', '23', 'A', 1, 2, NULL, 1, 1),
(11, '5 x 5=?', '24', '25', '2', '27', 'B', 1, 3, NULL, 1, 1),
(12, '7x 7=?', '49', '50', '51', '52', 'A', 1, 3, NULL, 1, 1),
(13, '9 x9 =?', '81', '82', '83', '84', 'A', 1, 3, NULL, 1, 1),
(14, '6 x 6=?', '36', '37', '38', '39', 'A', 1, 3, NULL, 1, 1),
(15, '4 x4=?', '15', '16', '17', '18', 'B', 1, 3, NULL, 1, 1),
(16, '15 : 3=?', '4', '5', '6', '7', 'B', 1, 4, NULL, 1, 1),
(17, '9 : 3=?', '1', '2', '3', '4', 'C', 1, 4, NULL, 1, 1),
(18, '10 : 2=?', '2', '3', '4', '5', 'D', 1, 4, NULL, 1, 1),
(19, '36 : 6=?', '5', '6', '7', '8', 'B', 1, 1, NULL, 1, 1),
(20, '49 :7=?', '7', '8', '9', '10', 'A', 1, 4, NULL, 1, 1),
(21, '27 : 9=?', '3', '4', '5', '6', 'A', 1, 4, NULL, 1, 1),
(22, '15 x 15=?', '225', '226', '227', '228', 'A', 1, 5, NULL, 1, 1),
(23, '20 x 20=?', '400', '401', '402', '403', 'A', 1, 5, NULL, 1, 1),
(24, '30 x 30=?', '900', '901', '902', '903', 'A', 1, 5, NULL, 1, 1),
(25, '300 : 50=?', '5', '6', '7', '8', 'B', 1, 5, NULL, 1, 1),
(26, '35 : 5=?', '7', '8', '9', '10', 'A', 1, 5, NULL, 1, 1),
(27, '9+9=?', '18', '19', '20', '21', 'A', 1, 2, NULL, 1, 1),
(28, '2+2=?', '1', '2', '3', '4', 'D', 1, 1, NULL, 1, 0),
(32, 'Cho \\( \\int_{0}^{1}\\frac{dx}{x^{5}+x^{2}}= a.ln2+b.ln5+c\\).Khi đó \\(a+2b+4c\\) bằng ', '2', '3', '0', '1', 'D', 2, 1, NULL, 1, 1),
(33, 'Nguyên hàm của \\(f\\left ( x \\right )= \\left ( 2x-1 \\right )e^{\\frac{1}{x}} \\) là ', '\\( x.e^{\\frac{1}{x}} \\)', '\\( \\left ( x^{2}-1 \\right )e^{\\frac{1}{x}} \\)', '\\( x^{2}e^{\\frac{1}{x}} \\)', '\\( \\frac{1}{e^{x}} \\)', 'C', 2, 1, NULL, 1, 1),
(34, 'Tính tích phân \\( I=\\int_{1}^{5}\\frac{dx}{x\\sqrt{3x+1}}\\) được kết quả là \\(I=a.ln3+b.ln5\\). Giá trị của \\(a^{2}+ab+3b^{2}\\) là ', '4', '1', '0', '5', 'D', 2, 1, NULL, 1, 1),
(35, 'Tích phân \\( I=\\int_{0}^{\\frac{\\pi}{2}}\\left ( 1-cosx \\right )^{n}sinxdx \\) bằng ', '\\( \\frac{1}{n+1} \\)', '\\( \\frac{1}{n-1} \\)', '\\( \\frac{1}{2n} \\)', '\\( \\frac{1}{n} \\)', 'A', 2, 1, NULL, 1, 1),
(36, 'Hình phẳng giới hạn bởi \\( y=x, y=x^{2} \\) có diện tích là ', '\\( \\frac{1}{2} \\)', '\\( \\frac{1}{6} \\)', '\\( \\frac{1}{3} \\)', '1', 'B', 2, 1, NULL, 1, 1),
(37, '\\( I=\\int_{\\frac{1}{e}}^{e}\\frac{dx}{x} \\) có giá trị', '0', '-2', '2', 'e', 'C', 2, 2, NULL, 1, 1),
(38, 'Cho \\(f\\left ( x \\right )\\) liên tục trên [0;10] thoả mãn: \\(\\int_{0}^{10}f\\left ( x \\right )dx= 7, \\int_{2}^{6}f\\left ( x \\right )dx= 3\\). Khi đó giá trị của \\(\\int_{0}^{2}f\\left ( x \\right )dx+ \\int_{6}^{10}f\\left ( x \\right )dx\\) có giá trị là:', '1', '4', '3', '2', 'B', 2, 2, NULL, 1, 1),
(39, 'Thể tích vật thể bị giới hạn bởi 2 mặt trụ: \\(x^{2}+z^{2}=a^{2}\\) và \\(y^{2}+z^{2}=a^{2}\\) là \\(V=\\frac{2}{3} \\left ( đvtt \\right )\\).Tính giá trị của a? ', '1', '\\( \\frac{1}{2} \\)', '2', '\\( \\frac{1}{4} \\)', 'D', 2, 2, NULL, 1, 1),
(40, 'Tính \\( \\int 2^{\\frac{1}{2x}}\\frac{ln2}{x^{2}}dx,\\) kết quả sai là: ', '\\( 2\\left ( 2^{\\frac{1}{2x}}+2 \\right )+ C \\)', '\\( 2^{\\frac{1}{2x}+1}+ C \\)', '\\( 2^{\\frac{1}{2x}}+ C \\)', '\\( 2\\left ( 2^{\\frac{1}{2x}}-2 \\right )+ C \\)', 'C', 2, 2, NULL, 1, 1),
(41, 'Tính \\( K=\\int_{0}^{1}x^{2}e^{2x}dx \\)', '\\( K= \\frac{e^{2}-1}{2} \\)', '\\( K= \\frac{e^{2}+1}{4} \\)', '\\( K= \\frac{e^{2}}{4} \\)', '\\( \\frac{1}{4} \\)', 'A', 2, 2, NULL, 1, 1),
(42, 'Diện tích hình giới hạn bởi \\( (P):y=x^{3}+3,\\) tiếp tuyến của (P) tại x=2 và trục Oy là \\(&nbsp; \\)', '\\( \\frac{2}{3} \\)', '8', '\\( \\frac{8}{3} \\)', '4', 'C', 2, 3, NULL, 1, 1),
(43, 'Nguyên hàm của hàm số \\( y=sin^{3}x.cosx là: \\)', '\\( \\frac{1}{4}sin^{4}x+C \\)', '\\( \\frac{1}{3}cos^{3}x+C \\)', '\\( \\frac{1}{3}sin^{3}x+C \\)', '\\( sin^{4}x+C \\)', 'A', 2, 3, NULL, 1, 1),
(44, 'Cho f(x) là hàm số lẻ, liên tục trên \\( \\mathbb{R}.\\) Khi đó giá trị tích phân \\(\\int_{-1}^{1}f(x)dx\\) là: ', '2', '0', '1', '-2', 'B', 2, 3, NULL, 1, 1),
(45, 'Thể tích của khối tròn xoay do hình phẳng (H) giới hạn bởi các đường \\( y=sinx; y=0; x=0; x=\\pi\\) khi xoay quanh Ox là: ', '\\( \\frac{\\pi ^{2}}{3} \\)', '\\( \\frac{\\pi ^{2}}{2} \\)', '\\( \\frac{\\pi ^{2}}{4} \\)', '\\( \\frac{2\\pi ^{2}}{3} \\)', 'B', 2, 3, NULL, 1, 1),
(46, 'Tích phân \\( I=\\int_{0}^{1}x\\sqrt[3]{1-x}dx \\)', '\\( \\frac{28}{9} \\)', '\\( \\frac{-9}{28} \\)', '\\( \\frac{9}{28} \\)', '\\( \\frac{3}{28} \\)', 'C', 2, 3, NULL, 1, 1),
(47, 'Cho f(x) là hàm số chẵn, liên tục trên \\( \\mathbb{R}\\) thỏa mãn \\(\\int_{-1}^{1}f(x)dx=2\\).Khi đó giá trị tích phân \\(\\int_{0}^{1}f(x)dx\\) là: ', '2', '1', '\\( \\frac{1}{2} \\)', '\\( \\frac{1}{4} \\)', 'B', 2, 4, NULL, 1, 1),
(48, 'Cho \\( f\'(x)=3-5sinx\\) và \\(f(0)=10\\).Trong các khẳng định sau khẳng định nào đúng? ', '\\( f(x)=3x+5cosx+2 \\)', '\\( f(\\frac{\\pi }{2})=\\frac{3\\pi }{2} \\)', '\\( f(\\pi )=3\\pi&nbsp; \\)', '\\( f(x)=3x-5cosx \\)', 'C', 2, 4, NULL, 1, 1),
(49, 'Cho hàm số \\( y=f(x)\\) thỏa mãn \\(y\'=x^{2}y\\) và \\(f(-1)=1\\) thì \\(f(2)=\\) bao nhiêu? ', '\\( e^{3} \\)', '\\( e^{2} \\)', '2e', 'e+1', 'A', 2, 4, NULL, 1, 1),
(50, 'Một nguyên hàm của hàm số \\( :f(x)=x\\sqrt{1+x^{2}}\\) là: ', '\\( F(x)=\\frac{1}{3}\\left ( \\sqrt{1+x^{2}} \\right )^{3} \\)', '\\( F(x)=\\frac{1}{3}\\left ( \\sqrt{1+x^{2}} \\right )^{2} \\)', '\\( F(x)=\\frac{x^{2}}{2}\\left ( \\sqrt{1+x^{2}} \\right )^{2} \\)', '\\( F(x)=\\frac{1}{2}\\left ( \\sqrt{1+x^{2}} \\right )^{2} \\)', 'A', 2, 4, NULL, 1, 1),
(51, 'Tính \\( K=\\int_{0}^{1}x.ln(1+x^{2})dx \\)', '\\( ln2-\\frac{1}{2} \\)', '\\( ln2-\\frac{1}{4} \\)', '\\( ln2+\\frac{1}{2} \\)', '\\( -ln2+\\frac{1}{2} \\)', 'A', 2, 4, NULL, 1, 1),
(52, 'Cho hình phẳng (S) giới hạn bởi \\( Ox,Oy,y=cosx\\) và \\(y=\\frac{-2}{\\pi }x+1\\).Diện tích hình phẳng (s) là: ', '\\( 2\\pi&nbsp; \\)', '\\( 2+\\frac{3\\pi }{2} \\)', '\\( \\pi&nbsp; \\)', '\\( 1+\\frac{3\\pi }{4} \\)', 'B', 2, 5, NULL, 1, 1),
(53, 'Tính tích phân \\( \\int_{0}^{1}\\frac{dx}{x^{2}-x-12} \\)', '\\( ln\\frac{9}{16} \\)', '\\( \\frac{1}{4}ln\\frac{9}{16} \\)', '\\( -\\frac{1}{7}ln\\frac{9}{16} \\)', '\\( \\frac{1}{7}ln\\frac{9}{16} \\)', 'D', 2, 5, NULL, 1, 1),
(54, 'Biết F(x) là nguyên hàm của hàm số \\( \\frac{1}{x-1} à F(2)=1\\).Khi đó \\(F(3)\\) bằng bao nhiêu ', 'ln2+1', '\\( \\frac{1}{2} \\)', '\\( ln\\frac{3}{2} \\)', 'ln2', 'A', 2, 5, NULL, 1, 1),
(55, '\\( \\int \\frac{dx}{(1+x^{2})x}= \\)', '\\( ln|x|(x^{2}+1)+C \\)', '\\( ln|x|(\\sqrt{1+x^{2}})+C \\)', '\\( ln\\frac{|x|}{\\sqrt{1+x^{2}}}+C \\)', '\\( ln\\frac{x}{1+x^{2}}+C \\)', 'C', 2, 5, NULL, 1, 1),
(56, 'Cho parabol \\( (P):y=x^{2}+1\\) và đường thẳng \\((d):y=mx+2\\).Tìm m để diện tích hình phẳng giới hạn bởi (P) và (d) đạt giá trị nhỏ nhất? ', '\\( \\frac{1}{2} \\)', '\\( \\frac{3}{4} \\)', '1', '0', 'D', 2, 5, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`) VALUES
(1, 'Toán', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idSubject` int(10) UNSIGNED NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`id`, `name`, `idSubject`, `status`) VALUES
(1, 'Đại Số', 1, 1),
(2, 'Giải tích', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DoB` date NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `time` datetime DEFAULT NULL,
  `count_true` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `mark` float DEFAULT NULL,
  `idExam` int(10) UNSIGNED NOT NULL,
  `code` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `DoB`, `password`, `password1`, `status`, `time`, `count_true`, `total`, `mark`, `idExam`, `code`, `remember_token`) VALUES
(54, 'Nguyễn Tùng Dương', '20160852', 'duongyt1998@gmail.com', '1998-10-04', '$2y$10$thDZdU9DIpwDYrue4pJ5Veb5l8BpXRK9l6o7N8Z7Nf/XxBJp6FjBm', 'CbrPvJPK8k', '0', NULL, NULL, NULL, NULL, 1, 1, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `examquestion`
--
ALTER TABLE `examquestion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idExam` (`idExam`,`code`,`idQuestion`),
  ADD KEY `idQuestion` (`idQuestion`);

--
-- Chỉ mục cho bảng `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`,`code`),
  ADD KEY `idTopic` (`idTopic`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTopic` (`idTopic`),
  ADD KEY `questions_ibfk_2` (`idadmin`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `idSubject` (`idSubject`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `idExam` (`idExam`,`code`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `examquestion`
--
ALTER TABLE `examquestion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2053;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `examquestion`
--
ALTER TABLE `examquestion`
  ADD CONSTRAINT `examquestion_ibfk_2` FOREIGN KEY (`idQuestion`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `examquestion_ibfk_3` FOREIGN KEY (`idExam`,`code`) REFERENCES `exams` (`id`, `code`);

--
-- Các ràng buộc cho bảng `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`idTopic`) REFERENCES `topics` (`id`);

--
-- Các ràng buộc cho bảng `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`idTopic`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`idadmin`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`idSubject`) REFERENCES `subjects` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idExam`,`code`) REFERENCES `exams` (`id`, `code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
