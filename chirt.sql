-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2013 at 05:08 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chirt`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(25) NOT NULL,
  `text` varchar(125) NOT NULL,
  PRIMARY KEY (`id`,`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `text`) VALUES
(1, 'Gift', 'Blow their mind with an original present'),
(2, 'Graphic & Designer', 'The world''s greatest creative talents'),
(3, 'Video & Animation', 'No need to fly all the way to Hollywood'),
(4, 'Online Marketing', 'Upgrade your business to the 21st century'),
(5, 'Writing & Translation', 'When words don''t come easy...'),
(6, 'Advertising', 'Mad Men come here to steal ideas'),
(7, 'Business', 'Your path to the Fortune 500'),
(8, 'Programming & Tech', 'Get the next Zuckerberg to work for you'),
(9, 'Music & Audio', 'Your private The Voice'),
(10, 'Fun & Bizarre', 'You''d never dare to... but they will'),
(11, 'Lifestyle', 'No need to hug trees! Upgrade your routine');

-- --------------------------------------------------------

--
-- Table structure for table `jozharanda`
--

CREATE TABLE IF NOT EXISTS `jozharanda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL,
  `category` varchar(25) NOT NULL,
  `subcategory` varchar(45) NOT NULL,
  `photo` longblob NOT NULL,
  `time` varchar(10) NOT NULL,
  `description` longtext NOT NULL,
  `instruction` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jozharanda`
--

