-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2025 at 01:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `review_film`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:3:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";}s:11:\"permissions\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"crud admin\";s:1:\"c\";s:3:\"web\";}}s:5:\"roles\";a:0:{}}', 1739647625);

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
(5, 'Sidewinder', 'Giancarlo Esposito', 1, '2025-02-14 17:32:05', '2025-02-14 17:32:05');

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
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing\r\n                                        elit. Accusamus suscipit ad eligendi quaerat numquam deleniti, tempora fuga\r\n                                        veritatis dolorum architecto maiores, consequatur debitis deserunt laborum\r\n                                        totam iusto corrupti, quae soluta. Accusantium molestias ducimus illum\r\n                                        exercitationem quos eum eaque doloribus ipsum nam asperiores distinctio\r\n                                        aliquid ullam est, accusamus natus, qui illo.', '3', 4, 1, '2025-02-14 12:52:31', '2025-02-14 12:52:31'),
(6, 'test', '5', 2, 1, '2025-02-14 14:45:06', '2025-02-14 14:45:06'),
(7, 'mantap', '2', 2, 1, '2025-02-14 14:45:24', '2025-02-14 14:45:24'),
(8, 'keren wak', '4', 4, 5, '2025-02-14 21:59:49', '2025-02-14 21:59:49');

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
(4, '(500) DAYS OF SUMMER', '500-days-of-summer-2009', 'https://upload.wikimedia.org/wikipedia/id/thumb/d/d1/Five_hundred_days_of_summer.jpg/220px-Five_hundred_days_of_summer.jpg', '500 Days of Summer ((500) Days of Summer) (2009) Setelah kali ini sepertinya Summer telah meninggalkan hidupnya untuk selamanya, Tom Hansen mengenang kembali lebih dari satu tahun saat ia mengenal Summer Finn. Bagi Tom, itu adalah cinta pada pandangan pertama saat ia masuk ke perusahaan kartu ucapan tempat ia bekerja, ia adalah asisten administrasi yang baru. Meskipun Summer tidak percaya pada hubungan atau pacar - menurutnya, kehidupan nyata pada akhirnya akan selalu menghalangi - Tom dan Summer menjadi lebih dari sekadar teman. Melalui cobaan dan kesengsaraan hubungan Tom dan Summer, Tom selalu dapat mengandalkan nasihat dari kedua sahabatnya, McKenzie dan Paul. Namun, adik perempuan Tom yang masih remaja, Rachel, adalah suaranya yang masuk akal. Setelah semua dikatakan dan dilakukan, Tom adalah orang yang pada akhirnya harus membuat pilihan untuk mendengarkan atau tidak.', 'movies', '2009', 95, 'Dune Entertainment', 'https://youtu.be/PsD0NpFSADM?si=8_hZUyExDgYVjEZO', 'PG-13', 1, 3, '2025-02-13 00:58:45', '2025-02-13 00:58:45'),
(5, 'ATTACK ON TITAN: THE LAST ATTACK', 'attack-on-titan-the-last-attack-2025', 'https://asset.tix.id/wp-content/uploads/2025/02/2137265e-0b97-4f08-87dc-19e050200a4b-600x885.webp', 'Ini adalah \"Serangan\" terakhir!\r\nAttack on Titan berkisah tentang pertempuran tanpa akhir antara manusia dan Titan di dunia yang dipisahkan oleh tembok. Seperti komiknya, musim pertama anime TV ini menjadi hit di seluruh dunia, menceritakan kisah yang berlangsung selama 10 tahun dan mencapai akhir pada Musim Gugur 2023. Bagian 1 dan 2 dari Final Season telah direkonstruksi sebagai rilis teatrikal pada Musim Gugur 2024. Di bawah arahan sutradara Yuuichiro Hayashi, potongan asli telah disempurnakan, sekarang dengan suara 5.1ch dan durasi tayang 145 menit. Dengan meningkatkan kualitas lebih tinggi dari siaran TV \"kualitas film\" aslinya, ia telah berevolusi menjadi gambar bergerak yang megah dan sesuai standard layar lebar. Ini adalah puncak dari \"Attack on Titan,\" sebuah karya yang telah dicurahkan oleh seluruh staf dan pemeran dengan sepenuh hati dan jiwa mereka. \"The Ultimate conclusion Arc\" yang tidak ingin kamu lewatkan sedetik pun!', 'anime', '2025', 144, 'Hajime Isayama', 'https://youtu.be/exSPi2EC7Rs', 'PG-18', 1, 2, '2025-02-14 15:13:52', '2025-02-14 15:13:52'),
(6, 'PERAYAAN MATI RASA', 'perayaan-mati-rasa-2025', 'https://asset.tix.id/wp-content/uploads/2025/01/893f8bce-0d65-499c-a892-d0698cd3a651.webp', 'Sebagai seorang anak pertama, IAN (Iqbaal Ramadhan) berjuang meraih mimpinya bersama para sahabatnya dan berusaha keras memenuhi semua ekspektasi yang ia bangun hingga membuatnya jauh dari keluarga. Namun, ketika sebuah peristiwa besar membuat Ian kehilangan orang tuanya secara tiba-tiba, Ian berusaha selalu kuat dan mengubur semua perasaannya hingga ia mati rasa.', 'movies', '2025', 125, 'Umay Shahab', 'https://youtu.be/i8XHPvkg9nQ', 'PG-13', 1, 2, '2025-02-15 04:10:07', '2025-02-15 04:10:07'),
(7, '1 KAKAK 7 PONAKAN', '1-kakak-7-ponakan-2025', 'https://asset.tix.id/wp-content/uploads/2025/01/52fa8458-8ba0-44c3-8e4a-6aa27e6840e7-600x885.webp', 'Setelah kematian mendadak kakak-kakaknya, Hendarmoko (Chicco Kurniawan) seorang arsitek muda yang sedang berjuang, tiba-tiba menjadi orangtua tunggal bagi keponakan-keponakannya. Ketika kesempatan untuk kehidupan yang lebih baik muncul, dia harus memilih antara kehidupan cintanya, karier atau keponakan-keponakannya.', 'movies', '2025', 131, 'Yandy Laurens', 'https://web3.21cineplex.com/movie-trailer/151K7P.mp4', 'PG-13', 1, 2, '2025-02-15 04:11:29', '2025-02-15 04:11:29'),
(8, 'NOSFERATU', 'nosferatu-2025', 'https://asset.tix.id/wp-content/uploads/2025/01/977cc9a9-31ce-45a4-a6c6-479d2cb6a32b-600x885.webp', 'Obsesi antara Ellen Hutter (Lily-Rose Depp) dan Count Orlok (Bill Skarsgard), vampir mengerikan yang tergila-gila padanya. Kisahnya membuat teror dan kengerian yang tak terkira akibatnya.', 'movies', '2025', 130, 'Robbert Eggers', 'https://web3.21cineplex.com/movie-trailer/25NOSU.mp4', 'PG-13', 1, 2, '2025-02-15 04:13:10', '2025-02-15 04:13:10'),
(9, 'BRIDGET JONES: MAD ABOUT THE BOY', 'bridget-jones-mad-about-the-boy-2025', 'https://asset.tix.id/wp-content/uploads/2025/02/eafc21b377b2402a86de0452f9ece52f-600x885.jpg', 'Bridget Jones menjalani kehidupan sebagai janda dan ibu tunggal dengan bantuan keluarganya, teman-temannya, dan mantan kekasihnya, Daniel. Kembali bekerja dan di sebuah aplikasi, dia dikejar oleh seorang pria yang lebih muda dan mungkin - hanya mungkin - guru sains anaknya.', 'movies', '2025', 124, 'Helen Fielding', 'https://youtu.be/lpDFKbPYmQ8', 'PG-13', 1, 2, '2025-02-15 04:15:18', '2025-02-15 04:15:18'),
(10, 'SECRET: UNTOLD MELODY', 'secret-untold-melody-2025', 'https://asset.tix.id/wp-content/uploads/2025/01/67b5af3c-6a48-4e89-aba2-e808ae66fd44-600x885.webp', '“Ada berbagai emosi yang hanya kurasakan saat bermain piano. Aku merasakan itu juga saat bertemu denganmu.”\r\nYu-jun, seorang pianis yang belajar di luar negeri, datang ke Korea sebagai siswa pertukaran untuk menerima perawatan pada pergelangan tangannya. Di hari pertamanya sekolah, Yu-jun bertemu Jung-a di ruang latihan, tertarik oleh melodi piano yang misterius. Keduanya, yang dipertemukan takdir, menghabiskan waktu bersama dan menjadi lebih dekat. Namun, pertemuannya dengan Jung-a, yang bahkan tidak memberinya informasi kontaknya, terus berjalan serba salah, dan pengakuan tiba-tiba In-hee, yang mengira mata Yu-jun selalu tertuju padanya, sangat menyakiti Jung-a. Setelah hari itu, Yu-jun mencari keberadaan Jung-a, dan menemukan rahasianya…\r\n“Bagian yang menghubungkan waktu kita, ‘Rahasia’, dan begitulah cinta dimulai.”', 'movies', '2025', 103, 'Jay Chou', 'https://youtu.be/GAfRxWfguBI', 'PG-13', 1, 2, '2025-02-15 04:19:40', '2025-02-15 04:19:40'),
(11, 'PADDINGTON IN PERU', 'paddington-in-peru-2025', 'https://asset.tix.id/wp-content/uploads/2025/01/0dc9e7fdd3234f5bade9ef8c18e59ab2-600x885.jpg', 'Paddington kembali ke Peru untuk mengunjungi Bibi Lucy tercintanya, yang sekarang tinggal di Panti Jompo Beruang. Dengan keluarga Brown di sampingnya, petualangan mendebarkan terjadi ketika sebuah misteri membawa mereka ke dalam perjalanan yang tak terduga.', 'movies', '2025', 106, 'Dougal Wilson', 'https://youtu.be/NTvudSGfHRI', 'PG-13', 1, 2, '2025-02-15 04:21:39', '2025-02-15 04:21:39'),
(12, 'FIREFIGHTERS', 'firefighters-2024', 'https://asset.tix.id/wp-content/uploads/2025/02/4db20079-820f-49fc-8970-02fbd6c904e3-600x885.webp', 'Demi menyelamatkan nyawa dan bertahan hidup, tim pemadam kebakaran menghadapi tugas setiap hari seperti itu adalah misi terakhir mereka. Meskipun kondisinya sulit, mereka bersatu dengan satu tujuan: memadamkan api dan menyelamatkan semua orang. Suatu hari, panggilan darurat mendesak masuk—ada kebakaran di Hongje-dong. Tim segera menyaksikan betapa gentingnya situasi di sana…', 'movies', '2024', 106, 'Kwak Kyung-taek', 'https://youtu.be/DcNfAAwpyfM', 'PG-13', 1, 2, '2025-02-15 04:23:42', '2025-02-15 04:23:42'),
(13, 'KEAJAIBAN AIR MATA WANITA', 'keajaiban-air-mata-wanita-2024', 'https://asset.tix.id/wp-content/uploads/2025/01/157ff3d1-caec-49d9-8766-13edc9e62ec5-600x885.webp', 'Film berdasarkan kisah nyata dari buku Best Seller “Rahasia Magnet Rezeki” ini, mengisahkan perjalanan hidup Kiki, seorang wanita sukses yang berusaha bangkit menghadapi keterpurukan setelah kematian tiba-tiba suaminya, Ronald. Terjebak dalam ketidakpastian dan keputusasaan, kehidupan Kiki yang dulu mapan dan indah berubah menjadi serangkaian cobaan. Kiki mengalami kesulitan keuangan, kehilangan pekerjaan setelah berhijab, dan konflik keluarga yang mengancam kehilangan anak satu-satunya, Bunga. Pertemuan Kiki dengan sahabatnya, Rahma yang memperkenalkan ilmu Magnet Rezeki membawa perubahan besar dalam hidupnya. Dengan kesadaran mendalam bahwa setiap pikiran adalah doa, Kiki berjuang mengamalkan ilmu Magnet Rezeki yang membuat hidupnya berubah penuh keajaiban. Kiki akhirnya berhasil menyelesaikan semua masalahnya. Puncaknya ia mendapatkan suami baru, Bagas, yang membuat hidupnya lebih baik dan bahagia. Dengan sentuhan drama mendalam dan humor segar, film ini menggambarkan kekuatan kesabaran, keikhlasan, dan kemampuan memaknai musibah sebagai rezeki yang disikapi dengan rasa syukur untuk mendatangkan keajaiban. Dengan cerita penuh inspirasi, film ini juga menyajikan pesan bahwa keajaiban itu ada bagi mereka yang percaya. Dan ketenangan akan melahirkan keajaiban', 'movies', '2024', 110, 'Indra Gunawan', 'https://youtu.be/pLLUYgQEfPo', 'PG-13', 1, 2, '2025-02-15 04:24:55', '2025-02-15 04:24:55'),
(14, 'YOU ARE THE APPLE OF MY EYE', 'you-are-the-apple-of-my-eye-2024', 'https://asset.tix.id/wp-content/uploads/2025/02/25YAAM.jpg', 'Sekelompok teman dekat di sebuah sekolah swasta semuanya tergila-gila pada murid cantik, Sun-ah (Kim Da-hyun). Satu-satunya anggota kelompok yang mengaku tidak suka adalah Jin-woo (Jung Jin-young), tetapi akhirnya ia juga mencintainya.', 'movies', '2024', 102, 'Giddens Ko', 'https://web3.21cineplex.com/movie-trailer/25YAAM.mp4', 'PG-13', 1, 2, '2025-02-15 04:26:57', '2025-02-15 04:26:57');

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
(2, 'Romance', 'romance', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(3, 'Fantasy', 'fantasy', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(4, 'Horror', 'horror', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(5, 'Action', 'action', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(6, 'Sci-Fi', 'sci-fi', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(7, 'Adventure', 'adventure', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(8, 'Thriller', 'thriller', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(9, 'Crime', 'crime', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(10, 'Comedy', 'Comedy', '2025-02-12 07:12:42', '2025-02-12 07:12:42');

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
(1, 1, 5, '2025-02-12 15:56:06', '2025-02-12 15:56:06'),
(2, 1, 3, '2025-02-12 15:56:06', '2025-02-12 15:56:06'),
(3, 1, 6, '2025-02-14 12:09:48', '2025-02-14 12:09:48');

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
(1, 'App\\Models\\User', 2, 2, NULL, NULL),
(2, 'App\\Models\\User', 3, 3, NULL, NULL),
(3, 'App\\Models\\User', 4, 1, NULL, NULL);

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
('test@example.com', '$2y$12$7GmgGQXUNM5Gm6KqdJX1ROvuU7oWxeXF67I/YqvVQ3ZGqf6vJpi2.', '2025-02-12 19:41:20');

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
(1, 'crud admin', 'web', '2025-02-14 12:26:48', '2025-02-14 12:26:48');

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
('pFQlg6pOVFjybsTxWPQ4EQo855lKLAAkf4taZwHI', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVmhndTJDWXUzOHNkTm9VU2h5Qk9Pa3B0a3dtWlZsMHBobFl0YTZ0OCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1739620226);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-02-12 07:12:42', '$2y$12$B6D1ErONZfdMHWhn4O6ebeR0qBcnwOsDuAS8VA/fRyaD8FSP3kh6i', 'cRdwYxDk1h', '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(2, 'Admin', 'admin@example.com', NULL, '$2y$12$j/xhcJN.5dB9q1iek5Jx2ODWpTiUuD9Tm3gZld2oyEkaX30ESg4M6', NULL, '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(3, 'Author Ganteng', 'author@example.com', NULL, '$2y$12$FV.0Q2g40yBSo0EovzbK1eOEij3Aicg5gPAIRXT5/AtCSGFCv1/g6', NULL, '2025-02-12 07:12:42', '2025-02-12 07:12:42'),
(4, 'User jago', 'user@example.com', NULL, '$2y$12$iHOauJAAZ/W5lAoqcNGiaOIhae3lxsmR7sgMUlIzf8gW28c.OxBse', NULL, '2025-02-12 07:12:42', '2025-02-12 07:12:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `castings`
--
ALTER TABLE `castings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `genre_relations`
--
ALTER TABLE `genre_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `comments_id_film_foreign` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `comments_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

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
