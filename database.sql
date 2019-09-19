-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jul 2018 pada 11.11
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalcoba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_game`
--

CREATE TABLE `data_game` (
  `id` int(10) NOT NULL,
  `judul` text NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(30) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_game`
--

INSERT INTO `data_game` (`id`, `judul`, `keterangan`, `harga`, `id_barang`, `gambar`) VALUES
(1, 'PES 2018', 'Seperti bermain sepakbola di karpet yang mulus. Itulah yang kami rasakan setelah satu minggu bermain PES 2018: sebuah interpretasi tersendiri akan sepakbola, yang, terkadang, terasa lebih memuaskan ketimbang sepakbola di dunia nyata.\r\n', 75, 'pes2018', 'pes.jpg'),
(3, 'FIFA 2018', 'Menurut saya FIFA 18 lebih menonjolkan dirinya dari segi fitur permainan sedangkan PES lebih umum dimainkan oleh orang banyak karena gameplaynya yang stabil (sudah terbiasa). FIFA 18 akan lebih seru jika dimainkan secara online, namun tetap bisa juga dimainkan secara offline walaupun fiturnya tidak akan lengkap.', 50, 'fifa2018', 'fifa.jpg'),
(4, 'PUBG', 'PlayerUnknown\'s Battlegrounds (PUBG) is an online multiplayer battle royale game developed and published by PUBG Corporation, a subsidiary of publisher Bluehole. The game is based on previous mods that were created by Brendan \"PlayerUnknown\" Greene for other games using the film Battle Royale for inspiration, and expanded into a standalone game under Greene\'s creative direction.', 60, 'pubg', 'pubg.jpg'),
(6, 'Battlefield 1', 'In Battlefield 1, discover a world where mounted cavalries, tanks and biplanes collide, and war will never be the same. Check out new weapons, unique vehicles, a never-before-seen mode, and more.', 80, 'bf1', '5b1e80ab2972d.jpg'),
(8, 'Grand Theft Auto V', ' Grand Theft Auto V for PC also includes Grand Theft Auto Online, with support for 30 players and two spectators. Grand Theft Auto Online for PC will include all existing gameplay upgrades and Rockstar-created content released since the launch of Grand Theft Auto Online, including Heists and Adversary modes.', 95, 'gtav', '5b1e895d2f298.jpg'),
(12, 'Counter-Strike: Global Offensive', 'Today weâ€™re launching a preview of the all-new Panorama UI for CS:GO. This visual overhaul is the most substantial change to the look and feel of CS:GO since the game was released in 2012. From the Main Menu to the Scoreboard, the entire experience of interacting with the game has been updated.', 30, 'csgo', '5b2b791b21c05.jpg'),
(14, 'dsfds\'fd\'sfsdf', ' fsd\'af', 80, 'das\'sdf', '5b3f922d0266a.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id_user`, `fullname`, `username`, `email`, `password`, `gambar`) VALUES
(1, 'Admin', 'admin', 'admin@admin', 'admin', '5b2b3c7ca990f.jpg'),
(15, 'Banda Niera', 'BandaNiera', 'banda@niera.com', 'a', 'bandaniera.jpg'),
(25, 'Tes Saja', 'a', 'a@a', 'a', 'fpi.png'),
(58, 'Rahma Purncccama', 'assacc', 'purwantiibuku@xcgmail.com', 'a', '5aec4273a308f.jpeg'),
(60, 'Rahma Purnamxzxza', 'sdas', 'purwantsiibuku@gmail.com', 'a', '5aedc426023bb.jpg'),
(62, 'Rahma Andita Puxxxrnama', 'xxxx5', 'e@gmail.com', 'a', '5aedc4f7690ee.jpg'),
(63, 'Ega Mustofa', 'musofa1', 'ega@gmail.com', 'a', '5aedcab79294b.jpg'),
(65, 'Rahma Purnama', 'asw', 'cuzxczx@gcxmail.com', 'b', '5aeef35718df5.jpg'),
(69, 'Floklokal', 'batas senja', 'admin@batassenja.com', 'senja', '5af17f4eb3ead.jpg'),
(70, 'Indie Music', 'mocca', 'admin@mocca.com', 'mocca', '5b019c86531de.jpg'),
(75, 'Rahmca Purnasma', 'lilie', 'purwasantiibuku@gmail.com', 'a', '5b1e72e130997.jpg'),
(76, 'Rahma Purnama', 'liliexz', 'purwantiibukuxzcxz@gmail.com', 'x', '5b390ca2c8405.jpg'),
(77, 'pwl', 'pwl', 'pwl@pwl', 'a', '5b39114f026ae.jpg'),
(78, 'Rahma A\'ndita', 'rahmat1', 'purwantiibuaku@gmail.com', 'a', '5b3f89b16e785.jpg'),
(79, 'Banda Niera', 'aswqwe', 'purwasanadsatiibuku@gmail.com', 'a', '5b3f93c4ce5b7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komen`
--

CREATE TABLE `komen` (
  `nomer` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komen`
--

INSERT INTO `komen` (`nomer`, `nama`, `komentar`, `waktu`) VALUES
(35, 'Anonymous', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisee gravida sem sit amet molestie porttitor.', '02 May 2018 13:21'),
(47, 'Banda Niera', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisee gravida sem sit amet molestie porttitor.', '02 May 2018 14:41'),
(48, 'Anonymous', 'Alhamdulillah berhasil', '02 May 2018 14:59'),
(51, 'Banda Niera', 'Di mana ada musim yang menunggu?\r\nMeranggas merapuh, berganti dan luruh\r\nBayang yang berserah\r\nTâ€™rang di ujung sana', '02 May 2018 20:16'),
(53, 'Anonymous', 'Di mana ada musim yang menunggu? Meranggas merapuh, berganti dan luruh Bayang yang berserah Tâ€™rang di ujung sana', '05 May 2018 16:42'),
(55, 'Admin', 'Semesta bicara tanpa bersuara\r\nSemesta ia kadang buta aksara\r\nSepi itu indah, percayalah\r\nMembisu itu anugerah', '06 May 2018 18:25'),
(62, 'Floklokal', 'Hidupku tanpa cintamu \r\nBagai malam tanpa bintang \r\nCintaku tanpa sambutmu \r\nBagai panas tanpa hujan \r\nJiwaku berbisik lirih \r\nKuharus memilikimu', '08 May 2018 13:48'),
(63, 'Banda Niera', 'Di mana ada musim yang menunggu? Meranggas merapuh, berganti dan luruh Bayang yang berserah Tâ€™rang di ujung sana', '08 May 2018 19:24'),
(64, 'Admin', '11 - 05 - 2018 Pukul 7.45 Gunung Merapi erupsi untuk pertama kalinya setelah 8 tahun tidur.', '12 May 2018 00:04'),
(65, 'Anonymous', 'Sudah jadi dari lama sih tapi masih butuh improve lagi :D', '20 May 2018 23:35'),
(68, 'Admin', '01.47, 22 - 05 - 2018 Merapi batuk lagi untuk sekian kalinya', '22 May 2018 02:14'),
(69, 'Ega Mustofa', 'Bismillah', '25 May 2018 21:21'),
(70, 'Anonymous', 'kok apik :)\r\n', '08 June 2018 17:00'),
(71, 'Banda Niera', 'joss pokok e', '11 June 2018 22:30'),
(72, 'Anonymous', 'Ketupat udah dipotong\r\nOpor udah dibikin\r\nNastar udah dimeja\r\nKacang udah digaremin\r\nGak afdhol kalo gak Minal Aidin wal Faizin\r\nTaqobalallahu minna wa minkum', '16 June 2018 09:29'),
(73, 'Banda Niera', 'aaw', '21 June 2018 10:31'),
(74, 'Banda Niera', 'haha', '22 June 2018 21:11'),
(75, 'Rahma Purnamxzxza', 'done with you ', '28 June 2018 01:18'),
(76, 'Admin', 'dasfa\'sf\'', '06 July 2018 23:03'),
(77, 'Admin', '\'', '06 July 2018 23:03'),
(78, 'Banda Niera', 'gfgdf', '06 July 2018 23:42'),
(79, 'Banda Niera', 'kkjygj', '06 July 2018 23:43'),
(80, 'Banda Niera', 'gfdgd', '06 July 2018 23:45'),
(81, 'Banda Niera', 'aan', '06 July 2018 23:45'),
(82, 'Banda Niera', '\'', '06 July 2018 23:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id` int(10) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `jml_barang` int(20) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `waktu_order` varchar(25) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id`, `id_barang`, `jml_barang`, `total_harga`, `username`, `waktu_order`, `status`) VALUES
(93, 'FIFA 2018', 2, 100, 'Admin', '11 June 2018 19:18', 'Canceled'),
(100, 'PES 2018', 9, 675, 'Admin', '11 June 2018 19:39', 'Success'),
(101, 'PES 2018', 2, 150, 'Banda Niera', '11 June 2018 20:35', 'Success'),
(102, 'Battlefield 1', 3, 240, 'Admin', '11 June 2018 21:03', 'Success'),
(103, 'Grand Theft Auto V', 3, 285, 'Banda Niera', '11 June 2018 22:29', 'Pending'),
(104, 'Battlefield 1', 1, 80, 'Ega Mustofa', '11 June 2018 22:47', 'Success'),
(108, 'PES 2018', 1, 75, 'Banda Niera', '11 June 2018 23:00', 'Pending'),
(110, 'PES 2018', 2, 150, 'Banda Niera', '11 June 2018 23:03', 'Pending'),
(111, 'Grand Theft Auto V', 1, 95, 'Banda Niera', '11 June 2018 23:03', 'Pending'),
(112, 'PES 2018', 3, 225, 'Banda Niera', '11 June 2018 23:10', 'Pending'),
(113, 'PUBG', 3, 180, 'Banda Niera', '11 June 2018 23:10', 'Pending'),
(114, 'FIFA 2018', 1, 50, 'Banda Niera', '11 June 2018 23:11', 'Success'),
(115, 'PUBG', 2, 120, 'Admin', '11 June 2018 23:18', 'Pending'),
(116, 'Battlefield 1', 2, 160, 'Banda Niera', '11 June 2018 23:21', 'Pending'),
(117, 'PES 2018', 1, 75, 'Banda Niera', '11 June 2018 23:21', 'Pending'),
(118, 'PES 2018', 1, 75, 'Banda Niera', '12 June 2018 03:45', 'Pending'),
(120, 'PUBG', 1, 60, 'Banda Niera', '12 June 2018 04:46', 'Canceled'),
(121, 'PES 2018', 1, 75, 'Rahma Purnama', '12 June 2018 18:40', 'Success'),
(123, 'PES 2018', 2, 150, 'Tes Saja', '17 June 2018 01:44', 'Pending'),
(124, 'PES 2018', 1, 75, 'Tes Saja', '17 June 2018 01:50', 'Success'),
(125, 'Battlefield 1', 6, 480, 'Tes Saja', '17 June 2018 01:51', 'Pending'),
(126, 'PES 2018', 2, 150, 'Tes Saja', '17 June 2018 23:57', 'Success'),
(127, 'FIFA 2018', 1, 50, 'Banda Niera', '21 June 2018 10:32', 'Pending'),
(128, 'PES 2018', 1, 75, 'Admin', '21 June 2018 12:47', 'Pending'),
(130, 'Battlefield 1', 2, 160, 'dsadasx', '21 June 2018 13:44', 'Success'),
(131, 'FIFA 2018', 2, 100, 'Banda Niera', '21 June 2018 16:32', 'Success'),
(132, 'FIFA 2018', 1, 50, 'Banda Niera', '22 June 2018 21:15', 'Success'),
(133, 'FIFA 2018', 3, 150, 'Admin', '27 June 2018 23:29', 'Success'),
(134, 'PES 2018', 2, 150, 'Admin', '27 June 2018 23:29', 'Canceled'),
(135, 'PUBG', 2, 120, 'Admin', '27 June 2018 23:36', 'Success'),
(136, 'FIFA 2018', 1, 50, 'Banda Niera', '27 June 2018 23:37', 'Success'),
(137, 'Counter-Strike: Global Offensive', 1, 30, 'Admin', '28 June 2018 00:51', 'Pending'),
(138, 'Counter-Strike: Global Offensive', 2, 60, 'Admin', '28 June 2018 00:51', 'Canceled'),
(139, 'Counter-Strike: Global Offensive', 1, 30, 'Rahma Purnamxzxza', '28 June 2018 01:14', 'Success'),
(140, 'Counter-Strike: Global Offensive', 3, 90, 'Admin', '28 June 2018 14:17', 'Success'),
(141, 'Counter-Strike: Global Offensive', 2, 60, 'Admin', '30 June 2018 18:16', 'Pending'),
(142, 'Counter-Strike: Global Offensive', 5, 150, 'Admin', '02 July 2018 23:30', 'Pending'),
(143, 'PES 2018', 1, 75, 'Banda Niera', '06 July 2018 23:43', 'Pending'),
(144, 'PES 2018', 2, 150, 'Banda Niera', '06 July 2018 23:43', 'Pending'),
(145, 'PES 2018', 1, 75, 'Banda Niera', '06 July 2018 23:48', 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `postingan`
--

CREATE TABLE `postingan` (
  `nomer` int(10) NOT NULL,
  `id_post` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `judul_post` varchar(255) NOT NULL,
  `tumb_post` text NOT NULL,
  `isi_post` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `postingan`
--

INSERT INTO `postingan` (`nomer`, `id_post`, `category`, `judul_post`, `tumb_post`, `isi_post`, `gambar`, `link`) VALUES
(1, 'pubg_apk', 'android', 'PUBG Mobile APK', 'MEDAN PERTEMPURAN PLAYERUNKNOWN hadir di perangkat seluler - game Battle Royale kini hadir di perangkatmu!', '1. PUBG Resmi di Seluler\r\n100 pemain terjun ke pulau terpencil 8x8 km untuk pertarung menjadi sang jawara. Pemain harus mencari dan menemukan senjata, kendaraan, dan perlengkapannya sendiri, serta harus mengalahkan semua pemain yang secara grafis dan taktik berada dalam beragam medan pertempuran yang memaksa pemain menuju zona permainan terpusat. Bersiaplah mendarat, menjarah, dan melakukan apa pun yang diperlukan untuk bertahan dan menjadi sang jawara!\r\n<br><br>\r\n2. Grafik Kualitas Tinggi dan Audio HD \r\nUnreal Engine 4 yang andal menghasilkan pengalaman visual yang membuat terperangah dengan detail yang kaya, efek gameplay realistis, dan peta HD yang besar untuk Battle Royale. Rasakan sensasi seperti berada di tengah-tengah aksi ini dengan audio berkualitas tinggi, efek suara 3D yang imersif, dan suara 7.1 channel surround.\r\n<br><br>\r\n3. Senjata Realistis\r\nGudang senjata api yang terus berkembang, senjata jarak dekat, dan senjata lempar dengan balistik realistis, serta jalur lintasan serangan memberimu opsi untuk menembak, menyerang, atau membakar para penantangmu. Oh, apa kamu suka panci? Kami juga punya panci.\r\n<br><br>\r\n4. Menjelajah dengan Gaya\r\nSita berbagai kendaraan seperti mobil, truk, motor, dan perahu untuk memburu musuhmu, kebut kendaraan menuju zona permainan atau loloskan diri dengan cepat.\r\n<br><br>\r\n5. Bentuk Tim dengan Teman\r\nBertahanlah dalam pertempuran bersama temanmu. Undang dan bentuklah tim dengan teman, koordinasikan rencana pertempuran melalui obrolan suara serta siapkan penyergapan yang sempurna. \r\n<br><br>\r\n6. Lingkungan Game yang Adil\r\nMekanisme anti kecurangan yang andal memastikan lingkungan yang menyenangkan dan adil bagi semua pemain PUBG MOBILE.\r\n', 'pubg.jpg', 'https://apkpure.com/id/pubg/com.tencent.ig'),
(2, 'moba_kok_master', 'android', 'Mobile Legends APK', 'Hai sobat! Pada kesempatan kali ini kami akan share mengenai Mobile Legends mod apk versi terbaru.', 'Bergabung Dengan Teman Anda Di Brand Baru Game moba 5v5 Melawan Pemain Manusia Sungguhan, Mobile Legends: Bang Bang! Pilih Hero Favorit Kamu Dan Buat Team Yang Sempurna Dengan Kawanmu!\r\n<br><br>\r\n10 Detik Membuat Pertandingan, 10 Menit Bertarung, Lorong, Hutan, Menghancurkan Tower, Pertarungan Tim, Semua Kesenangan Itu Dari PC MOBAs Dan Permainan Action Itu Berada Di Tangan Mu! Tunjukan Semangat E-sports Kamu!\r\n<br><br>\r\nMobile Legends: Bang Bang, 2017 Hasil Karya Game Mobile Baru. Serang Lawanmu Dengan Sentuhan Jari mu Dan Raih Mahkota Penantang Terkuat!\r\n<br><br>\r\nHandphone Kamu Haus Akan Pertandingan!\r\n<br><br>\r\n<b>Features:</b>\r\n<br><br>\r\n<b>1. Klasik Peta MOBA, Pertandingan 5v5</b>\r\nPertandingan 5v5 Secara Langsung Melawan Lawan Sungguhan. Bertarung Di 3 Lorong Untuk Melawan Tower Musuh. 4 Area Hutan. 18 Tower Pertahanan. 2 Boss Yang Buas. Selesaikan Permainan Klasik Peta MOBA.\r\n<br><br>\r\n<b>2. Menang Dengan Kerja Sama Team & Strategi</b>\r\nBlok Serangan, Mengendalikan Lawan, Dan Menyembuhkan Rekanmu! Pilih Antara Tanks, Mages, Marksmen, Assasin, Support, Dan Seterusnya. Untuk Melindungi Tim Kamu Atau Jadilah MVP! Hero Baru Terus Menurus Di Hadirkan!\r\n<br><br>\r\n<b>3. Pertarungan Adil, Bawa Tim Kamu Kepada Kemenangan</b>\r\nHanya Seperti MOBA Klasik, Disini Tidak Ada Pelatihan Hero Atau Membeli Status. Menang Dan Kalah Tergantung Skill Kalian Dan Ability Sangat Adil Dan Platform Seimbang Untuk Kompetisi Permainan. Bermain Untuk Menang, Bukan Membayar Untuk Menang.\r\n<br><br>\r\n<b>4. Kontrol Sederhana, Mudah Untuk Menjadi Master</b>\r\nDengan Joystick Virtual Di Kiri Dan Tombol Skill Di Kanan, Hanya 2 Jari Yang Kamu Perlukan Untuk Menjadi Master! Autolock Dan Akan Mengikuti Target Kamu Untuk Menyerang. Tidak Akan Meleset! Dan Sistem Pengambilan Equip Secara Mudah Memfokuskan Kamu Kepada Sensasi Pertarungan Yang Seru!\r\n<br><br>\r\n<b>5. 10 Detik Matchmaking, 10 Menit Pertandingan</b>\r\nMatchmaking Hanya Memerlukan Waktu 10 Detik, Dan Pertarungan Dapat Berakhir Hanya 10 Menit, Bermain Di Pertandingan Awal Meningkatkan Level Dan Lompat Ke Pertandingan Yang Hebat. Tidak Membosankan Dan Terus Farming, Dan Banyak Sensasi Pertandingan Lainnya Dan Membawa Kemenangan Pada Genggaman Kita. Dimana Saja, Apapun Momentnya, Hanya Ambil Handphone Kamu, Mainkan Pertandingan, Dan Membenamkan Diri Kamu Di Dalam Jantung Kompetisi MOBA.\r\n<br><br>\r\nPERHATIAN Mobile Legends : Bang Bang gratis untuk di-unduh dan bermain, namun beberapa item game juga dapat dibeli dengan uang sungguhan. Jika Anda tidak ingin menggunakan fitur ini, silakan mengatur perlindungan sandi untuk pembelian dalam pengaturan Google Play Store Anda. Beserta, di bawah Persyaratan Layanan dan Kebijakan Privasi, Anda harus setidaknya 12 tahun untuk bermain atau men-unduh Mobile Legends : Bang Bang.', 'ml.jpg', 'https://play.google.com/store/apps/details?id=com.mobile.legends&hl=in'),
(3, 'bar-barq', 'android', 'BarbarQ APK', 'Bermain melawan orang lain secara online!Ayo bergabung sekarang juga!', 'BarbarQ adalah game merek terbaru real-time multi-player tipe pixel io style. Ayo datang dan buat tim yang sempurna dengan teman-temanmu untuk mengalahkan orang atau team lain di arena! <br>\r\nMemakan jamur untuk berkembang dan mengambil item lainnya agar menjadi lebih kuat.kalahkan lawan-lawan anda untuk memperoleh skor tertinggi.Bertarunglah sampai titik darah penghabisan untuk memenangkannya!\r\n<br><br>\r\n\r\nHalaman Resmi Facebook\r\nhttps://www.facebook.com/BarbarQ/\r\n<br><br>\r\n\r\n<b>[Fitur Game]:</b><br>\r\n<b>1.</b>	Game yang Inovatif & Menarik<br>\r\n<b>2.</b>	Game yang mudah di kontrol dengan joystick<br>\r\n<b>3.</b>	Game didisain sesuai dengan pixel game<br>\r\n<b>4.</b>	Kalahkan musuh dengan perencanaan dan kerjasama tim.<br>\r\n<b>5.</b>	Mode Kompetisi dengan sistem Ranking<br>', '5b34e032103f0.jpg', 'https://play.google.com/store/apps/details?id=com.bbqstudio.bbqqoversea&hl=in'),
(6, 'aplikasi_bodo', 'android', 'Tik Tok APK', 'Tik Tok adalah jaringan sosial untuk membuat dan membagikan video musik seru dengan teman-teman dan pengikut.', 'Tik Tok adalah jaringan sosial untuk membuat dan membagikan video musik seru dengan teman-teman dan pengikut. Untuk menggunakan aplikasi ini, Anda harus membuat akun yang hanya memerlukan beberapa detik dan dapat dilakukan melalui Instagram, Facebook, atau Google.\r\n<br><br>\r\nDalam Tik Tok, Anda memiliki berbagai opsi dalam pembuatan video musik. Anda bisa memilih dari ribuan lagu dan menggunakan banyak alat untuk memersonalisasi video, dari stiker virtual hingga kontrol kecepatan kamera (sehingga gambar melaju lebih cepat atau lambat).\r\n<br><br>\r\nPembuatan video dengan Tik Tok sangat seru, tetapi mengecek kreasi pengguna lain juga menyenangkan. Seperti pada jejaring sosial umumnya, Anda dapat menyukai video pengguna lain, memberi komentar, berbagi dengan teman-teman, dan lain-lain.\r\n<br><br>\r\nTik Tok adalah jaringan sosial seru dengan banyak potensi. Anda dapat mencari video menghibur yang tak terhitung jumlahnya hanya dengan menyentuh satu tombol, dan bagian terbaiknya, kreasi video terbaik Anda bisa dibagikan kepada komunitas yang terus berkembang.', '5b377ff381b39.png', ''),
(7, 'sublime_text_3', 'komputer', 'Sublime Text 3', 'Sublime Text 3 merupakan sebuah text editor yang paling banyak diguakan oleh para programer diseluruh dunia.', 'Sublime Text 3 merupakan sebuah text editor yang paling banyak diguakan oleh para programer diseluruh dunia karena dengan software ini dapat memudahkan untuk menulis program dengan warna yang berbeda disetiap id maupun class. Terdapat banyak plugin yang bisa kamu pilih untuk meningkatkan produktifitas anda dalam hal membuat program.', '5b378260a3529.jpg', 'https://download.sublimetext.com/Sublime%20Text%20Build%203176%20x64%20Setup.exe'),
(8, 'angry_bird_apk', 'android', 'Angry Birds APK', 'Anda akan melempar sejumlah burung yang sedang marah marah ke benteng-benteng yang dibangun oleh babi-babi kecil. ', 'Anda akan melempar sejumlah burung yang sedang marah marah ke benteng-benteng yang dibangun oleh babi-babi kecil. Burung lucu yang menjadi karakter Anda ini akan dilempar menggunakan sebuah ketapel. Jika diperhatikan, sebenarnya pola permainannya mirip dengan mengancurkan kastil dengan lemparan batu-batu besar. \r\n<br><br>\r\nAnda harus membidik sasaran dengan tepat, menghitung kekuatan lemparan, dan menembakkan burung. Dengan bantuan gravitasi, burung yang dilempar akan jatuh menghancurkan bab-babi yang menjadi musuh Anda. Game ini terdiri dari ratusan level. Disamping kemampuan, Anda juga harus menggunakan otak Anda. \r\n<br><br>\r\nDengan adanya sistem penilaian, Anda akan selalu tertantang untuk mengulang level dan mencoba lagi hingga nilai Anda naik lebih tinggi daripada sebelumnya. Angry Birds adalah salah satu game yang paling digemari dan adiktif di pasaran. Anda bisa memainkannya saat dalam perjalanan atau saat menunggu antrian.', '5b3786e5f3f9a.png', 'https://play.google.com/store/apps/details?id=com.rovio.baba'),
(9, 'clash_of_clans', 'android', 'Clash of Clans APK', 'Clash of Clans adalah permainan manajemen dan strategi tempo real.', ' Di sini Anda harus membangun Desa tempat anggota klan pemberani Anda hidup jika mereka tidak sedang menjalankan misi, untuk membuktikan keberanian mereka dengan cara menghancurkan kamp musuh.', '5b37879924f23.jpg', 'https://play.google.com/store/apps/details?id=com.supercell.clashofclans'),
(10, 'vainglory_apk', 'android', 'Vainglory APK', 'Permainan MOBA di Android semakin digemari oleh para gamer di Dunia, MOBA game seperti DotA 2.', 'Permainan MOBA di Android semakin digemari oleh para gamer di Dunia. MOBA game seperti DotA 2 yang merajai pada perangkat Komputer, namun pada Android yaitu Vainglory, telah terlihat dari jumlah Download Vainglory di Playstore.\r\n<br><br>\r\nVainglory for Android yang terbaru semakin memiliki fitur-fitur keren dari segi animasi dari setiap heronya dan juga gameplaynya. Vainglory juga memiliki forum-forum besar untuk membahas hero, item, dan segala hal tentang Vainglory, bahkan sangat berguna buat kamu yang baru ingin belajar ataupun sedang mencari informasi mengenai game Vainglory.', '5b37881a877e7.jpg', 'https://play.google.com/store/apps/details?id=com.superevilmegacorp.game'),
(11, 'internet_download_manager', 'komputer', 'Internet Download Manager', 'Internet Download Manager dapat mempercepat download hingga lima kali karena teknologi file dinamis yang cerdas segmentasi.', 'Internet Download Manager dapat mempercepat download hingga lima kali karena teknologi file dinamis yang cerdas segmentasi. Tidak seperti download manager dan lainnya accelerators Internet Download Manager segmen download file secara dinamis selama proses download dan sambungan tersedia tanpa tambahan apapun, idm memberi kenyamanan lebih untuk kalian dan itu yang membuat idm lebih di cari oleh banyak para pengguna internet.\r\n<br><br>\r\nDengan IDM, maka kecepatan download kamu juga akan meningkat dengan drastis. IDM satu-satunya yang tercepat dari kebanyakan downloader lainnya, hanya dengan klik dan klik semua kebutuhan internet kalian terpenuhi oleh idm. \r\n<br><br>Fitur yang memberikan banyak kemudahan dari idm ini sangat bermanfaat untuk kebutuhan internet kalian setiap harinya, tidak perlu melakukan crack pada idm karena semua fitur diberikan bebas untuk kalian, namun dengan kalian membeli lisensi dari idm ini sendiri akan sangat membantu kalian dalam mendukung idm agar tetap memberikan yang terbaik.', '5b37887533d13.jpg', 'http://mirror2.internetdownloadmanager.com/idman630build10.exe?b=1&filename=idman630build10.exe'),
(12, 'visual_studio_2017', 'komputer', 'Visual Studio 2017', 'Microsoft telah mengumumkan kemampuan terbaru secara umum dari Visual Studio 2017 yang baru saja dirilisnya.', 'Pada rilisnya kali ini, Microsoft telah fokus pada 4 faktor : produktifitas dan performa, mobile, cloud dan DevOps. Dalam catatan rilisnya Microsoft mengatakan VS 2017 ini dirilis dengan membawa kinerja yang ringan dan pengalaman instalasi dengan rujukan modul. VS 2017 ini memungkinkan developer hanya mendapatkan komponen yang mereka butuhkan.\r\n<br><br>\r\nMicrosoft juga mengklaim Visual Studio 2017 bekerja dengan 3 kali lebih cepat dibanding dengan versi Visual Studio 2015. Peluncuran VS 2017 ini didesain untuk membantu team bekerja dengan lebih baik. Dengan membawa tool yang menyediakan pengembangan NET Core 1.0 dan 1.1 app, microservice, dan kontainer docker.\r\n<br><br>\r\nVisual Studio 2017\r\n<br><br>\r\nIntegrasi Xamarin ke dalam Visual Studio 2017 telah dibuat dengan lebih baik dengan hadirnya Xamarin Forms previewer dan peningkatan pada Xamarin Forms XAML. Tidak hanya itu peningkatan pada integrasi Git pun akan menjadi sesuatu yang disukai oleh DevOps. Visual Studio kini membuat penggunaan Git dapat dieksekusi. Secara keseluruhan, lebih banyak lagi fungsi Git yang bisa digunakan secara langsung dalam DE.', '5b378a29401d3.jpg', 'https://go.microsoft.com/fwlink/?Linkid=852157'),
(13, 'dev_cplusplus', 'komputer', 'Dev C++ 5.11 ', 'Dev C++ adalah salah satu software yang paling banyak digunakan oleh para mahasiswa atau seorang progammer dalam dunia IT.', 'Bicara soal bahasa C, mungkin yang ada di benak kita adalah sebuah bahasa yang dimana bisa kita olah menjadi sebuah program berbasis cmd yang harus dijalankan dengan software khusus. \r\n<br><br>\r\nDev C++ adalah salah satu software yang paling banyak digunakan oleh para mahasiswa/i dalam dunia IT yang dimana mereka sering kali menggunakannya untuk membuat sebuah aplikasi atau program dengan source code tertentu yang memang sudah mereka buat atau pelajari. Software ini terbilang gratis dan juga Open Source, sehingga kalian tidak membutuhkan aktivator lainnya. ', '5b378c1a93722.png', 'https://excellmedia.dl.sourceforge.net/project/orwelldevcpp/Setup%20Releases/Dev-Cpp%205.11%20TDM-GCC%204.9.2%20Setup.exe'),
(14, 'net_beans_ide', 'komputer', 'NetBeans IDE 8.2', 'NetBeans IDE adalah sebuah Integrated Development Environment untuk para pengembang software.', 'NetBeans IDE adalah sebuah Integrated Development Environment untuk para pengembang software.\r\n<br><br>\r\nPengguna NetBeans IDE bisa mendapatkan segala tools yang diperlukan untuk membuat aplikasi-aplikasi desktop profesional, perusahaan, web, dan mobile dengan bahasa Java, C/C++, dan bahkan bahasa-bahasa dinamis seperti PHP, JavaScript, Groovy, dan Ruby.\r\n<br><br>\r\nNetbeans IDE mudah diinstal dan digunakan langsung di luar kotaknya dan berjalan di banyak platforms termasuk Windows, Linux, Mac OS X dan Solaris.', '5b378d2e296cb.png', 'http://download.netbeans.org/netbeans/8.2/final/bundles/netbeans-8.2-windows.exe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_game`
--
ALTER TABLE `data_game`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_barang` (`id_barang`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`nomer`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`nomer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_game`
--
ALTER TABLE `data_game`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `komen`
--
ALTER TABLE `komen`
  MODIFY `nomer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `nomer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
