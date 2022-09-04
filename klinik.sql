/*
Navicat MySQL Data Transfer

Source Server         : klinik
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : klinik

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2019-08-14 16:34:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_administrasi_obat
-- ----------------------------
DROP TABLE IF EXISTS `tb_administrasi_obat`;
CREATE TABLE `tb_administrasi_obat` (
`id_administrasi_obat`  int(11) NOT NULL AUTO_INCREMENT ,
`tanggal`  date NOT NULL ,
`kode_resep`  varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama_users`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama_suami`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`alamat`  varchar(280) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`total_bayar`  varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id_administrasi_obat`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of tb_administrasi_obat
-- ----------------------------
BEGIN;
INSERT INTO `tb_administrasi_obat` VALUES ('1', '2019-08-01', 'R2019-0002', 'Mega Safitri', 'Anton', 'Benowo Asri', '90000'), ('2', '2019-08-01', 'R2019-0001', 'Ayu Robiyah', 'Pujianto', 'Kandangan  RT:2 RW:3', '52500'), ('3', '2019-08-03', 'R2019-0003', 'Nevi Chania', 'Arianto', 'Kendungsari', '100000'), ('4', '2019-08-08', 'R2019-0006', 'nevi chania dwi ariyanti', 'Andrik', 'Kendungsari', '60000');
COMMIT;

-- ----------------------------
-- Table structure for tb_administrasi_periksa
-- ----------------------------
DROP TABLE IF EXISTS `tb_administrasi_periksa`;
CREATE TABLE `tb_administrasi_periksa` (
`id_administrasi_periksa`  int(11) NOT NULL AUTO_INCREMENT ,
`tanggal`  date NOT NULL ,
`id_users`  int(11) NOT NULL ,
`nama_users`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama_suami`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`jenis_periksa`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`harga`  int(11) NOT NULL ,
PRIMARY KEY (`id_administrasi_periksa`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=18

;

-- ----------------------------
-- Records of tb_administrasi_periksa
-- ----------------------------
BEGIN;
INSERT INTO `tb_administrasi_periksa` VALUES ('1', '2019-07-12', '27', 'Fitri Anisa Sahara P', 'Pujianto', 'Umum', '150000'), ('2', '2019-07-10', '28', 'Anisa Safitri', 'Wiji Anto', 'Janjian', '100000'), ('3', '2019-07-13', '29', 'Linda Lupitasari', 'Srianto', 'Umum', '150000'), ('4', '2019-07-27', '30', 'Weni Astuti', 'Wijaya', 'Umum', '150000'), ('5', '2019-07-27', '36', 'Senitri', 'Mariato', 'Janjian', '100000'), ('6', '2019-07-27', '40', 'Susi Andriani', 'Eko', 'Janjian', '100000'), ('7', '2019-07-27', '33', 'Resti Erliana', 'Erwan', 'Umum', '150000'), ('8', '2019-07-27', '30', 'Weni Astuti', 'Wijaya', 'Umum', '150000'), ('9', '2019-07-27', '34', 'Mega Safitri', 'Anton', 'Umum', '150000'), ('10', '2019-07-27', '35', 'Murtini', 'Temu', 'Umum', '150000'), ('11', '2019-07-27', '36', 'Senitri', 'Mariato', 'Umum', '150000'), ('12', '2019-07-30', '30', 'Weni Astuti', 'Wijaya', 'Umum', '150000'), ('13', '2019-07-30', '30', 'Weni Astuti', 'Wijaya', 'Umum', '150000'), ('14', '2019-08-08', '18', 'ijah', '-', 'Janjian', '100000'), ('15', '2019-08-11', '40', 'Susi Andriani', 'Eko', 'Umum', '150000'), ('16', '2019-06-29', '32', 'Nevi Chania', 'Arianto', 'Umum', '150000'), ('17', '2019-06-20', '30', 'Weni Astuti', 'Wijaya', 'Janjian', '100000');
COMMIT;

-- ----------------------------
-- Table structure for tb_antrian
-- ----------------------------
DROP TABLE IF EXISTS `tb_antrian`;
CREATE TABLE `tb_antrian` (
`id_antrian`  int(11) NOT NULL AUTO_INCREMENT ,
`nomor_antrian`  int(11) NOT NULL ,
`id_users`  int(11) NOT NULL ,
`tanggal`  date NOT NULL ,
PRIMARY KEY (`id_antrian`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of tb_antrian
-- ----------------------------
BEGIN;
INSERT INTO `tb_antrian` VALUES ('3', '1', '28', '2019-08-12'), ('4', '2', '32', '2019-08-12'), ('5', '3', '29', '2019-08-12'), ('6', '4', '30', '2019-08-12');
COMMIT;

-- ----------------------------
-- Table structure for tb_catatan_kehamilan
-- ----------------------------
DROP TABLE IF EXISTS `tb_catatan_kehamilan`;
CREATE TABLE `tb_catatan_kehamilan` (
`id_catatan_kehamilan`  int(11) NOT NULL AUTO_INCREMENT ,
`id_users`  int(11) NOT NULL ,
`berat_badan`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tensi_darah`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`isi_catatan`  varchar(280) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tanggal`  date NOT NULL ,
PRIMARY KEY (`id_catatan_kehamilan`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=10

;

-- ----------------------------
-- Records of tb_catatan_kehamilan
-- ----------------------------
BEGIN;
INSERT INTO `tb_catatan_kehamilan` VALUES ('1', '27', '66', '112/80', 'kondisi janin normal', '2019-07-17'), ('3', '28', '70', '110/80', 'kondisi janin normal', '2019-07-07'), ('4', '29', '65', '130/23', 'kondisi janin normal', '2019-07-18'), ('5', '27', '65', '130/23', 'kondisi janin normal', '2019-08-08'), ('6', '27', '66', '130/23', 'kondisi janin normal', '2019-08-08'), ('7', '27', '65', '122/23', 'janis normal', '2019-08-08'), ('8', '35', '65', '130/23', 'kondisi janin normal', '2019-08-08'), ('9', '28', '65', '130/23', 'janin normal', '2019-08-08');
COMMIT;

-- ----------------------------
-- Table structure for tb_detail_resep_obat
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_resep_obat`;
CREATE TABLE `tb_detail_resep_obat` (
`id_detail_resep_obat`  int(11) NOT NULL AUTO_INCREMENT ,
`kode_resep`  varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama_obat`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`id_obat`  int(11) NOT NULL ,
`aturan_minum`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`jumlah_obat`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`harga_satuan`  int(11) NOT NULL ,
PRIMARY KEY (`id_detail_resep_obat`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=39

;

-- ----------------------------
-- Records of tb_detail_resep_obat
-- ----------------------------
BEGIN;
INSERT INTO `tb_detail_resep_obat` VALUES ('20', 'R2019-0001', 'Paracetamol', '1', '3x1', '15', '1000'), ('21', 'R2019-0001', 'Dekolgenn', '5', '3x1', '15', '2500'), ('22', 'R2019-0002', 'Dekolgenn', '5', '3x1', '20', '2500'), ('23', 'R2019-0002', 'Paracetamol', '1', '3x1', '10', '1000'), ('24', 'R2019-0002', 'Promag', '2', '3x1', '15', '2000'), ('25', 'R2019-0003', 'Promag', '2', '3x1', '15', '2000'), ('26', 'R2019-0003', 'Paracetamol', '1', '3x1', '20', '1000'), ('27', 'R2019-0003', 'Dekolgenn', '5', '3x1', '20', '2500'), ('28', 'R2019-0004', 'Paracetamol', '1', '3x1', '10', '1000'), ('29', 'R2019-0004', 'Dekolgenn', '5', '3x1', '15', '2500'), ('30', 'R2019-0004', 'Promag', '2', '3x1', '5', '2000'), ('31', 'R2019-0005', 'Paracetamol', '1', '3x1', '20', '1000'), ('32', 'R2019-0005', 'Dekolgenn', '5', '3x1', '20', '2500'), ('33', 'R2019-0006', 'Promag', '2', '2x1', '30', '2000'), ('34', 'R2019-0007', 'Amlodipine 5 mg hj', '7', '3x1', '20', '412'), ('35', 'R2019-0007', 'Dekolgenn', '5', '2x1', '10', '2500'), ('36', 'R2019-0007', 'Alinamin-F', '6', '3x1', '15', '1518'), ('37', 'R2019-0008', 'Paracetamoll', '4', '3x1', '15', '1000'), ('38', 'R2019-0008', 'Alinamin-F', '6', '3x1', '15', '1518');
COMMIT;

-- ----------------------------
-- Table structure for tb_harga_periksa
-- ----------------------------
DROP TABLE IF EXISTS `tb_harga_periksa`;
CREATE TABLE `tb_harga_periksa` (
`id_harga_periksa`  int(11) NOT NULL AUTO_INCREMENT ,
`jenis_periksa`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`harga`  int(10) NOT NULL ,
PRIMARY KEY (`id_harga_periksa`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of tb_harga_periksa
-- ----------------------------
BEGIN;
INSERT INTO `tb_harga_periksa` VALUES ('1', 'Umum', '150000'), ('2', 'Janjian', '100000');
COMMIT;

-- ----------------------------
-- Table structure for tb_info_berita
-- ----------------------------
DROP TABLE IF EXISTS `tb_info_berita`;
CREATE TABLE `tb_info_berita` (
`id_berita`  int(11) NOT NULL AUTO_INCREMENT ,
`tanggal`  date NOT NULL ,
`isi_berita`  varchar(280) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id_berita`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of tb_info_berita
-- ----------------------------
BEGIN;
INSERT INTO `tb_info_berita` VALUES ('1', '2019-07-12', 'jadwal buka klinik akan di pindah tanggal 2-8-2019'), ('4', '2019-07-12', 'jajal');
COMMIT;

-- ----------------------------
-- Table structure for tb_jadwal_klinik
-- ----------------------------
DROP TABLE IF EXISTS `tb_jadwal_klinik`;
CREATE TABLE `tb_jadwal_klinik` (
`id_jadwal`  int(11) NOT NULL AUTO_INCREMENT ,
`tanggal`  date NOT NULL ,
`kapasitas`  int(11) NOT NULL ,
`status`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id_jadwal`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=8

;

-- ----------------------------
-- Records of tb_jadwal_klinik
-- ----------------------------
BEGIN;
INSERT INTO `tb_jadwal_klinik` VALUES ('4', '2019-08-08', '5', 'Hari ini'), ('7', '2019-08-09', '5', 'Pesan hari');
COMMIT;

-- ----------------------------
-- Table structure for tb_level_users
-- ----------------------------
DROP TABLE IF EXISTS `tb_level_users`;
CREATE TABLE `tb_level_users` (
`id_level_users`  int(11) NOT NULL AUTO_INCREMENT ,
`level_users`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id_level_users`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of tb_level_users
-- ----------------------------
BEGIN;
INSERT INTO `tb_level_users` VALUES ('1', 'Receptionis'), ('2', 'Apoteker'), ('3', 'Dokter'), ('4', 'Kepala Klinik'), ('5', 'Pasien');
COMMIT;

-- ----------------------------
-- Table structure for tb_obat
-- ----------------------------
DROP TABLE IF EXISTS `tb_obat`;
CREATE TABLE `tb_obat` (
`id_obat`  int(11) NOT NULL AUTO_INCREMENT ,
`nama_obat`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`stock`  int(11) NOT NULL ,
`satuan`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`harga`  int(11) NOT NULL ,
`expired`  date NOT NULL ,
PRIMARY KEY (`id_obat`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=8

;

-- ----------------------------
-- Records of tb_obat
-- ----------------------------
BEGIN;
INSERT INTO `tb_obat` VALUES ('1', 'Paracetamol', '20', '', '1000', '2019-07-25'), ('2', 'Promag', '15', '', '2000', '2019-07-31'), ('4', 'Paracetamoll', '35', '', '1000', '2019-07-25'), ('5', 'Dekolgenn', '5', '', '2500', '2019-07-31'), ('6', 'Alinamin-F', '20', 'Butir', '1518', '2019-09-01'), ('7', 'Amlodipine 5 mg hj', '30', 'Butir', '412', '2019-08-31');
COMMIT;

-- ----------------------------
-- Table structure for tb_pesan_hari
-- ----------------------------
DROP TABLE IF EXISTS `tb_pesan_hari`;
CREATE TABLE `tb_pesan_hari` (
`id_pesan_hari`  int(11) NOT NULL AUTO_INCREMENT ,
`nomor_pesan`  int(11) NOT NULL ,
`id_users`  int(11) NOT NULL ,
`tanggal`  date NOT NULL ,
PRIMARY KEY (`id_pesan_hari`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of tb_pesan_hari
-- ----------------------------
BEGIN;
INSERT INTO `tb_pesan_hari` VALUES ('1', '1', '32', '2019-08-09'), ('2', '1', '36', '2019-08-12');
COMMIT;

-- ----------------------------
-- Table structure for tb_rekam_medis
-- ----------------------------
DROP TABLE IF EXISTS `tb_rekam_medis`;
CREATE TABLE `tb_rekam_medis` (
`id_RM`  int(11) NOT NULL AUTO_INCREMENT ,
`id_users`  int(11) NOT NULL ,
`HPHT`  date NOT NULL ,
`HTP`  date NOT NULL ,
`hamil_ke`  int(1) NOT NULL ,
`jumlah_persalinan`  int(1) NOT NULL ,
`jumlah_keguguran`  int(1) NOT NULL ,
`jumlah_anak_hidup`  int(1) NOT NULL ,
`jumlah_anak_mati`  int(1) NOT NULL ,
`cara_persalinan_terakhir`  varchar(280) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`riwayat_penyakit_ibu`  varchar(280) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id_RM`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of tb_rekam_medis
-- ----------------------------
BEGIN;
INSERT INTO `tb_rekam_medis` VALUES ('1', '27', '2019-07-06', '2019-07-06', '3', '2', '0', '3', '0', 'normal sekali', 'Tidak ada'), ('2', '28', '2019-07-06', '2019-07-06', '1', '1', '0', '0', '0', '', 'Tidak ada'), ('3', '29', '2019-07-17', '2019-07-17', '2', '1', '0', '1', '0', 'Sesar', 'alergi debu'), ('4', '32', '2019-08-05', '2019-08-05', '2', '1', '0', '1', '0', 'normal', 'alergi debu'), ('5', '31', '2019-08-07', '2019-08-07', '2', '1', '0', '1', '0', 'normal', 'alergi debu'), ('6', '35', '2019-08-08', '2019-08-08', '2', '1', '0', '1', '0', 'normal', 'alergi debu');
COMMIT;

-- ----------------------------
-- Table structure for tb_resep
-- ----------------------------
DROP TABLE IF EXISTS `tb_resep`;
CREATE TABLE `tb_resep` (
`kode_resep`  varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tanggal`  date NOT NULL ,
`id_users`  int(11) NOT NULL ,
`nama_users`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama_suami`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`alamat`  varchar(280) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`kode_resep`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of tb_resep
-- ----------------------------
BEGIN;
INSERT INTO `tb_resep` VALUES ('R2019-0001', '2019-08-01', '31', 'Ayu Robiyah', 'Pujianto', 'Kandangan  RT:2 RW:3'), ('R2019-0002', '2019-08-01', '34', 'Mega Safitri', 'Anton', 'Benowo Asri'), ('R2019-0003', '2019-08-03', '32', 'Nevi Chania', 'Arianto', 'Kendungsari'), ('R2019-0004', '2019-08-03', '35', 'Murtini', 'Temu', 'nganjuk'), ('R2019-0005', '2019-08-05', '40', 'Susi Andriani', 'Eko', 'Nganjuk ladang'), ('R2019-0006', '2019-08-08', '17', 'nevi chania dwi ariyanti', 'Andrik', 'Kendungsari'), ('R2019-0007', '2019-08-08', '36', 'Senitri', 'Mariato', 'Kendung No.17'), ('R2019-0008', '2019-08-09', '31', 'Ayu Robiyah', 'Pujianto', 'Kandangan  RT:2 RW:3');
COMMIT;

-- ----------------------------
-- Table structure for tb_sarpras
-- ----------------------------
DROP TABLE IF EXISTS `tb_sarpras`;
CREATE TABLE `tb_sarpras` (
`id_SARPRAS`  int(11) NOT NULL AUTO_INCREMENT ,
`nama_barang`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`jumlah`  int(11) NOT NULL ,
`kondisi`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id_SARPRAS`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of tb_sarpras
-- ----------------------------
BEGIN;
INSERT INTO `tb_sarpras` VALUES ('1', 'Kursi', '5', 'Baik'), ('2', 'Meja', '3', 'Baik'), ('4', 'Majalah Cerita Rakyat', '6', 'Baik');
COMMIT;

-- ----------------------------
-- Table structure for tb_user_access_menu
-- ----------------------------
DROP TABLE IF EXISTS `tb_user_access_menu`;
CREATE TABLE `tb_user_access_menu` (
`id_access_menu`  int(11) NOT NULL AUTO_INCREMENT ,
`id_level_user`  int(11) NOT NULL ,
`id_menu`  int(11) NOT NULL ,
PRIMARY KEY (`id_access_menu`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of tb_user_access_menu
-- ----------------------------
BEGIN;
INSERT INTO `tb_user_access_menu` VALUES ('1', '1', '1'), ('2', '5', '5'), ('3', '2', '2'), ('4', '3', '3'), ('5', '4', '4');
COMMIT;

-- ----------------------------
-- Table structure for tb_user_menu
-- ----------------------------
DROP TABLE IF EXISTS `tb_user_menu`;
CREATE TABLE `tb_user_menu` (
`id_menu`  int(11) NOT NULL AUTO_INCREMENT ,
`menu`  varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id_menu`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of tb_user_menu
-- ----------------------------
BEGIN;
INSERT INTO `tb_user_menu` VALUES ('1', 'Receptionis'), ('2', 'Apoteker'), ('3', 'Dokter'), ('4', 'Pemilik'), ('5', 'Pasien');
COMMIT;

-- ----------------------------
-- Table structure for tb_user_sub_menu
-- ----------------------------
DROP TABLE IF EXISTS `tb_user_sub_menu`;
CREATE TABLE `tb_user_sub_menu` (
`id_sub_menu`  int(11) NOT NULL AUTO_INCREMENT ,
`id_menu`  int(11) NOT NULL ,
`title`  varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`url`  varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`icon`  varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`is_active`  int(1) NOT NULL ,
PRIMARY KEY (`id_sub_menu`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=33

;

-- ----------------------------
-- Records of tb_user_sub_menu
-- ----------------------------
BEGIN;
INSERT INTO `tb_user_sub_menu` VALUES ('1', '1', 'Dashboard', 'Receptionis', 'fas fa-fw fa-tachometer-alt', '1'), ('2', '1', 'Jadwal Peraktek', 'Receptionis/jadwal_peraktek', 'fas fa-fw fa-calendar-plus', '1'), ('4', '1', 'Data Pasien', 'Receptionis/data_pasien', 'fas fa-fw fa-users', '1'), ('5', '1', 'Data Rekam Medis', 'Receptionis/rekam_medis', 'fas fa-fw fa-notes-medical', '1'), ('6', '1', 'Administrasi Periksa', 'Receptionis/administrasi_periksa', 'far fa-fw fa-money-bill-alt', '1'), ('7', '1', 'Data SARPRAS', 'Receptionis/data_sarpras', 'fas fa-fw fa-briefcase', '1'), ('8', '1', 'Info Berita', 'Receptionis/info_berita', 'fas fa-fw fa-newspaper', '1'), ('9', '1', 'Ganti Password', 'Receptionis/ganti_password', 'fas fa-fw fa-users-cog', '1'), ('10', '2', 'Dashboard', 'Apoteker', 'fas fa-fw fa-tachometer-alt', '1'), ('11', '2', 'Data Obat', 'Apoteker/data_obat', 'fas fa-fw fa-plus-circle', '1'), ('12', '2', 'Resep Obat', 'Apoteker/resep_obat', 'fas fa-fw fa-file-medical', '1'), ('13', '2', 'Administrasi Obat', 'Apoteker/administrasi_obat', 'far fa-fw fa-money-bill-alt', '1'), ('14', '2', 'Ganti Password', 'Apoteker/ganti_password', 'fas fa-fw fa-users-cog', '1'), ('15', '3', 'Dashboard', 'Dokter', 'fas fa-fw fa-tachometer-alt', '1'), ('16', '3', 'Rekam Medis', 'Dokter/rekam_medis', 'fas fa-fw fa-notes-medical', '1'), ('17', '3', 'Data Obat', 'Dokter/data_obat', 'fas fa-fw fa-plus-circle', '1'), ('18', '3', 'Resep Obat', 'Dokter/resep_obat', 'fas fa-fw fa-file-medical', '1'), ('19', '3', 'Ganti Password', 'Dokter/ganti_password', 'fas fa-fw fa-users-cog', '1'), ('20', '4', 'Dashboard', 'Pemilik', 'fas fa-fw fa-tachometer-alt', '1'), ('21', '4', 'Harga Periksa', 'Pemilik/harga_periksa', 'fas fa-fw fa-money-bill-wave', '1'), ('22', '4', 'Data Obat', 'Pemilik/data_obat', 'fas fa-fw fa-plus-circle', '1'), ('23', '4', 'Laporan Periksa', 'Pemilik/laporan_periksa', 'fas fa-fw fa-file-archive', '1'), ('24', '4', 'Laporan Obat', 'Pemilik/laporan_obat', 'fas fa-fw fa-file-archive', '1'), ('25', '4', 'Ganti Password', 'Pemilik/ganti_password', 'fas fa-fw fa-users-cog', '1'), ('26', '5', 'Dashboard', 'Pasien', 'fas fa-fw fa-tachometer-alt', '1'), ('27', '5', 'Ambil Nomer Antrian', 'Pasien/ambil_nomer', 'fas fa-fw fa-list-ol', '1'), ('28', '5', 'Booking Antrian', 'Pasien/booking_antrian', 'fas fa-fw fa-calendar-day', '1'), ('29', '5', 'Rekam Medis', 'Pasien/rekam_medis', 'fas fa-fw fa-notes-medical', '1'), ('30', '5', 'Profil Pasien', 'Pasien/profil_pasien', 'fas fa-fw fa-user', '1'), ('31', '5', 'Ganti Password', 'Pasien/ganti_password', 'fas fa-fw fa-users-cog', '1'), ('32', '5', 'Tentang Kami', 'Pasien/tentang_klinik', 'fas fa-fw fa-clinic-medical', '1');
COMMIT;

-- ----------------------------
-- Table structure for tb_users
-- ----------------------------
DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
`id_users`  int(11) NOT NULL AUTO_INCREMENT ,
`id_level_user`  int(11) NOT NULL ,
`nama_users`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tanggal_lahir`  date NOT NULL ,
`umur`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama_suami`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`alamat`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`telepon`  varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`username`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`password`  varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tanggal_registrasi`  int(11) NOT NULL ,
PRIMARY KEY (`id_users`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=41

;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
BEGIN;
INSERT INTO `tb_users` VALUES ('17', '1', 'nevi chania dwi ariyanti', '1996-11-28', '22', 'Andrik', 'Kendungsari', '085735157532', 'receptionis', '$2y$10$6GyojnUotrQU6w8V0wdtrObWgJ3xLAC1973CAc1/.5FgWaJ45taFu', '20190613'), ('18', '2', 'ijah', '1995-09-11', '23', '-', 'Kendungsari', '088288282989', 'apoteker', '$2y$10$PSOhAwg3ZK/NY37LUG7dCu5Qmm89PnazjhE.r7Ku81YhhPzQf9mvi', '20190613'), ('19', '3', 'iman', '1985-10-20', '35', '-', 'Kendungsari', '098736516873', 'dokter', '$2y$10$XTispBuq/jnq2AP738J.NeUjXFd9Q7qAiHm5qu4fDR4h/hfbZXUu6', '20190613'), ('22', '4', 'betantii', '1990-03-20', '40', '-', 'Kendungsari', '098736512312', 'kepala klinik', '$2y$10$K/wbEk.pnsHkGVtgs3Ak5.6BnoC8W4V7ZkiuPLAKfRx01nxNXnvXy', '20190613'), ('27', '5', 'Fitri Anisa Sahara P', '1994-09-12', '24', 'Pujianto', 'Jetis Pase Nganjuk', '082317652876', 'FitriAnisa', '$2y$10$ijk9/jv9jHgXVlHeRSD5mu9dxXJKIlgG.ATm7zVyyCkZsQbP/bcYS', '1561954474'), ('28', '5', 'Anisa Safitri', '1993-09-09', '25', 'Wiji Anto', 'Balongsari Gang 2', '082318709287', 'AnisaSafitri', '$2y$10$llBV.l.X/94wjf3IJF678uYiXojhGUyC7ruRGQ1AZzKY8ZxJolX/a', '1561954748'), ('29', '5', 'Linda Lupitasari', '1995-09-12', '25', 'Srianto', 'Jetis Pase Nganjuk', '082312676542', 'LindaLupitasari', '$2y$10$G6DyiDxTHfwk2Sogao5RvO6eIIlf7danqUEI38RGCtyIVZlPp34wC', '1561971068'), ('30', '5', 'Weni Astuti', '1996-09-12', '22', 'Wijaya', 'Benowo', '082312761837', 'WeniAstuti', '$2y$10$j16xxBeSt9olbe3PmEJZvOwoK7JGOJZVjJ.PHMpLjwvbSz1bnVO1O', '1562173617'), ('31', '5', 'Ayu Robiyah', '1992-01-29', '27', 'Pujianto', 'Kandangan  RT:2 RW:3', '085712876530', 'AyuRobiyah', '$2y$10$O6dJrz4xn3x1MoE.Fb/NNegpmbD5rNy3YZMVK1AHAVeBcijNBXXfO', '1562173744'), ('32', '5', 'Nevi Chania', '1993-11-12', '25', 'Arianto', 'Kendungsari', '082387612309', 'NeviChania', '$2y$10$pxm8t6.SeEn59vZ.ocFOhOeWjpoAXOHk6X2LO9Cd1rDUHF37zWNYe', '1562227088'), ('33', '5', 'Resti Erliana', '2000-01-20', '19', 'Erwan', 'Kendung RT:03 RW:002', '0857128715426', 'RestiErlia', '$2y$10$2ptg5l8wmnD2sZuJOGU7KeSYf3fXbg1gyUNz0fLBIs4yMDUS9B6KK', '1562227370'), ('34', '5', 'Mega Safitri', '1990-03-29', '29', 'Anton', 'Benowo Asri', '085712987465', 'MegaSafitri', '$2y$10$91rFJaoKarkfzW.cNfbXDeB2E1xn9dnak0cgs6zXVijuebcpjA5jW', '1562227508'), ('35', '5', 'Murtini', '1985-04-10', '40', 'Temu', 'nganjuk', '0823817625918', 'Murtini', '$2y$10$WDATWVeHej81oXhxwHZ9z./iVC5dmHvzmnbXU2TAGb3fsDCbk8tPq', '1562227721'), ('36', '5', 'Senitri', '1971-09-02', '46', 'Mariato', 'Kendung No.17', '082398736524', 'Senitri', '$2y$10$36SVV/g3qJZcswI8iIYb6ujbL4Zopeo.YsHdXc3Q7Ug7KAviWYDoK', '1562227832'), ('37', '5', 'Bunga Lestari', '1995-03-22', '25', 'Viky Firmansah', 'Benowo', '085721764891', 'BungaLestari', '$2y$10$WU1aE.dsRg511BVdZoN33.JISXgKTL0ASyr8073Eg7blUxLa4VoW2', '1562263427'), ('38', '5', 'Anita Sari', '1990-03-12', '27', 'Antoro', 'Nganjuk ladang', '085767282635', 'AnitaSari', '$2y$10$UxC2DP26PXyekVFxEZey0ulXnIXAVSx642dkKvUpXa9t6NaIRjw/y', '1562315458'), ('39', '5', 'Ika Oktaviana', '1997-10-24', '22', 'Viky', 'jl. kene wae', '0837218735413', 'IkaOktaviana', '$2y$10$GQ4b4BCgXy1c5xaPrs/5jOTfC/G8XD561ev/vegVERrUYEFQmPCXa', '1562340091'), ('40', '5', 'Susi Andriani', '1995-12-28', '25', 'Eko', 'Nganjuk ladang', '05726518762', 'SusiAndriani', '$2y$10$10EvrNuA.0.SUNBWB82i/e290NF9PNpnsAIujyUHQ.4TDfhUXowlC', '1562390175');
COMMIT;

-- ----------------------------
-- Auto increment value for tb_administrasi_obat
-- ----------------------------
ALTER TABLE `tb_administrasi_obat` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for tb_administrasi_periksa
-- ----------------------------
ALTER TABLE `tb_administrasi_periksa` AUTO_INCREMENT=18;

-- ----------------------------
-- Auto increment value for tb_antrian
-- ----------------------------
ALTER TABLE `tb_antrian` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for tb_catatan_kehamilan
-- ----------------------------
ALTER TABLE `tb_catatan_kehamilan` AUTO_INCREMENT=10;
DROP TRIGGER IF EXISTS `kurangi_obat`;
DELIMITER ;;
CREATE TRIGGER `kurangi_obat` BEFORE INSERT ON `tb_detail_resep_obat` FOR EACH ROW BEGIN
	UPDATE tb_obat SET stock = stock - NEW.jumlah_obat
    WHERE id_obat = NEW.id_obat;
END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for tb_detail_resep_obat
-- ----------------------------
ALTER TABLE `tb_detail_resep_obat` AUTO_INCREMENT=39;

-- ----------------------------
-- Auto increment value for tb_harga_periksa
-- ----------------------------
ALTER TABLE `tb_harga_periksa` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for tb_info_berita
-- ----------------------------
ALTER TABLE `tb_info_berita` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for tb_jadwal_klinik
-- ----------------------------
ALTER TABLE `tb_jadwal_klinik` AUTO_INCREMENT=8;

-- ----------------------------
-- Auto increment value for tb_level_users
-- ----------------------------
ALTER TABLE `tb_level_users` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for tb_obat
-- ----------------------------
ALTER TABLE `tb_obat` AUTO_INCREMENT=8;

-- ----------------------------
-- Auto increment value for tb_pesan_hari
-- ----------------------------
ALTER TABLE `tb_pesan_hari` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for tb_rekam_medis
-- ----------------------------
ALTER TABLE `tb_rekam_medis` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for tb_sarpras
-- ----------------------------
ALTER TABLE `tb_sarpras` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for tb_user_access_menu
-- ----------------------------
ALTER TABLE `tb_user_access_menu` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for tb_user_menu
-- ----------------------------
ALTER TABLE `tb_user_menu` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for tb_user_sub_menu
-- ----------------------------
ALTER TABLE `tb_user_sub_menu` AUTO_INCREMENT=33;

-- ----------------------------
-- Auto increment value for tb_users
-- ----------------------------
ALTER TABLE `tb_users` AUTO_INCREMENT=41;
