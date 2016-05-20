-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2016 at 09:06 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(456) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`) VALUES
(1, 'b@b.com', '$2y$10$lvx1SXKPvPB0BaBybX051OZpV//lRQ7Noq3dcffp22/rCUUSrofrq'),
(7, 't@t', '$2y$10$AJLwfaKkhJKgPZ57o03mn.40SJXCWdev/VTf/7kUuzyh9Oz1Qzn.O'),
(8, 'ihatetools@gmail.com', '$2y$10$0UMQjzso5IpeIlFo4n5h1.HRIFo5N4uxosH7tdPJkECLHMEWao00y'),
(9, 'z@z', '$2y$10$VBpUv9uOeSjC6PnQMjFHXOUTe20xcukm6ve4INdoPVzAB/84We7EG'),
(10, 'xww.jason@gmail.com', '$2y$10$6G4aq6H12V7F1VhMPGBo2ehwtL3SCjBhrwQryZIMkq1J8N/Q6AOJe'),
(11, 'test@test.com', '$2y$10$aGKQzxU7CYAfTBGjuUcVTuSiRnWjc6kGpa/EqTiBo.kFcwSmBDQC6'),
(12, 'test@test', '$2y$10$1wo31d4O6GGpihlJe.nB4OpwgPUEbGhnNK7EA0fM7uwOh30XhqtLe');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'harry', 'test@test', 'hihihihi\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `storeName` varchar(100) NOT NULL,
  `storeAddress` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `googleMap` varchar(2500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `storeName`, `storeAddress`, `price`, `googleMap`) VALUES
(1, 'pine wood', 'Home Depot', 'somewhere', '8.99', '<script src=''https://maps.googleapis.com/maps/api/js?v=3.exp''></script><div style=''overflow:hidden;height:440px;width:700px;''><div id=''gmap_canvas'' style=''height:440px;width:700px;''></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.proxysitereviews.com/squid-proxies">squid proxies</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type=''text/javascript''>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(49.2688309,-123.08354509999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById(''gmap_canvas''), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(49.2688309,-123.08354509999998)});infowindow = new google.maps.InfoWindow({content:''<strong>Homedepot</strong><br>900 Terminal Ave, Vancouver, BC V6A 4G4<br>''});google.maps.event.addListener(marker, ''click'', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, ''load'', init_map);</script>'),
(2, 'cedar wood', 'Home Depot', 'Homedepot\n900 Terminal Ave, <br/> Vancouver, BC V6A 4G4\n', '8.99', '<script src=''https://maps.googleapis.com/maps/api/js?v=3.exp''></script><div style=''overflow:hidden; height:300px;width:100%;''>\n        <div id=''gmap_canvas'' style=''height:300px;width:100%;''></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.proxysitereviews.com/squid-proxies">squid proxies</a></small></div><style>#gmap_canvas img{max-width:100%!important;background:none!important}</style></div><script type=''text/javascript''>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(49.2688309,-123.08354509999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById(''gmap_canvas''), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(49.2688309,-123.08354509999998)});infowindow = new google.maps.InfoWindow({content:''<strong>Homedepot</strong><br>900 Terminal Ave, Vancouver, BC V6A 4G4<br>''});google.maps.event.addListener(marker, ''click'', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, ''load'', init_map);</script>'),
(3, 'oak wood', 'BCIT', 'somewhere', '8.99', '<script src=''https://maps.googleapis.com/maps/api/js?v=3.exp''></script><div style=''overflow:hidden;height:440px;width:700px;''><div id=''gmap_canvas'' style=''height:440px;width:700px;''></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.proxysitereviews.com/squid-proxies">squid proxies</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type=''text/javascript''>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(49.2509735,-123.00279929999999),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById(''gmap_canvas''), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(49.2509735,-123.00279929999999)});infowindow = new google.maps.InfoWindow({content:''<strong>BCIT</strong><br>3700 Willingdon Ave, Burnaby, BC V5G 3H2<br>''});google.maps.event.addListener(marker, ''click'', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, ''load'', init_map);</script>'),
(4, 'Maple wood', 'Home Depot', 'somewhere', '7.99', '<script src=''https://maps.googleapis.com/maps/api/js?v=3.exp''></script><div style=''overflow:hidden;height:440px;width:700px;''><div id=''gmap_canvas'' style=''height:440px;width:700px;''></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.proxysitereviews.com/squid-proxies">squid proxies</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type=''text/javascript''>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(49.2688309,-123.08354509999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById(''gmap_canvas''), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(49.2688309,-123.08354509999998)});infowindow = new google.maps.InfoWindow({content:''<strong>Homedepot</strong><br>900 Terminal Ave, Vancouver, BC V6A 4G4<br>''});google.maps.event.addListener(marker, ''click'', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, ''load'', init_map);</script>'),
(5, 'Maple wood', 'BCIT', 'somewhere', '70.99', '<script src=''https://maps.googleapis.com/maps/api/js?v=3.exp''></script><div style=''overflow:hidden;height:440px;width:700px;''><div id=''gmap_canvas'' style=''height:440px;width:700px;''></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.proxysitereviews.com/squid-proxies">squid proxies</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type=''text/javascript''>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(49.2509735,-123.00279929999999),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById(''gmap_canvas''), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(49.2509735,-123.00279929999999)});infowindow = new google.maps.InfoWindow({content:''<strong>BCIT</strong><br>3700 Willingdon Ave, Burnaby, BC V5G 3H2<br>''});google.maps.event.addListener(marker, ''click'', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, ''load'', init_map);</script>'),
(6, 'Cherry wood', 'Home Depot', 'somewhere', '9.99', '<script src=''https://maps.googleapis.com/maps/api/js?v=3.exp''></script><div style=''overflow:hidden;height:440px;width:700px;''><div id=''gmap_canvas'' style=''height:440px;width:700px;''></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.proxysitereviews.com/squid-proxies">squid proxies</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type=''text/javascript''>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(49.2688309,-123.08354509999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById(''gmap_canvas''), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(49.2688309,-123.08354509999998)});infowindow = new google.maps.InfoWindow({content:''<strong>Homedepot</strong><br>900 Terminal Ave, Vancouver, BC V6A 4G4<br>''});google.maps.event.addListener(marker, ''click'', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, ''load'', init_map);</script>'),
(7, 'Cherry wood', 'BCIT', 'somewhere', '90.99', '<script src=''https://maps.googleapis.com/maps/api/js?v=3.exp''></script><div style=''overflow:hidden;height:440px;width:700px;''><div id=''gmap_canvas'' style=''height:440px;width:700px;''></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.proxysitereviews.com/squid-proxies">squid proxies</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type=''text/javascript''>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(49.2509735,-123.00279929999999),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById(''gmap_canvas''), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(49.2509735,-123.00279929999999)});infowindow = new google.maps.InfoWindow({content:''<strong>BCIT</strong><br>3700 Willingdon Ave, Burnaby, BC V5G 3H2<br>''});google.maps.event.addListener(marker, ''click'', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, ''load'', init_map);</script>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `user_name`, `first_name`, `last_name`, `password`, `type`) VALUES
(1, 'aaa', 'arron', 'ferguson', '123', 'admin'),
(2, 'jjj', 'jim', 'parry', '123', 'admin'),
(3, 'jaa', 'jason', 'harrison', '123', 'admin'),
(7, 'zgp', 'harry yeonghun', 'ki', NULL, 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
