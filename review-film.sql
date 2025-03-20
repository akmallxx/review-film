-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2025 at 03:04 PM
-- Server version: 10.6.21-MariaDB-cll-lve
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akmn4452_review-film`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('0716d9708d321ffb6a00818614779e779925365c', 'i:1;', 1741582146),
('0716d9708d321ffb6a00818614779e779925365c:timer', 'i:1741582146;', 1741582146),
('12c6fc06c99a462375eeb3f43dfd832b08ca9e17', 'i:1;', 1742083757),
('12c6fc06c99a462375eeb3f43dfd832b08ca9e17:timer', 'i:1742083757;', 1742083757),
('1b6453892473a467d07372d45eb05abc2031647a', 'i:1;', 1741581553),
('1b6453892473a467d07372d45eb05abc2031647a:timer', 'i:1741581553;', 1741581553),
('4d134bc072212ace2df385dae143139da74ec0ef', 'i:1;', 1742084156),
('4d134bc072212ace2df385dae143139da74ec0ef:timer', 'i:1742084156;', 1742084156),
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:2;', 1741707127),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1741707127;', 1741707127),
('91032ad7bbcb6cf72875e8e8207dcfba80173f7c', 'i:1;', 1741744219),
('91032ad7bbcb6cf72875e8e8207dcfba80173f7c:timer', 'i:1741744219;', 1741744219),
('9e6a55b6b4563e652a23be9d623ca5055c356940', 'i:3;', 1741743019),
('9e6a55b6b4563e652a23be9d623ca5055c356940:timer', 'i:1741743019;', 1741743019),
('admin@example.com|180.254.99.214', 'i:1;', 1741356853),
('admin@example.com|180.254.99.214:timer', 'i:1741356853;', 1741356853),
('asdasdadsss@example.com|162.158.186.46', 'i:1;', 1742148761),
('asdasdadsss@example.com|162.158.186.46:timer', 'i:1742148761;', 1742148761),
('b3f0c7f6bb763af1be91d9e74eabfeb199dc1f1f', 'i:1;', 1741743955),
('b3f0c7f6bb763af1be91d9e74eabfeb199dc1f1f:timer', 'i:1741743955;', 1741743955),
('d435a6cdd786300dff204ee7c2ef942d3e9034e2:timer', 'i:1742081663;', 1742081663),
('da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1741744125),
('da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1741744125;', 1741744125),
('jen@gmail.com|103.65.214.81', 'i:1;', 1739886635),
('jen@gmail.com|103.65.214.81:timer', 'i:1739886635;', 1739886635),
('luqman11@gmail.com|162.158.170.176', 'i:1;', 1742081309),
('luqman11@gmail.com|162.158.170.176:timer', 'i:1742081309;', 1742081309),
('luqmanasyari11@gmail.com|162.158.170.176', 'i:1;', 1742081332),
('luqmanasyari11@gmail.com|162.158.170.176:timer', 'i:1742081332;', 1742081332),
('luqmanasyari684@gmail.com|172.69.165.8', 'i:1;', 1742081367),
('luqmanasyari684@gmail.com|172.69.165.8:timer', 'i:1742081367;', 1742081367),
('rafan7750@gmail.com|103.210.35.90', 'i:2;', 1741673710),
('rafan7750@gmail.com|103.210.35.90:timer', 'i:1741673710;', 1741673710),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:2:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"crud admin\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"crud author\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:6:\"author\";s:1:\"c\";s:3:\"web\";}}}', 1742529756);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `castings`
--

CREATE TABLE `castings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_panggung` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `id_film` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `castings`
--

INSERT INTO `castings` (`id`, `nama_panggung`, `nama_asli`, `id_film`, `created_at`, `updated_at`) VALUES
(1, 'Sam Wilson', 'Anthony Mackie', 1, '2025-02-14 17:27:37', '2025-02-14 17:27:37'),
(2, 'Joaquin Torres', 'Danny Ramirez', 1, '2025-02-14 17:29:25', '2025-02-14 17:29:25'),
(3, 'Isaiah Bradley', 'Carl Lumbly', 1, '2025-02-14 17:29:25', '2025-02-14 17:29:25'),
(5, 'Sidewinder', 'Giancarlo Esposito', 1, '2025-02-14 17:32:05', '2025-02-14 17:32:05'),
(6, 'Giyo', 'Fadil Sabana', 1, '2025-03-06 10:57:54', '2025-03-06 10:58:39'),
(7, 'Sugito Asolole', 'Firus', 1, '2025-03-06 10:59:12', '2025-03-06 10:59:12'),
(8, 'Tujo', 'Dickahhhh', 1, '2025-03-06 11:00:08', '2025-03-06 11:00:08'),
(9, 'Yanto', 'Rafael', 1, '2025-03-06 11:00:20', '2025-03-06 11:00:20'),
(10, 'Irham Lockhart', 'Kanip Icikiwir', 14, '2025-03-06 18:24:05', '2025-03-06 18:27:41'),
(11, 'Tukul Arwana', 'Maulana Hady', 14, '2025-03-06 18:24:43', '2025-03-06 18:39:17'),
(12, 'Feryn Rosewaal', 'Husein Rafael', 14, '2025-03-06 18:25:08', '2025-03-06 18:29:05'),
(13, 'Joe Santos', 'Zaky Naufal', 14, '2025-03-06 18:25:43', '2025-03-06 18:33:54'),
(14, 'Gilbert Van Astrea', 'Fadil Sabana', 14, '2025-03-06 18:26:37', '2025-03-06 18:30:14'),
(15, 'Roy Anderson', 'Amatukam Irfan', 14, '2025-03-06 18:31:53', '2025-03-06 18:34:54'),
(16, 'Ricko Rosewood', 'Rasyidin Bin Walid', 14, '2025-03-06 18:33:40', '2025-03-06 18:33:40'),
(17, 'Antony Matheus dos Santos', 'Pujiana Ajie', 14, '2025-03-06 18:36:23', '2025-03-06 18:41:49'),
(18, 'Sung Jinwoo', 'Kanip Icikiwir', 17, '2025-03-08 02:48:03', '2025-03-08 02:48:03'),
(19, 'Cha Hae-In', 'Rosé', 17, '2025-03-08 02:50:15', '2025-03-08 02:53:50'),
(20, 'Thomas Andre', 'Fadil Sabana', 17, '2025-03-08 02:52:12', '2025-03-08 02:52:12'),
(21, 'Liu Zhigang', 'Jenny Rengginang', 17, '2025-03-08 02:53:39', '2025-03-08 02:53:39'),
(22, 'LetDa Hypler', 'Kanip Kroco', 21, '2025-03-20 04:06:25', '2025-03-20 04:06:25'),
(23, 'Budi02', 'Rapa Poke', 21, '2025-03-20 04:06:43', '2025-03-20 04:06:43'),
(24, 'RUOK', 'Akmal GG', 21, '2025-03-20 04:07:02', '2025-03-20 04:07:49'),
(25, 'Frontal Gaymink', 'Nanda HADIBOT', 21, '2025-03-20 04:07:38', '2025-03-20 04:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_film` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `rating`, `id_user`, `id_film`, `created_at`, `updated_at`) VALUES
(34, 'قَدْ جَاءَكُمْ رَمَضَانُ شَهْرٌمُبَارَكٌ افْتَرَضَ اللهُ عَلَيْكُمْ صِيَامَهُ تُفْتَحُ فَيْهِ أبْوَابُ الْجَنَّةِ وَيُغْلَقُ فَيْهِ أبْوَابُ الْجَحِيْمِ وَتُغَلًّ فَيْهَ الشَّيَاطَيْنُ فَيْهِ لَيْلَةٌ خَيْرٌ مِنْ ألْفِ شَهْرٍ \r\n\r\nArtinya: Telah datang bulan Ramadhan, bulan penuh berkah, maka Allah mewajibkan kalian untuk berpuasa pada bulan itu. Saat itu pintu-pintu surga dibuka, pintu-pintu neraka ditutup, para setan diikat dan pada bulan itu pula terdapat satu malam yang nilainya lebih baik dari seribu bulan (HR Ahmad).', '5', 24, 11, '2025-03-15 17:16:47', '2025-03-15 17:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori_film` text NOT NULL,
  `tahun_rilis` year(4) NOT NULL,
  `durasi` int(11) NOT NULL,
  `pencipta` varchar(255) NOT NULL,
  `trailer` text NOT NULL,
  `kategori_umur` varchar(255) NOT NULL,
  `total_episode` int(11) NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `judul`, `slug`, `poster`, `deskripsi`, `kategori_film`, `tahun_rilis`, `durasi`, `pencipta`, `trailer`, `kategori_umur`, `total_episode`, `id_users`, `created_at`, `updated_at`) VALUES
