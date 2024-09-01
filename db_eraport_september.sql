/*
 Navicat Premium Data Transfer

 Source Server         : Localhost Rizky Febriyanto
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_eraport

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 01/09/2024 12:19:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for guru_m
-- ----------------------------
DROP TABLE IF EXISTS `guru_m`;
CREATE TABLE `guru_m`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `namalengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of guru_m
-- ----------------------------
INSERT INTO `guru_m` VALUES (1, 'Irma Yunita, S.Kom');
INSERT INTO `guru_m` VALUES (2, 'Rizal Alam, S.pd');
INSERT INTO `guru_m` VALUES (5, 'Rizky Febriyanto S,Kom wer');

-- ----------------------------
-- Table structure for hasilraport_t
-- ----------------------------
DROP TABLE IF EXISTS `hasilraport_t`;
CREATE TABLE `hasilraport_t`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `objectmatpelfk` int NOT NULL,
  `objectsiswafk` int NOT NULL,
  `nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `objectsemesterfk` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 124 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hasilraport_t
-- ----------------------------
INSERT INTO `hasilraport_t` VALUES (1, 1, 1, '77', 'Lulus Cukup', 1);
INSERT INTO `hasilraport_t` VALUES (2, 2, 1, '72', 'Lulus Cukup', 1);
INSERT INTO `hasilraport_t` VALUES (3, 3, 1, '72', 'Lulus Cukup', 1);
INSERT INTO `hasilraport_t` VALUES (4, 4, 1, '72', 'Lulus Cukup', 1);
INSERT INTO `hasilraport_t` VALUES (5, 5, 1, '77', 'Kompeten', 1);
INSERT INTO `hasilraport_t` VALUES (6, 6, 1, '77', 'Kompeten', 1);
INSERT INTO `hasilraport_t` VALUES (7, 7, 1, '72', 'Lulus Cukup', 1);
INSERT INTO `hasilraport_t` VALUES (8, 8, 1, '77', 'Lulus', 1);
INSERT INTO `hasilraport_t` VALUES (9, 1, 1, '87', 'Lulus Cukup', 2);
INSERT INTO `hasilraport_t` VALUES (10, 2, 1, '82', 'Lulus Cukup', 2);
INSERT INTO `hasilraport_t` VALUES (11, 3, 1, '82', 'Lulus Cukup', 2);
INSERT INTO `hasilraport_t` VALUES (12, 4, 1, '82', 'Lulus Cukup', 2);
INSERT INTO `hasilraport_t` VALUES (13, 5, 1, '88', 'Kompeten', 2);
INSERT INTO `hasilraport_t` VALUES (14, 6, 1, '88', 'Kompeten', 2);
INSERT INTO `hasilraport_t` VALUES (15, 7, 1, '82', 'Lulus Cukup', 2);
INSERT INTO `hasilraport_t` VALUES (16, 8, 1, '82', 'Lulus Cukup', 2);
INSERT INTO `hasilraport_t` VALUES (17, 1, 1, '66', 'Lulus Cukup', 3);
INSERT INTO `hasilraport_t` VALUES (18, 2, 1, '55', 'Lulus Cukup', 3);
INSERT INTO `hasilraport_t` VALUES (19, 3, 1, '55', 'Lulus Cukup', 3);
INSERT INTO `hasilraport_t` VALUES (20, 4, 1, '33', 'Lulus Cukup', 3);
INSERT INTO `hasilraport_t` VALUES (21, 5, 1, '44', 'Kompeten', 3);
INSERT INTO `hasilraport_t` VALUES (22, 6, 1, '55', 'Kompeten', 3);
INSERT INTO `hasilraport_t` VALUES (23, 7, 1, '66', 'Lulus Cukup', 3);
INSERT INTO `hasilraport_t` VALUES (24, 8, 1, '66', 'Lulus Cukup', 3);
INSERT INTO `hasilraport_t` VALUES (25, 1, 1, '88', 'Lulus Cukup', 4);
INSERT INTO `hasilraport_t` VALUES (26, 2, 1, '55', 'Lulus Cukup', 4);
INSERT INTO `hasilraport_t` VALUES (27, 3, 1, '55', 'Lulus Cukup', 4);
INSERT INTO `hasilraport_t` VALUES (28, 4, 1, '77', 'Lulus Cukup', 4);
INSERT INTO `hasilraport_t` VALUES (29, 5, 1, '44', 'Kompeten', 4);
INSERT INTO `hasilraport_t` VALUES (30, 6, 1, '55', 'Kompeten', 4);
INSERT INTO `hasilraport_t` VALUES (31, 7, 1, '33', 'Lulus Cukup', 4);
INSERT INTO `hasilraport_t` VALUES (32, 8, 1, '66', 'Lulus Cukup', 4);

-- ----------------------------
-- Table structure for jenismapel_m
-- ----------------------------
DROP TABLE IF EXISTS `jenismapel_m`;
CREATE TABLE `jenismapel_m`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `jenismatpel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jenismapel_m
-- ----------------------------
INSERT INTO `jenismapel_m` VALUES (1, 'Normatif');
INSERT INTO `jenismapel_m` VALUES (2, 'Adatif');
INSERT INTO `jenismapel_m` VALUES (3, 'Produktif');
INSERT INTO `jenismapel_m` VALUES (4, 'Muatan Lokal');

-- ----------------------------
-- Table structure for jurusan_m
-- ----------------------------
DROP TABLE IF EXISTS `jurusan_m`;
CREATE TABLE `jurusan_m`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `kdjurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bidangjurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jurusan_m
-- ----------------------------
INSERT INTO `jurusan_m` VALUES (1, 'TJKT', 'Teknik Jaringan dan Telekomunikasi', 'Teknik Informasi & Komunikasi');
INSERT INTO `jurusan_m` VALUES (2, 'MP', 'Manajemen Perkantoran', 'Administrasi Perkantoran');
INSERT INTO `jurusan_m` VALUES (3, 'ULP', 'Usaha Layanan Pariwisata', 'Pariwisata');
INSERT INTO `jurusan_m` VALUES (4, 'BP', 'Broadcasting dan Perfilman', 'Komunikasi atau Media');

-- ----------------------------
-- Table structure for kehadiran_t
-- ----------------------------
DROP TABLE IF EXISTS `kehadiran_t`;
CREATE TABLE `kehadiran_t`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `objectsiswafk` int NULL DEFAULT NULL,
  `sakit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `izin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanpa_keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kehadiran_t
-- ----------------------------
INSERT INTO `kehadiran_t` VALUES (2, 1, '0', '0', '0');

-- ----------------------------
-- Table structure for kelas_m
-- ----------------------------
DROP TABLE IF EXISTS `kelas_m`;
CREATE TABLE `kelas_m`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kelas_m
-- ----------------------------
INSERT INTO `kelas_m` VALUES (1, 'X ( Sepuluh )');
INSERT INTO `kelas_m` VALUES (2, 'XI ( Sebelas )');
INSERT INTO `kelas_m` VALUES (3, 'XII ( DuaBelas )');

-- ----------------------------
-- Table structure for matpel_m
-- ----------------------------
DROP TABLE IF EXISTS `matpel_m`;
CREATE TABLE `matpel_m`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `matapelajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nilaikkm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `objectkelasfk` int NOT NULL,
  `objectjenismapelfk` int NOT NULL,
  `objectjurusanfk` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 235 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of matpel_m
-- ----------------------------
INSERT INTO `matpel_m` VALUES (1, 'Pendidikan Agama', '75', 1, 1, 1);
INSERT INTO `matpel_m` VALUES (2, 'Pendidikan Kewarganegaraan', '70', 1, 1, 1);
INSERT INTO `matpel_m` VALUES (3, 'Bahasa Inggris', '70', 1, 2, 1);
INSERT INTO `matpel_m` VALUES (4, 'Matematika', '70', 1, 2, 1);
INSERT INTO `matpel_m` VALUES (5, 'Sistem Perakitan Komputer', '75', 1, 3, 1);
INSERT INTO `matpel_m` VALUES (6, 'Sistem Operasi', '75', 1, 3, 1);
INSERT INTO `matpel_m` VALUES (8, 'Pendidikan Lingkungan Hidup', '70', 1, 4, 1);
INSERT INTO `matpel_m` VALUES (11, 'Bahasa Sunda', '70', 1, 4, 1);
INSERT INTO `matpel_m` VALUES (12, 'Bahasa Indonesia', '75', 1, 1, 1);
INSERT INTO `matpel_m` VALUES (13, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 1, 1, 1);
INSERT INTO `matpel_m` VALUES (14, 'Seni dan Budaya', '70', 1, 1, 1);
INSERT INTO `matpel_m` VALUES (15, 'Ilmu Pengetahuan Alam', '70', 1, 2, 1);
INSERT INTO `matpel_m` VALUES (16, 'Ilmu Pengetahuan Sosial', '70', 1, 2, 1);
INSERT INTO `matpel_m` VALUES (17, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 1, 2, 1);
INSERT INTO `matpel_m` VALUES (18, 'Kewirausahaan', '70', 1, 2, 1);
INSERT INTO `matpel_m` VALUES (19, 'Fisika', '75', 1, 2, 1);
INSERT INTO `matpel_m` VALUES (20, 'Kimia', '75', 1, 2, 1);
INSERT INTO `matpel_m` VALUES (21, 'Jaringan Dasar', '75', 1, 3, 1);
INSERT INTO `matpel_m` VALUES (22, 'Pemograman Dasar', '75', 1, 3, 1);
INSERT INTO `matpel_m` VALUES (26, 'Pendidikan Agama', '75', 2, 1, 1);
INSERT INTO `matpel_m` VALUES (27, 'Pendidikan Kewarganegaraan', '70', 2, 1, 1);
INSERT INTO `matpel_m` VALUES (28, 'Bahasa Indonesia', '75', 2, 1, 1);
INSERT INTO `matpel_m` VALUES (29, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 2, 1, 1);
INSERT INTO `matpel_m` VALUES (30, 'Seni dan Budaya', '70', 2, 1, 1);
INSERT INTO `matpel_m` VALUES (31, 'Bahasa Inggris', '70', 2, 2, 1);
INSERT INTO `matpel_m` VALUES (32, 'Matematika', '70', 2, 2, 1);
INSERT INTO `matpel_m` VALUES (33, 'Ilmu Pengetahuan Alam', '70', 2, 2, 1);
INSERT INTO `matpel_m` VALUES (34, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 2, 2, 1);
INSERT INTO `matpel_m` VALUES (35, 'Kewirausahaan', '70', 2, 2, 1);
INSERT INTO `matpel_m` VALUES (36, 'Fisika', '75', 2, 2, 1);
INSERT INTO `matpel_m` VALUES (37, 'Kimia', '75', 2, 2, 1);
INSERT INTO `matpel_m` VALUES (38, 'Sistem Operasi Linux', '75', 2, 3, 1);
INSERT INTO `matpel_m` VALUES (39, 'Rancang Bangun Jaringan', '75', 2, 3, 1);
INSERT INTO `matpel_m` VALUES (40, 'Pemograman Web', '75', 2, 3, 1);
INSERT INTO `matpel_m` VALUES (41, 'Komputer dan Jaringan Dasar', '75', 2, 3, 1);
INSERT INTO `matpel_m` VALUES (42, 'Pendidikan Lingkungan Hidup', '70', 2, 4, 1);
INSERT INTO `matpel_m` VALUES (43, 'Bahasa Sunda', '70', 2, 4, 1);
INSERT INTO `matpel_m` VALUES (44, 'Mentoring Etika Komunikasi', '75', 2, 4, 1);
INSERT INTO `matpel_m` VALUES (45, 'Pendidikan Agama', '75', 3, 1, 1);
INSERT INTO `matpel_m` VALUES (46, 'Pendidikan Kewarganegaraan', '70', 3, 1, 1);
INSERT INTO `matpel_m` VALUES (47, 'Bahasa Indonesia', '75', 3, 1, 1);
INSERT INTO `matpel_m` VALUES (48, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 3, 1, 1);
INSERT INTO `matpel_m` VALUES (49, 'Seni dan Budaya', '70', 3, 1, 1);
INSERT INTO `matpel_m` VALUES (50, 'Bahasa Inggris', '70', 3, 2, 1);
INSERT INTO `matpel_m` VALUES (51, 'Matematika', '70', 3, 2, 1);
INSERT INTO `matpel_m` VALUES (52, 'Ilmu Pengetahuan Alam', '70', 3, 2, 1);
INSERT INTO `matpel_m` VALUES (53, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 3, 2, 1);
INSERT INTO `matpel_m` VALUES (54, 'Kewirausahaan', '70', 3, 2, 1);
INSERT INTO `matpel_m` VALUES (55, 'Fisika', '75', 3, 2, 1);
INSERT INTO `matpel_m` VALUES (56, 'Kimia', '75', 3, 2, 1);
INSERT INTO `matpel_m` VALUES (57, 'Sistem Operasi Server', '75', 3, 3, 1);
INSERT INTO `matpel_m` VALUES (58, 'Teknologi Jaringan Berbasis Luas (WAN)', '75', 3, 3, 1);
INSERT INTO `matpel_m` VALUES (59, 'Administrasi Infrastruktur Jaringan', '75', 3, 3, 1);
INSERT INTO `matpel_m` VALUES (60, 'Sistem Komputer ', '75', 3, 3, 1);
INSERT INTO `matpel_m` VALUES (61, 'Pendidikan Lingkungan Hidup', '70', 3, 4, 1);
INSERT INTO `matpel_m` VALUES (62, 'Bahasa Sunda', '70', 3, 4, 1);
INSERT INTO `matpel_m` VALUES (63, 'Mentoring Etika Komunikasi', '75', 3, 4, 1);
INSERT INTO `matpel_m` VALUES (64, 'Pendidikan Agama', '75', 1, 1, 2);
INSERT INTO `matpel_m` VALUES (65, 'Pendidikan Kewarganegaraan', '70', 1, 1, 2);
INSERT INTO `matpel_m` VALUES (66, 'Bahasa Indonesia', '75', 1, 1, 2);
INSERT INTO `matpel_m` VALUES (67, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 1, 1, 2);
INSERT INTO `matpel_m` VALUES (68, 'Seni dan Budaya', '70', 1, 1, 2);
INSERT INTO `matpel_m` VALUES (69, 'Bahasa Inggris', '70', 1, 2, 2);
INSERT INTO `matpel_m` VALUES (70, 'Matematika', '70', 1, 2, 2);
INSERT INTO `matpel_m` VALUES (71, 'Ilmu Pengetahuan Alam', '70', 1, 2, 2);
INSERT INTO `matpel_m` VALUES (72, 'Ilmu Pengetahuan Sosial', '70', 1, 2, 2);
INSERT INTO `matpel_m` VALUES (73, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 1, 2, 2);
INSERT INTO `matpel_m` VALUES (74, 'Kewirausahaan', '70', 1, 2, 2);
INSERT INTO `matpel_m` VALUES (75, 'Fisika', '75', 1, 2, 2);
INSERT INTO `matpel_m` VALUES (76, 'Kimia', '75', 1, 2, 2);
INSERT INTO `matpel_m` VALUES (77, 'Manajemen Perkantoran Dan Layanan Bisnis', '75', 1, 3, 2);
INSERT INTO `matpel_m` VALUES (78, 'Produk Kreatif dan Kewirausahaan', '75', 1, 3, 2);
INSERT INTO `matpel_m` VALUES (79, 'Bimbingan Konseling', '75', 1, 3, 2);
INSERT INTO `matpel_m` VALUES (80, 'Kewirausahaan MPLB', '75', 1, 3, 2);
INSERT INTO `matpel_m` VALUES (81, 'Pendidikan Lingkungan Hidup', '70', 1, 4, 2);
INSERT INTO `matpel_m` VALUES (82, 'Bahasa Sunda', '70', 1, 4, 2);
INSERT INTO `matpel_m` VALUES (83, 'Pendidikan Agama', '75', 2, 1, 2);
INSERT INTO `matpel_m` VALUES (84, 'Pendidikan Kewarganegaraan', '70', 2, 1, 2);
INSERT INTO `matpel_m` VALUES (85, 'Bahasa Indonesia', '75', 2, 1, 2);
INSERT INTO `matpel_m` VALUES (86, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 2, 1, 2);
INSERT INTO `matpel_m` VALUES (87, 'Seni dan Budaya', '70', 2, 1, 2);
INSERT INTO `matpel_m` VALUES (88, 'Bahasa Inggris', '70', 2, 2, 2);
INSERT INTO `matpel_m` VALUES (89, 'Matematika', '70', 2, 2, 2);
INSERT INTO `matpel_m` VALUES (90, 'Ilmu Pengetahuan Alam', '70', 2, 2, 2);
INSERT INTO `matpel_m` VALUES (91, 'Ilmu Pengetahuan Sosial', '70', 2, 2, 2);
INSERT INTO `matpel_m` VALUES (92, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 2, 2, 2);
INSERT INTO `matpel_m` VALUES (93, 'Kewirausahaan', '70', 2, 2, 2);
INSERT INTO `matpel_m` VALUES (94, 'Fisika', '75', 2, 2, 2);
INSERT INTO `matpel_m` VALUES (95, 'Kimia', '75', 2, 2, 2);
INSERT INTO `matpel_m` VALUES (96, 'Manajemen Perkantoran Dan Layanan Bisnis', '75', 2, 3, 2);
INSERT INTO `matpel_m` VALUES (97, 'Produk Kreatif dan Kewirausahaan', '75', 2, 3, 2);
INSERT INTO `matpel_m` VALUES (98, 'Bimbingan Konseling', '75', 2, 3, 2);
INSERT INTO `matpel_m` VALUES (99, 'Administrasi Umum', '75', 2, 3, 2);
INSERT INTO `matpel_m` VALUES (100, 'Pendidikan Lingkungan Hidup', '70', 2, 4, 2);
INSERT INTO `matpel_m` VALUES (101, 'Bahasa Sunda', '70', 2, 4, 2);
INSERT INTO `matpel_m` VALUES (102, 'Pendidikan Agama', '75', 3, 1, 2);
INSERT INTO `matpel_m` VALUES (103, 'Pendidikan Kewarganegaraan', '70', 3, 1, 2);
INSERT INTO `matpel_m` VALUES (104, 'Bahasa Indonesia', '75', 3, 1, 2);
INSERT INTO `matpel_m` VALUES (105, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 3, 1, 2);
INSERT INTO `matpel_m` VALUES (106, 'Seni dan Budaya', '70', 3, 1, 2);
INSERT INTO `matpel_m` VALUES (107, 'Bahasa Inggris', '70', 3, 2, 2);
INSERT INTO `matpel_m` VALUES (108, 'Matematika', '70', 3, 2, 2);
INSERT INTO `matpel_m` VALUES (109, 'Ilmu Pengetahuan Alam', '70', 3, 2, 2);
INSERT INTO `matpel_m` VALUES (110, 'Ilmu Pengetahuan Sosial', '70', 3, 2, 2);
INSERT INTO `matpel_m` VALUES (111, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 3, 2, 2);
INSERT INTO `matpel_m` VALUES (112, 'Kewirausahaan', '70', 3, 2, 2);
INSERT INTO `matpel_m` VALUES (113, 'Fisika', '75', 3, 2, 2);
INSERT INTO `matpel_m` VALUES (114, 'Kimia', '75', 3, 2, 2);
INSERT INTO `matpel_m` VALUES (115, 'Manajemen Perkantoran Dan Layanan Bisnis', '75', 3, 3, 2);
INSERT INTO `matpel_m` VALUES (116, 'Komputer dan Pengolahan Data', '75', 3, 3, 2);
INSERT INTO `matpel_m` VALUES (117, 'Manajemen Perkantoran', '75', 3, 3, 2);
INSERT INTO `matpel_m` VALUES (118, 'Administrasi Umum', '75', 3, 3, 2);
INSERT INTO `matpel_m` VALUES (119, 'Pendidikan Lingkungan Hidup', '70', 3, 4, 2);
INSERT INTO `matpel_m` VALUES (120, 'Bahasa Sunda', '70', 3, 4, 3);
INSERT INTO `matpel_m` VALUES (121, 'Pendidikan Agama', '75', 1, 1, 3);
INSERT INTO `matpel_m` VALUES (122, 'Pendidikan Kewarganegaraan', '70', 1, 1, 3);
INSERT INTO `matpel_m` VALUES (123, 'Bahasa Indonesia', '75', 1, 1, 3);
INSERT INTO `matpel_m` VALUES (124, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 1, 1, 3);
INSERT INTO `matpel_m` VALUES (125, 'Seni dan Budaya', '70', 1, 1, 3);
INSERT INTO `matpel_m` VALUES (126, 'Bahasa Inggris', '70', 1, 2, 3);
INSERT INTO `matpel_m` VALUES (127, 'Matematika', '70', 1, 2, 3);
INSERT INTO `matpel_m` VALUES (128, 'Ilmu Pengetahuan Alam', '70', 1, 2, 3);
INSERT INTO `matpel_m` VALUES (129, 'Ilmu Pengetahuan Sosial', '70', 1, 2, 3);
INSERT INTO `matpel_m` VALUES (130, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 1, 2, 3);
INSERT INTO `matpel_m` VALUES (131, 'Kewirausahaan', '70', 1, 2, 3);
INSERT INTO `matpel_m` VALUES (132, 'Fisika', '75', 1, 2, 3);
INSERT INTO `matpel_m` VALUES (133, 'Kimia', '75', 1, 2, 3);
INSERT INTO `matpel_m` VALUES (134, 'Pengantar Usaha Perjalanan Wisata', '75', 1, 3, 3);
INSERT INTO `matpel_m` VALUES (135, 'Administrasi Usaha Layanan Pariwisata', '75', 1, 3, 3);
INSERT INTO `matpel_m` VALUES (136, 'Manajemen Usaha Perjalanan', '75', 1, 3, 3);
INSERT INTO `matpel_m` VALUES (137, 'Teknik Pemanduan Wisata', '75', 1, 3, 3);
INSERT INTO `matpel_m` VALUES (138, 'Pendidikan Lingkungan Hidup', '70', 1, 4, 3);
INSERT INTO `matpel_m` VALUES (139, 'Bahasa Sunda', '70', 1, 4, 3);
INSERT INTO `matpel_m` VALUES (140, 'Pendidikan Agama', '75', 2, 1, 3);
INSERT INTO `matpel_m` VALUES (141, 'Pendidikan Kewarganegaraan', '70', 2, 1, 3);
INSERT INTO `matpel_m` VALUES (142, 'Bahasa Indonesia', '75', 2, 1, 3);
INSERT INTO `matpel_m` VALUES (143, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 2, 1, 3);
INSERT INTO `matpel_m` VALUES (144, 'Seni dan Budaya', '70', 2, 1, 3);
INSERT INTO `matpel_m` VALUES (145, 'Bahasa Inggris', '70', 2, 2, 3);
INSERT INTO `matpel_m` VALUES (146, 'Matematika', '70', 2, 2, 3);
INSERT INTO `matpel_m` VALUES (147, 'Ilmu Pengetahuan Alam', '70', 2, 2, 3);
INSERT INTO `matpel_m` VALUES (148, 'Ilmu Pengetahuan Sosial', '70', 2, 2, 3);
INSERT INTO `matpel_m` VALUES (149, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 2, 2, 3);
INSERT INTO `matpel_m` VALUES (150, 'Kewirausahaan', '70', 2, 2, 3);
INSERT INTO `matpel_m` VALUES (151, 'Fisika', '75', 2, 2, 3);
INSERT INTO `matpel_m` VALUES (152, 'Kimia', '75', 2, 2, 3);
INSERT INTO `matpel_m` VALUES (153, 'Pengantar Usaha Perjalanan Wisata', '75', 2, 3, 3);
INSERT INTO `matpel_m` VALUES (154, 'Administrasi Usaha Layanan Pariwisata', '75', 2, 3, 3);
INSERT INTO `matpel_m` VALUES (155, 'Manajemen Usaha Perjalanan', '75', 2, 3, 3);
INSERT INTO `matpel_m` VALUES (156, 'Teknik Pemanduan Wisata', '75', 2, 3, 3);
INSERT INTO `matpel_m` VALUES (157, 'Pendidikan Lingkungan Hidup', '70', 2, 4, 3);
INSERT INTO `matpel_m` VALUES (158, 'Bahasa Sunda', '70', 2, 4, 3);
INSERT INTO `matpel_m` VALUES (159, 'Pendidikan Agama', '75', 3, 1, 3);
INSERT INTO `matpel_m` VALUES (160, 'Pendidikan Kewarganegaraan', '70', 3, 1, 3);
INSERT INTO `matpel_m` VALUES (161, 'Bahasa Indonesia', '75', 3, 1, 3);
INSERT INTO `matpel_m` VALUES (162, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 3, 1, 3);
INSERT INTO `matpel_m` VALUES (163, 'Seni dan Budaya', '70', 3, 1, 3);
INSERT INTO `matpel_m` VALUES (164, 'Bahasa Inggris', '70', 3, 2, 3);
INSERT INTO `matpel_m` VALUES (165, 'Matematika', '70', 3, 2, 3);
INSERT INTO `matpel_m` VALUES (166, 'Ilmu Pengetahuan Alam', '70', 3, 2, 3);
INSERT INTO `matpel_m` VALUES (167, 'Ilmu Pengetahuan Sosial', '70', 3, 2, 3);
INSERT INTO `matpel_m` VALUES (168, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 3, 2, 3);
INSERT INTO `matpel_m` VALUES (169, 'Kewirausahaan', '70', 3, 2, 3);
INSERT INTO `matpel_m` VALUES (170, 'Fisika', '75', 3, 2, 3);
INSERT INTO `matpel_m` VALUES (171, 'Kimia', '75', 3, 2, 3);
INSERT INTO `matpel_m` VALUES (172, 'Pengantar Usaha Perjalanan Wisata', '75', 3, 3, 3);
INSERT INTO `matpel_m` VALUES (173, 'Administrasi Usaha Layanan Pariwisata', '75', 3, 3, 3);
INSERT INTO `matpel_m` VALUES (174, 'Manajemen Usaha Perjalanan', '75', 3, 3, 3);
INSERT INTO `matpel_m` VALUES (175, 'Teknik Pemanduan Wisata', '75', 3, 3, 3);
INSERT INTO `matpel_m` VALUES (176, 'Pendidikan Lingkungan Hidup', '70', 3, 4, 3);
INSERT INTO `matpel_m` VALUES (177, 'Bahasa Sunda', '70', 3, 4, 3);
INSERT INTO `matpel_m` VALUES (178, 'Pendidikan Agama', '75', 1, 1, 4);
INSERT INTO `matpel_m` VALUES (179, 'Pendidikan Kewarganegaraan', '70', 1, 1, 4);
INSERT INTO `matpel_m` VALUES (180, 'Bahasa Indonesia', '75', 1, 1, 4);
INSERT INTO `matpel_m` VALUES (181, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 1, 1, 4);
INSERT INTO `matpel_m` VALUES (182, 'Seni dan Budaya', '70', 1, 1, 4);
INSERT INTO `matpel_m` VALUES (183, 'Bahasa Inggris', '70', 1, 2, 4);
INSERT INTO `matpel_m` VALUES (184, 'Matematika', '70', 1, 2, 4);
INSERT INTO `matpel_m` VALUES (185, 'Ilmu Pengetahuan Alam', '70', 1, 2, 4);
INSERT INTO `matpel_m` VALUES (186, 'Ilmu Pengetahuan Sosial', '70', 1, 2, 4);
INSERT INTO `matpel_m` VALUES (187, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 1, 2, 4);
INSERT INTO `matpel_m` VALUES (188, 'Kewirausahaan', '70', 1, 2, 4);
INSERT INTO `matpel_m` VALUES (189, 'Fisika', '75', 1, 2, 4);
INSERT INTO `matpel_m` VALUES (190, 'Kimia', '75', 1, 2, 4);
INSERT INTO `matpel_m` VALUES (191, 'Produksi Program TV', '75', 1, 3, 4);
INSERT INTO `matpel_m` VALUES (192, 'Teknik Penyiaran Radio', '75', 1, 3, 4);
INSERT INTO `matpel_m` VALUES (193, 'Penulisan Naskah TV dan Film', '75', 1, 3, 4);
INSERT INTO `matpel_m` VALUES (194, 'Teknik Pengambilan Gambar', '75', 1, 3, 4);
INSERT INTO `matpel_m` VALUES (195, 'Pendidikan Lingkungan Hidup', '70', 1, 4, 4);
INSERT INTO `matpel_m` VALUES (196, 'Bahasa Sunda', '70', 1, 4, 4);
INSERT INTO `matpel_m` VALUES (197, 'Pendidikan Agama', '75', 2, 1, 4);
INSERT INTO `matpel_m` VALUES (198, 'Pendidikan Kewarganegaraan', '70', 2, 1, 4);
INSERT INTO `matpel_m` VALUES (199, 'Bahasa Indonesia', '75', 2, 1, 4);
INSERT INTO `matpel_m` VALUES (200, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 2, 1, 4);
INSERT INTO `matpel_m` VALUES (201, 'Seni dan Budaya', '70', 2, 1, 4);
INSERT INTO `matpel_m` VALUES (202, 'Bahasa Inggris', '70', 2, 2, 4);
INSERT INTO `matpel_m` VALUES (203, 'Matematika', '70', 2, 2, 4);
INSERT INTO `matpel_m` VALUES (204, 'Ilmu Pengetahuan Alam', '70', 2, 2, 4);
INSERT INTO `matpel_m` VALUES (205, 'Ilmu Pengetahuan Sosial', '70', 2, 2, 4);
INSERT INTO `matpel_m` VALUES (206, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 2, 2, 4);
INSERT INTO `matpel_m` VALUES (207, 'Kewirausahaan', '70', 2, 2, 4);
INSERT INTO `matpel_m` VALUES (208, 'Fisika', '75', 2, 2, 4);
INSERT INTO `matpel_m` VALUES (209, 'Kimia', '75', 2, 2, 4);
INSERT INTO `matpel_m` VALUES (210, 'Produksi Program TV', '75', 2, 3, 4);
INSERT INTO `matpel_m` VALUES (211, 'Teknik Penyiaran Radio', '75', 2, 3, 4);
INSERT INTO `matpel_m` VALUES (212, 'Penulisan Naskah TV dan Film', '75', 2, 3, 4);
INSERT INTO `matpel_m` VALUES (213, 'Teknik Pengambilan Gambar', '75', 2, 3, 4);
INSERT INTO `matpel_m` VALUES (214, 'Pendidikan Lingkungan Hidup', '70', 2, 4, 4);
INSERT INTO `matpel_m` VALUES (215, 'Bahasa Sunda', '70', 2, 4, 4);
INSERT INTO `matpel_m` VALUES (216, 'Pendidikan Agama', '75', 3, 1, 4);
INSERT INTO `matpel_m` VALUES (217, 'Pendidikan Kewarganegaraan', '70', 3, 1, 4);
INSERT INTO `matpel_m` VALUES (218, 'Bahasa Indonesia', '75', 3, 1, 4);
INSERT INTO `matpel_m` VALUES (219, 'Pendidikan Jasmani Olahraga dan Kesehatan', '70', 3, 1, 4);
INSERT INTO `matpel_m` VALUES (220, 'Seni dan Budaya', '70', 3, 1, 4);
INSERT INTO `matpel_m` VALUES (221, 'Bahasa Inggris', '70', 3, 2, 4);
INSERT INTO `matpel_m` VALUES (222, 'Matematika', '70', 3, 2, 4);
INSERT INTO `matpel_m` VALUES (223, 'Ilmu Pengetahuan Alam', '70', 3, 2, 4);
INSERT INTO `matpel_m` VALUES (224, 'Ilmu Pengetahuan Sosial', '70', 3, 2, 4);
INSERT INTO `matpel_m` VALUES (225, 'Keterampilan / Teknologi Informasi dan Komputer', '75', 3, 2, 4);
INSERT INTO `matpel_m` VALUES (226, 'Kewirausahaan', '70', 3, 2, 4);
INSERT INTO `matpel_m` VALUES (227, 'Fisika', '75', 3, 2, 4);
INSERT INTO `matpel_m` VALUES (228, 'Kimia', '75', 3, 2, 4);
INSERT INTO `matpel_m` VALUES (229, 'Produksi Program TV', '75', 3, 3, 4);
INSERT INTO `matpel_m` VALUES (230, 'Teknik Penyiaran Radio', '75', 3, 3, 4);
INSERT INTO `matpel_m` VALUES (231, 'Penulisan Naskah TV dan Film', '75', 3, 3, 4);
INSERT INTO `matpel_m` VALUES (232, 'Teknik Pengambilan Gambar', '75', 3, 3, 4);
INSERT INTO `matpel_m` VALUES (233, 'Pendidikan Lingkungan Hidup', '70', 3, 4, 4);
INSERT INTO `matpel_m` VALUES (234, 'Bahasa Sunda', '70', 3, 4, 4);

-- ----------------------------
-- Table structure for semester_m
-- ----------------------------
DROP TABLE IF EXISTS `semester_m`;
CREATE TABLE `semester_m`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahunajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of semester_m
-- ----------------------------
INSERT INTO `semester_m` VALUES (1, '1 ( Ganjil )', '2023/2024');
INSERT INTO `semester_m` VALUES (2, '2 ( Genap )', '2023/2024');
INSERT INTO `semester_m` VALUES (3, '1 ( Ganjil )', '2024/2025');
INSERT INTO `semester_m` VALUES (4, '2 ( Genap )', '2024/2025');

-- ----------------------------
-- Table structure for siswa_m
-- ----------------------------
DROP TABLE IF EXISTS `siswa_m`;
CREATE TABLE `siswa_m`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `namalengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nisn` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `objectkelasfk` int NOT NULL,
  `objectjurusanfk` int NOT NULL,
  `objectsemesterfk` int NOT NULL,
  `objectgurufk` int NOT NULL,
  `ttl` date NOT NULL,
  `jk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `objectorangtuafk` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of siswa_m
-- ----------------------------
INSERT INTO `siswa_m` VALUES (1, 'Mila Yuliana', '15.16.010.016', 1, 1, 1, 1, '2000-01-16', 'Perempuan', 'Islam', 'Kp. Sekeawi RT 02 /03', '087644556790', 3);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectsiswafk` int NULL DEFAULT NULL,
  `objectgurufk` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (0, 'Admin', 'admin@gmail.com', '$2y$10$/zCuv6PbR8so1d92hjU3WOR4/di3SV.i4vTqSLoJUPTOHK5lBHMiK', 'admin', NULL, NULL, '2024-08-04 15:45:49', '2024-08-04 15:45:49');
INSERT INTO `users` VALUES (1, 'Mila Yuliana', 'mila@gmail.com', '$2y$10$Ms0u03a/BsIWnT1WtOEnu.5PH7zvUVc3kOsF5D4V3K/n9vh8J0F/y', 'siswa', 1, 0, '2024-03-27 17:00:25', '2024-03-27 17:00:25');
INSERT INTO `users` VALUES (2, 'Irma Yunita, S.Kom', 'irma@gmail.com', '$2y$10$Ms0u03a/BsIWnT1WtOEnu.5PH7zvUVc3kOsF5D4V3K/n9vh8J0F/y', 'guru', 0, 1, '2024-03-27 17:00:25', '2024-03-27 17:00:25');
INSERT INTO `users` VALUES (3, 'Raihan', 'raihan@gmail.com', '$2y$10$Ms0u03a/BsIWnT1WtOEnu.5PH7zvUVc3kOsF5D4V3K/n9vh8J0F/y', 'orangtua', 1, 0, '2024-03-27 17:00:25', '2024-03-27 17:00:25');

SET FOREIGN_KEY_CHECKS = 1;
