/*
 Navicat Premium Data Transfer

 Source Server         : Localhost Rizky Febriyanto
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_e_raport

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 26/05/2024 11:36:20
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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
  `nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasilraport_t
-- ----------------------------
INSERT INTO `hasilraport_t` VALUES (1, 1, 1, '77', 'Lulus Cukup');
INSERT INTO `hasilraport_t` VALUES (2, 2, 1, '72', 'Lulus Cukup');
INSERT INTO `hasilraport_t` VALUES (3, 3, 1, '72', 'Lulus Cukup');
INSERT INTO `hasilraport_t` VALUES (4, 4, 1, '72', 'Lulus Cukup');
INSERT INTO `hasilraport_t` VALUES (5, 5, 1, '77', 'Kompeten');
INSERT INTO `hasilraport_t` VALUES (6, 6, 1, '77', 'Kompeten');
INSERT INTO `hasilraport_t` VALUES (7, 7, 1, '72', 'Lulus Cukup');
INSERT INTO `hasilraport_t` VALUES (8, 8, 1, '72', 'Lulus Cukup');

-- ----------------------------
-- Table structure for jenismapel_m
-- ----------------------------
DROP TABLE IF EXISTS `jenismapel_m`;
CREATE TABLE `jenismapel_m`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `jenismatpel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jurusan_m
-- ----------------------------
INSERT INTO `jurusan_m` VALUES (1, 'TKJ', 'Teknik Komputer Jaringan', 'Teknik Informasi & Komunikasi');
INSERT INTO `jurusan_m` VALUES (2, 'TKR', 'Teknik Kendaraan Ringan', 'Teknik Otomotif');
INSERT INTO `jurusan_m` VALUES (3, 'TAV', 'Teknik Audio Video', 'Teknik Elektro');
INSERT INTO `jurusan_m` VALUES (4, 'TSM', 'Teknik Sepeda Motor', 'Teknik Otomotif');

-- ----------------------------
-- Table structure for kelas_m
-- ----------------------------
DROP TABLE IF EXISTS `kelas_m`;
CREATE TABLE `kelas_m`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of matpel_m
-- ----------------------------
INSERT INTO `matpel_m` VALUES (1, 'Pendidikan Agama', '75', 1, 1);
INSERT INTO `matpel_m` VALUES (2, 'Pendidikan Kewarganegaraan', '70', 1, 1);
INSERT INTO `matpel_m` VALUES (3, 'Bahasa Inggris', '70', 1, 2);
INSERT INTO `matpel_m` VALUES (4, 'Matematika', '70', 1, 2);
INSERT INTO `matpel_m` VALUES (5, 'Merakit Personal Komputer', '75', 1, 3);
INSERT INTO `matpel_m` VALUES (6, 'Melakukan Instalasi Sistem Operasi', '75', 1, 3);
INSERT INTO `matpel_m` VALUES (7, 'Bahasa Sunda', '70', 1, 4);
INSERT INTO `matpel_m` VALUES (8, 'Pendidikan Lingkungan Hidup', '70', 1, 4);

-- ----------------------------
-- Table structure for semester_m
-- ----------------------------
DROP TABLE IF EXISTS `semester_m`;
CREATE TABLE `semester_m`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahunajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of semester_m
-- ----------------------------
INSERT INTO `semester_m` VALUES (1, '1 ( Ganjil )', '2023/2024');
INSERT INTO `semester_m` VALUES (2, '2 ( Genap )', '2023/2024');

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
  `jk` int NOT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siswa_m
-- ----------------------------
INSERT INTO `siswa_m` VALUES (1, 'Mila Yuliana', '15.16.010.016', 1, 1, 1, 1, '2000-01-16', 0, 'Islam', 'Kp. Sekeawi RT 02 /03', '087644556790');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@gmail.com', NULL, '$2y$10$/zCuv6PbR8so1d92hjU3WOR4/di3SV.i4vTqSLoJUPTOHK5lBHMiK', 'admin', NULL, '2024-03-24 08:38:54', '2024-03-24 08:38:54');
INSERT INTO `users` VALUES (4, 'user', 'user@gmail.com', NULL, '$2y$10$Ms0u03a/BsIWnT1WtOEnu.5PH7zvUVc3kOsF5D4V3K/n9vh8J0F/y', 'kasir', NULL, '2024-03-27 17:00:25', '2024-03-27 17:00:25');

SET FOREIGN_KEY_CHECKS = 1;
