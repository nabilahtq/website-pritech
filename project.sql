-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 06:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `tutor_id` int(10) NOT NULL,
  `ahli_id` int(10) NOT NULL,
  `harga_asli` float DEFAULT NULL,
  `harga_diskon` float DEFAULT NULL,
  `judul` varchar(521) DEFAULT NULL,
  `course_code` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_end` date DEFAULT current_timestamp(),
  `slot` int(100) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL,
  `software` varchar(50) NOT NULL,
  `deskripsi_co` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `tutor_id`, `ahli_id`, `harga_asli`, `harga_diskon`, `judul`, `course_code`, `tanggal`, `tanggal_end`, `slot`, `gambar`, `software`, `deskripsi_co`) VALUES
(1, 1, 1, 250000, 120000, 'Belajar Web Design dari Awal Sampai Hosting', 'c1001', '2021-06-20', '2021-07-01', 50, '318.jpg', 'sublime', 'Pada Training Desain Website ini kamu akan mempelajari tentang bagaiman membuat webste dengan baik dan benar. Kamu juga akan belajar sampai hosting. Tentunya dengan software Sublime.'),
(5, 4, 2, 200000, 150000, 'Belajar UI Design dengan Figma', 'c1002', '2021-06-21', '2021-07-10', 50, '662-6.jpg', 'figma', 'Pada Training UI Design ini kamu akan mempelajari tentang bagaimana membuat merancang desain aplikasi perangkat lunak. Kamu juga akan belajar cara membuat vektor. Tentunya dengan software Figma.'),
(6, 7, 3, 400000, 320000, 'Basic Phyton Untuk Data Scientist', '', '2021-06-28', '2021-07-10', 50, '304.jpg', 'Phyton', 'Pada training kali ini, kita akan membahas bagaimana penggunaan Phyton untuk pengolahan data, dan menganalisis data sebagai seorang Data Scienntist. Matri yang dibahas dibagi menjadi 4 bagian. Akan disertai satu proyek pembuatan pemograman untuk kepentingan perusahaan.');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_murid`
--

