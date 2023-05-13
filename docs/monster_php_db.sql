-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Apr 29, 2023 at 01:00 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monster_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int NOT NULL,
  `application_date` date NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int NOT NULL,
  `date_created` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `date_created`, `title`, `content`) VALUES
(1, '2023-04-02', 'Chef de cuisine', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos officiis eius, sunt quos distinctio fugiat dolorum sed quia, iusto, aperiam numquam. Cum eveniet vel eaque, placeat cupiditate id beatae dolores.'),
(2, '2023-02-07', 'Agent d\'entretien', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus rerum veniam vero iste deleniti labore minima natus quae tempora enim? Nobis amet blanditiis aperiam, at nihil quos fugiat nemo hic!</p>\r\n<p>Commodi autem voluptatum veniam, at distinctio eveniet repellendus quibusdam adipisci id sunt laborum sint iure sit illo tenetur libero vero ducimus vel dolore. Repudiandae laborum culpa itaque animi, quibusdam architecto.</p>\r\n<p>Expedita nesciunt suscipit, maiores ipsa magnam non animi esse accusantium ab sit? Neque nostrum, quod, molestiae officiis quisquam et voluptatem velit nihil quidem, non error blanditiis cum ipsam accusantium voluptatibus.</p>\r\n<p>Cum illo dignissimos, voluptates quisquam delectus magni labore. Dolorem quibusdam voluptate et cupiditate nobis esse? Veniam ut, corporis at, temporibus possimus repellendus qui blanditiis minima corrupti, nisi vero perspiciatis voluptas!</p>'),
(3, '2023-01-22', 'Traducteur', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In distinctio cupiditate molestias earum nulla sequi mollitia dicta dolorem commodi ipsum aliquid impedit doloribus dignissimos dolore iusto, quibusdam veritatis voluptas ipsa.</p>\r\n<p>Enim corporis libero vero deserunt inventore ipsum porro ea incidunt distinctio, quos architecto dolores hic pariatur! Illo maiores consequatur quam expedita doloribus soluta ratione natus explicabo, eos nemo, ad velit?</p>\r\n<p>Tempore dignissimos explicabo earum minima? Repudiandae ratione rerum esse pariatur rem consectetur, aliquid illum quae. Necessitatibus maxime soluta quasi eos error vel sequi nihil! Cumque, unde! Nobis, ad aliquid? Ipsum.</p>'),
(4, '2023-03-27', 'Astronaute', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In distinctio cupiditate molestias earum nulla sequi mollitia dicta dolorem commodi ipsum aliquid impedit doloribus dignissimos dolore iusto, quibusdam veritatis voluptas ipsa.</p>\r\n<p>Enim corporis libero vero deserunt inventore ipsum porro ea incidunt distinctio, quos architecto dolores hic pariatur! Illo maiores consequatur quam expedita doloribus soluta ratione natus explicabo, eos nemo, ad velit?</p>\r\n<p>Tempore dignissimos explicabo earum minima? Repudiandae ratione rerum esse pariatur rem consectetur, aliquid illum quae. Necessitatibus maxime soluta quasi eos error vel sequi nihil! Cumque, unde! Nobis, ad aliquid? Ipsum.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_offer` (`offer_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `fk_offer` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
