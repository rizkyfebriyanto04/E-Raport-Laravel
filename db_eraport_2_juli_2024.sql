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

 Date: 02/07/2024 19:49:20
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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of guru_m
-- ----------------------------
INSERT INTO `guru_m` VALUES (1, 'Irma Yunita, S.Kom');
INSERT INTO `guru_m` VALUES (2, 'Rizal Alam, S.pd');

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
) ENGINE = InnoDB AUTO_INCREMENT = 65 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
INSERT INTO `hasilraport_t` VALUES (8, 8, 1, NULL, NULL, 1);
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
INSERT INTO `hasilraport_t` VALUES (57, 1, 15, '15', 'test', 1);
INSERT INTO `hasilraport_t` VALUES (58, 2, 15, '10', 'test', 1);
INSERT INTO `hasilraport_t` VALUES (59, 3, 15, '50', 'Kompeten', 1);
INSERT INTO `hasilraport_t` VALUES (60, 4, 15, '0', '-', 1);
INSERT INTO `hasilraport_t` VALUES (61, 5, 15, '0', '-', 1);
INSERT INTO `hasilraport_t` VALUES (62, 6, 15, '0', '-', 1);
INSERT INTO `hasilraport_t` VALUES (63, 7, 15, '0', '-', 1);
INSERT INTO `hasilraport_t` VALUES (64, 8, 15, '0', '-', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kehadiran_t
-- ----------------------------
INSERT INTO `kehadiran_t` VALUES (1, 4, '0', '2', '1');
INSERT INTO `kehadiran_t` VALUES (2, 1, '0', '0', '0');
INSERT INTO `kehadiran_t` VALUES (4, 2, '1', '0', '0');
INSERT INTO `kehadiran_t` VALUES (5, 3, '1', '1', '6');
INSERT INTO `kehadiran_t` VALUES (13, 15, '0', '0', '0');

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of matpel_m
-- ----------------------------
INSERT INTO `matpel_m` VALUES (1, 'Pendidikan Agama', '75', 1, 1, 1);
INSERT INTO `matpel_m` VALUES (2, 'Pendidikan Kewarganegaraan', '70', 1, 1, 1);
INSERT INTO `matpel_m` VALUES (3, 'Bahasa Inggris', '70', 1, 2, 1);
INSERT INTO `matpel_m` VALUES (4, 'Matematika', '70', 1, 2, 1);
INSERT INTO `matpel_m` VALUES (5, 'Merakit Personal Komputer', '75', 1, 3, 1);
INSERT INTO `matpel_m` VALUES (6, 'Melakukan Instalasi Sistem Operasi', '75', 1, 3, 1);
INSERT INTO `matpel_m` VALUES (7, 'Bahasa Sunda', '70', 1, 4, 1);
INSERT INTO `matpel_m` VALUES (8, 'Pendidikan Lingkungan Hidup', '70', 1, 4, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of siswa_m
-- ----------------------------
INSERT INTO `siswa_m` VALUES (1, 'Mila Yuliana', '15.16.010.016', 1, 1, 1, 1, '2000-01-16', 'Perempuan', 'Islam', 'Kp. Sekeawi RT 02 /03', '087644556790', 3);
INSERT INTO `siswa_m` VALUES (2, 'Andri Gunawan', '17.18.020.028', 1, 2, 1, 2, '2001-09-20', 'Laki - Laki', 'Islam', 'Kopo Syati', '087767722882', NULL);
INSERT INTO `siswa_m` VALUES (3, 'Sendi', '16.13.022.026', 1, 3, 1, 1, '2001-09-04', 'Laki - Laki', 'Islam', 'Kopo Syati 2', '087767722881', NULL);
INSERT INTO `siswa_m` VALUES (4, 'Rizky Febriyanto', '17.19.021.031', 1, 4, 1, 1, '2001-02-04', 'Laki - Laki', 'Islam', 'Cipedes Hegar', '087767722882', NULL);
INSERT INTO `siswa_m` VALUES (15, 'Nurul', '17.19.022.332', 1, 1, 1, 1, '2024-06-01', 'Perempuan', 'Islam', 'jalan cibay', '08127388393', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (0, 'Admin', 'admin@gmail.com', '$2y$10$/zCuv6PbR8so1d92hjU3WOR4/di3SV.i4vTqSLoJUPTOHK5lBHMiK', 'admin', 0, 0, '2022-01-06 14:44:14', '2022-01-06 14:44:14');
INSERT INTO `users` VALUES (1, 'Mila Yuliana', 'mila@gmail.com', '$2y$10$Ms0u03a/BsIWnT1WtOEnu.5PH7zvUVc3kOsF5D4V3K/n9vh8J0F/y', 'siswa', 1, 0, '2024-03-27 17:00:25', '2024-03-27 17:00:25');
INSERT INTO `users` VALUES (2, 'Irma Yunita, S.Kom', 'irma@gmail.com', '$2y$10$Ms0u03a/BsIWnT1WtOEnu.5PH7zvUVc3kOsF5D4V3K/n9vh8J0F/y', 'guru', 0, 1, '2024-03-27 17:00:25', '2024-03-27 17:00:25');
INSERT INTO `users` VALUES (3, 'Raihan', 'raihan@gmail.com', '$2y$10$Ms0u03a/BsIWnT1WtOEnu.5PH7zvUVc3kOsF5D4V3K/n9vh8J0F/y', 'orangtua', 1, 0, '2024-03-27 17:00:25', '2024-03-27 17:00:25');

SET FOREIGN_KEY_CHECKS = 1;
