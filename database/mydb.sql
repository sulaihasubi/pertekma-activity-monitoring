-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 02:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicsession`
--

CREATE TABLE `academicsession` (
  `acaSessionId` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `pertekma` varchar(255) NOT NULL,
  `acaSession` varchar(255) NOT NULL,
  `totalProposal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicsession`
--

INSERT INTO `academicsession` (`acaSessionId`, `iduser`, `pertekma`, `acaSession`, `totalProposal`) VALUES
(1, 1, 'PERTEKMA 2017/2018', '2017/2018', 1),
(3, 2, 'PERTEKMA 2018/2019', '2018/2019', 2),
(4, 1, 'PERTEKMA 2019/2020', '2019/2020', 0);

-- --------------------------------------------------------

--
-- Table structure for table `acadetail`
--

CREATE TABLE `acadetail` (
  `idacaDetail` int(11) NOT NULL,
  `idacaSession` int(11) NOT NULL,
  `acaName` varchar(255) NOT NULL,
  `acaJawatan` varchar(255) NOT NULL,
  `acaNoMatric` varchar(255) NOT NULL,
  `acanoTel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acadetail`
--

INSERT INTO `acadetail` (`idacaDetail`, `idacaSession`, `acaName`, `acaJawatan`, `acaNoMatric`, `acanoTel`) VALUES
(2, 1, 'TESHINIA TISA PHANG', 'TIMBALAN PRESIDEN', '59380', '019-8494780'),
(3, 1, 'KHALIF AMIR BIN ZAKRY', 'SETIAUSAHA (I)', '58683', '019-8055785'),
(4, 1, 'MEENAKSHI A/P KANNAN', 'SETIAUSAHA (II)', '59671', '014-9351513'),
(5, 1, 'HEMA A/P GANESAN', 'BENDAHARI', '56100', '012-8118875'),
(6, 1, 'PRETY SURIAWATHY A/P JAYASURI', 'EXCO AKADEMIK', '57648', '016-3762796'),
(7, 1, 'RUSYDAN NAWAWI BIN ROHISHAM', 'EXCO PERHUBUNGAN AWAM, PUBLISITI & INFORMASI (I)', '57746', '019-3539585'),
(8, 1, 'MOHD AMIRUL BIN MOHD SOLIHIN', 'EXCO PERHUBUNGAN AWAM, PUBLISITI & INFORMASI (II)', '56626', '017-6082192'),
(9, 1, 'NURUL ATIYAH BINTI MOHD SAYUNI', 'EXCO KEBAJIKAN DAN PEMBANGUNAN SAHSIAH (I)', '57505', '019-9167868'),
(10, 1, 'ABU SAYED', 'EXCO KEBAJIKAN DAN PEMBANGUNAN SAHSIAH (II)', '59395', '017-8441208'),
(11, 1, 'SUREN A/L KRISHNAN', 'EXCO SUKAN (I)', '58010', '011-26532127'),
(12, 1, 'REBECCAROOBABATHY A/P RAVICHANDRAN', 'EXCO SUKAN (II)', '57700', '014-6452757'),
(13, 1, 'MOHAMMAD FARHAAN IQBAL', 'EXCO TEKNIKAL DAN LOGISTIK', '59404', '014-6459747'),
(14, 1, 'CATHERINE HII SENG JING', 'EXCO STUDENT INTERACTION ROOM (I)', '55620', '013-8338608'),
(15, 1, 'SIELAAH A/P SUPPIAH', 'EXCO STUDENT INTERACTION ROOM (II)', '57859', '011-26338473'),
(16, 1, 'ARIF AHAMED', 'EXCO KEUSAHAWANAN', '54426', '014-6934847'),
(17, 1, 'GEERTHANAA A/P RAVI', 'WAKIL PROGRAM KEJURUTERAAN PERISIAN', '59611', '014-3484269'),
(18, 1, 'LEONG HAO XIAN', 'WAKIL PROGRAM SAINS KOMPUTER', '56402', '018-5723499'),
(19, 1, 'AMIZANURYANTI BINTI ALI', 'WAKIL PROGRAM PENGKOMPUTERAN MULTIMEDIA', '55465', '010-9721297'),
(20, 1, 'NALINA NARAYANI A/P SIVAPRESAAD', 'WAKIL PROGRAM PENGKOMPUTERAN RANGKAIAN', '56904', '014-3895700'),
(21, 1, 'ALYA SYAZANA BINTI YUMAT', 'WAKIL PROGRAM SISTEM MAKLUMAT', '58439', '014-5910342'),
(22, 3, 'MOHAMMED IJLAL BIN SABARUDIN', 'PRESIDEN', '61671', '010-9148707'),
(23, 3, 'MOHD AFANDI ZAIDUL', 'TIMBALAN PRESIDEN', '61487', '010-2053020'),
(24, 3, 'SITI NURHAMIZAH BINTI RAIM', 'SETIAUSAHA (I)', '62591', '011-25316214'),
(25, 3, 'JUSTIN WEE KIEN JIN', 'SETIAUSAHA (II)', '61085', '011-25118475'),
(26, 3, 'WAN NUR SYAZA BINTI WAN MOHAMAD NOROLAâ€™ASIKIN', 'BENDAHARI (I)', '62899', '011-38840814'),
(27, 3, 'SHARON EUGENA ANAK SAMBAU', 'BENDAHARI (II)', '63783', '013-8806970'),
(28, 1, 'Sulaiha', 'apaapa', '4905', '094-05995968'),
(29, 3, 'IFFAH NADZIRAH BINTI ISHAK', 'BENDAHARI (III)', '63985', '017-5173708'),
(30, 3, 'WELMA QASHEEDA BINTI HALEK', 'EXCO AKADEMIK', '62911', '019-7402258'),
(31, 3, 'ETHAR HELMI ALI AL-ARASHI', 'EXCO PERHUBUNGAN AWAM, PUBLISITI & INFORMASI (I)', '60086', '017-8551715'),
(32, 3, 'UVARAJAN A/L MURUGEN', 'EXCO PERHUBUNGAN AWAM, PUBLISITI & INFORMASI (II)', '64166', '016-3033972'),
(33, 3, 'MOHAMAD MUHIBBUDDIN BIN ZULKIFLI', 'EXCO KEBAJIKAN DAN PEMBANGUNAN SAHSIAH (I)', '61453', '010-2907474'),
(34, 3, 'SITI AZIMAH BINTI MOHAMED', 'EXCO KEBAJIKAN DAN PEMBANGUNAN SAHSIAH (II)', '63791', '014-8099871'),
(35, 3, 'KANAGAAMUNIS A/L THANGASAJOO', 'EXCO SUKAN (I)', '64260', '018-4026938'),
(36, 3, 'WAN FARAH AQILAH BINTI ABD LADI', 'EXCO SUKAN (II)', '62888', '013-4275904'),
(37, 3, 'MUHAMMAD SYAFIQ BIN TALIB', 'EXCO TEKNIKAL DAN LOGISTIK (I)', '61663', '013-4275904'),
(38, 3, 'AVINASH RAO A/L CHANDRA RAO', 'EXCO TEKNIKAL DAN LOGISTIK (II)', '63946', '019-2907634'),
(39, 3, 'RAFIQAH NABIHAH BINTI ROSSAZALI', 'EXCO STUDENT INTERACTION ROOM (I)', '64129', '019-6682443'),
(40, 3, 'SHANMUGAPIRIYA A/P SIVALINGAM', 'EXCO STUDENT INTERACTION ROOM (II)', '64136', '011-31800873'),
(41, 3, 'CLARISSA NG TZER JING', 'EXCO KEUSAHAWANAN (I)', '60573', '017-6956261'),
(42, 3, 'NUR FATIN AQILAH BINTI SHARIFUL ANUAR', 'EXCO KEUSAHAWANAN (II)', '64084', '017-5234802'),
(43, 3, 'NUR AINA BALQIS BINTI MOHAMAD ROSIDEK', 'WAKIL PROGRAM KEJURUTERAAN PERISIAN', '63560', '013-9378348'),
(44, 3, 'CHEW CHA CHE', 'WAKIL PROGRAM SAINS KOMPUTER', '63957', '011-27685358'),
(45, 3, 'NUR ADINA BINTI MOHD ABDUL LATIF', 'WAKIL PROGRAM PENGKOMPUTERAAN MULTIMEDIA', '61880', '017-7975437'),
(46, 3, 'KAVINES A/L MURUGIAH', 'WAKIL PROGRAM PENGKOMPUTERAAN RANGKAIAN', '63998', '016-4551456'),
(47, 3, 'HAZWANI BINIT ZAINI', 'WAKIL PROGRAM SISTEM MAKLUMAT', '56095', '013-8166141');

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activityId` int(11) NOT NULL,
  `proposaId` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `activityTitle` varchar(255) NOT NULL,
  `date1` varchar(255) NOT NULL,
  `date2` varchar(255) NOT NULL,
  `time1` varchar(255) NOT NULL,
  `time2` varchar(255) NOT NULL,
  `activityLocation` varchar(255) NOT NULL,
  `objective` varchar(500) NOT NULL,
  `ketuaUnit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activityId`, `proposaId`, `iduser`, `activityTitle`, `date1`, `date2`, `time1`, `time2`, `activityLocation`, `objective`, `ketuaUnit`) VALUES
