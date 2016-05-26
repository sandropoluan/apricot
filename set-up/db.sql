-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2016 at 09:20 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` bigint(20) UNSIGNED NOT NULL,
  `artikel_judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_kategori` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `artikel_tags` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_foto` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_sbg_headline` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `artikel_tgl_posting` datetime NOT NULL,
  `artikel_id_user` bigint(20) NOT NULL,
  `artikel_tgl_last_edit` datetime NOT NULL,
  `artikel_editable` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `artikel_id_user_last_edit` int(11) NOT NULL,
  `artikel_seo_url` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_meta_description` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_meta_author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_meta_keyword` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_og_image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_og_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_og_description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_in_draft` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `artikel_aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `artikel_terhapus` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `artikel_status` enum('publish','draft','deleted') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artikel_was_published` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `artikel_sesi_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_dibaca` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikel_id`, `artikel_judul`, `artikel_isi`, `artikel_kategori`, `artikel_tags`, `artikel_foto`, `artikel_sbg_headline`, `artikel_tgl_posting`, `artikel_id_user`, `artikel_tgl_last_edit`, `artikel_editable`, `artikel_id_user_last_edit`, `artikel_seo_url`, `artikel_meta_description`, `artikel_meta_author`, `artikel_meta_keyword`, `artikel_og_image`, `artikel_og_title`, `artikel_og_description`, `artikel_in_draft`, `artikel_aktif`, `artikel_terhapus`, `artikel_status`, `artikel_was_published`, `artikel_sesi_id`, `artikel_dibaca`) VALUES
(1, 'Vestibulum molestie, tellus nec luctus tempor', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac metus arcu. Vestibulum tristique ante tellus, rutrum elementum purus ultricies eu. Vestibulum molestie, tellus nec luctus tempor, justo diam venenatis purus, at auctor ipsum nulla a ipsum. Vestibulum accumsan faucibus fermentum. Proin pretium finibus ex ac tempor. Etiam euismod lorem vitae massa lacinia, non venenatis magna consequat. Quisque mattis condimentum mollis. Nulla mollis, orci quis viverra tempus, libero risus laoreet tellus, nec facilisis arcu lectus convallis ex. Mauris semper justo eget tellus fringilla venenatis. Etiam a augue varius, tincidunt nulla et, laoreet ligula. Mauris lacus libero, pretium eget efficitur ut, porta non felis. Nulla sit amet mollis lacus.</p>\n<p>Vestibulum quis lectus dui. Nulla enim mi, malesuada at efficitur vitae, varius eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec lacus eu neque varius eleifend sit amet sit amet turpis. Aliquam pellentesque maximus libero. Nunc dictum turpis quis justo fermentum accumsan. Aliquam porta egestas libero, at elementum ligula malesuada sed. Duis molestie felis sed odio vulputate congue. Duis dapibus vehicula tortor nec tincidunt. Aliquam aliquet nibh arcu.</p>\n<p>Pellentesque in ligula condimentum, condimentum nibh at, facilisis quam. Sed feugiat suscipit erat, quis blandit nunc viverra eu. Maecenas eget eleifend dolor. Cras maximus porttitor augue, eget iaculis felis. Sed malesuada nunc vel auctor auctor. Quisque porta sapien vel ornare porttitor. Vestibulum imperdiet rutrum elit, quis consequat libero auctor at. Nunc ac dui lacus. Vivamus lacinia elit est, id interdum magna mollis eget. Vivamus ullamcorper magna non ipsum mollis, quis ornare lacus pulvinar. Donec metus quam, feugiat in ligula ac, interdum dignissim metus. Donec massa ex, ullamcorper vel posuere sit amet, auctor vel ex. Praesent porta, enim quis gravida vestibulum, nisi enim rutrum tellus, nec hendrerit odio orci eget metus.</p>', 5, '5,2,1', '', 'Y', '2016-04-14 02:59:20', 1, '2016-04-14 02:59:20', 'Y', 1, 'vestibulum-molestie-tellus-nec-luctus-tempor', '', '', '', '', '', '', 'N', 'Y', 'N', 'publish', 'Y', '34340131604', 0),
(2, 'Proin feugiat enim ut quam hendrerit elementum', '<p>Sed feugiat suscipit erat, quis blandit nunc viverra eu. Maecenas eget eleifend dolor. Cras maximus porttitor augue, eget iaculis felis. Sed malesuada nunc vel auctor auctor. Quisque porta sapien vel ornare porttitor. Vestibulum imperdiet rutrum elit, quis consequat libero auctor at. Nunc ac dui lacus. Vivamus lacinia elit est, id interdum magna mollis eget. Vivamus ullamcorper magna non ipsum mollis, quis ornare lacus pulvinar. Donec metus quam, feugiat in ligula ac, interdum dignissim metus. Donec massa ex, ullamcorper vel posuere sit amet, auctor vel ex. Praesent porta, enim quis gravida vestibulum, nisi enim rutrum tellus, nec hendrerit odio orci eget metus.</p>\n<p>Suspendisse pellentesque dapibus ipsum sed malesuada. Proin feugiat enim ut quam hendrerit elementum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce consectetur molestie elementum. Fusce in dui ac elit volutpat accumsan sit amet quis nibh. Nam maximus rhoncus lorem, maximus mollis dui iaculis id. Morbi ut ligula nec sapien pharetra luctus quis at erat. Phasellus in ante dapibus, fermentum lorem ac, mollis enim. Proin non neque tellus. Nullam malesuada tincidunt augue ac fermentum. Donec pellentesque sit amet ex eu posuere. Cras lobortis tellus ac enim interdum, sit amet commodo dolor interdum. Pellentesque lobortis, sapien sed mattis vehicula, leo magna elementum turpis, a molestie risus diam eget libero. Proin pulvinar sapien augue, nec ornare orci bibendum ut. Suspendisse potenti. In lacus ante, viverra ac neque et, fringilla tincidunt libero.</p>\n<p>Cras vitae felis ut lacus auctor ultricies eu quis diam. Morbi ullamcorper nec neque ac vestibulum. Etiam in pellentesque leo. Morbi efficitur, orci eu aliquam fermentum, neque elit vestibulum dolor, sit amet aliquam nisl tellus sit amet tellus. Ut nec nisi placerat orci commodo ornare. Proin sed nibh maximus, dignissim massa nec, aliquet odio. Nullam ultricies diam pellentesque, tempor purus et, faucibus erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis sed cursus orci. Sed bibendum justo non urna rutrum, non euismod sem ullamcorper. In imperdiet justo ex, nec feugiat magna aliquam dictum.</p>\n<p>Donec efficitur orci velit, interdum bibendum nulla vulputate eget. Nam dapibus eros eleifend, fringilla magna vitae, porttitor nibh. Fusce mollis nisl non tempus vulputate. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse vitae hendrerit arcu, sed feugiat velit. Pellentesque non tortor lectus. Sed vel urna lacus. Nunc sed magna id urna bibendum aliquam sed ac nibh. Nulla maximus pellentesque felis et ornare. Nunc placerat dui at tortor luctus rhoncus. Sed ut porttitor dolor, ut suscipit dui. Pellentesque imperdiet nulla risus, et porttitor lacus fringilla vitae. Integer eleifend nisl vitae dapibus dignissim. Suspendisse et mi eu dolor dapibus ullamcorper nec et mi.</p>', 5, '4,2', '', 'Y', '2016-04-14 03:18:19', 1, '0000-00-00 00:00:00', 'Y', 0, 'proin-feugiat-enim-ut-quam-hendrerit-elementum', '', '', '', '', '', '', 'N', 'Y', 'N', 'publish', 'Y', '63108131604', 0),
(3, 'Pellentesque consectetur nunc eget nisi gravida', '<p>Donec efficitur orci velit, interdum bibendum nulla vulputate eget. Nam dapibus eros eleifend, fringilla magna vitae, porttitor nibh. Fusce mollis nisl non tempus vulputate. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse vitae hendrerit arcu, sed feugiat velit. Pellentesque non tortor lectus. Sed vel urna lacus. Nunc sed magna id urna bibendum aliquam sed ac nibh. Nulla maximus pellentesque felis et ornare. Nunc placerat dui at tortor luctus rhoncus. Sed ut porttitor dolor, ut suscipit dui. Pellentesque imperdiet nulla risus, et porttitor lacus fringilla vitae. Integer eleifend nisl vitae dapibus dignissim. Suspendisse et mi eu dolor dapibus ullamcorper nec et mi.</p>\n<p>Sed vulputate ex odio, vel sagittis arcu feugiat et. Curabitur feugiat elementum risus, non ultrices elit suscipit eget. Donec rutrum tempor dolor, id mattis ligula viverra et. Ut enim est, faucibus eget urna id, egestas ullamcorper lacus. Ut lacinia ex eu velit condimentum ultricies. Nam vehicula, ante id varius dictum, augue neque finibus nisi, hendrerit mattis erat nisl non enim. Sed lobortis accumsan eros a consectetur. Nulla porta pharetra eros, id eleifend mauris tincidunt id. Nulla massa tellus, posuere a lacus sit amet, vehicula pretium lacus.</p>\n<p>Nam fringilla posuere ex, ut euismod orci scelerisque id. Morbi eget orci vel dui sollicitudin suscipit facilisis eget odio. Pellentesque vehicula purus sed lacus bibendum, sed dictum libero molestie. Suspendisse molestie nibh tellus, et congue risus dictum a. Nulla semper, magna faucibus laoreet dignissim, nibh arcu dictum magna, sit amet condimentum orci elit sit amet risus. Curabitur mauris lorem, lacinia sit amet erat ut, gravida maximus justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum scelerisque quis dui sed pharetra. Proin aliquam consectetur est. Nunc egestas laoreet gravida.</p>', 5, '2,5', '', 'Y', '2016-04-14 03:32:22', 1, '0000-00-00 00:00:00', 'Y', 0, 'pellentesque-consectetur-nunc-eget-nisi-gravida', '', '', '', '', '', '', 'N', 'Y', 'N', 'publish', 'Y', '30370131604', 0),
(4, ' Cras molestie orci id lacus sodales hendrerit', '<p>Nunc sed magna id urna bibendum aliquam sed ac nibh. Nulla maximus pellentesque felis et ornare. Nunc placerat dui at tortor luctus rhoncus. Sed ut porttitor dolor, ut suscipit dui. Pellentesque imperdiet nulla risus, et porttitor lacus fringilla vitae. Integer eleifend nisl vitae dapibus dignissim. Suspendisse et mi eu dolor dapibus ullamcorper nec et mi.</p>\n<p>Sed vulputate ex odio, vel sagittis arcu feugiat et. Curabitur feugiat elementum risus, non ultrices elit suscipit eget. Donec rutrum tempor dolor, id mattis ligula viverra et. Ut enim est, faucibus eget urna id, egestas ullamcorper lacus. Ut lacinia ex eu velit condimentum ultricies. Nam vehicula, ante id varius dictum, augue neque finibus nisi, hendrerit mattis erat nisl non enim. Sed lobortis accumsan eros a consectetur. Nulla porta pharetra eros, id eleifend mauris tincidunt id. Nulla massa tellus, posuere a lacus sit amet, vehicula pretium lacus.</p>\n<p>Nam fringilla posuere ex, ut euismod orci scelerisque id. Morbi eget orci vel dui sollicitudin suscipit facilisis eget odio. Pellentesque vehicula purus sed lacus bibendum, sed dictum libero molestie. Suspendisse molestie nibh tellus, et congue risus dictum a. Nulla semper, magna faucibus laoreet dignissim, nibh arcu dictum magna, sit amet condimentum orci elit sit amet risus. Curabitur mauris lorem, lacinia sit amet erat ut, gravida maximus justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum scelerisque quis dui sed pharetra. Proin aliquam consectetur est. Nunc egestas laoreet gravida.</p>\n<p>Pellentesque consectetur nunc eget nisi gravida, aliquam egestas diam sagittis. Fusce pulvinar porta facilisis. Sed viverra facilisis vulputate. Nunc non ipsum ac sapien sagittis aliquet a eget magna. Nulla fermentum finibus ipsum eget porta. Cras tempor est non suscipit fringilla. Nam efficitur nunc fermentum risus faucibus, non semper elit faucibus. Cras id nunc nulla.</p>\n<p>In hac habitasse platea dictumst. Cras molestie orci id lacus sodales hendrerit. Duis est mi, venenatis et iaculis eu, ultrices eu erat. Ut metus mauris, placerat sed purus vel, fringilla sollicitudin leo. Aliquam cursus turpis a est semper dictum. Integer vitae turpis in neque ullamcorper hendrerit. Nullam ut eros nec quam vestibulum semper. Nulla viverra euismod facilisis. Vestibulum sed diam nibh. Aliquam et nunc eu eros consectetur aliquet at vel ante. Sed sed ipsum viverra, pellentesque urna eget, convallis nisl. Nunc eu elit cursus leo vestibulum egestas vel id libero. Duis malesuada at velit a condimentum. Ut blandit orci enim, id viverra erat malesuada blandit</p>', 5, '1,4,3', '', 'Y', '2016-04-14 03:38:45', 1, '0000-00-00 00:00:00', 'Y', 0, 'cras-molestie-orci-id-lacus-sodales-hendrerit', '', '', '', '', '', '', 'N', 'Y', 'N', 'publish', 'Y', '6363131604', 0),
(5, 'Nam dapibus eros eleifend, fringilla magna vitae, porttitor nibh', '<p>Nullam ultricies diam pellentesque, tempor purus et, faucibus erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis sed cursus orci. Sed bibendum justo non urna rutrum, non euismod sem ullamcorper. In imperdiet justo ex, nec feugiat magna aliquam dictum.</p>\n<p>Donec efficitur orci velit, interdum bibendum nulla vulputate eget. Nam dapibus eros eleifend, fringilla magna vitae, porttitor nibh. Fusce mollis nisl non tempus vulputate. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse vitae hendrerit arcu, sed feugiat velit. Pellentesque non tortor lectus. Sed vel urna lacus. Nunc sed magna id urna bibendum aliquam sed ac nibh. Nulla maximus pellentesque felis et ornare. Nunc placerat dui at tortor luctus rhoncus. Sed ut porttitor dolor, ut suscipit dui. Pellentesque imperdiet nulla risus, et porttitor lacus fringilla vitae. Integer eleifend nisl vitae dapibus dignissim. Suspendisse et mi eu dolor dapibus ullamcorper nec et mi.</p>\n<p>Sed vulputate ex odio, vel sagittis arcu feugiat et. Curabitur feugiat elementum risus, non ultrices elit suscipit eget. Donec rutrum tempor dolor, id mattis ligula viverra et. Ut enim est, faucibus eget urna id, egestas ullamcorper lacus. Ut lacinia ex eu velit condimentum ultricies. Nam vehicula, ante id varius dictum, augue neque finibus nisi, hendrerit mattis erat nisl non enim. Sed lobortis accumsan eros a consectetur. Nulla porta pharetra eros, id eleifend mauris tincidunt id. Nulla massa tellus, posuere a lacus sit amet, vehicula pretium lacus.</p>\n<p>Nam fringilla posuere ex, ut euismod orci scelerisque id. Morbi eget orci vel dui sollicitudin suscipit facilisis eget odio. Pellentesque vehicula purus sed lacus bibendum, sed dictum libero molestie. Suspendisse molestie nibh tellus, et congue risus dictum a. Nulla semper, magna faucibus laoreet dignissim, nibh arcu dictum magna, sit amet condimentum orci elit sit amet risus. Curabitur mauris lorem, lacinia sit amet erat ut, gravida maximus justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum scelerisque quis dui sed pharetra. Proin aliquam consectetur est. Nunc egestas laoreet gravida.</p>', 5, '3,1,2', '', 'Y', '2016-04-14 03:46:53', 1, '0000-00-00 00:00:00', 'Y', 0, 'nam-dapibus-eros-eleifend-fringilla-magna-vitae-porttitor-nibh', '', '', '', '', '', '', 'N', 'Y', 'N', 'publish', 'Y', '456131604', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner_depan`
--