CREATE TABLE `daftar_murid` (
  `id_murid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `nama_tutor` varchar(100) NOT NULL,
  `tutor_id` int(50) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `tanggal_end` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `metodepay` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_murid`
--

INSERT INTO `daftar_murid` (`id_murid`, `name`, `contact`, `email`, `judul`, `course_id`, `nama_tutor`, `tutor_id`, `tanggal`, `tanggal_end`, `harga`, `metodepay`) VALUES
(1001, 'Atiqotun Nabilah', '0895396337362', 'nabilaatiqoo@gmail.com', 'Belajar UI Design dengan Figma', 5, 'Nawaf Tri Hamdani', 4, '2021-06-21', '2021-07-10', '150000', 'ovo'),
(1002, 'Anta Hafiz', '085815187225', 'anta@gmail.com', 'Belajar UI Design dengan Figma', 5, 'Nawaf Tri Hamdani', 4, '2021-06-21', '2021-07-10', '150000', 'link'),
(1004, 'Siska Kohl', '081234567890', 'siska@gmail.com', 'Belajar Web Design dari Awal Sampai Hosting', 1, 'Miftakhul Surur', 1, '2021-06-20', '2021-07-01', '150000', 'netbanking'),
(1005, 'Jalilatul Muna Alawiyah', '085678123456', 'jalilatul@gmail.com', 'Belajar UI Design dengan Figma', 5, 'Nawaf Tri Hamdani', 4, '2021-06-21', '2021-07-10', '150000', 'netbanking'),
(1010, 'jennie madam', '087654123768', 'jennie@gmail.com', 'Belajar UI Design dengan Figma', 5, 'Nawaf Tri Hamdani', 4, '2021-06-21', '2021-07-10', '150000', 'ovo'),
(1011, 'Jalilatul Muna Alawiyah', '085714235671', 'jalilatul@gmail.com', 'Basic Phyton Untuk Data Scientist', 6, 'Bagus Irawan Saputra', 7, '2021-06-28', '2021-07-10', '320000', 'link'),
(1012, 'luna maya', '081234567098', 'luna@gmail.com', 'Basic Phyton Untuk Data Scientist', 6, 'Bagus Irawan Saputra', 7, '2021-06-28', '2021-07-10', '320000', 'netbanking'),
(1013, 'Roeline H Clemens', '081234567890', 'roeline@gmail.com', 'Belajar UI Design dengan Figma', 5, 'Nawaf Tri Hamdani', 4, '2021-06-21', '2021-07-10', '150000', 'link'),
(1014, 'Marcia N Dougherty', '0895396337362', 'marcia@gmail.com', 'Basic Phyton Untuk Data Scientist', 6, 'Bagus Irawan Saputra', 7, '2021-06-28', '2021-07-10', '320000', 'link'),
(1015, 'Fitrotul Fikroh', '081234567098', 'fifit@gmail.com', 'Basic Phyton Untuk Data Scientist', 6, 'Bagus Irawan Saputra', 7, '2021-06-28', '2021-07-10', '320000', 'link'),
(1016, 'Roeline H Clemens', '020392494y', 'nabilaatiqo@gmail.com', 'Basic Phyton Untuk Data Scientist', 6, 'Bagus Irawan Saputra', 7, '2021-06-28', '2021-07-10', '320000', 'netbanking');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_ahli`
--

CREATE TABLE `kategori_ahli` (
  `ahli_id` int(10) NOT NULL,
  `ahli` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_ahli`
--

INSERT INTO `kategori_ahli` (`ahli_id`, `ahli`) VALUES
(1, 'Web-design'),
(2, 'App-design'),
(3, 'IT-development');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `tutor_id` int(10) NOT NULL,
  `ahli_id` int(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `star` double NOT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi` varchar(521) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutor_id`, `ahli_id`, `nama`, `pekerjaan`, `star`, `foto`, `deskripsi`) VALUES
(1, 1, 'Miftakhul Surur', 'Project Design Engineer', 4.3, '84surur.png', 'a project design engineer may plan and oversee an interstate highway intersection, a skyscraper, an environmental treatment plant or thousands of other devices or building projects.'),
(2, 1, 'Syafiiqul Aziz P', 'Web Design Developer', 4.5, '8azis.png', ' A web designer/developer is responsible for the design, layout and coding of a website. They are involved with the technical and graphical aspects of a website; how the site works and how it looks.'),
(3, 1, 'Gregorius Giga Abdipatria', 'UI/UX Design | Web', 4, '53giga.png', ' UX-UI Designers are generally responsible for collecting, researching, investigating and evaluating user requirements. Their responsibility is to deliver an outstanding user experience providing an exceptional and intuitive application design.'),
(4, 2, 'Nawaf Tri Hamdani', 'Software Engineer', 4.5, '1nawaf.png', ' UX-UI Designers are generally responsible for collecting, researching, investigating and evaluating user requirements. Their responsibility is to deliver an outstanding user experience providing an exceptional and intuitive application design.'),
(5, 2, 'Ghifary Hanif Mustofa', 'IT Engineer Lecturer', 4.2, '95ghifari.png', ' Have experience to manage software projects, reduce the risk of software errors, and Ability to create software'),
(6, 2, 'Muhammad Khoirul Abdulloh', 'UI/UX Design(Mobile App)', 4.2, '90khoirul.png', ' UX-UI Designers are generally responsible for collecting, researching, investigating and evaluating user requirements. Their responsibility is to deliver an outstanding user experience providing an exceptional and intuitive application design.'),
(7, 3, 'Bagus Irawan Saputra', 'IT Developer', 4.3, '97bagus.png', 'I Have experience to do research, design, implement to test software and systems.'),
(8, 3, 'Melki Mario Gulo', 'Full Stack Smart IOT Engineer', 4.3, '67gulo.png', ' I Have experience to design and create applications or sites in the IoT field');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`) VALUES
(1, 'nabilaa', 'admin@gmail.com', 'Admin1234', 'admin'),
(2, 'jaehyun', 'jaehyun@gmail.com', 'jaehyun12', 'admin'),
(3, 'admindua', 'admin2@gmail.com', 'Admin2345', 'admin'),
(4, 'nasya', 'nasya@gmail.com', 'Annastasya123', 'admin'),
(6, 'rayhansyah', 'rayhan@gmail.com', 'Rayhansyah16', 'user'),
(12, 'jalilatull', 'jalilatul@gmail.com', 'Jalilatul18', 'user'),
(13, 'rafsanjari', 'rafsanjari@gmail.com', 'Rafsanjari13', 'user'),
(14, 'nissar', 'nissar@gmail.com', 'Nissar12345ty', 'user'),
(17, 'anta', 'anta@gmail.com', 'Anta1234', 'user'),
(18, 'luna', 'luna@gmail.com', 'Luna1234', 'user'),
(19, 'sinta', 'sinta@gmail.com', 'Sinta1234', 'user'),
(20, 'cindy', 'cindy@gmail.com', 'Cindy1234', 'user'),
(21, 'marsha', 'marsha@gmail.com', 'Marsha123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_ibfk_1` (`tutor_id`),
  ADD KEY `course_ibfk_2` (`ahli_id`);

--
-- Indexes for table `daftar_murid`
--
ALTER TABLE `daftar_murid`
  ADD PRIMARY KEY (`id_murid`),
  ADD KEY `daftar_murid_ibfk_1` (`course_id`),
  ADD KEY `daftar_murid_ibfk_2` (`tutor_id`);

--
-- Indexes for table `kategori_ahli`
--
ALTER TABLE `kategori_ahli`
  ADD PRIMARY KEY (`ahli_id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutor_id`),
  ADD KEY `tutors_ibfk_1` (`ahli_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `daftar_murid`
--
ALTER TABLE `daftar_murid`
  MODIFY `id_murid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

--
-- AUTO_INCREMENT for table `kategori_ahli`
--
ALTER TABLE `kategori_ahli`
  MODIFY `ahli_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`tutor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`ahli_id`) REFERENCES `kategori_ahli` (`ahli_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daftar_murid`
--
ALTER TABLE `daftar_murid`
  ADD CONSTRAINT `daftar_murid_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_murid_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`tutor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `tutors_ibfk_1` FOREIGN KEY (`ahli_id`) REFERENCES `kategori_ahli` (`ahli_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