(8, 1, 1, '7.1	Booth Set-up ', '20-04-2018', '22-04-2018', '9:00 AM', '4:30 PM', 'Dewan Zamrud, Delima, Mutiara dan Serindit I & II ', 'Aktiviti ini bertujuan untuk para penjaja, peserta expo dan penganjur untuk memasang dan menyiap sediakan booth masing-masing serta memastikan segala peralatan dan perancangan expo diperiksa, disemak dan diuji. Rehearsal program akan diadakan pada waktu ini untuk memastikan kelancaran program pada minggu berikutnya.', '7'),
(9, 1, 1, '7.2	PC Fair', '22-04-2018', '28-04-2018', '9:00 AM', '5:00 PM', 'Dewan Delima, DeTAR', 'Aktiviti ini bertujuan untuk memberi peluang kepada warga UNIMAS, komuniti sekitar Samarahan/Kuching dan pelajar sekolah untuk mendapatkan perkakasan komputer yang diperlukan. Pelajar dapat membandingkan peralatan komputer dari segi harga dan jenama. Pendedahan ini dilakukan untuk menaikkan kadar celik IT di kalangan warga UNIMAS.', '15'),
(10, 1, 1, '7.3	E-Games Tournament', '23-04-2018', '28-04-2018', '9:00 AM', '5:00 PM', 'Dewan Delima, DeTAR', 'Aktiviti ini dilakukan secara berkumpulan dan bertujuan untuk menaikkan semangat berpasukan dan kerjasama antara ahli dalam kumpulan. Program ini juga bertujuan untuk memupuk semangat E-Games dan memberi latihan serta pengalaman kepada kumpulan supaya mereka dapat memenangi pertandingan di peringkat yang lebih tinggi sedemikian pada masa depan.', '16'),
(11, 1, 1, '7.4	IT Corner', '23-04-2018', '28-04-2018', '9:00 AM', '5:00 PM', 'Dewan Delima, DeTAR', 'Aktiviti ini bertujuan untuk mendedahkan warga UNIMAS mengenai bidang komputer sains dan teknologi maklumat melalui pameran dan aktiviti yang menarik. Aktiviti ini juga akan mempamerkan beberapa teknologi moden kepada warga UNIMAS.', '18'),
(12, 1, 1, '7.5	Hour of Code', '25-04-2018', '26-04-2018', '2:00 PM', '5:00 PM', 'Lab, FSKTM', 'Bengkel ini dikendalikan oleh pelajar FSKTM di bawah Microsoft Student Partnership. Ia merupakan platform untuk pelajar UNIMAS untuk mempelajari sistem pengekodan dan asas-asas berkaitan. Pelajar membuat pengaturcaraan untuk meningkatkan kefahaman dan kemahiran mereka pada masa yang sama.', '17'),
(13, 1, 1, '7.6	Web Development Workshop', '27-04-2018', '', '9:00 AM', '4:00 PM', 'Lab, FSKTM', 'Aktiviti ini bertujuan untuk menggalakkan para pelajar UNIMAS khususnya pelajar FSKTM untuk menimba pengetahuan asas dan mengasah kemahiran dalam merancang serta menghasilkan laman web.', '17'),
(14, 1, 1, ' 7.7	Mobile App Development Workshop', '26-04-2018', '', '9:00 AM', '4:00 PM', 'Lab, FSKTM ', 'Bengkel ini dilakukan melalui ceramah yang akan disampaikan oleh pensyarah jemputan dan dilaksanakan secara interaktif di mana pelajar berpeluang membuat aplikasi hasil dari pembelajaran sepanjang ceramah tersebut. Aktiviti ini bertujuan untuk memberi pengenalan asas pembangunan aplikasi mobil kepada warga UNIMAS.', '17'),
(15, 1, 1, '7.8	Sesi Ceramah ', '25-04-2018', '26-04-2018', '2:00 PM', '5:00 PM', 'Dewan Delima, DeTAR ', 'Sesi ceramah ini bertujuan untuk memberi perkongsian ilmu dan pengalaman mengenai perkembangan sains komputer dan teknologi maklumat kepada pelajar UNIMAS serta pelajar sekolah sekitar Samarahan/Kuching. Ceramah tersebut disampaikan oleh individu dan pensyarah berkenaan yang dijemput khas.', '17'),
(16, 1, 1, '7.9	Faculty Session ', '24-04-2018', '', '9:00 AM', '4:00 PM', 'Sekitar, FSKTM', 'Aktivti ini bertujuan untuk mendedahkan kepada para pelajar UNIMAS dan dari sekolah-sekolah serta kolej di luar UNIMAS mengenai bidang sains komputer. Aktiviti ini juga bertujuan untuk memberi informasi mengenai FSKTM.', '13'),
(17, 8, 1, '', '', '', '8:30 AM', '5:00 PM', '', '', ''),
(18, 8, 1, 'amm', '01-05-2019', '01-05-2019', '8:30 AM', '5:00 PM', 'jh', 'hjh', ''),
(19, 8, 38, 'a', '02-05-2019', '03-05-2019', '8:30 AM', '5:00 PM', 'a', 's', '55'),
(20, 8, 38, 'b', '02-05-2019', '03-05-2019', '8:30 AM', '5:00 PM', 'b', 'b', '56');

-- --------------------------------------------------------

--
-- Table structure for table `activitymonitoring`
--