INSERT INTO `jozharanda` (`id`, `title`, `category`, `subcategory`, `photo`, `time`, `description`, `instruction`, `date`) VALUES
(1, 'Desarrollo web', 'Programming & Tech', 'CMS', 0x434d53362e706e67, '14', 'CMS es un sistema de gestión de contenido que sirve para llevar la gestión de un sitio web y poder manipular el contenido que en el se encuentre.', '1. Se realizara en Wordpress\r\n2. Una plantilla Landing-One\r\n3. Se entregara el código fuente\r\n4. El pago debe ser en paypal.', '2013-11-04 05:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_category` varchar(25) NOT NULL,
  `subcategory` varchar(25) NOT NULL,
  PRIMARY KEY (`id`,`subcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `id_category`, `subcategory`) VALUES
(1, 'Gift', 'Greeting Cards'),
(2, 'Gift', 'Video Greeting'),
(3, 'Gift', 'Unusual Gifts'),
(4, 'Gift', 'Arts & Crafts'),
(5, 'Gift', 'Handmade Jewerly'),
(6, 'Gift', 'Postcards'),
(7, 'Graphics & Designer', 'Cartoons & Caricature'),
(8, 'Graphics & Designer', 'Logo Design'),
(9, 'Graphics & Designer', 'Ebook'),
(10, 'Graphics & Designer', 'Web Design & UI'),
(11, 'Graphics & Designer', 'Photography & Photoshop'),
(12, 'Graphics & Designer', 'Flyers'),
(13, 'Graphics & Designer', 'Bussiness Card'),
(14, 'Graphics & Designer', 'Architecture'),
(15, 'Graphics & Designer', 'Presentation Design'),
(16, 'Video & Animation', 'Commercials'),
(17, 'Video & Animation', 'Editing & Post Production'),
(18, 'Video & Animation', 'Testimonials'),
(19, 'Video & Animation', 'Stop Motion'),
(20, 'Video & Animation', 'Intros'),
(21, 'Online Marketing', 'Web Analytics'),
(22, 'Online Marketing', 'Blog'),
(23, 'Online Marketing', 'Domain Research'),
(24, 'Online Marketing', 'Fan Page'),
(25, 'Online Marketing', 'Keyword Research'),
(26, 'Online Marketing', 'SEO'),
(27, 'Online Marketing', 'Social Marketing'),
(28, 'Online Marketing', 'Get Traffic'),
(29, 'Writing & Translation', 'Copywriting'),
(30, 'Writing & Translation', 'Creative Writing'),
(31, 'Writing & Translation', 'Translation'),
(32, 'Writing & Translation', 'Transcripts'),
(33, 'Writing & Translation', 'Website Content'),
(34, 'Writing & Translation', 'Resumes & Cover Letter'),
(35, 'Writing & Translation', 'Speech Writing'),
(36, 'Writing & Translation', 'Press Release'),
(37, 'Advertising', 'Hold Your Sign'),
(38, 'Advertising', 'Flyers'),
(39, 'Advertising', 'Pet Models'),
(40, 'Advertising', 'Outdoor Advertising'),
(41, 'Advertising', 'Radio'),
(42, 'Advertising', 'Music Production'),
(43, 'Advertising', 'Banner Advertising'),
(45, 'Business', 'Bussiness Plan'),
(46, 'Business', 'Career Advice'),
(47, 'Business', 'Market Research'),
(48, 'Business', 'Presentations'),
(49, 'Business', 'Virtual Assistant'),
(50, 'Business', 'Business Tips'),
(51, 'Business', 'Branding Services'),
(52, 'Business', 'Financial Consulting'),
(53, 'Business', 'Legal Consulting'),
(54, 'Programming & Tech', '.NET'),
(55, 'Programming & Tech', 'Open Sources'),
(56, 'Programming & Tech', 'CSS & HTML'),
(57, 'Programming & Tech', 'CMS'),
(58, 'Programming & Tech', 'Database'),
(59, 'Programming & Tech', 'Java'),
(61, 'Programming & Tech', 'iOS, Android & Mobile'),
(62, 'Programming & Tech', 'Back-End'),
(63, 'Programming & Tech', 'QA& software Testing'),
(64, 'Music & Audio', 'Audio Editing & Mastering'),
(65, 'Music & Audio', 'Jingles'),
(66, 'Music & Audio', 'Songwriting'),
(67, 'Music & Audio', 'Music Lessons'),
(68, 'Music & Audio', 'Narration & Voice-Over'),
(69, 'Music & Audio', 'Sound Effect & Loops'),
(70, 'Music & Audio', 'Custom Ringtones'),
(71, 'Music & Audio', 'Voicemail Greeting'),
(72, 'Music & Audio', 'Custom Song'),
(73, 'Fun & Bizarre', 'Your Message On...'),
(74, 'Fun & Bizarre', 'Celebrity Impersonators'),
(75, 'Fun & Bizarre', 'Pranks'),
(76, 'Fun & Bizarre', 'Dancers'),
(77, 'Fun & Bizarre', 'Just for Fun'),
(78, 'Lifestyle', 'Animal Care & Pets'),
(79, 'Lifestyle', 'Relationship Advice'),
(80, 'Lifestyle', 'Diet & Weihg Loss'),
(81, 'Lifestyle', 'Health & Fitness'),
(82, 'Lifestyle', 'Makeup, Styling & Beauty'),
(83, 'Lifestyle', 'Online Private Lessons'),
(84, 'Lifestyle', 'Astrology & Fortune'),
(85, 'Lifestyle', 'Cooking Recipes'),
(86, 'Lifestyle', 'Pareting Tips'),
(87, '', ''),
(87, 'Lifestyle', 'Travel'),
(88, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `firstname` varchar(55) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `scholar` varchar(55) DEFAULT NULL,
  `photo` longblob,
  `date` datetime NOT NULL,
  `token` varchar(55) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `name`, `firstname`, `bio`, `gender`, `scholar`, `photo`, `date`, `token`, `state`) VALUES
(1, 'JozhAranda', 'aranda.moreno.joshua@gmail.com', 'Joshua', 'Aranda', 'Engineering - Web Development - Geek - GDG Tijuana - Blogger - Speaker IT - Volunteer - Bella - What''s next? - The End?', 'male', 'bachelor', 0x313337343839305f3537373433333233323239313832355f3636303337373733395f6e2e6a7067, '2013-10-12 23:15:43', NULL, 'Baja California'),
(2, 'Jozh123', 'legendstreet_619@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2013-10-13 06:30:32', NULL, NULL),
(4, 'joshua1', 'legend@ga.com', NULL, NULL, NULL, NULL, NULL, NULL, '2013-10-16 03:11:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_pwd`
--

CREATE TABLE IF NOT EXISTS `user_pwd` (
  `username` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `token` longtext NOT NULL,
  PRIMARY KEY (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pwd`
--

INSERT INTO `user_pwd` (`username`, `email`, `password`, `token`) VALUES
('joshua', 'legend@ga.com', 'lzKRN2K9D96aL5dIbstLvqQ/llhN1vTc5UuNhENwXAQ=', 'KCeFSOD12qovTHxNumPfwhnbl3ajXprEUtGd'),
('Jozh123', 'legendstreet_619@hotmail.com', '4m94nw1xXtNMQfxlL6zL/yJ74txI83gjye7fXpwMnKg=', 'V9recMgZzTxDinRpCd38KAXWB7HqELYthyaJUosFOm1w6G24'),
('JozhAranda', 'aranda.moreno.joshua@gmail.com', '4m94nw1xXtNMQfxlL6zL/yJ74txI83gjye7fXpwMnKg=', '4m94nw1xXtNMQfxlL6zL/yJ74txI83gjye7fXpwMnKg=5KPSpadHzYX1t');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
