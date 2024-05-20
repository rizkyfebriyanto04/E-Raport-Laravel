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

 Date: 20/05/2024 21:33:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for guru_m
-- ----------------------------
DROP TABLE IF EXISTS `guru_m`;
CREATE TABLE `guru_m`  (
  `id` int NOT NULL,
  `namalengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of guru_m
-- ----------------------------
INSERT INTO `guru_m` VALUES (1, 'Guru A');

-- ----------------------------
-- Table structure for hasilraport_t
-- ----------------------------
DROP TABLE IF EXISTS `hasilraport_t`;
CREATE TABLE `hasilraport_t`  (
  `id` int NOT NULL,
  `objectmatpelfk` int NOT NULL,
  `objectsiswafk` int NOT NULL,
  `nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `hasilraport_t_objectmatpelfk_matpel_m_id`(`objectmatpelfk` ASC) USING BTREE,
  INDEX `hasilraport_t_objectsiswafk_siswa_m_id`(`objectsiswafk` ASC) USING BTREE,
  CONSTRAINT `hasilraport_t_objectmatpelfk_matpel_m_id` FOREIGN KEY (`objectmatpelfk`) REFERENCES `matpel_m` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `hasilraport_t_objectsiswafk_siswa_m_id` FOREIGN KEY (`objectsiswafk`) REFERENCES `siswa_m` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasilraport_t
-- ----------------------------
INSERT INTO `hasilraport_t` VALUES (1, 1, 1, '50');
INSERT INTO `hasilraport_t` VALUES (2, 2, 1, '100');
INSERT INTO `hasilraport_t` VALUES (3, 1, 2, '80');
INSERT INTO `hasilraport_t` VALUES (4, 2, 2, '60');

-- ----------------------------
-- Table structure for jurusan_m
-- ----------------------------
DROP TABLE IF EXISTS `jurusan_m`;
CREATE TABLE `jurusan_m`  (
  `id` int NOT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jurusan_m
-- ----------------------------
INSERT INTO `jurusan_m` VALUES (1, 'TKJ');
INSERT INTO `jurusan_m` VALUES (2, 'TKR');

-- ----------------------------
-- Table structure for kelas_m
-- ----------------------------
DROP TABLE IF EXISTS `kelas_m`;
CREATE TABLE `kelas_m`  (
  `id` int NOT NULL,
  `kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_m
-- ----------------------------
INSERT INTO `kelas_m` VALUES (1, '10');
INSERT INTO `kelas_m` VALUES (2, '11');
INSERT INTO `kelas_m` VALUES (3, '12');

-- ----------------------------
-- Table structure for matpel_m
-- ----------------------------
DROP TABLE IF EXISTS `matpel_m`;
CREATE TABLE `matpel_m`  (
  `id` int NOT NULL,
  `matapelajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `objectkelasfk` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `matpel_m_objectkelasfk_kelas_m_id`(`objectkelasfk` ASC) USING BTREE,
  CONSTRAINT `matpel_m_objectkelasfk_kelas_m_id` FOREIGN KEY (`objectkelasfk`) REFERENCES `kelas_m` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of matpel_m
-- ----------------------------
INSERT INTO `matpel_m` VALUES (1, 'MATEMATIKA', 1);
INSERT INTO `matpel_m` VALUES (2, 'BAHASA INDONESIA', 1);

-- ----------------------------
-- Table structure for semester_m
-- ----------------------------
DROP TABLE IF EXISTS `semester_m`;
CREATE TABLE `semester_m`  (
  `id` int NOT NULL,
  `semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahunajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of semester_m
-- ----------------------------
INSERT INTO `semester_m` VALUES (1, '1', '2024/2025');
INSERT INTO `semester_m` VALUES (2, '2', '2024/2025');

-- ----------------------------
-- Table structure for siswa_m
-- ----------------------------
DROP TABLE IF EXISTS `siswa_m`;
CREATE TABLE `siswa_m`  (
  `id` int NOT NULL,
  `namalengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nisn` int NOT NULL,
  `objectkelasfk` int NOT NULL,
  `objectjurusanfk` int NOT NULL,
  `objectsemesterfk` int NOT NULL,
  `objectgurufk` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `siswa_m_objectkelasfk_kelas_m_id`(`objectkelasfk` ASC) USING BTREE,
  INDEX `siswa_m_objectjurusanfk_jurusan_m_id`(`objectjurusanfk` ASC) USING BTREE,
  INDEX `siswa_m_objectsemesterfk_semester_m_id`(`objectsemesterfk` ASC) USING BTREE,
  INDEX `siswa_m_objectgurufk_guru_m_id`(`objectgurufk` ASC) USING BTREE,
  CONSTRAINT `siswa_m_objectgurufk_guru_m_id` FOREIGN KEY (`objectgurufk`) REFERENCES `guru_m` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `siswa_m_objectjurusanfk_jurusan_m_id` FOREIGN KEY (`objectjurusanfk`) REFERENCES `jurusan_m` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `siswa_m_objectkelasfk_kelas_m_id` FOREIGN KEY (`objectkelasfk`) REFERENCES `kelas_m` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `siswa_m_objectsemesterfk_semester_m_id` FOREIGN KEY (`objectsemesterfk`) REFERENCES `semester_m` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siswa_m
-- ----------------------------
INSERT INTO `siswa_m` VALUES (1, 'SISWA A', 12341234, 1, 1, 1, 1);
INSERT INTO `siswa_m` VALUES (2, 'SISWA B', 43214321, 2, 2, 1, 1);

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