CREATE TABLE `activitymonitoring` (
  `id_activitymonitoring` int(11) NOT NULL,
  `id_proposal` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `logdetail` varchar(255) NOT NULL,
  `advisor_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitymonitoring`
--

INSERT INTO `activitymonitoring` (`id_activitymonitoring`, `id_proposal`, `username`, `date`, `logdetail`, `advisor_comment`) VALUES
(2, 7, 'Ketua Program Talks and Workshops', '09-03-2019', 'Setup and Preparation', 'NOT AVAILABLE'),
(3, 7, 'Ketua Program Talks and Workshops', '10-03-2019', 'teeesssstt', ''),
(4, 7, 'Ketua Program Talks and Workshops', '11-03-2019', 'hhjhj', ''),
(5, 7, 'Ketua Program IT Run', '09-03-2019', 'teettetrte', ''),
(6, 7, 'user', '09-03-2019', 't', '');

-- --------------------------------------------------------

--
-- Table structure for table `b_income`
--

CREATE TABLE `b_income` (
  `incomeId` int(11) NOT NULL,
  `Iproposald` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `perkara` varchar(255) NOT NULL,
  `hargaSeunit` varchar(255) NOT NULL,
  `kuantiti` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_income`
--

INSERT INTO `b_income` (`incomeId`, `Iproposald`, `account_id`, `perkara`, `hargaSeunit`, `kuantiti`, `jumlah`) VALUES
(1, 1, 0, 'Dana dari PERTEKMA', '1000.00', '12', 1000),
(2, 1, 0, 'Sewa booth PC Fair', '300.00', '4', 1200),
(3, 1, 0, 'Penaja', '6000.00', '1', 6000),
(6, 10, 0, 'k', '4', '6', 24),
(7, 7, 0, 'Dana dari PERTEKMA', '3000.00', '1', 3000),
(8, 7, 0, 'Sewa booth PC Fair', '300.00', '4', 1200),
(9, 7, 0, 'Tajaan', '6000.00', '1', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `b_outcome`
--

CREATE TABLE `b_outcome` (
  `outcomeId` int(11) NOT NULL,
  `Oproposald` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `perkara` varchar(255) NOT NULL,
  `hargaSeunit` varchar(255) NOT NULL,
  `kuantiti` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_outcome`
--

INSERT INTO `b_outcome` (`outcomeId`, `Oproposald`, `id_account`, `perkara`, `hargaSeunit`, `kuantiti`, `jumlah`) VALUES
(1, 1, 0, 'Cenderahati', '100.00', '102', 1000),
(2, 1, 0, 'Printing (Tag nama, banner, poster)', '500.00', '1', 500),
(3, 1, 0, 'Sewa dewan-dewan DeTAR ', '4500.00', '6', 27000),
(4, 1, 0, 'OverMASA DeTAR (per jam)', '50.00', '8', 400),
(5, 1, 0, 'Caj Pengiklanan dalam kampus', '20.00', '20', 400),
(6, 1, 0, 'Bayaran Pemprosesan Pengiklanan', '10.00', '1', 10),
(7, 1, 0, 'Makanan', '5.00', '150', 750),
(8, 1, 0, 'Lain-lain perbelanjaan', '200.00', '1', 200),
(11, 7, 0, 'Cenderahati', '25', '10', 250),
(12, 7, 0, 'Printing (Tag nama, banner, poster)', '500', '1', 500),
(13, 7, 0, 'Cenderahati VIP', '20', '10', 200),
(14, 7, 0, 'Jamuan VIP', '30', '5', 150),
(15, 7, 0, 'Baju Sukarelawan ', '15', '150', 2250),
(16, 7, 0, 'Makanan Sukarelawan', '5', '600', 3000),
(17, 7, 0, 'Hadiah IT run', '20', '80', 1600),
(18, 7, 0, 'Baju IT run', '20', '100', 2000),
(19, 7, 0, 'Lain-lain perbelanjaan', '250', '1', 250),
(20, 8, 0, 'cenderahati', '100', '14', 1400),
(21, 0, 0, 'motorsikal', '1', '2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `idequipment` int(11) NOT NULL,
  `IDproposal` int(11) NOT NULL,
  `bahagian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`idequipment`, `IDproposal`, `bahagian`) VALUES
(1, 1, 'ASET'),
(2, 1, 'FSKTM'),
(11, 7, 'Senarai Keperluan/Peralatan Program'),
(12, 0, 'Senarai Keperluan/Peralatan Program2'),
(14, 8, 'ASET');

-- --------------------------------------------------------

--
-- Table structure for table `equipmentdetail`
--

CREATE TABLE `equipmentdetail` (
  `idequipmentdetail` int(11) NOT NULL,
  `idequipment` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `kuantiti` int(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipmentdetail`
--

INSERT INTO `equipmentdetail` (`idequipmentdetail`, `idequipment`, `keperluan`, `kuantiti`, `unit`, `catatan`) VALUES
(1, 1, 'Kerusi DeTAR', 70, 'Logistik', 'Untuk tujuan menyediakan tempat duduk kepada peserta'),
(2, 1, 'Meja Besar', 10, 'Logistik', 'Untuk kegunaan E-Games dan PC Fair'),
(3, 1, 'Portable Stage', 1, 'Logistik', 'Untuk menyediakan pentas semasa IT run'),
(4, 2, 'Plug Extension E-Games ', 10, 'Teknikal', 'Untuk kegunaan E-Games dan PC Fair'),
(5, 2, 'Plug Extension PC Fair', 14, 'Logistik', 'Untuk kegunaan E-Games dan PC Fair'),
(6, 2, 'Walkie-Talkie', 20, 'Logistik', 'Untuk tujuan perhubungan antara urusetia'),
(7, 2, 'PA System', 3, 'Teknikal', 'Untuk menyediakan lagu semasa upacara pembukaan dan penutupan'),
(8, 2, 'Projektor', 3, 'Teknikal', 'Untuk memaparkan bahan ceramah'),
(9, 2, 'Mikrofon', 3, 'Teknikal', 'Untuk kegunaan penceramah yang dijemput ke UNIMAS'),
(10, 3, 'Portable Stage ', 1, 'Logistik', 'Untuk menyediakan pentas semasa IT run '),
(16, 11, 'Kerusi', 70, 'Logistik', 'Untuk tujuan menyediakan tempat duduk kepada peserta'),
(17, 11, 'Meja besar', 10, 'Logistik', 'Untuk kegunaan E-Games dan PC Fair'),
(18, 11, 'Portable Stage', 1, 'Logistik', 'Untuk menyediakan pentas semasa IT run'),
(19, 11, 'Plug Extension', 24, 'Teknikal', 'Untuk penggunaan E-Games dan PC Fair'),
(20, 11, 'Walkie-Talkie', 20, 'Logistik', 'Untuk tujuan perhubungan antara urusetia'),
(21, 11, 'PA System', 3, 'Teknikal', 'Untuk menyediakan lagu semasa upacara pembukaan dan penutupan'),
(22, 11, 'Projektor', 3, 'Teknikal', 'Untuk memaparkan bahan ceramah'),
(23, 11, 'Mikrofon', 8, 'Teknikal', 'Untuk kegunaan penceramah yang dijemput ke UNIMAS'),
(24, 11, 'Peti Pertolongan Cemas', 2, 'Keselamatan', 'Rawatan awal sekiranya berlaku sebarang kecelakaan'),
(25, 11, 'Hailer', 2, 'Logistik', 'Untuk tujuan penyampaian maklumat kepada peserta dalam skala besar di tempat yang besar dan terbuka'),
(26, 11, 'Bas Unimas (44 penumpang)', 1, 'Pengangkutan', 'Untuk Qualifier E-Games yang akan diadakan di Gizmo Arena'),
(27, 11, 'Air Mineral', 40, 'PKP', 'Minuman untuk peserta dan sukarelawan'),
(28, 11, 'Sijil', 250, 'Perhubungan Luar', 'Penghargaan kepada Jawatankuasa Pelaksana dan sukarelawan'),
(29, 14, 'tytyyuu', 6, 'Logistik', 'jhjghjh'),
(30, 14, 'rdgkjkj', 4, 'Logistik', 'gfhgh'),
(31, 14, 'ghghh', 5, 'Logistik', 'ghgh');

-- --------------------------------------------------------

--
-- Table structure for table `job_scope`
--

CREATE TABLE `job_scope` (
  `jobscope_id` int(11) NOT NULL,
  `id_orgDetail` int(11) NOT NULL,
  `jobScope` varchar(255) NOT NULL,
  `job_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_scope`
--

INSERT INTO `job_scope` (`jobscope_id`, `id_orgDetail`, `jobScope`, `job_status`) VALUES
(10, 39, 'Memastikan program berjalan dengan lancar mengikut perancangan yang telah ditetapkan.', 0),
(11, 39, 'Mengetuai setiap mesyuarat dan perbincangan yang dijalankan.', 0),
(12, 39, 'Membantu setiap ahli organisasi yang mempunyai masalah dan berusaha mencari jalan penyelesaiannya.', 0),
(13, 39, 'Memantau tugas-tugas exco yang berkaitan.', 0),
(14, 39, 'Memastikan setiap ahli organisasi melaksanakan tugas yang diamanahkan dalam masa yang ditetapkan.', 0),
(15, 40, 'Membantu pengarah memastikan kelancaran program yang telah dirancang.', 0),
(16, 40, 'Memantau tugas-tugas exco yang berkaitan.', 0),
(17, 40, 'Menggantikan tugas-tugas semasa ketiadaan pengarah.', 0),
(18, 41, 'Membantu pengarah memastikan kelancaran program yang telah dirancang.', 0),
(19, 41, 'Memantau tugas-tugas exco yang berkaitan.', 0),
(20, 41, 'Menggantikan tugas-tugas semasa ketiadaan pengarah.', 0),
(21, 42, 'Menyediakan kertas kerja program.', 0),
(22, 42, 'Mengeluarkan sebarang surat rasmi program.', 0),
(23, 42, 'Menyediakan minit mesyuarat.', 0),
(24, 43, 'Menyediakan belanjawan program.', 0),
(25, 43, 'Mengutip yuran peserta.', 0),
(26, 43, 'Menguruskan sebarang masalah kewangan.', 0),
(27, 44, 'Menyediakan alatan PA sistem dan barangan yang diperlukan semasa program berjalan.', 0),
(28, 45, 'Berhubung dengan pihak-pihak bagi mendapatkan semua maklumat yang diperlukan.', 0),
(29, 45, 'Menguruskan tempahan pengangkutan.', 0),
(30, 45, 'Menyediakan bajet yang diperlukan.', 0),
(31, 46, 'Memastikan kebersihan semasa, sebelum dan selepas program berlangsung.', 0),
(32, 46, 'Memastikan kebersihan semasa, sebelum dan selepas program berlangsung.', 0),
(33, 47, 'Menyediakan poster, banner, video dan sebagainya', 0),
(34, 47, 'Mereka baju sukarelawan dan ahli jawatankuasa.', 0),
(35, 47, 'Mempromosikan program fakulti supaya dapat menarik minat pelajar untuk menyertai program ini.', 0),
(36, 47, 'Mengambil gambar sebagai bahan pembuktian.', 0),
(37, 48, 'Berhubung dengan penjual untuk membuat penjualan ', 0),
(38, 48, 'Menyediakan hadiah dan cenderahati untuk peserta dan tetamu jemputan', 0),
(39, 49, 'Menyediakan teks ucapan pengerusi majlis dan pengarah program.', 0),
(40, 49, 'Menyediakan kad jemputan kepada penceramah sekiranya perlu.', 0),
(41, 49, 'Memastikan kelancaran program.', 0),
(42, 50, 'Menyediakan makanan untuk tetamu jemputan', 0),
(43, 50, 'Memastikan makanan mencukupi untuk semua jawatankuasa dan sukarelawan', 0),
(44, 50, 'Memastikan makanan dalam keadaan yang baik dan elok', 0),
(45, 51, 'Membantu semua unit apabila mereka menghadapi masalah ataupun memerlukan pertolongan', 0),
(46, 51, 'Mengemaskinikan aktiviti unit-unit lain.', 0),
(47, 52, 'Berhubung dengan unit E-sport UNIMAS', 0),
(48, 52, 'Mempelawa syarikat pengkomputeran untuk membuat pameran ataupun penjualan', 0),
(49, 54, 'Berhubung dengan pensyarah ataupun pelajar (master/ phD/ FYP) untuk memberikan ceramah/bengkel', 0),
(50, 54, 'Berhubung dengan penceramah luar untuk memberikan ceramah/bengkel', 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_detail`
--

CREATE TABLE `org_detail` (
  `idOrg_detail` int(11) NOT NULL,
  `id_proposal` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ja_watan` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_detail`
--

INSERT INTO `org_detail` (`idOrg_detail`, `id_proposal`, `nama`, `ja_watan`, `password`) VALUES
(1, 1, 'Pn. NURUL ZAWIYAH BINTI MOHAMAD,Pn. EAQERZILLA PHANG', 'Penasihat', ''),
(2, 1, 'ABDUL MUHAIMIN BIN MUSTAFA BAKRI', 'Pengarah', ''),
(3, 1, 'RUSYDAN NAWAWI BIN ROHISHAM', 'Timbalan Pengarah I', ''),
(4, 1, 'GEERTHANAA A/P RAVI', 'Timbalan Pengarah II', ''),
(5, 1, 'KHALIF AMIR BIN ZAKRY,MEENAKSHI A/P KANNAN', 'Setiausaha', ''),
(6, 1, 'HEMA A/P GANESAN', 'Bendahari', ''),
(7, 1, 'SUREN A/L KRISHNAN', 'Ketua Unit Teknikal', ''),
(8, 1, 'ABU SAYED', 'Ketua Unit Logistik', ''),
(9, 1, 'KHALIF AMIR BIN ZAKRY,MEENAKSHI A/P KANNAN', 'Ketua Unit Perhubungan Luar', ''),
(10, 1, 'PRETY SURIAWATHY A/P JAYASURI,ALYA SYAZANA BINTI YUMAT', 'Ketua Unit Kebersihan dan Keselamatan', ''),
(11, 1, 'SIELAAH A/P SUPPIAH,REBECCAROOBABATHY A/P RAVICHANDRAN', 'Ketua Unit Publisiti', ''),
(12, 1, 'NALINA NARAYANI A/P SIVAPRESAAD', 'Ketua Unit Hadiah', ''),
(13, 1, 'TESHINIA TISA PHANG,ARIF AHAMED', 'Ketua Unit Protokol', ''),
(14, 1, 'MOHD AMIRUL BIN MOHD SOLIHIN', 'Ketua Unit STU', ''),
(15, 1, 'CATHERINE HII SENG JING', 'Ketua Program PC Fair', ''),
(16, 1, 'LEONG HAO XIAN', 'Ketua Program E-Games Tournament', ''),
(17, 1, 'NURUL ATIYAH BINTI MOHD SAYUNI,AMIZANURYANTI BINTI ALI', 'Ketua Program Talks and Workshops', ''),
(18, 1, 'MOHAMMAD FARHAAN IQBAL', 'Ketua Program IT Corner', ''),
(20, 2, 'MUHAMMED IJLAL BIN SABARUDIN', 'pengarah12', ''),
(38, 7, 'Dr. Suhaila bt Saee,En. Mohamad Johan bin Ahmad Khiri', 'Penasihat', 'penasihat11'),
(39, 7, 'MUHAMMED IJLAL BIN SABARUDIN', 'Pengarah', 'Pengarah12'),
(40, 7, 'RAFIQAH NABIHAH BINTI ROSSAZALI', 'Timbalan Pengarah I', 'TP1'),
(41, 7, 'CHEW CHA CHE', 'Timbalan Pengarah II', 'TP2'),
(42, 7, 'SITI NURHAMIZAH BINTI RAIM', 'Setiausaha', 'SU12'),
(43, 7, 'WAN NUR SYAZA BINTI WAN MOHAMAD NOROLAâ€™ASIKIN,SHARON EUGENA ANAK SAMBAU', 'Bendahari', 'bendahari12'),
(44, 7, 'UVARAJAN A/L MURUGEN', 'Ketua Unit Teknikal dan Logistik', 'kutl12'),
(45, 7, 'NUR AINA BALQIS BINTI MOHAMAD ROSIDEK,ETHAR HELMI ALI AL-ARASHI', 'Ketua Unit Perhubungan Luar dan Sponsorship', 'KUPLS12'),
(46, 7, 'NUR ADINA BINTI MOHD ABDUL LATIF', 'Ketua Unit Kebersihan dan Keselamatan', 'KUKK12'),
(47, 7, 'MUHD AFANDI ZAIDUL ,MUHAMMAD SYAFIQ BIN TALIB', 'Ketua Unit Media dan Publisiti', 'KUMP12'),
(48, 7, 'WAN FARAH AQILAH BINTI ABD LADI,SHANMUGAPIRIYA A/P SIVALINGAM', 'Ketua Unit Hadiah dan Bazaar', 'KUHB1212'),
(49, 7, 'HAZWANI BINIT ZAINI,SITI AZIMAH BINTI MOHAMED', 'Ketua Unit Protokol', 'KUP1212'),
(50, 7, 'MOHAMAD MUHIBBUDDIN BIN ZULKIFLI', 'Ketua Unit Makanan dan Minuman', 'KUMM11'),
(51, 7, 'KAVINES A/L MURUGIAH', 'Ketua Unit Tugas-Tugas Khas', 'KUTTK121'),
(52, 7, 'WELMA QASHEEDA BINTI HALEK', 'Ketua Program PC Fair & E-Games Tournament', 'KPET12'),
(53, 7, 'KANAGAAMUNIS A/L THANGASAJOO,WAN FARAH AQILAH BINTI ABD LADI', 'Ketua Program IT Run', 'KPITRUN'),
(54, 7, 'AVINASH RAO A/L CHANDRA RAO,KANAGAAMUNIS A/L THANGASAJOO', 'Ketua Program Talks and Workshops', 'KPTW'),
(55, 8, 'MUHAMMED IJLAL BIN SABARUDIN', 'president', 'presiden1'),
(56, 8, 'IFFAH NADZIRAH BINTI ISHAK', 'Timbalan President', 'timbalanpresident1');

-- --------------------------------------------------------

--
-- Table structure for table `org_name`
--

CREATE TABLE `org_name` (
  `idorg_name` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_name`
--

INSERT INTO `org_name` (`idorg_name`, `nama`) VALUES
(1, 'ABDUL MUHAIMIN BIN MUSTAFA BAKRI'),
(2, 'TESHINIA TISA PHANG'),
(3, 'KHALIF AMIR BIN ZAKRY'),
(4, 'MEENAKSHI A/P KANNAN'),
(5, 'HEMA A/P GANESAN'),
(6, 'PRETY SURIAWATHY A/P JAYASURI'),
(7, 'RUSYDAN NAWAWI BIN ROHISHAM'),
(8, 'MOHD AMIRUL BIN MOHD SOLIHIN'),
(9, 'NURUL ATIYAH BINTI MOHD SAYUNI'),
(10, 'ABU SAYED'),
(11, 'SUREN A/L KRISHNAN'),
(12, 'REBECCAROOBABATHY A/P RAVICHANDRAN'),
(13, 'MOHAMMAD FARHAAN IQBAL'),
(14, 'CATHERINE HII SENG JING'),
(15, 'SIELAAH A/P SUPPIAH'),
(16, 'ARIF AHAMED'),
(17, 'GEERTHANAA A/P RAVI'),
(18, 'LEONG HAO XIAN'),
(19, 'AMIZANURYANTI BINTI ALI'),
(20, 'NALINA NARAYANI A/P SIVAPRESAAD'),
(21, 'ALYA SYAZANA BINTI YUMAT'),
(22, 'Pn. NURUL ZAWIYAH BINTI MOHAMAD'),
(23, 'Pn. EAQERZILLA PHANG'),
(25, ''),
(26, 'MUHAMMED IJLAL BIN SABARUDIN'),
(30, 'MOHAMMED IJLAL BIN SABARUDIN'),
(31, 'MOHD AFANDI ZAIDUL'),
(32, 'SITI NURHAMIZAH BINTI RAIM'),
(33, 'JUSTIN WEE KIEN JIN'),
(34, 'WAN NUR SYAZA BINTI WAN MOHAMAD NOROLAâ€™ASIKIN'),
(35, 'SHARON EUGENA ANAK SAMBAU'),
(43, 'IFFAH NADZIRAH BINTI ISHAK'),
(44, 'WELMA QASHEEDA BINTI HALEK'),
(45, 'ETHAR HELMI ALI AL-ARASHI'),
(46, 'UVARAJAN A/L MURUGEN'),
(47, 'MOHAMAD MUHIBBUDDIN BIN ZULKIFLI'),
(48, 'SITI AZIMAH BINTI MOHAMED'),
(49, 'KANAGAAMUNIS A/L THANGASAJOO'),
(50, 'WAN FARAH AQILAH BINTI ABD LADI'),
(51, 'MUHAMMAD SYAFIQ BIN TALIB'),
(52, 'AVINASH RAO A/L CHANDRA RAO'),
(53, 'RAFIQAH NABIHAH BINTI ROSSAZALI'),
(54, 'SHANMUGAPIRIYA A/P SIVALINGAM'),
(55, 'CLARISSA NG TZER JING'),
(56, 'NUR FATIN AQILAH BINTI SHARIFUL ANUAR'),
(57, 'NUR AINA BALQIS BINTI MOHAMAD ROSIDEK'),
(58, 'CHEW CHA CHE'),
(59, 'NUR ADINA BINTI MOHD ABDUL LATIF'),
(60, 'KAVINES A/L MURUGIAH'),
(61, 'HAZWANI BINIT ZAINI'),
(62, 'Dr. Suhaila bt Saee'),
(63, 'En. Mohamad Johan bin Ahmad Khiri'),
(64, 'MUHD AFANDI ZAIDUL ');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `programId` int(11) NOT NULL,
  `proposaId` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`programId`, `proposaId`, `iduser`, `date`) VALUES
(1, 1, 0, '20-04-2018'),
(2, 1, 0, '21-04-2018'),
(3, 1, 0, '22-04-2018'),
(4, 1, 0, '23-04-2018'),
(5, 1, 0, '24-04-2018'),
(6, 1, 0, '25-04-2018'),
(7, 1, 0, '26-04-2018'),
(8, 1, 0, '27-04-2018'),
(9, 1, 0, '28-04-2018'),
(13, 7, 0, '09-03-2019'),
(14, 7, 0, '11-03-2019'),
(15, 7, 0, '12-03-2019'),
(16, 7, 0, '13-03-2019'),
(17, 7, 0, '14-03-2019'),
(18, 7, 0, '15-03-2019'),
(19, 8, 0, '02-05-2019');

-- --------------------------------------------------------

--
-- Table structure for table `programdetail`
--

CREATE TABLE `programdetail` (
  `IdprogramDetail` int(11) NOT NULL,
  `programid` int(11) NOT NULL,
  `time1` varchar(255) NOT NULL,
  `time2` varchar(255) NOT NULL,
  `acara` varchar(255) NOT NULL,
  `programLocation` varchar(255) NOT NULL,
  `ketuaUnit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programdetail`
--

INSERT INTO `programdetail` (`IdprogramDetail`, `programid`, `time1`, `time2`, `acara`, `programLocation`, `ketuaUnit`) VALUES
(1, 1, '9:00 AM', '4:30 PM', 'â€¢	PC FAIR BOOTH SETUP\r\nâ€¢	HALL SETUP\r\nâ€¢	REHEARSAL\r\n', 'DeTAR ', ''),
(2, 4, '9:00 AM', '11:00 AM', 'OPENING CEREMONY', 'DeTAR', '13'),
(3, 4, '9:00 AM', '9:00 PM', 'â€¢	PC FAIR\r\nâ€¢	IT CORNER\r\nâ€¢	E-GAMES TOURNAMENT\r\n         -DOTA 2\r\n         -CS:GO\r\n         -FIFA18', 'DeTAR', '15'),
(4, 4, '11:00 AM', '2:00 PM', 'SLOT FOR SPONSORS/VENDORS PROMOTION', 'DeTAR ', '18'),
(6, 2, '9:00 AM', '4:30 PM', 'â€¢	PC FAIR BOOTH SETUP\r\nâ€¢	HALL SETUP\r\nâ€¢	REHEARSAL\r\n', 'DeTAR', ''),
(10, 10, '9:30 AM', '4:30 PM', 'sss', 'testing ', ''),
(11, 11, '8:30 AM', '5:00 PM', 'sdsdd', 'adsd', ''),
(12, 13, '6:00 AM', '11:00 AM', 'IT week Opening Ceremony\r\nIT run\r\n', 'HEPA', ''),
(13, 13, '11:00 AM', '1:00 PM', 'Used clothes charity collection drive', 'Student Interaction Room,FSKTM', ''),
(14, 14, '8:00 AM', '5:00 PM', 'Setup talk\r\nSetup e-games tournament\r\nSetup bengkel\r\nSetup PC Fair/ exhibition\r\n', 'FSKTM dan Multi-purpose hall', ''),
(16, 15, '9:00 AM', '5:00 PM', 'E-Games Tournament\r\nâ€¢	Mobile Legend\r\nâ€¢	PUBG\r\nArcade	\r\nâ€¢	FIFA 18\r\nâ€¢	PES 18\r\nâ€¢	Naruto Shippuden 4\r\nâ€¢	Tekken 7\r\nâ€¢	Street Fighter\r\n', 'Multi-purpose hall', ''),
(17, 15, '9:00 AM', '12:00 PM', 'Talk 1: Gamification\r\nâ€¢	Naruto Shippuden 4\r\nâ€¢	Tekken 7\r\nâ€¢	Street Fighter\r\n', 'UNIX Lab', ''),
(18, 15, '8:30 AM', '5:00 PM', 'Used clothes charity collection ', 'Student Interaction Room, FSKTM', ''),
(19, 16, '9:00 AM', '5:00 PM', 'Gameboard showcase\r\nE-Games Tournament:\r\nâ€¢	Mobile Legend\r\nâ€¢	PUBG\r\nArcade:\r\nâ€¢	FIFA 18\r\nâ€¢	PES 18\r\nâ€¢	Naruto Shippuden 4\r\nâ€¢	Tekken 7\r\nâ€¢	Street Fighter\r\n', 'Multi-purpose hall', ''),
(20, 16, '9:00 AM', '12:00 PM', 'Talk 2: Computational Thinking\r\nâ€¢	PES 18\r\nâ€¢	Naruto Shippuden 4\r\nâ€¢	Tekken 7\r\nâ€¢	Street Fighter\r\n', 'TL1 & TL2 FSKTM', ''),
(21, 16, '11:30 AM', '1:00 PM', 'IT workshop 1', 'Lab 1 FSKTM', ''),
(22, 16, '9:00 AM', '5:00 PM', 'E-Games Tournament:\r\nâ€¢	Mobile Legend\r\nâ€¢	PUBG\r\nArcade:\r\nâ€¢	FIFA 18\r\nâ€¢	PES 18\r\nâ€¢	Naruto Shippuden 4\r\nâ€¢	Tekken 7\r\nâ€¢	Street Fighter', 'Multi-purpose hall', ''),
(23, 16, '9:00 AM', '12:00 PM', 'IT Workshop 2', 'Lab 1 FSKTM', ''),
(24, 16, '9:00 AM', '12:00 PM', 'Talk 4: IoT Agriculture', 'UNIX Lab FSKTM', ''),
(25, 17, '9:00 AM', '11:00 AM', 'E-Games Tournament:\r\nâ€¢	Mobile Legend\r\nâ€¢	PUBG\r\nArcade:\r\nâ€¢	FIFA 18\r\nâ€¢	PES 18\r\nâ€¢	Naruto Shippuden 4\r\nâ€¢	Tekken 7\r\nâ€¢	Street Fighter', 'Multi purpose-hall', ''),
(26, 17, '9:00 AM', '11:00 AM', 'IT Workshop 3', 'Lab 1 FSKTM', ''),
(27, 17, '9:00 AM', '11:00 AM', 'Talk 5', 'TMM FSKTM', ''),
(28, 17, '2:00 PM', '4:00 PM', 'Closing and Prize Giving ceremony', 'CTF1, DK', ''),
(29, 3, '9:00 AM', '4:30 PM', 'â€¢	PC FAIR BOOTH SETUP\r\nâ€¢	HALL SETUP\r\nâ€¢	REHEARSAL\r\n', 'DeTAR', ''),
(30, 5, '9:00 AM', '11:00 AM', 'UNIMAS eSports Ribbon Cutting Ceremony\r\n', 'DeTAR', ''),
(31, 5, '9:00 AM', '4:30 PM', 'Faculty Session\r\n', 'FSKTM', ''),
(32, 5, '11:00 AM', '9:00 PM', 'â€¢	PC FAIR\r\nâ€¢	IT CORNER\r\nâ€¢	E-GAMES TOURNAMENT\r\n      -DOTA 2\r\n      -CS:GO\r\n      -FIFA18', 'DeTAR ', ''),
(33, 5, '11:00 AM', '2:00 PM', 'SLOT FOR SPONSORS / VENDORS PROMOTION', 'DeTAR ', ''),
(34, 6, '9:00 AM', '9:00 PM', 'â€¢	PC FAIR\r\nâ€¢	IT CORNER\r\nâ€¢	E-GAMES TOURNAMENT\r\n        -DOTA 2\r\n        -CS:GO\r\n        -FIFA18', 'DeTAR', ''),
(35, 6, '11:00 AM', '2:00 PM', 'SLOT FOR SPONSORS / VENDORS PROMOTION', 'DeTAR', ''),
(36, 6, '2:00 PM', '5:00 PM', 'TALK 1', 'DeTAR', ''),
(37, 6, '2:00 PM', '5:00 PM', 'HOUR OF CODE 1', 'LAB, FCSIT', ''),
(38, 7, '9:00 AM', '9:00 PM', 'â€¢	PC FAIR\r\nâ€¢	IT CORNER\r\nâ€¢	E-GAMES TOURNAMENT\r\n-DOTA 2\r\n-CS:GO\r\n-FIFA18', 'DeTAR', ''),
(39, 7, '9:00 AM', '11:00 AM', 'HOUR OF CODE 2', 'LAB, FCSIT', ''),
(40, 7, '9:00 AM', '11:00 AM', 'TALK 2', 'DeTAR', ''),
(41, 7, '9:00 AM', '12:00 PM', 'MOBILE APP DEVELOPMENT 1', 'LAB, FCSIT', ''),
(42, 7, '8:30 AM', '5:00 PM', 'MOBILE APP DEVELOPMENT 1', 'LAB, FCSIT', ''),
(43, 7, '11:00 AM', '2:00 PM', '\r\nSLOT FOR SPONSORS / VENDORS PROMOTION\r\n', 'DeTAR', ''),
(44, 7, '2:00 PM', '4:00 PM', 'MOBILE APP DEVELOPMENT 2', 'LAB, FCSIT', ''),
(45, 8, '9:00 AM', '9:00 PM', 'â€¢	PC FAIR\r\nâ€¢	IT CORNER\r\nâ€¢	E-GAMES TOURNAMENT\r\n-DOTA 2\r\n-CS:GO\r\n-FIFA18', 'DeTAR', ''),
(46, 8, '9:00 AM', '12:00 PM', 'WEB DEVELOPMENT WORKSHOP 1', 'LAB, FCSIT', ''),
(47, 8, '11:00 AM', '2:00 PM', 'SLOT FOR SPONSORS / VENDORS PROMOTION', 'DeTAR', ''),
(48, 8, '2:00 PM', '4:00 PM', 'WEB DEVELOPMENT WORKSHOP 2', 'LAB, FCSIT', ''),
(49, 19, '8:00 AM', '9:00 AM', '1', '1', ''),
(55, 19, '8:30 AM', '5:00 PM', '2', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `proposald` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `proposalTitle` varchar(255) NOT NULL,
  `date1` varchar(255) NOT NULL,
  `date2` varchar(255) NOT NULL,
  `time_1` varchar(255) NOT NULL,
  `time_2` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `tujuan` text NOT NULL,
  `pendahuluan` text NOT NULL,
  `objektif` text NOT NULL,
  `event` varchar(255) NOT NULL,
  `penganjur` text NOT NULL,
  `sasaran` varchar(255) NOT NULL,
  `jemputanLuar` varchar(255) NOT NULL,
  `jemputanDalam` varchar(255) NOT NULL,
  `kolaborasi` varchar(255) NOT NULL,
  `penutup` text NOT NULL,
  `activityPostmortem` text NOT NULL,
  `dekan_comment` varchar(255) NOT NULL,
  `td_comment` varchar(255) NOT NULL,
  `proposalStatus` int(11) NOT NULL,
  `proposalStatus2` int(11) NOT NULL,
  `AcaSession` varchar(255) NOT NULL,
  `calPro` int(11) NOT NULL,
  `calAct` int(11) NOT NULL,
  `calInc` int(11) NOT NULL,
  `calOut` int(11) NOT NULL,
  `calEqu` int(11) NOT NULL,
  `calProg` int(11) NOT NULL,
  `cal_ap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`proposald`, `iduser`, `proposalTitle`, `date1`, `date2`, `time_1`, `time_2`, `location`, `tujuan`, `pendahuluan`, `objektif`, `event`, `penganjur`, `sasaran`, `jemputanLuar`, `jemputanDalam`, `kolaborasi`, `penutup`, `activityPostmortem`, `dekan_comment`, `td_comment`, `proposalStatus`, `proposalStatus2`, `AcaSession`, `calPro`, `calAct`, `calInc`, `calOut`, `calEqu`, `calProg`, `cal_ap`) VALUES
(1, 1, 'IT WEEK 2018', '20-04-2018', '28-04-2018', '8:30 AM', '5:00 PM', 'DEWAN TUNKU ABDUL RAHMAN PUTRA (DeTAR PUTRA) dan FSKTM UNIMAS', 'Kertas kerja ini dikemukan adalah untuk memohon pertimbangan yang sewajarnya daripada pihak Universiti Malaysia Sarawak (UNIMAS) agar meluluskan aktiviti serta keperluan bagi program ini.', 'Persatuan Teknologi Maklumat (PERTEKMA) merupakan persatuan di Fakulti Sains Komputer dan Teknologi Maklumat (FSKTM). Persatuan ini ditubuhkan dan berdaftar di bawah Pusat Kemajuan Pelajar UNIMAS pada 1 November 1997. Pelajar di fakulti ini akan menjadi ahli PERTEKMA secara automatik dan diuruskan di bawah pentadbiran fakulti.  Objektif utama penubuhan PERTEKMA adalah untuk membina satu saluran yang berkesan yang berfungsi sebagai pengantara komunikasi di antara pihak fakulti dan juga para pelajar.\r\nProgram IT Week 2018 adalah satu projek yang terdiri daripada beberapa program sepanjang minggu tersebut. Warga UNIMAS dan komuniti luar berpeluang untuk menyertai program-program yang dianjurkan. Acara-acara yang diadakan adalah berkait rapat dengan bidang sains komputer dan teknologi maklumat.\r\nProgram ini disasarkan secara umumnya kepada warga-warga UNIMAS dan warga-warga FSKTM secara khususnya dan juga masyarakat luar terutamanya yang berada di kawasan Kuching dan Samarahan.\r\n', 'i)	Memberi pendedahan dalam bidang sains computer dan teknologi maklumat kepada warga UNIMAS.\r\nii)	Menggalakkan warga UNIMAS khususnya para pelajar untuk menjadi lebih proaktif dalam bidang sains computer.\r\niii)	Mengetengahkan bakat dan potensi warga UNIMAS terutamanya dalam bidang sains computer dan teknologi maklumat.\r\niv)	Mengeratkan hubungan silaturahim di antara warga UNIMAS dan komuniti luar.\r\nv)	Pelajar dan warga UNIMAS akan menunjukkan kebolehan untuk menganalisis masalah dan mengenalpasti dan menentukan keperluan pengkomputeran yang sesuai dengan penyelesaiannya.\r\n', '', 'Persatuan Teknologi Maklumat (PERTEKMA) dengan kerjasama Fakulti Sains Komputer dan Teknologi Maklumat (FSKTM), UNIMAS eSports Club, UNIMAS Programming Club, MaGic Sarawak dan Ingram Micro.', '1.	Pelajar UNIMAS\r\n2.	Komuniti di bahagian Samarahan dan Kuching.\r\n3.	Pelajar sekolah bahagian Samarahan dan Kuching.\r\n', 'o	INGRAM Micro\r\no	Gizmo Arena\r\no	Microsoft Student Partner \r\no	Campus Youth\r\no	MaGic\r\n', 'o	Yang Berhormat Datuk Snowdan Lawan (Menteri Belia & Sukan Sarawak)\r\no	Timbalan Naib Canselor (Hal Ehwal Pelajar & Alumni) UNIMAS, YBhg Prof Mohd Fadzil Abdul Rahman\r\no	Dekan Fakulti Sains Komputer dan Teknologi Maklumat, UNIMAS, Dr. Johari bin Abdullah\r', 'o	Gizmo Arena\r\no	Microsoft Student Partner\r\no	Campus Youth\r\no	UNIMAS Programmingâ€™s Club\r\no	UNIMAS eSports Club\r\no	Magic Sarawak\r\n', 'Jawatankuasa pelaksana program ini berharap agar program ini mendapat sokongan dan kebenaran dari pihak UNIMAS agar dapat dilaksanakan dengan jayanya berikutan program ini mempunyai objektifnya yang tersendiri dalam usaha untuk merakyatkan mahasiswa UNIMAS di samping mewujudkan peluang untuk berbakti kepada komuniti luar. Sehubungan itu, kerjasama dan bantuan daripada semua pihak adalah amat dialu-alukan demi menjayakan program ini. Segala kerjasama dan perhatian daripada pihak UNIMAS amatlah dihargai dan didahului dengan jutan terima kasih. Sekian, terima kasih.', 'Testing123gggg', '', 'testing 123', 1, 1, 'PERTEKMA 2017/2018', 16, 1, 1, 1, 1, 1, 0),
(7, 1, 'IT Week 2019 ', '09-03-2019', '15-03-2019', '9:00 AM', '5:00 PM', 'FSKTM dan Dewan Serbaguna Student Pavilion', 'Kertas kerja ini dikemukan adalah untuk memohon pertimbangan yang sewajarnya daripada pihak Universiti Malaysia Sarawak (UNIMAS) agar meluluskan aktiviti serta keperluan bagi program ini.', 'Persatuan Teknologi Maklumat (PERTEKMA) merupakan persatuan di Fakulti Sains Komputer dan Teknologi Maklumat (FSKTM). Persatuan ini ditubuhkan dan berdaftar di bawah Pusat Kemajuan Pelajar UNIMAS pada 1 November 1997. Pelajar di fakulti ini akan menjadi ahli PERTEKMA secara automatic dan diuruskan di bawah pentadbiran fakulti.  Objektif utama penubuhan PERTEKMA adalah untuk membina satu saluran yang berkesan yang berfungsi sebagai pengantara komunikasi di antara pihak fakulti dan juga para pelajar.\r\nProgram IT Week 2019 adalah satu projek yang terdiri daripada beberapa program sepanjang minggu tersebut. Warga UNIMAS dan komuniti luar berpeluang untuk menyertai program-program yang dianjurkan. Acara-acara yang diadakan adalah berkait rapat dengan bidang sains komputer dan teknologi maklumat.\r\nProgram ini disasarkan secara umumnya kepada warga-warga UNIMAS dan warga-warga FSKTM secara khususnya dan juga masyarakat luar terutamanya yang berada di kawasan Kuching dan Samarahan.\r\n', 'i)	Memberi pendedahan dalam bidang sains computer dan teknologi maklumat kepada warga UNIMAS.\r\nii)	Menggalakkan warga UNIMAS khususnya para pelajar untuk menjadi lebih proaktif dalam bidang sains computer.\r\niii)	Mengetengahkan bakat dan potensi warga UNIMAS\r\niv)	Mengeratkan hubungan silaturahim di antara warga UNIMAS dan komuniti luar.\r\nv)	Pelajar dan warga UNIMAS akan menunjukkan kebolehan untuk menganalisis masalah dan mengenal pasti dan menentukan keperluan pengkomputeran yang sesuai dengan penyelesaiannya.\r\n', '', 'Persatuan Teknologi Maklumat (PERTEKMA)\r\nDengan kerjasama:\r\nFakulti Sains Komputer dan Teknologi Maklumat (FSKTM), Malaysian Global Innovation & Creativity Centre, Tabung Ekonomi Gagasan Anak Bumiputera Sarawak, Gizmo Arena, UNIMAS eSports Club, UNIMAS Pr', 'Semua warga UNIMAS dan penetap luar UNIMAS \r\nJumlah peserta: 2000 orang \r\n\r\nPelajar-pelajar sekolah menengah dan rendah sekitar Kuching & Samarahan \r\nJumlah peserta: 2000 orang', 'â€¢	YBhg Prof Datu  Mohd Fadzil Abdul Rahman', 'â€¢	Timbalan Naib Canselor (Hal EhwalPelajar& Alumni) UNIMAS\r\nâ€¢	Dekan Fakulti Sains Komputer dan Teknologi Maklumat, UNIMAS, Dr. Johari bin Abdullah\r\nâ€¢	Pengarah, CICTS UNIMAS, En. Harun bin Maksom', 'â€¢	Malaysian Global Innovation & Creativity Centre\r\nâ€¢	Tabung Ekonomi Gagasan Anak Bumiputera Sarawak\r\nâ€¢	Gizmo Arena\r\nâ€¢	UNIMAS eSports Club\r\nâ€¢	UNIMAS Programming Club\r\n\r\n', 'Jawatankuasa pelaksana program ini berharap agar program ini mendapat sokongan dan kebenaran dari pihak UNIMAS agar dapat dilaksanakan dengan jayanya berikutan program ini mempunyai objektifnya yang tersendiri dalam usaha untuk merakyatkan mahasiswa UNIMAS di samping mewujudkan peluang untuk berbakti kepada komuniti luar. Sehubungan itu, kerjasama dan bantuan daripada semua pihak adalah amat dialu-alukan demi menjayakan program ini. Segala kerjasama dan perhatian daripada pihak UNIMAS amatlah dihargai dan didahului dengan jutan terima kasih. Sekian, terima kasih.', '', '', 'cek back proposal', 1, 1, 'PERTEKMA 2018/2019', 16, 0, 1, 1, 1, 1, 0),
(8, 1, 'minggu aluan pelajar', '02-05-2019', '04-05-2019', '9:00 AM', '5:00 PM', 'bmu', 'a', 'a', 'b', '', 'ggfg', 'sds', 'b', 'b', 'b', 'fffffff', '', '', 'redo the proposal', 2, 0, 'PERTEKMA 2018/2019', 16, 1, 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `ID_proposal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `status`, `ID_proposal`) VALUES
(1, 'superadmin', 'superadmin', 2, 7),
(2, 'admin', 'admin', 3, 0),
(3, 'user', 'user', 4, 7),
(4, 'Dekan', 'dekan12345', 5, 0),
(5, 'Timbalan Dekan', 'td12345', 6, 0),
(20, 'Penasihat', 'penasihat11', 2, 7),
(21, 'Pengarah', 'Pengarah12', 3, 7),
(22, 'Timbalan Pengarah I', 'TP1', 3, 7),
(23, 'Timbalan Pengarah II', 'TP2', 3, 7),
(24, 'Setiausaha', 'SU12', 3, 7),
(25, 'Bendahari', 'bendahari12', 3, 7),
(26, 'Ketua Unit Teknikal dan Logistik', 'kutl12', 4, 7),
(27, 'Ketua Unit Perhubungan Luar dan Sponsorship', 'KUPLS12', 4, 7),
(28, 'Ketua Unit Kebersihan dan Keselamatan', 'KUKK12', 4, 7),
(29, 'Ketua Unit Media dan Publisiti', 'KUMP12', 4, 7),
(30, 'Ketua Unit Hadiah dan Bazaar', 'KUHB1212', 4, 7),
(31, 'Ketua Unit Protokol', 'KUP1212', 4, 7),
(32, 'Ketua Unit Makanan dan Minuman', 'KUMM11', 4, 7),
(33, 'Ketua Unit Tugas-Tugas Khas', 'KUTTK121', 4, 7),
(34, 'Ketua Program PC Fair & E-Games Tournament', 'KPET12', 4, 7),
(35, 'Ketua Program IT Run', 'KPITRUN', 4, 7),
(36, 'Ketua Program Talks and Workshops', 'KPTW', 4, 7),
(37, 'president', 'presiden1', 3, 8),
(38, 'Timbalan President', 'timbalanpresident1', 3, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicsession`
--
ALTER TABLE `academicsession`
  ADD PRIMARY KEY (`acaSessionId`);

--
-- Indexes for table `acadetail`
--
ALTER TABLE `acadetail`
  ADD PRIMARY KEY (`idacaDetail`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activityId`);

--
-- Indexes for table `activitymonitoring`
--
ALTER TABLE `activitymonitoring`
  ADD PRIMARY KEY (`id_activitymonitoring`);

--
-- Indexes for table `b_income`
--
ALTER TABLE `b_income`
  ADD PRIMARY KEY (`incomeId`);

--
-- Indexes for table `b_outcome`
--
ALTER TABLE `b_outcome`
  ADD PRIMARY KEY (`outcomeId`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`idequipment`);

--
-- Indexes for table `equipmentdetail`
--
ALTER TABLE `equipmentdetail`
  ADD PRIMARY KEY (`idequipmentdetail`);

--
-- Indexes for table `job_scope`
--
ALTER TABLE `job_scope`
  ADD PRIMARY KEY (`jobscope_id`);

--
-- Indexes for table `org_detail`
--
ALTER TABLE `org_detail`
  ADD PRIMARY KEY (`idOrg_detail`);

--
-- Indexes for table `org_name`
--
ALTER TABLE `org_name`
  ADD PRIMARY KEY (`idorg_name`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`programId`);

--
-- Indexes for table `programdetail`
--
ALTER TABLE `programdetail`
  ADD PRIMARY KEY (`IdprogramDetail`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`proposald`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicsession`
--
ALTER TABLE `academicsession`
  MODIFY `acaSessionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `acadetail`
--
ALTER TABLE `acadetail`
  MODIFY `idacaDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `activitymonitoring`
--
ALTER TABLE `activitymonitoring`
  MODIFY `id_activitymonitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `b_income`
--
ALTER TABLE `b_income`
  MODIFY `incomeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `b_outcome`
--
ALTER TABLE `b_outcome`
  MODIFY `outcomeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `idequipment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `equipmentdetail`
--
ALTER TABLE `equipmentdetail`
  MODIFY `idequipmentdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `job_scope`
--
ALTER TABLE `job_scope`
  MODIFY `jobscope_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `org_detail`
--
ALTER TABLE `org_detail`
  MODIFY `idOrg_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `org_name`
--
ALTER TABLE `org_name`
  MODIFY `idorg_name` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `programId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `programdetail`
--
ALTER TABLE `programdetail`
  MODIFY `IdprogramDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `proposald` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