CREATE TABLE `banner_depan` (
  `id` int(11) NOT NULL,
  `gambar` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_href` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_text` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_depan`
--

INSERT INTO `banner_depan` (`id`, `gambar`, `header`, `caption`, `link_href`, `link_text`) VALUES
(1, 'http://localhost/cms/an-component/media/upload-gambar-pendukung/man-489744_1280.jpg', 'Cum sociis natoque', 'In aliquet quam et velit bibendum accumsan', '#', 'button'),
(2, 'http://localhost/cms/an-component/media/upload-gambar-pendukung/milky-way-1023340_1280.jpg', 'Vestibulum mollis', 'Duis lacinia fringilla massa. Cum sociis natoque penatibus et magnis dis parturient montes', '#', 'button'),
(3, 'http://localhost/cms/an-component/media/upload-gambar-pendukung/sparkler-677774_1280.jpg', 'Duis eu vehicula', ' Integer augue enim, sollicitudin\nullamcorper mattis eget, aliquam in est', '#', 'button'),
(4, 'http://localhost/cms/an-component/media/upload-gambar-pendukung/pen-581881_1280.jpg', 'Sed ut porttitor dolor, ut suscipit dui', ' Ut enim est, faucibus eget urna id, egestas ullamcorper lacus. Ut lacinia ex eu velit condimentum ultricies', '#', 'button');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_singkat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_fb` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `foto`, `deskripsi_singkat`, `deskripsi`, `link_fb`) VALUES
(1, 'Ando Poluan', 'http://localhost/cms/an-component/media/upload-gambar-pendukung/sandro-poluan.jpg', 'Praesent id pellentesque orci. Morbi congue viverra nisl nec rhoncus. Integer mattis, ipsum a tincidunt commodo, lacus arcu elementum elit, at mollis eros ante ac risus. In volutpat, ante at pretium ultricies, velit magna suscipit enim, aliquet blandit massa orci nec lorem. Nulla facilisi. ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `foto_artikel`
--

CREATE TABLE `foto_artikel` (
  `id_foto` bigint(20) UNSIGNED NOT NULL,
  `id_artikel` bigint(20) UNSIGNED NOT NULL,
  `nama_foto` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `token_foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_artikel`
--

INSERT INTO `foto_artikel` (`id_foto`, `id_artikel`, `nama_foto`, `featured`, `token_foto`) VALUES
(1, 1, 'easter-3.jpg', 'N', '0.6678904311266203'),
(2, 1, 'easter-2.jpg', 'N', '0.41757979673928336'),
(3, 1, 'easter-1.jpg', 'Y', '0.5253016542715023'),
(4, 2, 'fruit-4.jpg', 'N', ''),
(5, 2, 'fruit-3.jpg', 'Y', ''),
(6, 2, 'fruit-2.jpg', 'N', ''),
(7, 2, 'fruit-1.jpg', 'N', ''),
(8, 3, 'landscape-3.jpg', 'N', ''),
(9, 3, 'landscape-2.jpg', 'Y', ''),
(10, 3, 'landscape-1.jpg', 'N', ''),
(11, 3, 'landscape-4.jpg', 'N', ''),
(12, 4, 'cat-3.jpg', 'N', ''),
(13, 4, 'cat-4.jpg', 'N', ''),
(14, 4, 'cat-2.jpg', 'Y', ''),
(15, 4, 'cat-1.jpg', 'N', ''),
(16, 5, 'girl-4.jpg', 'N', ''),
(17, 5, 'girl-3.jpg', 'N', ''),
(18, 5, 'girl-2.jpg', 'N', ''),
(19, 5, 'girl-1.jpg', 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `foto_artikel_temp`
--

CREATE TABLE `foto_artikel_temp` (
  `id_foto` bigint(20) UNSIGNED NOT NULL,
  `nama_foto` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_foto` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sesi_form` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_galeri`
--

CREATE TABLE `foto_galeri` (
  `id_foto` bigint(20) UNSIGNED NOT NULL,
  `id_galeri` bigint(20) UNSIGNED NOT NULL,
  `nama_foto` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_foto` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_galeri`
--

INSERT INTO `foto_galeri` (`id_foto`, `id_galeri`, `nama_foto`, `token_foto`, `deskripsi_foto`) VALUES
(1, 1, 'girl-4.jpg', '0.939550010234409', ''),
(2, 1, 'girl-3.jpg', '0.4271409737155816', ''),
(3, 1, 'girl-2.jpg', '0.46774954888371423', ''),
(4, 1, 'girl-1.jpg', '0.3533645090137574', ''),
(5, 1, 'cat-4.jpg', '0.22239919276915976', ''),
(6, 1, 'cat-3.jpg', '0.7639180419177438', ''),
(7, 1, 'cat-2.jpg', '0.7786234522803119', ''),
(8, 1, 'cat-1.jpg', '0.539613783152344', ''),
(9, 1, 'landscape-4.jpg', '0.4304041406796044', ''),
(10, 2, 'landscape-41.jpg', '0.8595888335046369', ''),
(11, 2, 'landscape-2.jpg', '0.6165677440719071', ''),
(12, 2, 'landscape-3.jpg', '0.007538945937492381', ''),
(13, 2, 'landscape-1.jpg', '0.07667537818479597', 'Cum sociis natoque penatibus et magnis dis\nparturient montes, nascetur ridiculus mus'),
(14, 2, 'fruit-4.jpg', '0.8091352027357575', ''),
(15, 2, 'fruit-3.jpg', '0.4320605923752492', 'Maecenas urna elit, tincidunt in dapibus nec, vehicula eu dui');

-- --------------------------------------------------------

--
-- Table structure for table `foto_galeri_temp`
--

CREATE TABLE `foto_galeri_temp` (
  `id_foto` bigint(20) UNSIGNED NOT NULL,
  `nama_foto` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_foto` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sesi_form` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_user_tmp`
--

CREATE TABLE `foto_user_tmp` (
  `id_foto` bigint(20) UNSIGNED NOT NULL,
  `nama_foto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sesi_from` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `galeri_nama` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galeri_deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `galeri_feature_img` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galeri_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galeri_meta_keyword` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galeri_meta_deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `galeri_og_image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galeri_og_deskripsi` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galeri_date` datetime NOT NULL,
  `galeri_date_edit` datetime NOT NULL,
  `galeri_user` bigint(20) UNSIGNED NOT NULL,
  `galeri_user_edit` bigint(20) UNSIGNED NOT NULL,
  `galeri_status` enum('publish','draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `kategori_id`, `galeri_nama`, `galeri_deskripsi`, `galeri_feature_img`, `galeri_url`, `galeri_meta_keyword`, `galeri_meta_deskripsi`, `galeri_og_image`, `galeri_og_deskripsi`, `galeri_date`, `galeri_date_edit`, `galeri_user`, `galeri_user_edit`, `galeri_status`) VALUES
(1, 2, 'Ut consequat ultricies est, non rhoncus mauris congue porta', '<p>Vestibulum mollis, arcu iaculis bibendum varius, velit sapien blandit metus, ac posuere lorem nulla ac dolor. Maecenas urna elit, tincidunt in dapibus nec, vehicula eu dui. Duis lacinia fringilla massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut consequat ultricies est, non rhoncus mauris congue porta. Vivamus viverra suscipit felis eget condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer bibendum sagittis ligula, non faucibus nulla volutpat vitae. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\n<p> </p>\n<p>In aliquet quam et velit bibendum accumsan. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum vitae ipsum nec arcu semper adipiscing at ac lacus. Praesent id pellentesque orci. Morbi congue viverra nisl nec rhoncus. Integer mattis, ipsum a tincidunt commodo, lacus arcu elementum elit, at mollis eros ante ac risus. In volutpat, ante at pretium ultricies, velit magna suscipit enim, aliquet blandit massa orci nec lorem. Nulla facilisi.</p>', '', 'ut-consequat-ultricies-est-non-rhoncus-mauris-congue-porta', '', '', '', '', '2016-04-14 09:05:08', '2016-04-14 10:31:44', 1, 1, 'publish'),
(2, 2, 'Maecenas pellentesque volutpat felis', '<p>Duis eu vehicula arcu. Nulla facilisi. Maecenas pellentesque volutpat felis, quis tristique ligula luctus vel. Sed nec mi eros. Integer augue enim, sollicitudin ullamcorper mattis eget, aliquam in est. Morbi sollicitudin libero nec augue dignissim ut consectetur dui volutpat. Nulla facilisi.</p>\n<p> </p>\n<p>Mauris egestas vestibulum neque cursus tincidunt. Donec sit amet pulvinar orci. Quisque volutpat pharetra tincidunt. Fusce sapien arcu, molestie eget varius egestas, faucibus ac urna. Sed at nisi in velit egestas aliquam ut a felis. Aenean malesuada iaculis nisl, ut tempor lacus egestas consequat. Nam nibh lectus, gravida sed egestas ut, feugiat quis dolor. Donec eu leo enim, non laoreet ante. Morbi dictum tempor vulputate. Phasellus ultricies risus vel augue sagittis euismod. Vivamus tincidunt placerat nisi in aliquam. Cras quis mi ac nunc pretium aliquam. Aenean elementum erat ac metus commodo rhoncus.</p>', '', 'maecenas-pellentesque-volutpat-felis', 'test,keyword', 'test deskripsi', 'http://localhost/cms/an-component/media/upload-gambar-pendukung/sparkler-677774_1280.jpg', 'deskripsi fb', '2016-04-14 10:39:15', '2016-04-15 02:56:07', 1, 1, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `disclaimer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `webprivacy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `termcondition` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_deskripsi` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_media` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `develope_mode` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `logo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_css` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `width_thumb_artikel` int(10) UNSIGNED NOT NULL DEFAULT '300',
  `width_thumb_galeri` int(10) UNSIGNED NOT NULL DEFAULT '300',
  `width_thumb_produk` int(10) UNSIGNED NOT NULL DEFAULT '500',
  `prefix_suffix_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix_suffix_sebagai` enum('prefix','suffix','none') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'prefix',
  `default_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_populer_artikel` int(11) NOT NULL DEFAULT '10',
  `max_tampil_artikel` int(11) NOT NULL DEFAULT '10',
  `max_headline_artikel` int(11) NOT NULL DEFAULT '10',
  `max_headline_galeri` int(11) NOT NULL DEFAULT '10',
  `max_tampil_galeri` int(10) UNSIGNED NOT NULL DEFAULT '10',
  `max_headline_produk` int(10) UNSIGNED NOT NULL DEFAULT '10',
  `max_tampil_produk` int(10) UNSIGNED NOT NULL DEFAULT '10',
  `sleep_mode` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `sleep_sampai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `nama`, `deskripsi`, `disclaimer`, `webprivacy`, `termcondition`, `meta_keyword`, `meta_deskripsi`, `featured_image`, `thumbnail_media`, `favicon`, `develope_mode`, `logo`, `custom_css`, `width_thumb_artikel`, `width_thumb_galeri`, `width_thumb_produk`, `prefix_suffix_title`, `prefix_suffix_sebagai`, `default_title`, `max_populer_artikel`, `max_tampil_artikel`, `max_headline_artikel`, `max_headline_galeri`, `max_tampil_galeri`, `max_headline_produk`, `max_tampil_produk`, `sleep_mode`, `sleep_sampai`) VALUES
(1, 'Your Site', '', '', '', '', 'apricot, CMS', 'template default apricot CMS ', 'http://localhost/cms/an-component/media/upload-gambar-pendukung/footpath-691021_1280.jpg', '', '', 'N', '', '/*Masukan code CSS anda disini\nGunakan flag !important&singlequote;*/\n', 300, 300, 500, '', 'prefix', '', 10, 10, 10, 10, 1, 10, 10, 'N', '2016-04-14 02:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_kategori` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_parent` bigint(20) NOT NULL DEFAULT '0',
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `terhapus` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`, `id_parent`, `aktif`, `terhapus`) VALUES
(1, 'Sains', 'sains', 0, 'Y', 'N'),
(2, 'Kuliner', 'kuliner', 0, 'Y', 'N'),
(3, 'Olah Raga', 'olah-raga', 0, 'Y', 'N'),
(4, 'Pariwisata', 'pariwisata', 0, 'Y', 'N'),
(5, 'Budaya', 'budaya', 0, 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_galeri`
--

CREATE TABLE `kategori_galeri` (
  `id` bigint(20) NOT NULL,
  `nama_kategori` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_kategori` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `terhapus` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_galeri`
--

INSERT INTO `kategori_galeri` (`id`, `nama_kategori`, `slug_kategori`, `aktif`, `terhapus`) VALUES
(1, 'Wedding', 'wedding', 'Y', 'N'),
(2, 'Pre- wedding ', 'pre-wedding', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_kategori` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_kategori` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `terhapus` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontak_masuk`
--

CREATE TABLE `kontak_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibaca` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_code`, `menu_nama`, `menu_created`) VALUES
(1, 'horizontal', 'utama', '2016-04-14 02:12:24'),
(2, 'vertical', 'samping', '2016-04-14 02:12:24'),
(3, 'vertical2', 'tambahan 1', '2016-04-14 02:12:24'),
(4, 'vertical3', 'tambahan 2', '2016-04-14 02:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `menu_child`
--

CREATE TABLE `menu_child` (
  `menu_child_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `menu_child_parent` bigint(20) NOT NULL DEFAULT '0',
  `menu_child_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_child_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_child_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_child_target` enum('_self','_blank','_parent','_top') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `posisi` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_child`
--

INSERT INTO `menu_child` (`menu_child_id`, `menu_id`, `menu_child_parent`, `menu_child_code`, `menu_child_nama`, `menu_child_url`, `menu_child_target`, `aktif`, `posisi`) VALUES
(1, 1, 0, '', 'Home', '#', '_self', 'Y', 1),
(2, 1, 0, '', 'About', '#', '_self', 'Y', 2),
(3, 1, 0, '', 'Privacy', '#', '_self', 'Y', 3),
(4, 1, 0, '', 'Contact Us', '#', '_self', 'Y', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news_ticker`
--

CREATE TABLE `news_ticker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `berita` varchar(700) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_posting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_ticker`
--

INSERT INTO `news_ticker` (`id`, `berita`, `link`, `tanggal_posting`) VALUES
(1, 'volutpat felis, quis tristique ligula luctus vel. Sed nec mi eros. Integer augue enim, sollicitudin', '#link', '2016-03-22 04:18:22'),
(2, 'Fusce sapien arcu, molestie eget varius egestas, faucibus ac urna. Sed at nisi in velit egestas aliquam ut a felis.', '#kedua', '2016-03-22 04:19:12'),
(3, 'Aliquam nulla augue, porta non sagittis quis, accumsan vitae sem', '#ketiga', '2016-03-22 04:19:28'),
(4, 'ivamus vel ipsum ac augue sodales mollis euismod nec tellus. Fusce et augue rutrum nunc semper vehicula vel semper nisl.', '#empat', '2016-03-22 04:19:56'),
(5, 'Curabitur malesuada fermentum lacus vel accumsan. Duis ornare scelerisque nulla, ac pulvinar ligula tempus sit amet ', '#test', '2016-03-22 04:20:12'),
(6, 'Vivamus luctus mi eget lorem lobortis pharetra. Phasellus at tortor quam, a volutpat purus.', '#hai', '2016-03-22 04:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` bigint(20) NOT NULL,
  `page_judul` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_url` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_foto` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_javascript` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_status` enum('published','draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `page_id_user` bigint(20) UNSIGNED NOT NULL,
  `page_id_edit` bigint(20) UNSIGNED NOT NULL,
  `page_created` datetime NOT NULL,
  `page_edited` datetime NOT NULL,
  `page_meta_keywords` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_meta_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pencarian_artikel`
--

CREATE TABLE `pencarian_artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keyword` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clean_keyword` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pihak_ketiga`
--

CREATE TABLE `pihak_ketiga` (
  `id` int(11) NOT NULL,
  `recaptcha_key` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recaptcha_secret_key` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `script_google_analytics` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disqus_unique_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pihak_ketiga`
--

INSERT INTO `pihak_ketiga` (`id`, `recaptcha_key`, `recaptcha_secret_key`, `script_google_analytics`, `disqus_unique_name`) VALUES
(1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id_tag` bigint(20) UNSIGNED NOT NULL,
  `nama_tag` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_tag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_posting` bigint(20) NOT NULL,
  `user_update` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id_tag`, `nama_tag`, `slug_tag`, `user_posting`, `user_update`) VALUES
(1, 'kebahagiaan', 'kebahagiaan', 1, 1),
(2, 'impian', 'impian', 1, 1),
(3, 'cinta', 'cinta', 1, 0),
(4, 'harapan', 'harapan', 1, 0),
(5, 'kebaikan', 'kebaikan', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE `tema` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_tema` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `versi` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screenshot` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`id`, `nama_tema`, `versi`, `aktif`, `author`, `web`, `screenshot`) VALUES
(22, 'ando', '1.0', 'Y', 'Ando Poluan', 'http://www.sandro.id', 'screenshot.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(11) UNSIGNED NOT NULL,
  `name_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user` int(11) NOT NULL,
  `avatar_user` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `terhapus` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `terdaftar` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `nama_lengkap`, `email`, `password_user`, `level_user`, `avatar_user`, `status_user`, `terhapus`, `terdaftar`) VALUES
(1, 'admin', 'Sandro Brayen', '', '200ceb26807d6bf99fd6f4f0d1ca54d4', 1, 'photo.jpg', 'Y', 'N', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`),
  ADD UNIQUE KEY `artikel_id` (`artikel_id`);

--
-- Indexes for table `banner_depan`
--
ALTER TABLE `banner_depan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_artikel`
--
ALTER TABLE `foto_artikel`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `foto_artikel_temp`
--
ALTER TABLE `foto_artikel_temp`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `foto_galeri`
--
ALTER TABLE `foto_galeri`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `foto_galeri_temp`
--
ALTER TABLE `foto_galeri_temp`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `foto_user_tmp`
--
ALTER TABLE `foto_user_tmp`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak_masuk`
--
ALTER TABLE `kontak_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_child`
--
ALTER TABLE `menu_child`
  ADD PRIMARY KEY (`menu_child_id`);

--
-- Indexes for table `news_ticker`
--
ALTER TABLE `news_ticker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `pencarian_artikel`
--
ALTER TABLE `pencarian_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pihak_ketiga`
--
ALTER TABLE `pihak_ketiga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikel_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `banner_depan`
--
ALTER TABLE `banner_depan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `foto_artikel`
--
ALTER TABLE `foto_artikel`
  MODIFY `id_foto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `foto_artikel_temp`
--
ALTER TABLE `foto_artikel_temp`
  MODIFY `id_foto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_galeri`
--
ALTER TABLE `foto_galeri`
  MODIFY `id_foto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `foto_galeri_temp`
--
ALTER TABLE `foto_galeri_temp`
  MODIFY `id_foto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_user_tmp`
--
ALTER TABLE `foto_user_tmp`
  MODIFY `id_foto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kontak_masuk`
--
ALTER TABLE `kontak_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu_child`
--
ALTER TABLE `menu_child`
  MODIFY `menu_child_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `news_ticker`
--
ALTER TABLE `news_ticker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pencarian_artikel`
--
ALTER TABLE `pencarian_artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pihak_ketiga`
--
ALTER TABLE `pihak_ketiga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
