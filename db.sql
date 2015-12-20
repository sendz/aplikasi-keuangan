--
-- MySQL 5.6.27
-- Fri, 18 Dec 2015 12:43:25 +0000
--

CREATE TABLE `biayapendidikan` (
   `tingkat` int(16),
   `jumlah` int(16)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `biayapendidikan` (`tingkat`, `jumlah`) VALUES ('10', '1100000');
INSERT INTO `biayapendidikan` (`tingkat`, `jumlah`) VALUES ('11', '1300000');
INSERT INTO `biayapendidikan` (`tingkat`, `jumlah`) VALUES ('12', '1700000');

CREATE TABLE `kelas` (
   `id` int(8) not null auto_increment,
   `slug` varchar(32),
   `nama` varchar(32),
   `tingkat` int(8) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=29;

INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('4', '10_ibb', 'IBB ', '10');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('6', '10_mia_1', 'MIA 1', '10');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('7', '10_ipa_2', 'IPA 2', '10');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('8', '10_s_1', 'S 1', '10');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('9', '10_s_2', 'S 2', '10');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('10', '10_ag_1', 'AG 1', '10');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('11', '10_ag_2', 'AG 2', '10');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('12', '10_bhs', 'BHS', '10');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('13', '11_ibb', 'IBB', '11');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('14', '11_mia_1', 'MIA 1', '11');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('15', '11_mia_2', 'MIA 2', '11');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('16', '11_mia_3', 'MIA 3', '11');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('17', '11_ips_1', 'IPS 1', '11');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('18', '11_ips_2', 'IPS 2', '11');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('19', '11_iik', 'IIK', '11');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('20', '12_bhs', 'BHS', '12');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('21', '12_ipa_1', 'IPA 1', '12');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('22', '12_ipa_2', 'IPA 2', '12');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('23', '12_ips_1', 'IPS 1', '12');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('24', '12_ips_2', 'IPS 2', '12');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('25', '12_ag_1', 'AG 1', '12');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('26', '12_ag_2', 'AG 2', '12');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('27', '0_drop_out', 'Drop Out', '0');
INSERT INTO `kelas` (`id`, `slug`, `nama`, `tingkat`) VALUES ('28', '0_lulus', 'Lulus', '0');

CREATE TABLE `pemasukan` (
   `id` int(8) not null auto_increment,
   `idsiswa` int(8),
   `tanggal` date,
   `jumlah` int(16),
   `namakegiatan` text,
   `tujuan` text,
   `penanggungjawab` varchar(64),
   `bendahara` varchar(64),
   `keterangan` varchar(64),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;

-- [Table `pemasukan` is empty]

CREATE TABLE `pengaturan` (
   `id` int(8) not null,
   `kepalamadrasah` varchar(64),
   `namasekolah` varchar(64),
   `alamatsekolah` varchar(64),
   `namabendahara` varchar(64),
   `tahunajaran` int(4),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pengaturan` (`id`, `kepalamadrasah`, `namasekolah`, `alamatsekolah`, `namabendahara`, `tahunajaran`) VALUES ('1', 'Rahmat Mizan', 'MAN Wonokromo Bantul', 'Pleret, Bantul', 'Bendahara', '2015');

CREATE TABLE `siswa` (
   `id` int(8) not null auto_increment,
   `nis` int(8),
   `nama` varchar(64) not null,
   `idkelas` int(8),
   `alamat` text,
   `orangtua` varchar(64),
   `tahunmasuk` int(4) not null,
   PRIMARY KEY (`id`),
   UNIQUE KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [Table `siswa` is empty]

CREATE TABLE `user` (
   `id` int(8) not null auto_increment,
   `username` varchar(32),
   `password` text,
   `nama` varchar(32),
   `role` int(8),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `role`) VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Bendahara', '1');
INSERT INTO `user` (`id`, `username`, `password`, `nama`, `role`) VALUES ('2', 'kepsek', '8561863b55faf85b9ad67c52b3b851ac', 'Kepala Sekolah', '2');