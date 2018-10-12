-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 09:31 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tesrating`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$rYOhwisTW8g77a3KSVwdE.a8Pp7nChXly4DShZjxjPpHwCIVAYKVe');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `id_movie` varchar(11) NOT NULL,
  `negara` varchar(20) NOT NULL,
  `bahasa` varchar(20) NOT NULL,
  `runtime` varchar(50) NOT NULL,
  `budget` double NOT NULL,
  `keuntungan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `id_movie`, `negara`, `bahasa`, `runtime`, `budget`, `keuntungan`) VALUES
(1, '5', 'America', 'inggris', '105 menit', 1155308123593, 2263677187206),
(2, '2', 'jombang', 'jawa', '90 menit', 20000, 50000),
(3, '0103002', 'Amerika', 'Inggrish', '149 menit', 4888664802121, 29118593093535),
(4, '0203002', 'Amerika', 'English, Italian, Sp', '202 Menit', 169000000000, 744900000000),
(5, '0203003', 'Amerika', 'English, Italian, Sp', '175 Menit', 78000000000, 1755000000000),
(6, '0503001', 'Amerika', 'Inggrish', '119 menit', 2123697785778, 4601019295944),
(7, '0603001', 'Amerika', 'Inggrish', '118 menit', 200000000, 508566261),
(8, '0103003', 'Amerika', 'Inggrish', '85 menit', 0, 0),
(9, '0103004', 'Amerika', 'Inggrish', '128 menit', 170000000, 1068741974149),
(10, '0103005', 'Amerika', 'Inggrish,Spanyol', '122 menit', 0, 0),
(11, '0103006', 'Amerika', 'Inggrish', 'belum diketahui', 2337781500000, 6161517689288),
(12, '0103007', 'Amerika', 'Inggrish', 'belum diketahui', 1803843750000, 3739442628573),
(13, '0205002', 'Indonesia', 'Indonesia', 'belum diketahui', 0, 0),
(14, '0505001', 'Indonesia', 'Indonesia', 'belum diketahui', 0, 0),
(15, '0204001', 'asdasd', 'asd', '118 menit', 232323, 23232323),
(16, '0205003', 'Indonesia', 'Inggrish,Spanyol', '119 menit', 0, 0),
(17, '0204001', 'Indonesia', 'Inggrish', '119 menit', 10000000, 2000000),
(18, '0503002', 'Amerika', 'Inggrish', '103 menit', 0, 0),
(19, '0503003', 'Amerika', 'Inggrish', '97 menit', 0, 0),
(20, '0601001', 'Jepang', 'Jepang,Amerika', '119 menit', 345955200000, 3390131908828),
(21, '0601002', 'Jepang', 'Jepang,Amerika', '125 menit', 273881200000, 3962990259406),
(22, '0105002', 'Indonesia', 'Indonesia', '', 0, 0),
(23, '0505002', 'Indonesia', 'Indonesia', '', 0, 0),
(24, '0103008', 'Amerika', 'Inggrish', '', 893444800000, 768848288173),
(25, '0203004', 'Indonesia', 'Inggrish', '102 menit', 0, 0),
(26, '0303001', 'Amerika', 'Inggrish', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `id_komen` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komen` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komen`
--

INSERT INTO `komen` (`id_komen`, `id_news`, `id_user`, `komen`, `tanggal`) VALUES
(1, 1, 2, 'Bagus Article Nya', '2018-07-05'),
(2, 1, 14, 'bagus juga film nya sangat menambah wawasan saya dalam film avenger', '2018-07-08'),
(3, 1, 14, 'bagus juga film nya sangat menambah wawasan saya dalam film avenger', '2018-07-08'),
(4, 1, 14, 'bagus juga film nya sangat menambah wawasan saya dalam film avenger', '2018-07-08'),
(5, 8, 14, 'gak sabar menunggu gal gadot beraksi lagi di wonder woman', '2018-07-08'),
(6, 7, 14, 'gak sabar dengan avenger 4', '2018-07-08'),
(7, 6, 16, 'tidak sabar menunggu film bertema sihir lagi ', '2018-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id_movie` varchar(11) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `slug` varchar(80) NOT NULL,
  `sinopsis` text NOT NULL,
  `cover` varchar(200) NOT NULL,
  `director` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `background` varchar(200) NOT NULL,
  `trailer` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `diputar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id_movie`, `judul`, `slug`, `sinopsis`, `cover`, `director`, `penulis`, `genre`, `background`, `trailer`, `region`, `tanggal_rilis`, `diputar`) VALUES
('0103001', 'Rampage', 'Rampage', 'When three different animals become infected with a dangerous pathogen, a primatologist and a geneticist team up to stop them from destroying Chicago.', '1524202877-3580MV5BNDA1NjA3ODU3OV5BMl5BanBnXkFtZTgwOTg3MTIwNTM@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'Brad Peyton', ' Ryan Engle', 'action', '', '', 'amerika', '0000-00-00', 0),
('0103002', 'Avengers: Infinity War', 'Avengers:_Infinity_War', 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', '1525317522-6030MV5BMjMxNjY2MDU1OV5BMl5BanBnXkFtZTgwNzY1MTUwNTM@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'Anthony Russo', ' Christopher Markus', 'action', 'InfinityWarAvengers-1.jpg', '6ZfuNTqbHE8', 'amerika', '2018-04-27', 1),
('0103003', 'Action Point', 'Action_Point', 'A daredevil designs and operates his own theme park with his friends. ', '1527224323-5684MV5BMjEyMTU5MTk1N15BMl5BanBnXkFtZTgwMzIzMzczNTM@._V1_UX182_CR0,0,182,268_AL_.jpg', 'Tim Kirkby ', 'John Altschuler', 'action', 'action-point-johnny-knoxville.jpg', 'ri1Cc3Yz09U', 'amerika', '2018-06-01', 0),
('0103004', 'Jurassic World: Fallen Kingdom', 'Jurassic_World:_Fallen_Kingdom', 'When the island''s dormant volcano begins roaring to life, Owen and Claire mount a campaign to rescue the remaining dinosaurs from this extinction-level event.', '1527224620-8272MV5BMjhmZWFlZmEtNTBhMC00OGMwLWE2YTYtNjU5NDk1MTc5ZmQ2XkEyXkFqcGdeQXVyMjMxOTE0ODA@._V1_UX182_CR0,0,182,268_AL_.jpg', 'J.A. Bayona ', 'Colin Trevorrow', 'action', 'fallenkingdom1.jpg', '', 'amerika', '2018-06-22', 1),
('0103005', 'Sicario: Day of the Soldado', 'Sicario:_Day_of_the_Soldado', 'The drug war on the US-Mexico border has escalated as the cartels have begun trafficking terrorists across the US border. To fight the war, federal agent Matt Graver re-teams with the mercurial Alejandro.', '1527224733-5363MV5BMjgyOWRhMDctZTZlNC00M2I1LWI0NDQtYzlmODdmYjY2MThiXkEyXkFqcGdeQXVyMzY0MTE3NzU@._V1_UX182_CR0,0,182,268_AL_.jpg', ' Stefano Sollima ', ' Taylor Sheridan', 'action', '', '', 'amerika', '2018-06-20', 0),
('0103006', 'Ant-Man and the Wasp', 'Ant-Man_and_the_Wasp', 'As Scott Lang balances being both a Super Hero and a father, Hope van Dyne and Dr. Hank Pym present an urgent new mission that finds the Ant-Man fighting alongside The Wasp to uncover secrets from their past.', '1527248968-8646MV5BYjcyYTk0N2YtMzc4ZC00Y2E0LWFkNDgtNjE1MzZmMGE1YjY1XkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_UX182_CR0,0,182,268_AL_.jpg', 'Peyton Reed ', 'Chris McKenna', 'action', 'ant-man-and-wasp1.jpg', 'UUkn-enk2RU', 'amerika', '2018-07-06', 0),
('0103007', 'Skyscraper', 'Skyscraper', 'FBI Hostage Rescue Team leader and U.S. war veteran Will Sawyer, who now assesses security for skyscrapers. On assignment in Hong Kong he finds the tallest, safest building in the world', '1527249178-6371MV5BOGM3MzQwYzItNDA1Ny00MzIyLTg5Y2QtYTAwMzNmMDU2ZDgxXkEyXkFqcGdeQXVyMjMxOTE0ODA@._V1_UX182_CR0,0,182,268_AL_.jpg', 'Rawson Marshall Thurber', 'Rawson Marshall Thurber', 'action', '', 't9QePUT-Yt8', 'amerika', '2018-07-13', 0),
('0103008', 'The Equalizer 2', 'The_Equalizer_2', 'Robert McCall serves an unflinching justice for the exploited and oppressed, but how far will he go when that is someone he loves? ', 'equalixzer.jpg', 'Antoine Fuqua', ' Richard Wenk', 'action', 'the-equalizer-2-5794.jpg', 'HyNJ3UrGk_I', 'amerika', '2018-08-15', 0),
('0105001', 'Serigala terakhir', 'Serigala_terakhir', 'Jarot dan Ale adalah teman baik, tumbuh bersama sejak kecil. Keduanya memiliki banyak kesamaan, tapi tidak dengan karakter. Mereka membentuk geng Srigala Terakhir, dan bermimpi menjadi mafia terbesar.', '1524763268-1134MV5BNmNkOWQzOTItMGU2Yi00NzJiLWJkMTYtZDdlOGVjYjAzZGI2XkEyXkFqcGdeQXVyNDM5MjIyMzk@._V1_UX182_CR0,0,182,268_AL_.jpg', 'Upi Avianto ', 'Upi Avianto', 'action', 'gallery_serigala2.jpg', 'r82v5Wj5WcU', 'indonesia', '2009-11-05', 0),
('0105002', 'WIRO SABLENG', 'WIRO_SABLENG', 'Nusantara, abad ke-16, Wiro Sableng (Vino G Bastian), seorang pemuda, murid dari pendekar misterius bernama Sinto Gendeng (Ruth Marini), mendapat titah dari gurunya untuk meringkus Mahesa Birawa (Yayan Ruhian), mantan murid Sinto Gendeng yang berkhianat. Dalam perjalanannya mencari Mahesa Birawa, Wiro terlibat dalam suatu petualangan seru bersama dua sahabat barunya Anggini (Sherina Munaf) dan Bujang Gila Tapak Sakti (Fariz Alfarazi). Pada akhirnya Wiro bukan hanya menguak rencana keji Mahesa Birawa, tetapi juga menemukan esensi sejati seorang pendekar.', '153240687538537_300x430.jpg', 'Angga Dwimas Sasongko', 'Sheila Timothy', 'action', '2bd1a70dc00b02bd984d225dccc87b69.jpg', 'Z5T67lOcjoM', 'indonesia', '2018-08-30', 0),
('0203001', 'Overboard', 'Overboard', 'A spoiled, wealthy yacht owner is thrown overboard and becomes the target of revenge from his mistreated employee. A remake of the 1987 comedy', '1524716583-2825MV5BM2E5MWYwYTktMmIxZC00MWVkLTk4YjctNGU1OGVjMDIwNzM2XkEyXkFqcGdeQXVyNTAwODk1NzY@._V1_SY1000_CR0,0,704,1000_AL_.jpg', 'Bob Fisher', 'Leslie Dixon', 'drama', '', '', 'amerika', '2018-05-11', 0),
('0203002', 'The Godfather: Part II', 'The_Godfather:_Part_II', 'Kehidupan awal dan karier Vito Corleone di tahun 1920-an di New York City digambarkan, sementara putranya, Michael, memperluas dan mengencangkan cengkeramannya pada sindikat kejahatan keluarga.', '1527140224-8136MV5BMWMwMGQzZTItY2JlNC00OWZiLWIyMDctNDk2ZDQ2YjRjMWQ0XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UY268_CR3,0,182,268_AL_.jpg', 'Francis Ford Coppola', 'Mario Puzo', 'drama', 'the-godfather-part-ii-pacino1.gif.jpg', '9O1Iy9od7-A', 'amerika', '1974-12-20', 0),
('0203003', 'The Godfather', 'The_Godfather', 'Patriark penuaan dari dinasti kejahatan terorganisir mentransfer kontrol klandestin kekaisarannya ke putranya yang enggan ..', '1527140608-6264MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UY268_CR3,0,182,268_AL_.jpg', 'Francis Ford Coppola', 'Mario Puzo', 'drama', 'The-Godfather-Bonasera-Embraces-Don-Corleone.jpg', 'sY1S34973zA', 'amerika', '1972-03-24', 0),
('0203004', 'Searching', 'Searching', 'After David Kim (John Cho)''s 16-year-old daughter goes missing, a local investigation is opened and a detective is assigned to the case. But 37 hours later and without a single lead, David decides to search the one place no one has looked yet, where all secrets are kept today: his daughter''s laptop. In a hyper-modern thriller told via the technology devices we use every day to communicate, David must trace his daughter''s digital footprints before she disappears forever.', 'phon.jpg', 'Aneesh Chaganty', 'Aneesh Chaganty', 'drama', 'search_cropped.0.jpg', '3Ro9ebQxEOY', 'amerika', '2018-08-31', 0),
('0205001', 'Laskar Pelangi', 'Laskar_Pelangi', 'In the 1970s, a group of 10 students struggles with poverty and develop hopes for the future in Gantong Village on the farming and tin mining island of Belitung off the east coast of Sumatra.', '1524846263-5585MV5BMDc5ZTBkNjYtMzk0OS00MDQwLTgyMWUtMWU2YzhmNjJmNjIxXkEyXkFqcGdeQXVyNjQ4ODY4NzU@._V1_UY268_CR3,0,182,268_AL_.jpg', 'Riri Riza', 'Salman Aristo', 'drama', '', 'fFZVM8EDbKA', 'indonesia', '2008-09-28', 0),
('0205002', 'Lima', 'Lima', 'Fara, Aryo dan Adi baru saja kehilangan ibu mereka, Maryam. Tak cuma ketiga anaknya, Ijah –sang asisten rumah tangga- juga kehilangan Maryam. Bagaimana Maryam dimakamkan memicu perdebatan di antara ketiga anaknya. Maryam adalah seorang muslim, sementara dari ketiga anak, yang muslim juga cuma Fara. Namun akhirnya segala sesuatu terselesaikan dengan damai.', '1527249480-6319152465034367717_300x430.jpg', 'Shalahuddin Siregar', 'Sinar Ayu Massie', 'drama', '', 'jF6WtWRR7EM', 'indonesia', '2018-05-31', 0),
('0303001', 'A.X.L.', 'A.X.L.', 'A.X.L. is a top-secret, robotic dog created by the military to help protect tomorrow''s soldiers. Code named by the scientists who created him, A.X.L. stands for Attack, Exploration, Logistics, and embodies the most advanced, next-generation artificial intelligence. After an experiment gone wrong, A.X.L. is discovered hiding alone in the desert by a kind-hearted outsider named Miles (Alex Neustaedter), who finds a way to connect with him after activating his owner-pairing technology. Together, the two develop a special friendship based on trust, loyalty and compassion. Helping Miles gain the confidence he''s been lacking, A.X.L. will go to any length to protect his new companion, including facing off against the scientists who created him and who will do anything to get him back. Knowing what is at stake if A.X.L. is captured, Miles teams up with a smart, resourceful ally named Sara (Becky G) to protect his new best friend on a timeless, epic adventure for the whole family.', 'axl.jpg', 'Oliver Daly', 'Oliver Daly', 'scifi', 'movie-tickets.jpg', 'DqQmvsZp_CY', 'amerika', '2018-08-24', 0),
('0403001', 'A Quiet Place', 'A_Quiet_Place', 'A family is forced to live in silence while hiding from creatures that hunt by sound.', 'MV5BMjI0MDMzNTQ0M15BMl5BanBnXkFtZTgwMTM5NzM3NDM@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'John Krasinski', ' Bryan Woods', 'horror', '', '', 'amerika', '2018-04-06', 1),
('0503001', 'Deadpool 2', 'Deadpool_2', 'Misioner mutan bermulut kotor Wade Wilson (AKA. Deadpool), menyatukan sebuah tim sesama penyamun mutan untuk melindungi seorang bocah lelaki dengan kemampuan supranatural dari cyborg brutal, waktu bepergian, Cable', '1527141536-5179MV5BMjI3Njg3MzAxNF5BMl5BanBnXkFtZTgwNjI2OTY0NTM@._V1_UX182_CR0,0,182,268_AL_.jpg', 'David Leitch ', 'Rhett Reese', 'comedy', 'Deadpool-2.jpg', 'D86RtevtfrA', 'amerika', '2018-05-18', 1),
('0503002', 'Uncle Drew', 'Uncle_Drew', 'After draining his life savings to enter a team in the Rucker Classic street ball tournament in Harlem, Dax (Lil Rel Howery) is dealt a series of unfortunate setbacks, including losing his', 'MV5BMTU2MzE0NzQ1Ml5BMl5BanBnXkFtZTgwNzIyNzczNTM@._V1_UX182_CR0,0,182,268_AL_.jpg', 'Charles Stone III', 'Jay Longino', 'comedy', 'uncle_drew_gallery_1.jpg', '9H2SSvQ8ihA', 'amerika', '2018-06-29', 1),
('0503003', 'The First Purge', 'The_First_Purge', 'The film will be a prequel that will focus on the events that lead up to the very first Purge event. ', 'MV5BMTcwNTkyMzkyMV5BMl5BanBnXkFtZTgwMzAyMTMyNTM@._V1_UX182_CR0,0,182,268_AL_.jpg', ' Gerard McMurray ', ' James DeMonaco ', 'horror', 'The-First-Purge.jpg', 'UL29y0ah92w', 'amerika', '2018-07-04', 0),
('0505001', 'JAILANGKUNG 2', 'JAILANGKUNG_2', 'Sekali lagi, Bella (Amanda Rawles) ditemani Rama (Jefri Nichol) harus tunggang langgang melawan setan-setan yang hendak mencelakakan keluarganya.', '1527250590-2200152532012992438_300x430.jpg', 'Jose Poernomo', 'Ve Handojo', 'horror', '', 'nTRbdzWkW34', 'indonesia', '2018-06-15', 0),
('0505002', 'SEBELUM IBLIS MENJEMPUT', 'SEBELUM_IBLIS_MENJEMPUT', 'Film ini bercerita tentang seorang PEREMPUAN MUDA (20-an) dengan hidup yang kelam. IBUnya (50-an) meninggal dengan misterius, kemudian AYAHnya (60-an) meninggalkan Perempuan Muda dan menikah kembali dengan seorang IBU CANTIK (40-an) yang sudah memiliki dua orang ANAK (20-an) dengan umur sepantaran dengan Perempuan Muda.\r\n\r\nMemiliki hubungan yang renggang dengan Ayah, Perempuan Muda baru mengetahui bahwa Ayah yang tadinya sangat kaya telah jatuh bangkrut dan sekarat dengan penyakit misterius ketika menjenguknya di rumah sakit. ', '153147931186967_300x430.jpg', 'Timo Tjahjanto', 'Timo Tjahjanto', 'horror', 'feature-teaser-film-sebelum-iblis-menjemput-yang-penuh-teror-1300x500.jpg', 'WyOdg8psCxI', 'indonesia', '2018-08-09', 0),
('0601001', 'Howl''s Moving Castle', 'Howl''s_Moving_Castle', 'Ketika seorang wanita muda yang tidak percaya diri dikutuk dengan tubuh tua oleh penyihir jahat, satu-satunya kesempatan untuk memecahkan mantera itu adalah dengan seorang penyihir muda yang memanjakan diri sendiri dan tidak percaya diri dan teman-temannya di kastil berjalan kakinya.', 'howl.jpg', 'Hayao Miyazaki', 'Hayao Miyazaki', 'animation', 'dTcCcXJaOxmZ_YkrDNQXpXp1yBo.jpg', 'iwROgK94zcM', 'asia', '2005-07-17', 0),
('0601002', 'Spirited Away', 'Spirited_Away', 'Selama keluarganya pindah ke pinggiran kota, seorang gadis berusia 10 tahun yang muram berkelana ke dunia yang diperintah oleh dewa, penyihir, dan roh, dan di mana manusia berubah menjadi binatang buas.', 'spiritd.jpg', 'Hayao Miyazaki', 'Hayao Miyazaki', 'animation', 'static1.squarespace.com.jpg', 'ByXuk9QqQkk', 'asia', '2003-03-28', 0),
('0603001', 'Incredibles 2', 'Incredibles_2', 'Bob Parr (Mr. Incredible) ditinggalkan untuk merawat Jack-Jack sementara Helen (Elastigirl) keluar menyelamatkan dunia.', '1527142232-5007MV5BMTEzNzY0OTg0NTdeQTJeQWpwZ15BbWU4MDU3OTg3MjUz._V1_UX182_CR0,0,182,268_AL_.jpg', 'Brad Bird ', 'Brad Bird ', 'animation', '', 'i5qOzqD9Rms', 'amerika', '2018-06-15', 0),
('4', 'The Post', 'The_Post', 'A cover-up that spanned four U.S. Presidents pushed the country''s first female newspaper publisher and a hard-driving editor to join an unprecedented battle between the press and the government.', 'thepost.jpg', 'Steven Spielberg', ' Liz Hannah', 'drama', '', '', 'amerika', '0000-00-00', 0),
('5', 'The Greatest Showman', 'The_Greatest_Showman', 'Celebrates the birth of show business, and tells of a visionary who rose from nothing to create a spectacle that became a worldwide sensation. ', 'showman.jpg', 'Michael Gracey', 'Jenny Bicks', 'drama', 'GreatestShowman1.jpg', 'AXCTMGYUg9A', 'amerika', '2017-12-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `judul`, `slug`, `tanggal`, `isi`, `image`) VALUES
(1, 'Pecahkan Rekor, Baguskah Film Avengers: Infinity War?', 'Pecahkan_Rekor,_Baguskah_Film_Avengers:_Infinity_War?', '2018-05-03', 'Avengers: Infinity War mendapat pujian dari banyak pemerhati film, yang memandang film ini sebagai kulminasi dari Marvel Cinematic Universe (MCU) atau Jagat Sinematik Marvel. Pemerhati film di BBC Radio 1, Ali Plumb, menyanjung Infinity War sebagai "film Marvel paling besar dan berani". "Anda akan terguncang dan trailer-nya berbohong," ujarnya. Menurut Plumb, Infinity War dipenuhi banyak momen penting bagi para penggemar MCU. Karena itu Plumb menyarankan para penyuka film untuk segera menonton demi menghindari spoiler. Sejak film ini dirilis, Disney melancarkan kampanye #ThanosDemandsYourSilence dalam upaya mencegah hal tersebut.', 'InfinityWarAvengers-1.jpg'),
(2, 'Isabela Moner to Play Dora the Explorer for Paramount', 'Isabela_Moner_to_play_Dora_the_Explorer_for_Paramount', '2018-05-03', '<p>The Dora the Explorer movie will follow a teenage Dora accompanied by her best friend Boots the monkey and her cousin Diego — on (you guessed it) an adventure.</p>\r\n\r\n<p>James Bobin will direct from a screenplay by Nick Stoller, the writer-director behind films including The Muppets and Neighbors, and Danielle Sanchez-Witzel. The movie hails from Paramount''s new Paramount Players division.</p>\r\n\r\n"We are thrilled to have found our Dora in Isabela,” said Brian Robbins, president of Paramount Players. “Dora has long been a celebrated, strong heroine in animated television, and like Dora, Isabela has an incredible spirit and is an advocate for positive values. With our partners at Nickelodeon, we look forward to continuing Dora’s story for generations to come.”\r\n\r\nAdded Moner: “I’m honored and excited to bring Dora to life. I grew up watching the show, and for me, especially as a Latina, Dora was an amazing role model — she is a strong, adventurous and fun-loving girl. I can’t wait to put on the backpack and begin her next adventure!”\r\n\r\nDora the Explorer will shoot in Queensland, Australia, and is scheduled for release Aug. 2, 2019.', 'dorasplit.jpg'),
(3, 'Pemasukan Solo: A Star Wars Story Setelah Tayang Perdana Tidak Memuaskan', 'Pemasukan_Solo:_A_Star_Wars_Story_Setelah_Tayang_Perdana_Tidak_Memuaskan', '2018-05-25', 'Jika semua berjalan dengan lancar, Han Solo muda bersama kelompoknya yang terbuang bakal mengambil alih posisi Captain Jack Sparrow sekaligus mencetak rekor akhir pekan Memorial Day terbaru di box office.\r\n \r\nFilm spin-off keluaran Disney dan Lucasfilm ini tercatat mendapat pemasukan awal 130 juta dollar AS sampai 150 juta dollar AS sepanjang libur panjang akhir pekan lalu. \r\n\r\nCapaian angka 130 juta dollar AS di bawah ekspektasi awal. Hingga kini, rekor akhir pekan Memorial Day untuk perilisan secara domestik masih dipegang Pirates of the Caribbean: At World''s End pada 2007 lalu dengan pemasukan 139,8 juta dollar AS. \r\n\r\nSolo diputar serentak di sebagian besar titik di dunia, mulai dari AS hingga China, dan mencatat pemasukan 300 juta dollar AS plus.\r\n', '4008037940.jpg'),
(4, 'Ezra Miller Beri Isyarat Film The Flash Segera Digarap', 'Ezra_Miller_Beri_Isyarat_Film_The_Flash_Segera_Digarap', '2018-05-25', 'Aktor Ezra Miller belakangan ini dikabarkan akan kembali menjadi The Flash dalam film yang kisahnya diangkat dari cerita Flashpoint. Ezra bahkan disebut-sebut sudah bertemu secara intens dengan sutradara John Francis Daley dan Jonathan Goldstein guna membahas beberapa rencana ke depan terkait produksi film ini. "Saya sudah bertemu dengan mereka," ungkap Miller dalam Wizard World Philadelphia. "Mereka orang yang keren. Saya sangat menyukai hasil pekerjaan mereka. Saya pikir mereka yang terbaik," lanjutnya. Warner Bros sejauh ini telah mengumumkan sejumlah rencana mereka yang akan digarap bersama DC Films, salah satunya adalah film The Flash yang diprioritaskan. Setelah bernegosiasi selama seminggu dengan sutradara Vacation and Game Night, Daley dan Goldstein akhirnya dipastikan akan mengambil alih proyek film yang sebelumnya sempat mangkrak ketika ditangani Rick Famuyiwa dan Robert Zemeckis.\r\n', '775337164.jpg'),
(5, 'Lady Gaga dan Bradley Cooper Berduet untuk A Star is Born', '', '2018-06-10', 'Mereka menyanyikan lagu "The Shallow" yang merupakan salah lagu dalam film remake film A Star Is Born. Film itu juga merupakan debut Cooper sebagai sutradara film layar lebar. \r\n\r\nTrailer pertama untuk A Star Is Born itu menampilkan penyanyi country Jackson Maine (Cooper) sedang menyanyi di panggung. Di saat popularitasnya mulai memudar, Maine bertemu dengan Ally (Lady Gaga), seorang penyanyi yang belum berhasil meraih kesuksesan. "Aku tidak menyanyikan laguku sendiri. Aku merasa kurang nyaman... \r\n\r\nHampir setiap orang bilang suka suaraku, tetapi mereka tidak suka penampilanku," kata Ally. "Menurutku kamu cantik," kata Jackson yang mendekati Ally karena tertarik pada bakatnya. Salah satu adegan dalam trailer itu adalah Lady Gaga sebagai Ally naik ke panggung atas "paksaan" Jackson. Semua soundtrack dalam film itu dinyanyikan oleh Lady Gaga dan Bradley Cooper. \r\n\r\nNamun sejumlah musisi dilibatkan dalam pembuatannya. Salah satunya adalah Mark Ronson, yang juga menulis "The Shallow". Sebagai informasi, Ronson pernah menjadi produser eksekutif Joanne, album Lady Gaga yang dirilis pada 2016. Lagu-lagu lain ditulis oleh Lukas Nelson, Dave Cobb, dan Jason Isbell, bersama Gaga dan Cooper. Menurut Lady Gaga, semua lagu dalam film itu direkam secara live saat shooting adegan tersebut berlangsung. \r\n\r\nHal serupa dilakukan penata suara Steve Morrow dalam film La La Land. Karyanya di film keluaran 2017 itu menghasilkan Piala Oscar untuknya. Film orisinal A Star Is Born dirilis pada 1937. Karya duo sutradara William A Wellman dan Jack Conway itu menampilkan bintang Janet Gaynor dan Fredric March sebagai bintang utama. Pada 1954, film itu dibuatkan remake dengan bintang Judy Garland dan James Mason. Film itu disutradarai oleh George Cukor. Film ini menghasilkan enam nominasi Academy Awards pada 1955, termasuk untuk aktor dan aktris terbaik juga lagu dan musik terbaik. A Star Is Born didaur ulang sekali lagi pada 1976. \r\n\r\nKali ini bintang utamanya adalah Barbra Streisand dan Kris Kristofferson dengan sutradara Frank Pierson. Dari tiga nominasi yang didapat, film ini meraih satu Piala Oscar untuk lagu terbaik, yakni "Evergreen (Love Theme from A Star Is Born)" karya Barbra Streisand dan Paul William. Bradley Cooper didapuk untuk menyutradarai film A Star Is Born sejak tahun 2015. Sebelum Lady Gaga dipilih, banyak artis peran disebut-sebut bakal menjadi bintang utama, seperti Jennifer Lopez dan Beyonce, juga Clint Eastwood dan Tom Cruise.\r\n', '3074345545.jpg'),
(6, 'Penyihir Sadis di Film Harry Potter Dilirik Perankan Musuh Baru James Bond ', 'Penyihir_Sadis_di_Film_Harry_Potter_Dilirik_Perankan_Musuh_Baru_James_Bond', '2018-06-10', '"Banyak orang mengira Angelina Jolie akan mendapatkan peran itu, tetapi Bos lebih menginginkan Helena," kata seorang sumber kepada Mirror. "Saat ini mereka baru saja menyelesaikan daftar pemain," tambahnya. Menurut sumber itu, Bonham Carter dianggap pas untuk memerankan penjahat dalam film Bond 25 karena penampilannya yang meyakinkan. Bonham Carter tampil meyakinkan ketika berperan sebagai Bellatrix Lestrange, seorang penyihir sadis dalam film-film Harry Potter. Aktris berusia 52 tahun Ia juga telah memainkan karakter menyeramkan dalam film-film karya suaminya, Tim Burton, seperti film Dark Shadows (2012) dan Alice in Wonderland (2010). Bonham Carter disebut-sebut sebagai "penjahat" yang paling diinginkan oleh produser untuk bermain dalam Bond 25. Film arahan sutradara Danny Boyle itu akan memulai shooting di Pinewood Studios pada Desember mendatang. Bond 25 akan menjadi film ke-25 dari seri film-film sang agen rahasia 007 dan dijadwalkan tayang perdana di Inggris pada 25 Oktober 2019.\r\n\r\nArtikel ini telah tayang di Kompas.com dengan judul "Penyihir Sadis di Film Harry Potter Dilirik Perankan Musuh Baru James Bond"', '497489702.jpg'),
(7, 'Chris Hemsworth: "Avengers 4" Lebih Mengejutkan Dibanding "Infinity War"', 'Chris_Hemsworth_Avengers_4_Lebih_Mengejutkan_Dibanding_Infinity_War', '2018-06-10', 'Namun, menurut sang pemeran Thor, Chris Hemsworth (41), film lanjutannya atau yang sampai saat ini disebut Avengers 4 akan lebih mengejutkan. Dalam wawancara dengan majalah Esquire, Hemsworth mengaku terkejut saat membaca skenario kedua film itu. Namun, Avengers 4, kata Hemsworth, luar biasa. "Jika Anda terkejut dengan Infinity War, saya rasa yang kedua akan lebih mengejutkan, untuk beberapa alasan lain," kata aktor asal Australia itu. "Saya rasa saya lebih antusias untuk yang kedua (Avengers 4). Untuk tontonan," lanjut Hemsworth. Film Infinity War berakhir dengan keberhasilan tokoh antagonis Thanos mengumpulkan keenam infinty stones. Ia kemudian menjentikkan jarinya dan memusnahkan separuh makhluk hidup di jagat raya, termasuk banyak karakter favorit dari Marvel Cinematic Universe. Hemsworth mengaku kagum karena skenario Avengers 4 tidak sekadar mengumpulkan banyak karakter dalam satu film. Setiap karakter, katanya, mendapat porsi dan sorotan masing-masing tetapi tetap menjadi satu kesatuan yang utuh. "Saya suka selalu ada perkembangan dan evolusi dan terus memberi kejutan kepada penonton, bukan cerita datar," lanjut Hemsworth. Film Avengers: Infinity War merajai box office sejak dirilis pada 24 April lalu. Sampai hari ini, film keluaran Disney-Marvel Studios itu sudah meraup 1,96 miliar dollar dari pemutaran di seluruh dunia. Seperti Infinity War, Avengers 4 juga akan dibesut oleh kakak beradik Anthony dan Joe Russo. Film ini rencananya dirilis pada 3 Mei 2018.\r\n\r\nArtikel ini telah tayang di Kompas.com dengan judul "Chris Hemsworth: "Avengers 4" Lebih Mengejutkan Dibanding "Infinity War"', '1701049046.jpg'),
(8, 'Produser Isyaratkan Wonder Woman 2 Berlatar Tahun 1984', 'Produser_Isyaratkan_Wonder_Woman_2_Berlatar_Tahun_1984', '2018-06-10', 'JAKARTA, KOMPAS.com - Chief Creative Officer DC Entertainment, Geoff Johns, memberi isyarat bahwa sekuel film Wonder Woman akan berlatar waktu 1984. Hal itu terlihat dari sebuah foto yang diunggah Johns, yang juga produser eksekutif Wonder Woman, pada akun Facebook-nya. "WW84," begitu tulisan yang tercantum pada foto dengan efek retro seperti distorsi sinyal televisi tersebut.\r\n\r\nSudah lama dikabarkan bahwa film ini akan memiliki setting Perang Dingin pada 1980-an. Rumor itu sekarang rupanya telah terjawab. Lalu, apakah judul film tersebut juga akan menggunakan tahun 1984? belum ada informasi pasti. Sebelumnya, sutradara Patty Jenkins mengungkapkan bahwa Wonder Woman 2 akan mengambil latar tempat di Amerika Serikat. Jika benar, maka akan terjadi pergeseran yang cukup besar dari kisah asli Wonder Woman yang berlatar Perang Dunia I di Eropa. Selain sebagai sutradara, Patty Jenkins juga menulis naskah Wonder Woman 2 bersama Dave Callaham (The Expendables, Godzilla) dan Johns. Aktris Gal Gadot juga akan kembali memerankan karakter Wonder Woman, sang puteri Themyscira. Bergabung dengannya di sekuel in akan ada Pedro Pascal (Game of Thrones, Narcos) yang perannya masih dirahasiakan. Kemudian, pelawak Kristen Wiig nantinya bermain sebagai penjahat berjuluk Cheetah. Wonder Woman 2 dijadwalkan tayang perdana pada November 2019 mendatang.', '418240705.jpg'),
(9, 'Tom Cruise Pamerkan Foto Top Gun: Maverick', 'Tom_Cruise_Pamerkan_Foto_Top_Gun:_Maverick', '2018-06-10', 'Namun pemeran pilot Pete Mitchell alias Maverick itu mau sedikit berbagi sebuah foto yang menunjukkan suasana shooting film ikonik tersebut. Foto yang diunggah di akun Twitter-nya, @TomCruise, Jumat (3/5/2018), itu menunjukkan Cruise mengenakan seragam pilot dan memandang sebuah pesawat tempur dari kejauhan. Foto itu juga mencantumkan tulisan "Feel the need", yang merupakan salah satu kalimat dari film yang melambungkan nama Cruise di Hollywood. "#Day1," begitu keterangan singkat yang diberikan Cruise untuk foto tersebut. Film Top Gun dirilis pada 1986. Film itu menampilkan Maverick sebagai karakter utama. Dia dikenal sebagai pilot pemberani dan nekat yang kemudian memacari instrukturnya. Salah satu kalimat paling kondang dari Top Gun adalah "I feel the need" yang diucapkan Maverick. Bersama rekannnya, Goose, Maverick menambahkan "The need for speed". Rumor tentang sekuel Top Gun merebak setelah produser Jerry Bruckheimer berbicara dengan Entertainment Tonight pada 2017. "Maverick adalah karakter ikonik yang juga diciptakan Tom Cruise. Jadi saya rasa kita ingin tahu seperti apa Maverick setelah 30 tahun," kata Bruckheimer ketika itu. Beberapa waktu kemudian Top Gun dipastikan dibuatkan sekuel. Namun Cruise menegaskan film itu tidak akan menggunakan judul "Top Gun 2". "Judulnya ''Top Gun: Maverick''. Saya tidak ingin ada angka. Anda juga tidak ingin angka. Anda tidak perlu angka," kata Cruise. Top Gun: Maverick digarap oleh sutradara Joseph Kosinski dan dijadwalkan rilis pada 12 Juli 2019.', '476076680.jpg'),
(10, 'Gal Gadot Pamerkan Kostum untuk Wonder Woman 1984', 'Gal_Gadot_Pamerkan_Kostum_untuk_Wonder_Woman_1984', '2018-06-22', 'Foto yang diunggah Gadot di Twitter dan Instagram itu tidak menunjukkan perbedaan berarti dalam kostum untuk film Wonder Woman 1984 itu. Namun warna merah dan biru terlihat lebih terang. Ini bukan gambar pertama dari film karya sutradara Patty Jenkins tersebut. \r\n\r\nBeberapa waktu lalu Jenkins dan Gadot merilis foto aktor Chris Pine sebagai Steve Trevor, yang terlihat segar bugar di tahun 1984. Pada film pertama, Trevor digambarkan mengorbankan nyawa untuk menyelamatkan Pasukan Sekutu dari senjata kimia yang dikembangkan ilmuwan Jerman, Doctor Poison. \r\n\r\nFoto kedua menunjukkan Diana Prince (Wonder Woman) berdiri di depan sederet layar televisi yang menampilkan hal-hal yang menjadi tren di era 1980-an.', '418240705jiji.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemain`
--

CREATE TABLE `pemain` (
  `id_pemain` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `sebagai` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemain`
--

INSERT INTO `pemain` (`id_pemain`, `id_movie`, `nama`, `sebagai`) VALUES
(1, 5, 'Hugh Jackman', 'P.T. Barnum'),
(2, 5, 'Michelle Williams', 'Charity Barnum'),
(3, 5, 'Zac Efron', 'Phillip Carlyle'),
(4, 5, 'Zendaya', 'Anne Wheler'),
(5, 4, 'Meryl Streep', 'Kay Graham '),
(6, 4, 'Tom Hanks', 'Ben Bradlee'),
(7, 2, 'ujang', 'kerok'),
(8, 403001, 'Emily Blunt', 'Evelyn Abbott'),
(10, 403001, 'John Krasinski', 'Lee Abbott'),
(11, 403001, 'Millicent Simmonds', 'Regan Abbott'),
(12, 403001, 'Michelle Williams', 'Erwin'),
(16, 103002, 'Robert Downey Jr', 'Tony Stark / Iron Man'),
(17, 103002, 'Chris Hemsworth', 'Thor'),
(18, 103002, 'Mark Ruffalo', 'Bruce Banner / Hulk'),
(19, 103001, 'Dwayne Johnson', 'Davis Okoye'),
(20, 103001, 'Naomie Harris', 'Dr. Kate Caldwell'),
(21, 103001, 'Malin Akerman', 'Claire Wyden'),
(22, 103001, 'Jeffrey Dean Morgan', 'Harvey Russell'),
(23, 103001, 'Jake Lacy', 'Brett Wyden '),
(24, 4, 'Alison Brie', 'Lally Graham'),
(25, 4, 'Bruce Greenwood', 'Robert McNamara'),
(26, 503003, 'Lex Scott Davis', 'Nya'),
(27, 503003, 'Joivan Wade', 'Isaiah'),
(28, 503003, 'Mugga', 'Dolores '),
(29, 503003, 'Patch Darragh', 'Chief of Staff - Arlo Sabian'),
(30, 503003, 'Marisa Tomei', 'The Architect'),
(31, 103004, 'Chris Pratt', 'Owen Grady'),
(32, 4, 'Bryce Dallas Howard', 'Claire Dearing'),
(33, 4, 'Rafe Spall', 'Eli Mills'),
(34, 4, 'Justice Smith', 'Franklin Webb'),
(38, 103004, 'Bryce Dallas Howard', 'Claire Dearing'),
(39, 103004, 'Rafe Spall', 'Eli Mills'),
(40, 103004, 'Justice Smith', 'Franklin Webb'),
(41, 103004, 'Daniella Pineda', 'Zia Rodriguez'),
(42, 103006, 'Paul Rudd', 'Scott Lang / Ant-Man'),
(43, 103006, 'Evangeline Lilly', 'Hope Van Dyne / Wasp'),
(44, 103006, 'Michael PeÃ±a', 'Luis'),
(45, 103006, 'Walton Goggins', 'Sonny Burch'),
(46, 103006, 'Bobby Cannavale', 'Paxton'),
(47, 103005, 'Benicio Del Toro', 'Alejandro'),
(48, 103005, 'Josh Brolin', 'Matt Graver'),
(49, 103005, 'Isabela Moner', 'Isabel Reyes'),
(50, 103007, 'Dwayne Johnson', 'Will Sawyer'),
(51, 103007, 'Neve Campbell', 'Sarah Sawyer'),
(52, 103007, 'Chin Han', 'Zhao Long Ji'),
(53, 103007, 'Roland MÃ¸ller', 'Kores Botha');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(11) NOT NULL,
  `id_movie` varchar(11) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id_photo`, `id_movie`, `photo`) VALUES
(1, '5', 'MV5BNTQ3MDk5MzEtMGZlNC00N2Q0LThiYTItNDcyNjMxMzJmZTQ5XkEyXkFqcGdeQXVyNjAyNzI2OTY@._V1_SY1000_SX750_AL_.jpg'),
(2, '5', 'MV5BNWM5NDVjZGQtMGY0Ni00NzA1LThjZjYtMmE1NGFhZjliMDM2XkEyXkFqcGdeQXVyNjAyNzI2OTY@._V1_SY1000_CR0,0,718,1000_AL_.jpg'),
(3, '5', 'MV5BOGUwNzFhMWItY2VlYy00NTdmLWFjODctMmQ5YWY3ZTEyNjdlXkEyXkFqcGdeQXVyNjAyNzI2OTY@._V1_.jpg'),
(4, '5', 'MV5BY2NiMmI4YjItY2I0MS00MThlLWJlOGYtNTRlNjNkNTY2NmY0XkEyXkFqcGdeQXVyNzEyNDM5NDc@._V1_.jpg'),
(6, '5', 'MV5BNzljMjJkMWItZWVlYS00YTBjLTlmNzMtOWI3ZGNkODA1ZDEwXkEyXkFqcGdeQXVyNzk5MTY4MTU@._V1_.jpg'),
(7, '5', 'MV5BZmQ5YjQ1NGEtODM1Yy00MDZjLTk2MzAtMjdhMjYwNGI2NzQyXkEyXkFqcGdeQXVyNDg2MjUxNjM@._V1_SY1000_SX675_AL_.jpg'),
(8, '5', 'MV5BNjlkNjYyNmItMjZhZi00ZGNhLTg2NTgtMDM5ZDU2ZjkyZjIzXkEyXkFqcGdeQXVyNzk5MTY4MTU@._V1_.jpg'),
(9, '5', 'MV5BMTViYTVmZGMtMGZjNi00M2FmLTkwMzItZmFlMzc5YzVhZGJlXkEyXkFqcGdeQXVyNzk5MTY4MTU@._V1_.jpg'),
(10, '0103002', 'MV5BMjE3NDEyNTI5NV5BMl5BanBnXkFtZTgwNzA5NjczNTM@._V1_SX1500_CR0,0,1500,999_AL_.jpg'),
(11, '0103002', 'MV5BMTgxOTcxNzk0M15BMl5BanBnXkFtZTgwNjA5NjczNTM@._V1_SX1500_CR0,0,1500,999_AL_.jpg'),
(12, '0103002', 'MV5BMzYwODE5NDEyOV5BMl5BanBnXkFtZTgwMjA5NjczNTM@._V1_SX1500_CR0,0,1500,999_AL_.jpg'),
(13, '0103002', 'MV5BNDE5ODY4NTIzMF5BMl5BanBnXkFtZTgwMTA5NjczNTM@._V1_SY1000_CR0,0,1444,1000_AL_.jpg'),
(14, '0103002', 'MV5BNzEyNzgyMDExMl5BMl5BanBnXkFtZTgwNDE5NjczNTM@._V1_SY1000_CR0,0,1534,1000_AL_.jpg'),
(15, '0103006', 'MV5BMjI5NzMwNDAyMF5BMl5BanBnXkFtZTgwNDQ0Njk3NTM@._V1_SY1000_CR0,0,664,1000_AL_.jpg'),
(16, '0103006', 'MV5BMjYyNDQwMzUzOV5BMl5BanBnXkFtZTgwNjc0Njk3NTM@._V1_SY1000_CR0,0,702,1000_AL_.jpg'),
(17, '0103006', 'MV5BMTA5NjAxMzIxMjFeQTJeQWpwZ15BbWU4MDk2NDY5NzUz._V1_SY1000_CR0,0,666,1000_AL_.jpg'),
(18, '0103006', 'MV5BMTU3MTMyNDkyMl5BMl5BanBnXkFtZTgwMzc0Njk3NTM@._V1_SY1000_CR0,0,1505,1000_AL_.jpg'),
(19, '0103006', 'MV5BNDYxNzg5NjMxN15BMl5BanBnXkFtZTgwOTQ0Njk3NTM@._V1_SY1000_CR0,0,1445,1000_AL_.jpg'),
(20, '0103006', 'MV5BNzQ1MzI0NTYwNl5BMl5BanBnXkFtZTgwNzQ0Njk3NTM@._V1_SY1000_CR0,0,664,1000_AL_.jpg'),
(21, '0503003', 'MV5BYmFiZGY5YmItMDhmOS00MTgwLWI3ZDktYzQxMmMwMzdiNzk3XkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_SX1777_CR0,0,1777,734_AL_.jpg'),
(22, '0503003', 'MV5BZjk2ZTg3NWItMzJjMC00NmM3LTgzMDMtNzk5MjdmOGFiZTk4XkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_SX1777_CR0,0,1777,734_AL_.jpg'),
(23, '0503003', 'MV5BZmU3OGRiM2MtZmRmMC00YTYwLTliYzQtYzJlMTRhNjdiNTIzXkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_SX1777_CR0,0,1777,735_AL_.jpg'),
(24, '0503003', 'MV5BNWQ2YTgwMjMtMzA0Ny00ZDI3LWI1MzEtYjZmYmU3MjEyMGMyXkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_SX1777_CR0,0,1777,742_AL_.jpg'),
(25, '0503003', 'The-First-Purge.jpg'),
(26, '0601001', 'MV5BMTkyNTExOTM2OV5BMl5BanBnXkFtZTcwNTk1NzEyNw@@._V1_SX1777_CR0,0,1777,934_AL_.jpg'),
(27, '0601001', 'MV5BMTU1NTE5NjQ0OF5BMl5BanBnXkFtZTcwMzk1NzEyNw@@._V1_SX1777_CR0,0,1777,960_AL_.jpg'),
(28, '0601001', 'MV5BMTM4MTg2MjAzN15BMl5BanBnXkFtZTcwMTk1NzEyNw@@._V1_SX1777_CR0,0,1777,960_AL_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profilceleb`
--

CREATE TABLE `profilceleb` (
  `id_celeb` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tentang` text NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilceleb`
--

INSERT INTO `profilceleb` (`id_celeb`, `nama`, `slug`, `tanggal_lahir`, `tempat_lahir`, `tentang`, `photo`) VALUES
(1, 'Michael Gracey', 'Michael_Gracey', '1996-04-20', 'Denver, Colorado, USA', 'dia adalah seseorang yang sangat bagus dan baik', '123456_.jpg'),
(2, 'Emily Blunt', 'Emily_Blunt', '1983-02-23', 'London, England', 'Tall, radiant, and sensual, British ingenue Emily Blunt caught the attention of the public and press when she starred (at age 20) opposite Natalie Press in Pawel Pawlikowski''s gentle, finely told lesbian romance My Summer of Love (2004). In the eyes of many Americans, Blunt (who counted this as her first cinematic credit) seemed to arrive at the top world', 'v1.cjs0OTEzNDtqOzE3Njg1OzEyMDA7MjAyMTsyMTU0.jpg'),
(3, 'Zac Efron', 'Zac_Efron', '1987-10-18', 'San Luis Obispo, California, USA', 'Zachary David Alexander Efron was born October 18, 1987 in San Luis Obispo, California, to Starla Baskett, a secretary, and David Efron, an electrical engineer. He has a younger brother, Dylan. His surname, "Efron", which is Hebrew, is a Biblical place name, and comes from Zac''s Polish Jewish paternal grandfather. Zac was raised in Arroyo', 'MV5BMTA5NjEwODI2NDBeQTJeQWpwZ15BbWU3MDM0NTc3NjM@._V1_UX214_CR0,0,214,317_AL_.jpg'),
(4, 'Michelle Williams ', 'Michelle_Williams', '1980-09-09', 'Kalispell, Montana, USA', 'A small-town girl born and raised in rural Kalispell, Montana, Michelle Ingrid Williams is the daughter of Carla Ingrid (Swenson), a homemaker, and Larry Richard Williams, a commodity trader and author. Her ancestry is Norwegian, as well as German, British Isles, and other Scandinavian. She was first known as bad girl Jen Lindley ', 'MV5BOWNhYzU3N2YtY2Q0OS00ODM1LWE2MzUtM2MzNjk3NTgzNWE1XkEyXkFqcGdeQXVyNzkyNDc1OTM@._V1_UX214_CR0,0,214,317_AL_.jpg'),
(5, 'Zendaya', 'Zendaya', '1996-09-01', 'Oakland, California, USA', 'Zendaya (which means "to give thanks" in the language of Shona) is an American actress and singer born in Oakland, California. She began her career appearing as a child model working for Macy''s, Mervyns and Old Navy. She was a backup dancer before gaining prominence for her role as Rocky Blue on the Disney Channel', 'MV5BMjAxZTk4NDAtYjI3Mi00OTk3LTg0NDEtNWFlNzE5NDM5MWM1XkEyXkFqcGdeQXVyOTI3MjYwOQ@@._V1_UY317_CR12,0,214,317_AL_.jpg'),
(7, 'Imogen Poots', 'Imogen_Poots', '1989-06-03', 'London, England, UK', '\r\n	\r\nTop 5000\r\nImogen Poots\r\nActress | Soundtrack\r\nBritish actress Imogen Poots was born in Hammersmith, London, England, the daughter of English-born Fiona (Goodall), a journalist, and Trevor Poots, a Northern Ireland-born television producer. She was educated at Bute House Preparatory School for Girls, Queen''s Gate School for Girls and Latymer Upper School, all in London. When she was a ', 'MV5BMTU3OTA3MzM2NV5BMl5BanBnXkFtZTcwMDczNjY0Mw@@._V1_UY317_CR20,0,214,317_AL_.jpg'),
(8, 'Angelina Jolie', 'Angelina_Jolie', '1975-06-04', ' Los Angeles, California, USA', 'Angelina Jolie is an Academy Award-winning actress who became popular after playing the title role in the "Lara Croft" blockbuster movies, as well as Mr. & Mrs. Smith (2005), Wanted (2008), Salt (2010) and Maleficent (2014). Off-screen, Jolie has become prominently involved in international charity projects, especially those involving refugees.', 'MV5BODg3MzYwMjE4N15BMl5BanBnXkFtZTcwMjU5NzAzNw@@._V1_UY317_CR22,0,214,317_AL_.jpg'),
(9, 'T.J. Miller', 'T.J._Miller', '1981-06-04', 'Denver, Colorado, USA', 'A comedian. Improvisation, sketch and stand-up are his forte. Todd Joseph Miller was born in Denver, Colorado, to Leslie, a clinical psychologist, and Kent Miller, an attorney. He went to East High School, and college in Washington, D.C. There, he performed with the group receSs for 4 years, being the only person in his class out of 100 to audition', 'MV5BMjIwMzI0NTEwMF5BMl5BanBnXkFtZTcwMjk4MDkxNA@@._V1_UY317_CR3,0,214,317_AL_.jpg'),
(10, 'Jordan Hinson', 'Jordan_Hinson', '1991-06-04', 'El Paso, Texas, USA', 'Jordan Hinson was born in El Paso, TX. Growing up doing local theater, she developed a passion for acting and moved out to Los Angeles at age 11. She started out starring in Disney Channel original movie Go Figure (2005) and the hit SyFy series Eureka (2006). She also started writing screenplays at the young age of 15 and has since penned many', 'MV5BYTQ0MzU5NjItZWYyZS00MmI2LTk2NzAtZThiZDMxNTk2NDEwXkEyXkFqcGdeQXVyMjQ3MDk2OA@@._V1_UY317_CR20,0,214,317_AL_.jpg'),
(11, 'Oona Chaplin', 'Oona_Chaplin', '0000-00-00', '1986-06-04', 'Oona Chaplin is a Spanish actress. Her mother is Geraldine Chaplin. She is also the granddaughter of English film actor Charlie Chaplin, and great-granddaughter of American playwright Eugene O''Neill. She is best known for playing Talisa Maegyr in the HBO TV series Game of Thrones and Zilpha Geary in Taboo. She was named after her maternal ', 'MV5BMjkwMjAyNjY4MF5BMl5BanBnXkFtZTcwMjA2MDg0Nw@@._V1_UY317_CR7,0,214,317_AL_.jpg'),
(12, 'Robin Lord Taylor ', 'Robin_Lord_Taylor_', '1986-06-04', 'Shueyville, Iowa, USA', 'A native of Shueyville, Iowa, Taylor is a graduate of Northwestern University''s School of Speech. Robin Lord Taylor has appeared in several acclaimed television series, such as The Walking Dead (2010), Law & Order (1990), Law & Order: Special Victims Unit (1999) The Good Wife (2009) and Person of Interest (2011) He also had a recurring role', 'MV5BMjgyODAyMTAwMl5BMl5BanBnXkFtZTgwODAzMjkyNjE@._V1_UY317_CR11,0,214,317_AL_.jpg'),
(13, 'Dustin Hoffman ', 'Dustin_Hoffman_', '1937-08-08', ' Los Angeles, California, USA', '\r\n	\r\nTop 5000\r\nDustin Hoffman\r\nActor | Producer | Soundtrack\r\nDustin Lee Hoffman was born in Los Angeles, California, to Lillian (Gold) and Harry Hoffman, who was a furniture salesman and prop supervisor for Columbia Pictures. He was raised in a Jewish family (from Ukraine, Russia-Poland, and Romania). Hoffman graduated from Los Angeles High School in 1955, and went to Santa Monica City College,', 'hofman.jpg'),
(14, 'Katie Leung', 'Katie_Leung', '1987-08-08', ' Motherwell, Scotland, UK', 'Katie Leung began her career when she was cast as Cho Chang in the Warner Brothers feature film Harry Potter and the Goblet of Fire, a role she subsequently reprised for Harry Potter and the Order of the Phoenix and Harry Potter and the Deathly Hallows (Parts I & II). Alongside her acting career, Katie has trained at the Royal Conservatoire ', 'MV5BMGVlNTViMGQtOTVlZi00ZGNjLWFhMzctMDNlN2QzNjBjZjhiXkEyXkFqcGdeQXVyMjQwMDg0Ng@@._V1_SY1000_CR0,0,708,1000_AL_.jpg'),
(15, 'Laura Wiggins', 'Laura_Wiggins', '1988-08-08', ' Athens, Georgia, USA', 'Laura Wiggins is an American actress, singer and musician.She started acting in 2006 and appeared in series like Dance of the Dead and Eleventh Hour. She Attended Pasadena City College, Pasadena, California, United States.Hobbies includes Philately, Creative writing, Creative writing. Father : Mark Wiggins Mother : Kathy Wiggins', 'kkk.jpg'),
(16, 'Peyton List ', 'Peyton_List_', '1986-08-08', ' Boston, Massachusetts, USA', 'Peyton List was born on August 8, 1986, in Boston, Massachusetts. She grew up with her older sister Brittany, who works as a model in Germany, and her parents Sherri Anderson and Douglas "Doug" List. Peyton studied at the School of American Ballet in New York City and also played there on stage. She began her career as a model', 'peyton.jpg'),
(17, 'Lindsay Sloane', 'Lindsay_Sloane', '1977-08-08', ' Long Island, New York, USA', 'Admitting to her own lively nature as a child, Sloane took up acting as an outlet for her energy. She developed a real love for the art and signed with an agent at the tender age of 8. Sloane was a television series regular', '156285_v9_bb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_movie` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `review` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `id_movie`, `id_user`, `jumlah`, `review`, `username`, `tanggal`) VALUES
(1, '1', 1, 4, 'Mantap article nya', '', '2018-01-08'),
(3, '2', 1, 5, 'Bagus', '', '2018-01-08'),
(10, '1', 2, 5, 'Sangat Menarik', '', '2018-01-05'),
(11, '3', 1, 3, 'Good', '', '2017-09-05'),
(12, '2', 2, 2, 'Very Good', '', '2018-01-13'),
(13, '3', 2, 3, 'Exelent', '', '2018-01-08'),
(14, '1', 3, 3, 'article nya cukup menarik ', '', '2018-01-07'),
(15, '3', 3, 5, 'sebuah master piece yang telah lama hilang', '', '2018-01-02'),
(16, '4', 4, 4, 'Film yang sangat bagus dan mendidik bagi kaula muda', 'ujang', '2018-01-19'),
(17, '5', 1, 3, 'bagus dan mantap film nya bagus dan mantap film nya bagus dan mantap film nya bagus dan mantap film nya bagus dan mantap film nya bagus dan mantap film nya', 'koko', '2018-01-20'),
(18, '5', 4, 5, 'Mataf film nya good movie Mataf film nya good movie Mataf film nya good movie Mataf film nya good movie Mataf film nya good movie Mataf film nya good movie', 'ujang', '2018-01-28'),
(19, '1', 4, 3, 'good but not perfect', 'ujang', '2018-01-28'),
(20, '5', 3, 4, 'lumayan bagus film nya aktingnya juga ok', 'gambit', '2018-04-21'),
(21, '0103001', 7, 3, 'gk jelek2 bgt film nya', 'lomel', '2018-04-21'),
(22, '0403001', 7, 5, 'salah satu film horor terbaik', 'lomel', '2018-04-21'),
(23, '0103001', 8, 3, 'kurang bagus film nya suckssss', 'kulon', '2018-04-22'),
(24, '0103001', 9, 2, 'jelek film nya ', 'lamelo', '2018-04-22'),
(25, '5', 10, 3, 'asd a asd as asd as aksldn  asld nklasn s knask lasld kasn askl nsakl aslnsakldsadknasd salkdnsa dklsanda sdlasnd asdlkasnd sadl asld', 'idung', '2018-04-04'),
(26, '5', 11, 4, 'asdasdlak jaslk nsalkdj laksj lkasjd lkasj klsajlk djaslkdj laksjd klsaj dlkasj klsajlkd jaslkd askljd lkasj klasjd klj', 'umar', '2018-04-09'),
(27, '5', 12, 2, 'asdasdlak jaslk nsalkdj laksj lkasjd lkasj klsajlk djaslkdj laksjd klsaj dlkasj klsajlkd jaslkd askljd lkasj klasjd klj', 'loki', '2018-04-02'),
(28, '5', 13, 2, 'asdasdlak jaslk nsalkdj laksj lkasjd lkasj klsajlk djaslkdj laksjd klsaj dlkasj klsajlkd jaslkd askljd lkasj klasjd klj', 'thor', '2018-04-01'),
(29, '5', 14, 2, 'asdasdlak jaslk nsalkdj laksj lkasjd lkasj klsajlk djaslkdj laksjd klsaj dlkasj klsajlkd jaslkd askljd lkasj klasjd klj', 'giant', '2018-04-17'),
(30, '0103002', 6, 6, 'Film Lumayan bagus tapi durasi nya sangat singkat untuk film yg memiliki banyak tokoh jadi hanya sekilas saja tokoh-tokog superhero nya ', 'koko', '2018-05-17'),
(31, '0105001', 6, 8, 'film nya sangat bagus tidak murahan dan peran para pemain nya juga sangat menarik memberikan kisah drama yang menarik juga dan kerasnya kehidupan di penjara', 'koko', '2018-05-17'),
(32, '0103002', 7, 3, 'film sampah cocok untuk anak 13 tahun ke bawah. alur yang terkesan terburu-buru untuk mengejar film yang hanya 2 jam ini ', 'lomel', '2018-05-18'),
(33, '0503001', 7, 8, 'film lumayan bagus banyak aksi seru dan mendebarkan dan alur ceritanya juga tidak terburu-buru. dan ada romansa nya juga di film ini. lebih baik dari pada film pertamanya. akting ryan renold yang sempurna juga membuat film ini lebih hidup. dan jokes nya juga lucu tidak hambar', 'lomel', '2018-05-28'),
(34, '0203003', 10, 10, 'Salah Satu Film terbaik yang pernah di buat. cerita yang sangat bagus dan mendalam. dan konflik-konflik yang di sajikan juga sungguh sangat baik dan para pemeran yang sangat menjiwai dan untuk alpacino yang sangat baik dalam berperan . sayang film yang ketiga tidak sebagus 2 film sebelumnya.salah satu film terbaik wajib di tonton', 'Dick', '2018-06-11'),
(35, '0503002', 14, 7, 'menceritakan tentang film basket dan sangat bagus filmnya sangat menddidik dan sangat keren dan bagus untuk anak2 dan remaja untuk mengembangkan motivasi dini mengembangkan motivasi dini mengembangkan motivasi dinimengembangkan motivasi dini mengembangkan motivasi dini', 'koko', '2018-06-25'),
(36, '0103004', 13, 6, 'asdokods aodkoksdo aosdkoaksd oaskdoksdo oaskdoaksdo asodkosakdasdokaoskd asodkoasdk oaskdoaksd \r\nasdokods aodkoksdo aosdkoaksd oaskdoksdo oaskdoaksdo asodkosakdasdokaoskd asodkoasdk oaskdoaksd \r\nasdokods aodkoksdo aosdkoaksd oaskdoksdo oaskdoaksdo asodkosakdasdokaoskd asodkoasdk oaskdoaksd ', 'lomel', '2018-07-03'),
(37, '0103004', 15, 7, 'film nya sangat menarik dan tidak terkesan buru-buru peran aktor aktor nya sangat kuat. dan christ part sangat baik dalam film ini. dan atmosphire yang di buat sungguh menakjubkan ', 'arjunkeren', '2018-07-21'),
(38, '0503002', 7, 8, 'film nya sangat lucu dan menghibur. peran kyrie juga sangat bagus di film ini. karna saya sangat suka dengan basket jadi saya sangat suka dengan film ini', 'lomel', '2018-07-22'),
(39, '0103002', 14, 6, 'lumayan film nya untuk segin animasi dan cgi nya. tapi tidak dengan jalan cerita. jalan cerita sangat bosan dan boring.mungkin film ini akan cocok untuk anak umur 5 tahun ke bawah ', 'koko', '2018-08-06'),
(40, '0103004', 7, 7, 'film yang sangat memukau dari segi animasi dan cgi nya. peran chrisprat juga sangat memukau di film ini.alur cerita yang ringan membuat film ini mudah di pahami', 'lomel', '2018-08-06'),
(41, '0103006', 13, 7, 'film nya sangat menhibur dan peran-peran nya sangat baik. salah satu film marvel yang sangat baik dari segi cerita alur dan cgi nya juga rapih jarang terlihat dull nya ', 'lomel', '2018-08-07'),
(42, '0103007', 16, 5, 'film kurang baik peran the rock sangat tidak bagus di film ini. saya heran kenapa setiap film jaman sekrang pasti di perankan oleh the rock. apa film holywoord kekurangan aktor bagus', 'Lamelo', '2018-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `profil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `email`, `tanggal`, `profil`) VALUES
(6, 'koko', '$2y$10$rSAtF6vHh1fIfLWrOSspKujlwCUEFzxuQ21tVuKExrm4qIh6TFALO', 'kokojempol123@gmail.com', '2018-02-06', 'profil.png'),
(7, 'lomel', '$2y$10$WliOj5LLoUr5yEZnA/XOTuc9K1zVyMyUI1ZqdBf90fBHiY3Q45nY2', 'arjundwiyantoro@gmail.com', '2017-12-27', '123456_.jpg'),
(8, 'kulon', '$2y$10$tWYNoX82KdPpfwZwf.ShbOqwr.rPNJTJm3N8azlo9TypGqHxLwFTq', 'kokojempol@gmail.com', '2018-04-22', ''),
(9, 'lamelo', '$2y$10$5GM5iq5APSWQ/3oD7XFin.GZlCnJ/nBQ7she6qzidm4dewAfvQI8K', 'udin@gmail', '2018-04-22', 'profil.png'),
(10, 'Dick', '$2y$10$2DZouge/yEk1SYrsjaidLeDn08C0QcpfemrN7bfH0Mrdb8/F5fOxm', 'dick@gmail.com', '2018-06-11', 'profil.png'),
(11, 'kobusin', '$2y$10$q1EaC6w8UioOtDZLs/Sg/.GVl2PTXvVbCtZD3zWGfn2BbWhybT2Em', 'kobusin@gmail.com', '0000-00-00', 'profil.png'),
(12, 'siluman', '$2y$10$aAHZ3/VVwR14T54SM7dkYOwzqzaqNWX15J0v3pDtMRryZBUv1cuP2', 'siluman@gmail.com', '2018-06-20', 'profil.png'),
(13, 'lomel', '$2y$10$6neOO9oEgnK.hUAu7Z1LRec.5CiddzS8ImW5elDxxdLEtaoqjV9da', 'koko1@gmail.com', '2018-06-22', 'ajGGodxd_700w_0.jpg'),
(14, 'koko', '$2y$10$L0P3rPB0vPPDzXIQ0w3IC.QuLDPk16VDM7dYIrojytdWvPKKX1yKG', 'koko5@gmail.com', '2018-06-25', 'The-First-Purge.jpg'),
(15, 'arjunkeren', '$2y$10$VimZpTZzeE9q7VKOG5H/t.llCgHhbLmJvUVlC5mCwhbyUMdaKalxG', 'arjunkeren12@yahoo.co.id', '2018-07-21', 'profil.png'),
(16, 'Lamelo', '$2y$10$tFSK4Aqz/8u.1tveNVzG4.vENgCiH9iH4i6TjVg6eWcN9mKeOPiKu', 'daud@gmail.com', '2018-08-07', '76042_523136834392785_2055675038_n(3).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id_watch` int(11) NOT NULL,
  `id_movie` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id_watch`, `id_movie`, `id_user`) VALUES
(1, '5', 3),
(2, '4', 3),
(5, '1', 2),
(6, '5', 1),
(12, '0403001', 7),
(13, '5', 8),
(14, '0403001', 8),
(15, '0103001', 8),
(18, '5', 7),
(19, '0105001', 7),
(20, '0103002', 6),
(21, '0103001', 7),
(22, '0103004', 14),
(23, '5', 13),
(24, '0103004', 15),
(25, '0203002', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `pemain`
--
ALTER TABLE `pemain`
  ADD PRIMARY KEY (`id_pemain`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `profilceleb`
--
ALTER TABLE `profilceleb`
  ADD PRIMARY KEY (`id_celeb`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id_watch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `komen`
--
ALTER TABLE `komen`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id_pemain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `profilceleb`
--
ALTER TABLE `profilceleb`
  MODIFY `id_celeb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id_watch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