(1, 'CAPTAIN AMERICA: BRAVE NEW WORLD', 'captain-america-brave-new-world-2024', 'https://asset.tix.id/wp-content/uploads/2025/02/25CABW.jpg', 'Setelah bertemu dengan Presiden AS yang baru terpilih, Thaddeus Ross (Harrison Ford), Sam Wilson (Anthony Mackie), Captain America yang baru, menemukan dirinya berada di tengah-tengah konflik internasional dan harus mengungkap motif di balik rencana global yang jahat.', 'movies', '2024', 118, 'Marvel Studios', 'https://web3.21cineplex.com/movie-trailer/25CABW.mp4', 'PG-13', 1, 3, '2025-02-12 14:23:07', '2025-02-15 04:03:59'),
(2, 'CINTA TAK PERNAH TEPAT WAKTU', 'cinta-tak-pernah-tepat-waktu-2025', 'https://asset.tix.id/wp-content/uploads/2025/02/ccefe9b5-e096-478d-939a-f8b3a5022c8b-600x885.webp', 'Keinginan Bapak dan Ibu melihat Daku (Refal Hady) menikah tidak sejalan dengan kisah cinta putra mereka yang selalu berantakan. Saat Daku merasa menemukan orang yang tepat, waktu seolah enggan bersahabat. Dari Nadya (Nadya Arina) yang sangat sabar, Anya (Carissa Perusset) yang menghadirkan banyak keseruan, dan Sarah (Mira Filzah) yang menenangkan, adakah yang berhasil bersama Daku hingga akhir? Apakah cinta Daku bisa tepat waktu?', 'movies', '2025', 110, 'Puthut EA', 'https://web3.21cineplex.com/movie-trailer/15CTPT.mp4', 'PG-13', 1, 3, '2025-02-13 00:45:55', '2025-02-13 00:45:55'),
(3, 'PINTU PINTU SURGA', 'pintu-pintu-surga-2025', 'https://asset.tix.id/wp-content/uploads/2025/02/b13e7086-b5f3-427b-9276-fd54e18424bc-600x885.webp', 'Memiliki keluarga yang harmonis dan hidup bahagia bersama keluarga kecilnya, Latifah (Susan Sameh) merasa diuji saat suaminya meninggal dan dia harus merawat anaknya (Athar Barakbah) yang ADHD dan yayasan pendidikan milik suaminya.\r\n\r\nArman (Arya Saloka), mantan kekasih Latifah, membantu mengurus yayasan suaminya. Situasi ini membuat mereka kembali dekat, hingga akhirnya Arman memutuskan untuk meminang Latifah. Namun, Latifah dihadapkan pada pilihan apakah dia mampu mengikhlaskan hatinya untuk menjadi istri kedua.', 'movies', '2025', 104, 'Dakaramira Studio', 'https://web3.21cineplex.com/movie-trailer/15PPSA.mp4', 'PG-13', 1, 3, '2025-02-13 00:45:55', '2025-02-13 00:45:55'),
(4, '(500) DAYS OF SUMMER', '500-days-of-summer-2009', 'https://upload.wikimedia.org/wikipedia/id/thumb/d/d1/Five_hundred_days_of_summer.jpg/220px-Five_hundred_days_of_summer.jpg', '500 Days of Summer ((500) Days of Summer) (2009) Setelah kali ini sepertinya Summer telah meninggalkan hidupnya untuk selamanya, Tom Hansen mengenang kembali lebih dari satu tahun saat ia mengenal Summer Finn. Bagi Tom, itu adalah cinta pada pandangan pertama saat ia masuk ke perusahaan kartu ucapan tempat ia bekerja, ia adalah asisten administrasi yang baru. Meskipun Summer tidak percaya pada hubungan atau pacar - menurutnya, kehidupan nyata pada akhirnya akan selalu menghalangi - Tom dan Summer menjadi lebih dari sekadar teman. Melalui cobaan dan kesengsaraan hubungan Tom dan Summer, Tom selalu dapat mengandalkan nasihat dari kedua sahabatnya, McKenzie dan Paul. Namun, adik perempuan Tom yang masih remaja, Rachel, adalah suaranya yang masuk akal. Setelah semua dikatakan dan dilakukan, Tom adalah orang yang pada akhirnya harus membuat pilihan untuk mendengarkan atau tidak.', 'movies', '2009', 95, 'Dune Entertainment', 'https://youtu.be/PsD0NpFSADM?si=8_hZUyExDgYVjEZO', 'R', 1, 3, '2025-02-13 00:58:45', '2025-03-15 06:39:48'),
(5, 'ATTACK ON TITAN: THE LAST ATTACK', 'attack-on-titan-the-last-attack-2025', 'https://asset.tix.id/wp-content/uploads/2025/02/2137265e-0b97-4f08-87dc-19e050200a4b-600x885.webp', 'Ini adalah \"Serangan\" terakhir!\r\nAttack on Titan berkisah tentang pertempuran tanpa akhir antara manusia dan Titan di dunia yang dipisahkan oleh tembok. Seperti komiknya, musim pertama anime TV ini menjadi hit di seluruh dunia, menceritakan kisah yang berlangsung selama 10 tahun dan mencapai akhir pada Musim Gugur 2023. Bagian 1 dan 2 dari Final Season telah direkonstruksi sebagai rilis teatrikal pada Musim Gugur 2024. Di bawah arahan sutradara Yuuichiro Hayashi, potongan asli telah disempurnakan, sekarang dengan suara 5.1ch dan durasi tayang 145 menit. Dengan meningkatkan kualitas lebih tinggi dari siaran TV \"kualitas film\" aslinya, ia telah berevolusi menjadi gambar bergerak yang megah dan sesuai standard layar lebar. Ini adalah puncak dari \"Attack on Titan,\" sebuah karya yang telah dicurahkan oleh seluruh staf dan pemeran dengan sepenuh hati dan jiwa mereka. \"The Ultimate conclusion Arc\" yang tidak ingin kamu lewatkan sedetik pun!', 'anime', '2025', 144, 'Hajime Isayama', 'https://youtu.be/exSPi2EC7Rs', 'R', 1, 3, '2025-02-14 15:13:52', '2025-02-14 15:13:52'),
(6, 'PERAYAAN MATI RASA', 'perayaan-mati-rasa-2025', 'https://asset.tix.id/wp-content/uploads/2025/01/893f8bce-0d65-499c-a892-d0698cd3a651.webp', 'Sebagai seorang anak pertama, IAN (Iqbaal Ramadhan) berjuang meraih mimpinya bersama para sahabatnya dan berusaha keras memenuhi semua ekspektasi yang ia bangun hingga membuatnya jauh dari keluarga. Namun, ketika sebuah peristiwa besar membuat Ian kehilangan orang tuanya secara tiba-tiba, Ian berusaha selalu kuat dan mengubur semua perasaannya hingga ia mati rasa.', 'movies', '2025', 125, 'Umay Shahab', 'https://youtu.be/i8XHPvkg9nQ', 'R', 1, 3, '2025-02-15 04:10:07', '2025-02-15 04:10:07'),
(7, '1 KAKAK 7 PONAKAN', '1-kakak-7-ponakan-2025', 'https://asset.tix.id/wp-content/uploads/2025/01/52fa8458-8ba0-44c3-8e4a-6aa27e6840e7-600x885.webp', 'Setelah kematian mendadak kakak-kakaknya, Hendarmoko (Chicco Kurniawan) seorang arsitek muda yang sedang berjuang, tiba-tiba menjadi orangtua tunggal bagi keponakan-keponakannya. Ketika kesempatan untuk kehidupan yang lebih baik muncul, dia harus memilih antara kehidupan cintanya, karier atau keponakan-keponakannya.', 'movies', '2025', 131, 'Yandy Laurens', 'https://web3.21cineplex.com/movie-trailer/151K7P.mp4', 'R', 1, 3, '2025-02-15 04:11:29', '2025-02-15 04:11:29'),
(8, 'NOSFERATU', 'nosferatu-2025', 'https://asset.tix.id/wp-content/uploads/2025/01/977cc9a9-31ce-45a4-a6c6-479d2cb6a32b-600x885.webp', 'Obsesi antara Ellen Hutter (Lily-Rose Depp) dan Count Orlok (Bill Skarsgard), vampir mengerikan yang tergila-gila padanya. Kisahnya membuat teror dan kengerian yang tak terkira akibatnya.', 'movies', '2025', 130, 'Robbert Eggers', 'https://web3.21cineplex.com/movie-trailer/25NOSU.mp4', 'R', 1, 3, '2025-02-15 04:13:10', '2025-02-15 04:13:10'),
(9, 'BRIDGET JONES: MAD ABOUT THE BOY', 'bridget-jones-mad-about-the-boy-2025', 'https://asset.tix.id/wp-content/uploads/2025/02/eafc21b377b2402a86de0452f9ece52f-600x885.jpg', 'Bridget Jones menjalani kehidupan sebagai janda dan ibu tunggal dengan bantuan keluarganya, teman-temannya, dan mantan kekasihnya, Daniel. Kembali bekerja dan di sebuah aplikasi, dia dikejar oleh seorang pria yang lebih muda dan mungkin - hanya mungkin - guru sains anaknya.', 'movies', '2025', 124, 'Helen Fielding', 'https://youtu.be/lpDFKbPYmQ8', 'R', 1, 3, '2025-02-15 04:15:18', '2025-02-15 04:15:18'),
(10, 'SECRET: UNTOLD MELODY', 'secret-untold-melody-2025', 'https://asset.tix.id/wp-content/uploads/2025/01/67b5af3c-6a48-4e89-aba2-e808ae66fd44-600x885.webp', '“Ada berbagai emosi yang hanya kurasakan saat bermain piano. Aku merasakan itu juga saat bertemu denganmu.”\r\nYu-jun, seorang pianis yang belajar di luar negeri, datang ke Korea sebagai siswa pertukaran untuk menerima perawatan pada pergelangan tangannya. Di hari pertamanya sekolah, Yu-jun bertemu Jung-a di ruang latihan, tertarik oleh melodi piano yang misterius. Keduanya, yang dipertemukan takdir, menghabiskan waktu bersama dan menjadi lebih dekat. Namun, pertemuannya dengan Jung-a, yang bahkan tidak memberinya informasi kontaknya, terus berjalan serba salah, dan pengakuan tiba-tiba In-hee, yang mengira mata Yu-jun selalu tertuju padanya, sangat menyakiti Jung-a. Setelah hari itu, Yu-jun mencari keberadaan Jung-a, dan menemukan rahasianya…\r\n“Bagian yang menghubungkan waktu kita, ‘Rahasia’, dan begitulah cinta dimulai.”', 'movies', '2025', 103, 'Jay Chou', 'https://youtu.be/GAfRxWfguBI', 'R', 1, 3, '2025-02-15 04:19:40', '2025-02-15 04:19:40'),
(11, 'PADDINGTON IN PERU', 'paddington-in-peru-2025', 'https://asset.tix.id/wp-content/uploads/2025/01/0dc9e7fdd3234f5bade9ef8c18e59ab2-600x885.jpg', 'Paddington kembali ke Peru untuk mengunjungi Bibi Lucy tercintanya, yang sekarang tinggal di Panti Jompo Beruang. Dengan keluarga Brown di sampingnya, petualangan mendebarkan terjadi ketika sebuah misteri membawa mereka ke dalam perjalanan yang tak terduga.', 'movies', '2025', 106, 'Dougal Wilson', 'https://youtu.be/NTvudSGfHRI', 'PG', 1, 3, '2025-02-15 04:21:39', '2025-02-15 04:21:39'),
(12, 'FIREFIGHTERS', 'firefighters-2024', 'https://asset.tix.id/wp-content/uploads/2025/02/4db20079-820f-49fc-8970-02fbd6c904e3-600x885.webp', 'Demi menyelamatkan nyawa dan bertahan hidup, tim pemadam kebakaran menghadapi tugas setiap hari seperti itu adalah misi terakhir mereka. Meskipun kondisinya sulit, mereka bersatu dengan satu tujuan: memadamkan api dan menyelamatkan semua orang. Suatu hari, panggilan darurat mendesak masuk—ada kebakaran di Hongje-dong. Tim segera menyaksikan betapa gentingnya situasi di sana…', 'movies', '2024', 106, 'Kwak Kyung-taek', 'https://youtu.be/DcNfAAwpyfM', 'PG-13', 1, 3, '2025-02-15 04:23:42', '2025-02-15 04:23:42'),
(13, 'KEAJAIBAN AIR MATA WANITA', 'keajaiban-air-mata-wanita-2024', 'https://asset.tix.id/wp-content/uploads/2025/01/157ff3d1-caec-49d9-8766-13edc9e62ec5-600x885.webp', 'Film berdasarkan kisah nyata dari buku Best Seller “Rahasia Magnet Rezeki” ini, mengisahkan perjalanan hidup Kiki, seorang wanita sukses yang berusaha bangkit menghadapi keterpurukan setelah kematian tiba-tiba suaminya, Ronald. Terjebak dalam ketidakpastian dan keputusasaan, kehidupan Kiki yang dulu mapan dan indah berubah menjadi serangkaian cobaan. Kiki mengalami kesulitan keuangan, kehilangan pekerjaan setelah berhijab, dan konflik keluarga yang mengancam kehilangan anak satu-satunya, Bunga. Pertemuan Kiki dengan sahabatnya, Rahma yang memperkenalkan ilmu Magnet Rezeki membawa perubahan besar dalam hidupnya. Dengan kesadaran mendalam bahwa setiap pikiran adalah doa, Kiki berjuang mengamalkan ilmu Magnet Rezeki yang membuat hidupnya berubah penuh keajaiban. Kiki akhirnya berhasil menyelesaikan semua masalahnya. Puncaknya ia mendapatkan suami baru, Bagas, yang membuat hidupnya lebih baik dan bahagia. Dengan sentuhan drama mendalam dan humor segar, film ini menggambarkan kekuatan kesabaran, keikhlasan, dan kemampuan memaknai musibah sebagai rezeki yang disikapi dengan rasa syukur untuk mendatangkan keajaiban. Dengan cerita penuh inspirasi, film ini juga menyajikan pesan bahwa keajaiban itu ada bagi mereka yang percaya. Dan ketenangan akan melahirkan keajaiban', 'movies', '2024', 110, 'Indra Gunawan', 'https://youtu.be/pLLUYgQEfPo', 'PG-13', 1, 3, '2025-02-15 04:24:55', '2025-02-15 04:24:55'),
(14, 'YOU ARE THE APPLE OF MY EYE', 'you-are-the-apple-of-my-eye-2024', 'https://asset.tix.id/wp-content/uploads/2025/02/25YAAM.jpg', 'Sekelompok teman dekat di sebuah sekolah swasta semuanya tergila-gila pada murid cantik, Sun-ah (Kim Da-hyun). Satu-satunya anggota kelompok yang mengaku tidak suka adalah Jin-woo (Jung Jin-young), tetapi akhirnya ia juga mencintainya.', 'movies', '2024', 102, 'Giddens Ko', 'https://web3.21cineplex.com/movie-trailer/25YAAM.mp4', 'R', 1, 3, '2025-02-15 04:26:57', '2025-02-15 04:26:57'),
(15, 'TWINKLING WATERMELON', 'twinkling-watermelon-2023', 'https://upload.wikimedia.org/wikipedia/id/thumb/5/52/Twinkling_Watermelon.jpg/250px-Twinkling_Watermelon.jpg', 'Twinkling Watermelon mengisahkan tentang Eun Gyeol, seorang siswa sekolah menengah yang tampaknya biasa-biasa saja, menjalani kehidupan ganda secara rahasia. Pada siang hari, dia menjadi murid teladan, namun pada malam hari, dia menjadi gitaris untuk sebuah band di Hongdae. Tanpa diduga, dia melakukan perjalanan kembali ke masa lalu dan bertemu Yi Chan. Bersama-sama, mereka membentuk band bernama Watermelon Sugar dan menjalin ikatan yang mendalam.', 'series', '2023', 65, 'Studio Dragon', 'https://youtu.be/KbWi3VW6QuM', 'R', 16, 3, '2025-02-18 05:34:13', '2025-02-18 05:34:13'),
(16, 'SOLO LEVELING', 'solo-leveling-2024', 'https://images.justwatch.com/poster/310154566/s718/season-1.jpg', '10 tahun yang lalu, sebuah gerbang yang menghubungkan dunia manusia dengan alam yang berisi sihir dan monster tiba-tiba muncul dan disebut dengan nama \"Gate\". Untuk mengalahkan monster-monster ganas ini, manusia biasa yang menerima kekuatan super dikenal sebagai \"Hunters\" akan masuk ke Gerbang dan mengalahkannya. Sung Jin Woo adalah salah satu dari Hunters yang dikenal sebegai \"Terlemah\" dikarenakan kemampuannya yang hampir tidak ada. Tetapi dia tetap bersusah payah masuk ke Gate untuk membayar tagihan rumah sakit ibunya.\r\nKehidupan menyedihkan Sung Jin Woo berubah setelah dia menjadi satu-satunya yang selamat dari misi dan membuka matanya tiga hari kemudian dengan sebuah layar misterius muncul di depan wajahnya. \"Daftar Misi\" menuntut Jin Woo untuk menyelesaikan program pelatihan intens dan tidak realistik dengan hukuman jika tidak dilakukan. Dengan enggan dia melakukannya tanpa menyadari bahwa sebentar lagi dia akan menjadi salah satu Hunter paling menakutkan di dunia.', 'anime', '2024', 24, 'Jang Sung-rak (DUBU)', 'https://youtu.be/YvGSK8mIlt8', 'R', 12, 3, '2025-03-07 07:07:54', '2025-03-09 07:30:23'),
(17, 'SOLO LEVELING: REAWAKENING', 'solo-leveling-reawakening-2025', 'https://m.media-amazon.com/images/M/MV5BY2ZlZWM2M2UtYzAyNC00MTlmLThlMzUtNWIwMjZlODIwYzczXkEyXkFqcGc@._V1_.jpg', 'Berlatar di sebuah lorong yang menghubungkan dimensi lain dan dunia ini, \"Gate\",\r\nsekaligus dunia tempat orang-orang dengan kemampuan khusus bernama \"Hunter\" hidup.\r\nHunter berperingkat rendah yang dikenal \"Senjata Terlemah Umat Manusia\",\r\nSung Jinwoo tiba-tiba saja mendapatkan kekuatan untuk \"meningkatkan level\" yang hanya dimilikinya.', 'anime', '2025', 24, 'Jang Sung-rak (DUBU)', 'https://youtu.be/byJ7pxxhaDY', 'R', 13, 12, '2025-03-07 07:17:44', '2025-03-09 23:24:15'),
(18, 'SAKAMOTO DAYS', 'sakamoto-days-2025', 'https://m.media-amazon.com/images/M/MV5BM2MwZDRmYWItNGIzZC00ZWExLWEwNWYtNmM1ZmU3OTA3NmY4XkEyXkFqcGc@._V1_.jpg', 'Nama Tarou Sakamoto pernah menebarkan rasa takut pada setiap penjahat. Tidak ada pembunuh bayaran profesional lain yang menandingi kehebatannya, dan sesama pembunuh memujanya. Namun, Sakamoto jatuh cinta. Dalam lima tahun yang singkat, ia menikah, menjadi seorang ayah, menambah berat badan, dan menukar senjatanya dengan celemek saat ia menjadi pemilik sebuah toko serba ada yang sederhana.\r\n\r\nMeskipun Sakamoto sudah benar-benar pensiun, ia merasa kehidupan kriminalnya yang lama sulit untuk dilepaskan. Mantan rekannya, Shin Asakura, muncul kembali dan memutuskan untuk tinggal bersama keluarga Sakamoto di bawah aturan ketat mereka yang melarang pembunuhan. Lebih buruk lagi, hadiah besar diberikan untuk kepala Sakamoto. Banyak pembunuh sekarang mengejarnya—tetapi mereka akan mendapatkan kejutan. Sakamoto belum kehilangan keunggulannya, dan tidak peduli trik apa pun yang dilakukan musuh-musuhnya, ia akan melawan setiap musuh untuk melindungi keluarganya yang tersayang.', 'anime', '2025', 24, 'Yuto Suzuki', 'https://youtu.be/9TbmxbckSjE?si=bCC16HS9P5RF58it', 'PG-13', 11, 12, '2025-03-07 07:23:14', '2025-03-18 01:17:52'),
(19, 'INTERSTELLAR', 'interstellar-2014', 'https://asset.tix.id/wp-content/uploads/2025/02/d553ba26-347c-4897-9dbe-42fc7d50989d-600x885.webp', 'Menyambut ulang tahun ke-10, Interstellar tayang kembali di IMAX. Saat waktu di Bumi akan berakhir, sebuah tim penjelajah melakukan sebuah misi paling penting dalam sejarah manusia. Perjalanan antar galaksi ditempuh oleh Cooper (Matthew McConaughey) dan Brand (Anne Hathaway) untuk mengetahui apakah umat manusia masih memiliki masa depan.', 'movies', '2014', 169, 'Jonathan Nolan', 'https://web3.21cineplex.com/movie-trailer/25INX2.mp4', 'PG-13', 1, 2, '2025-03-17 13:46:01', '2025-03-17 13:46:01'),
(21, 'RUOK 2vs4 FULL HEADSHOT', 'ruok-2vs4-full-headshot-2021', 'https://i.pinimg.com/736x/12/6b/e2/126be204ecf68a438a7c7e3a8302c6f2.jpg', 'Sang ruok bersama BNL membantai squad kroco (letda hypler, budi02, Wawan KMS, Frontal Gaymink) dengan sangat sadis dan mengerikan. Sang Frontal Gaymink sampai kena mental karena letda jadi beban tim dan di hitamkan oleh RUOK.', 'movies', '2021', 999, 'RUOK', 'https://youtu.be/rPzqSHlVdEM?si=Cz5xvIkmswFh_1XE', 'NC-17', 1, 2, '2025-03-20 04:04:57', '2025-03-20 04:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Drama', 'drama', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(2, 'Romantis', 'romantis', '2025-02-12 07:12:42', '2025-03-08 10:27:41'),
(3, 'Fantasi', 'fantasi', '2025-02-12 07:12:42', '2025-03-08 10:21:44'),
(4, 'Horor', 'horor', '2025-02-12 07:12:42', '2025-03-08 10:21:49'),
(5, 'Aksi', 'aksi', '2025-02-12 07:12:42', '2025-03-08 10:21:55'),
(6, 'Fiksi Ilmiah', 'fiksi-ilmiah', '2025-02-12 07:12:42', '2025-03-18 03:31:26'),
(7, 'Petualangan', 'petualangan', '2025-02-12 07:12:42', '2025-03-08 10:22:03'),
(8, 'Thriller', 'thriller', '2025-02-12 07:12:42', '2025-03-08 10:23:37'),
(9, 'Kriminal', 'kriminal', '2025-02-12 07:12:42', '2025-03-08 10:22:45'),
(10, 'Komedi', 'komedi', '2025-02-12 07:12:42', '2025-03-08 10:22:49'),
(12, 'Misteri', 'misteri', '2025-03-08 10:21:34', '2025-03-08 10:21:34'),
(13, 'Sejarah', 'sejarah', '2025-03-08 10:24:10', '2025-03-08 10:24:10'),
(14, 'Psikologis', 'psikologis', '2025-03-08 10:24:57', '2025-03-08 10:24:57'),
(15, 'Pahlawan', 'pahlawan', '2025-03-08 10:27:57', '2025-03-08 10:27:57'),
(16, 'Musik', 'musik', '2025-03-08 10:29:31', '2025-03-08 10:29:31'),
(17, 'Olahraga', 'olahraga', '2025-03-08 10:29:38', '2025-03-08 10:29:38'),
(18, 'Bertahan Hidup', 'bertahan-hidup', '2025-03-08 10:37:04', '2025-03-08 10:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `genre_relations`
--

CREATE TABLE `genre_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_film` bigint(20) UNSIGNED NOT NULL,
  `id_genre` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre_relations`
--

INSERT INTO `genre_relations` (`id`, `id_film`, `id_genre`, `created_at`, `updated_at`) VALUES
(7, 1, 5, '2025-02-19 01:06:27', '2025-02-19 01:06:27'),
(14, 14, 1, '2025-03-01 14:14:37', '2025-03-01 14:14:37'),
(15, 14, 2, '2025-03-01 14:14:37', '2025-03-01 14:14:37'),
(16, 14, 10, '2025-03-01 14:14:37', '2025-03-01 14:14:37'),
(17, 4, 1, '2025-03-06 10:44:26', '2025-03-06 10:44:26'),
(18, 4, 2, '2025-03-06 10:44:26', '2025-03-06 10:44:26'),
(20, 3, 1, NULL, NULL),
(21, 3, 2, NULL, NULL),
(22, 4, 9, NULL, NULL),
(23, 1, 7, NULL, NULL),
(24, 1, 15, NULL, NULL),
(25, 15, 1, '2025-03-08 10:29:03', '2025-03-08 10:29:03'),
(26, 15, 2, '2025-03-08 10:29:03', '2025-03-08 10:29:03'),
(27, 15, 16, NULL, NULL),
(28, 15, 3, NULL, NULL),
(29, 15, 10, NULL, NULL),
(30, 16, 5, '2025-03-08 10:37:55', '2025-03-08 10:37:55'),
(31, 16, 18, '2025-03-08 10:37:55', '2025-03-08 10:37:55'),
(32, 16, 3, '2025-03-08 10:37:55', '2025-03-08 10:37:55'),
(33, 16, 7, '2025-03-08 10:37:55', '2025-03-08 10:37:55'),
(35, 17, 5, '2025-03-09 23:23:42', '2025-03-09 23:23:42'),
(36, 17, 18, '2025-03-09 23:23:42', '2025-03-09 23:23:42'),
(37, 17, 3, NULL, NULL),
(38, 17, 7, NULL, NULL),
(39, 1, 6, NULL, NULL),
(40, 19, 1, '2025-03-18 03:32:06', '2025-03-18 03:32:06'),
(41, 19, 6, '2025-03-18 03:32:06', '2025-03-18 03:32:06'),
(42, 19, 12, '2025-03-18 03:32:06', '2025-03-18 03:32:06'),
(43, 19, 7, '2025-03-18 03:32:06', '2025-03-18 03:32:06'),
(46, 21, 4, '2025-03-20 04:05:20', '2025-03-20 04:05:20'),
(47, 21, 9, '2025-03-20 04:05:20', '2025-03-20 04:05:20'),
(48, 21, 12, '2025-03-20 04:05:20', '2025-03-20 04:05:20'),
(49, 21, 14, '2025-03-20 04:05:20', '2025-03-20 04:05:20'),
(50, 21, 8, '2025-03-20 04:05:20', '2025-03-20 04:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_18_040532_create_films_table', 1),
(5, '2025_01_18_040832_create_genres_table', 1),
(6, '2025_01_18_040856_create_genre_relations_table', 1),
(7, '2025_01_18_040909_create_castings_table', 1),
(8, '2025_01_18_040916_create_comments_table', 1),
(9, '2025_02_06_081628_create_banners_table', 1),
(10, '2025_02_11_133754_create_role_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`id`, `model_type`, `model_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`id`, `model_type`, `model_id`, `role_id`, `created_at`, `updated_at`) VALUES
(6, 'App\\Models\\User', 1, 1, NULL, NULL),
(10, 'App\\Models\\User', 10, 1, NULL, NULL),
(12, 'App\\Models\\User', 2, 2, NULL, NULL),
(15, 'App\\Models\\User', 13, 1, NULL, NULL),
(18, 'App\\Models\\User', 14, 1, NULL, NULL),
(22, 'App\\Models\\User', 18, 1, NULL, NULL),
(25, 'App\\Models\\User', 22, 1, NULL, NULL),
(26, 'App\\Models\\User', 23, 1, NULL, NULL),
(27, 'App\\Models\\User', 21, 1, NULL, NULL),
(28, 'App\\Models\\User', 24, 1, NULL, NULL),
(31, 'App\\Models\\User', 20, 1, NULL, NULL),
(35, 'App\\Models\\User', 33, 2, NULL, NULL),
(36, 'App\\Models\\User', 12, 3, NULL, NULL),
(37, 'App\\Models\\User', 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('akmaloktavian111@gmail.com', '$2y$12$dHyewLy2HJZ55XXiKt1YQORoPkbBQ/CtP7E9loby3Rgq5/ElLKlky', '2025-03-18 04:36:42'),
('rasy171106@gmail.com', '$2y$12$yWHli5upmGzqaZS4LHt9lOxVnTn2RnUuD4aEidNQcBz4Rc/ljSb6K', '2025-03-09 19:45:47'),
('test@example.com', '$2y$12$7GmgGQXUNM5Gm6KqdJX1ROvuU7oWxeXF67I/YqvVQ3ZGqf6vJpi2.', '2025-02-12 19:41:20'),
('testtt@example.com', '$2y$12$4My/idNkQT6hYcwO2MSlCuTFgELn9UplkzesXS4ZEA7zh2KCzo2t2', '2025-03-06 17:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'crud admin', 'web', '2025-02-14 12:26:48', '2025-02-14 12:26:48'),
(2, 'crud author', 'web', '2025-02-18 02:37:20', '2025-02-18 02:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(2, 'admin', 'web', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(3, 'author', 'web', '2025-02-12 07:12:42', '2025-02-12 07:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, NULL),
(2, 3, 2, NULL, NULL),
(3, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5RTQ9g2Bg77AaJedLhOj8vv0TQDmQabSSpWVroqp', 2, '162.158.163.248', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYkVlbjFQbHROWmNNeVhFejFydG5YWFE5eG9BOGEyMEJxVER2ejBZRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9yZXZpZXctZmlsbS5ha21hbGF6YWh3YS5teS5pZC9hZG1pbi91c2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1742457814),
('UsbbyhAhH7iHOXs6M3ay1hGFKlub5k0Nn5vbc6jq', NULL, '172.70.208.155', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMndsVlJLR0JXN2pka1F6aWxvTVdmYkF1SFk2ZTA0dXlFelpWOVl4aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzI6Imh0dHA6Ly9yZXZpZXctZmlsbS5ha21hbGF6YWh3YS5teS5pZC9kZXRhaWwvcnVvay0ydnM0LWZ1bGwtaGVhZHNob3QtMjAyMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742454989);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '', '2025-02-12 07:12:42', '$2y$12$B6D1ErONZfdMHWhn4O6ebeR0qBcnwOsDuAS8VA/fRyaD8FSP3kh6i', 'cRdwYxDk1h', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(2, 'Admin Kece', 'lostsaga1929@gmail.com', 'avatars/1741283424.jpeg', '2025-03-09 21:40:12', '$2y$12$sXBt.FoQb4KO0/Q5vIq9MO.oVvbRZqeFXFvFVTJUT1UyrFKYKRXdm', 'mrRdLA69V4OzgR2hYKVPtglYFzpLTa1TauSXGXBnySSgAe7bUYkp5QHU980O', '2025-02-12 07:12:42', '2025-03-09 21:40:12'),
(3, 'Author Ganteng', 'author@g.co', '', NULL, '$2y$12$FV.0Q2g40yBSo0EovzbK1eOEij3Aicg5gPAIRXT5/AtCSGFCv1/g6', 'al0pDm5qv8OijqO0llfC7IuTJN7X3OumPXeTmHJim6TBsJJtvnqEpQAqp7KG', '2025-02-12 07:12:42', '2025-03-20 08:03:34'),
(10, 'alex', 'alex@gmail.com', '', NULL, '$2y$12$VrDP1BqBTflBupDx7yu2fOoDUPXYOnFYnVFA/XIW0oCIzVMJtuD.W', NULL, '2025-02-18 17:56:34', '2025-02-18 17:56:34'),
(12, 'Author Baru', 'author2@example.com', NULL, NULL, '$2y$12$wjLnE7wnflqwQcslTR8AiuHQOw9mQTOIwnpjsRONbX3Fx8GIesgPe', NULL, '2025-03-07 07:12:58', '2025-03-07 07:12:58'),
(13, 'rafanaufal', 'rafan7750@gmail.com', NULL, NULL, '$2y$12$fwxmLua.TyPjqVJqMJzHFO2L.o5HW1WECim.QkYPxN4ucZT2QeTB.', NULL, '2025-03-07 10:53:04', '2025-03-07 10:53:04'),
(14, 'rasy', 'rasy171106@gmail.com', NULL, NULL, '$2y$12$nObYgkL8kKI4JV2D2NOq.OsFmRMX1CokkxE0GW6tNKMF//6DtkNSe', NULL, '2025-03-09 19:45:23', '2025-03-09 19:45:23'),
(18, 'pito', 'savito361@gmail.com', NULL, NULL, '$2y$12$NH0NHFTDxcTURdj7KWm2oO9/JNMlk77F85yZPp4bOvpDjWlPyCaca', NULL, '2025-03-11 18:28:34', '2025-03-11 18:28:34'),
(20, 'Solihin', 'akmalxyz211@gmail.com', NULL, '2025-03-11 18:49:19', '$2y$12$WjlYlsZIQxYS94zmzRX74.w/dP7FYe0Lo06g0GzVMXbqqubjvcUQS', NULL, '2025-03-11 18:47:18', '2025-03-16 18:16:18'),
(24, 'luqman', 'luqmanasyari684@gmail.com', NULL, '2025-03-15 17:14:56', '$2y$12$I1wZgsHBnaHQEcedU1CPqeBvfo0RYKlLenZtg1lpQzAuZsp87YCju', NULL, '2025-03-15 16:35:44', '2025-03-15 17:14:56'),
(33, 'Admin Demo', 'admin@g.co', NULL, NULL, '$2y$12$63sh5d7lsVDa/ewklXflqOP8hZgiuVIoS.CmVKzhNl71oetfFsVQO', NULL, '2025-03-20 07:56:59', '2025-03-20 07:56:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `castings`
--
ALTER TABLE `castings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `castings_id_film_foreign` (`id_film`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_id_user_foreign` (`id_user`),
  ADD KEY `comments_id_film_foreign` (`id_film`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `films_id_users_foreign` (`id_users`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre_relations`
--
ALTER TABLE `genre_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_relations_id_film_foreign` (`id_film`),
  ADD KEY `genre_relations_id_genre_foreign` (`id_genre`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `model_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `model_has_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `castings`
--
ALTER TABLE `castings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `genre_relations`
--
ALTER TABLE `genre_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `castings`
--
ALTER TABLE `castings`
  ADD CONSTRAINT `castings_id_film_foreign` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_id_film_foreign` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `genre_relations`
--
ALTER TABLE `genre_relations`
  ADD CONSTRAINT `genre_relations_id_film_foreign` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `genre_relations_id_genre_foreign` FOREIGN KEY (`id_genre`) REFERENCES `genres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
