/*
 Navicat Premium Data Transfer

 Source Server         : ERP_RND_Production
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : erprnd.com:3306
 Source Schema         : erprndco_event

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 24/03/2021 11:04:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE INDEX `cache_key_unique`(`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NULL DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 4, 'Very Nice', 1, 1, NULL, NULL, NULL, '2019-01-02 22:04:06', '2019-01-02 22:04:06');
INSERT INTO `comments` VALUES (2, 4, 'Hello Everyone', 1, 1, NULL, NULL, NULL, '2019-01-02 23:01:40', '2019-01-02 23:01:40');
INSERT INTO `comments` VALUES (3, 16, 'Josh..', 1, 12, NULL, NULL, NULL, '2019-01-17 09:55:21', '2019-01-17 09:55:21');
INSERT INTO `comments` VALUES (4, 18, 'Excellent jobs 🔥', 1, 16, NULL, NULL, NULL, '2019-01-17 10:12:29', '2019-01-17 10:12:29');
INSERT INTO `comments` VALUES (5, 26, 'Testy', 1, 16, NULL, NULL, NULL, '2019-01-20 08:48:12', '2019-01-20 08:48:12');
INSERT INTO `comments` VALUES (6, 28, 'Hello', 1, 1, 1, NULL, NULL, '2019-01-24 06:22:07', '2019-01-24 06:23:09');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` int(11) NULL DEFAULT 0,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `designation` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `employees_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (1, NULL, 'Ashik', 'Chowdhury', 'ashikbracu@gmail.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2018-12-08 23:40:32', '2018-12-08 23:40:32');
INSERT INTO `employees` VALUES (2, NULL, 'Ashikul', 'Chowdhury', 'ashikbracu1@gmail.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2018-12-18 22:50:56', '2018-12-18 22:50:56');
INSERT INTO `employees` VALUES (3, NULL, 'Almas', 'Suzon', 'almas1@gmail.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2018-12-20 00:45:52', '2018-12-20 00:45:52');
INSERT INTO `employees` VALUES (4, NULL, 'Nokib', 'Chowdhury', 'nokib@gmail.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2018-12-20 00:53:20', '2018-12-20 00:53:20');
INSERT INTO `employees` VALUES (5, NULL, 'Md. Aftab', 'Uddin', 'aftab.uddin@transcombd.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2019-01-15 11:16:28', '2019-01-15 11:16:28');
INSERT INTO `employees` VALUES (6, NULL, 'Almas', 'Suzon', 'almas.estiak@transcombd.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2019-01-17 08:47:06', '2019-01-17 08:47:06');
INSERT INTO `employees` VALUES (7, NULL, 'Shakib', 'Raji', 'shakib.alraji@transcombd.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2019-01-17 10:07:08', '2019-01-17 10:07:08');
INSERT INTO `employees` VALUES (8, NULL, 'Tamanna Nishat', 'Rini', 'rini_cse@yahoo.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2019-01-17 11:57:07', '2019-01-17 11:57:07');
INSERT INTO `employees` VALUES (9, NULL, 'AH', 'Gazi', 'gazi@transcombd.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2019-01-17 11:59:17', '2019-01-17 11:59:17');
INSERT INTO `employees` VALUES (10, NULL, 'Shahriar', 'Parvez', 'shahriar.parvez@transcombd.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2019-01-17 12:21:40', '2019-01-17 12:21:40');

-- ----------------------------
-- Table structure for event_sponsor
-- ----------------------------
DROP TABLE IF EXISTS `event_sponsor`;
CREATE TABLE `event_sponsor`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int(10) UNSIGNED NOT NULL,
  `sponsor_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `event_sponsor_event_id_foreign`(`event_id`) USING BTREE,
  INDEX `event_sponsor_sponsor_id_foreign`(`sponsor_id`) USING BTREE,
  CONSTRAINT `event_sponsor_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `trans_events` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `event_sponsor_sponsor_id_foreign` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of event_sponsor
-- ----------------------------
INSERT INTO `event_sponsor` VALUES (2, 5, 2);
INSERT INTO `event_sponsor` VALUES (3, 1, 1);

-- ----------------------------
-- Table structure for event_team
-- ----------------------------
DROP TABLE IF EXISTS `event_team`;
CREATE TABLE `event_team`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `event_team_event_id_foreign`(`event_id`) USING BTREE,
  INDEX `event_team_team_id_foreign`(`team_id`) USING BTREE,
  CONSTRAINT `event_team_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `trans_events` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `event_team_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of event_team
-- ----------------------------
INSERT INTO `event_team` VALUES (1, 2, 3);
INSERT INTO `event_team` VALUES (2, 2, 4);
INSERT INTO `event_team` VALUES (3, 2, 5);
INSERT INTO `event_team` VALUES (4, 2, 6);
INSERT INTO `event_team` VALUES (5, 2, 7);
INSERT INTO `event_team` VALUES (6, 2, 8);
INSERT INTO `event_team` VALUES (7, 2, 9);
INSERT INTO `event_team` VALUES (8, 2, 10);

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for matches
-- ----------------------------
DROP TABLE IF EXISTS `matches`;
CREATE TABLE `matches`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `time` time(0) NULL DEFAULT NULL,
  `team1` int(191) NULL DEFAULT NULL,
  `team2` int(191) NULL DEFAULT NULL,
  `venue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of matches
-- ----------------------------
INSERT INTO `matches` VALUES (4, 2, '2019-01-17', '18:06:00', 6, 7, 'ISA Premises', 1, 1, 1, NULL, NULL, '2019-01-17 05:14:41', '2019-01-17 09:58:33');
INSERT INTO `matches` VALUES (5, 2, '2019-01-17', '18:31:00', 4, 9, 'ISA Premises', 1, 1, 1, NULL, NULL, '2019-01-17 05:16:09', '2019-01-17 10:00:02');
INSERT INTO `matches` VALUES (6, 2, '2019-01-17', '19:01:00', 8, 3, 'ISA Premises', 1, 1, 1, NULL, NULL, '2019-01-17 05:16:50', '2019-01-17 10:00:24');
INSERT INTO `matches` VALUES (7, 2, '2019-01-17', '19:31:00', 10, 5, 'ISA Premises', 1, 1, 1, NULL, NULL, '2019-01-17 05:17:32', '2019-01-17 10:01:18');

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(11) NULL DEFAULT NULL,
  `role` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `batting_style` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bowling_Style` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES (3, 'Mr. Mahamudul', 3, 'Right Handed', NULL, NULL, NULL, '1547700122avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 14:50:43', '2019-01-17 04:42:02');
INSERT INTO `members` VALUES (4, 'Mr. Maqsudul', 3, 'Right Handed', NULL, NULL, NULL, '1547700099avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 14:51:45', '2019-01-17 04:41:39');
INSERT INTO `members` VALUES (5, 'Mr. Zitu', 4, 'Right Handed', NULL, NULL, NULL, '1547700189avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 14:52:40', '2019-01-17 04:43:09');
INSERT INTO `members` VALUES (6, 'Mr. Susmoy', 4, 'Right Handed', NULL, NULL, NULL, '1547700173avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 14:53:12', '2019-01-17 04:42:53');
INSERT INTO `members` VALUES (7, 'Mr. Shahnewaz', 5, 'Right Handed', NULL, NULL, NULL, '1547700262avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 14:54:31', '2019-01-17 04:44:22');
INSERT INTO `members` VALUES (8, 'Mr. Redwan', 5, 'Right Handed', NULL, NULL, NULL, '1547700247avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 14:54:55', '2019-01-17 04:44:07');
INSERT INTO `members` VALUES (9, 'Mr. Shakawat', 7, 'Right Handed', NULL, NULL, NULL, '1547700451avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 14:55:48', '2019-01-17 04:47:31');
INSERT INTO `members` VALUES (10, 'Mr. Read', 7, 'Right Handed', NULL, NULL, NULL, '1547700427avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 14:56:20', '2019-01-17 04:47:07');
INSERT INTO `members` VALUES (11, 'Mr. Akib', 6, 'Right Handed', NULL, NULL, NULL, '1547700401avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 14:59:55', '2019-01-17 04:46:41');
INSERT INTO `members` VALUES (12, 'Mr. Fahim', 6, 'Left Handed', NULL, NULL, NULL, '1547700368avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 15:00:58', '2019-01-17 04:46:08');
INSERT INTO `members` VALUES (13, 'Mr. Shikder', 8, 'Right Handed', NULL, NULL, NULL, '1547700515avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 15:02:21', '2019-01-17 04:48:35');
INSERT INTO `members` VALUES (14, 'Mr. Atik', 8, 'Right Handed', NULL, NULL, NULL, '1547700502avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 15:03:05', '2019-01-17 04:48:22');
INSERT INTO `members` VALUES (15, 'Mr. Monowar', 9, 'Right Handed', NULL, NULL, NULL, '1547700557avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 15:03:39', '2019-01-17 04:49:17');
INSERT INTO `members` VALUES (16, 'Mr. Amran', 9, 'Right Handed', NULL, NULL, NULL, '1547700544avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 15:04:07', '2019-01-17 04:49:04');
INSERT INTO `members` VALUES (17, 'Mr. Opu', 10, 'Right Handed', NULL, NULL, 'Right Handed', '1547700607avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 15:05:28', '2019-01-17 04:50:07');
INSERT INTO `members` VALUES (18, 'Mr. Maruf', 10, 'Right Handed', NULL, NULL, 'Right Handed', '1547700597avatar.jpg', 1, 1, 1, NULL, NULL, '2019-01-16 15:05:55', '2019-01-17 04:49:57');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2017_09_03_144628_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (4, '2017_09_11_174816_create_social_accounts_table', 1);
INSERT INTO `migrations` VALUES (5, '2017_09_26_140332_create_cache_table', 1);
INSERT INTO `migrations` VALUES (6, '2017_09_26_140528_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (7, '2017_09_26_140609_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (8, '2018_12_03_044438_create_trans_events_table', 1);
INSERT INTO `migrations` VALUES (9, '2018_12_08_054131_add_emplyee_id_to_users_table', 1);
INSERT INTO `migrations` VALUES (10, '2018_12_08_055756_create_employees_table', 1);
INSERT INTO `migrations` VALUES (11, '2018_12_09_083604_create_teams_table', 2);
INSERT INTO `migrations` VALUES (12, '2018_12_11_044713_create_sponsors_table', 3);
INSERT INTO `migrations` VALUES (13, '2018_12_11_084852_create_matches_table', 4);
INSERT INTO `migrations` VALUES (16, '2018_12_13_091126_create_schedules_table', 5);
INSERT INTO `migrations` VALUES (18, '2019_01_01_042742_create_posts_table', 6);
INSERT INTO `migrations` VALUES (19, '2019_01_02_102106_create_comments_table', 7);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 1, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (2, 2, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 3, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 8, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 9, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 10, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 11, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 12, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 13, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 14, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 15, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 16, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 17, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 18, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 19, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 20, 'App\\Models\\Auth\\User');
INSERT INTO `model_has_roles` VALUES (3, 21, 'App\\Models\\Auth\\User');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'view backend', 'web', '2018-12-08 22:05:49', '2018-12-08 22:05:49');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NULL DEFAULT NULL,
  `post` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 1, 'aserfasdf', '154633505002164_sahara_2560x1600.jpg', 1, 1, NULL, NULL, NULL, '2019-01-01 03:30:50', '2019-01-01 03:30:50');
INSERT INTO `posts` VALUES (2, 1, 'Pass new certifications or just upgrade your skills in the new year by getting UNLIMITED virtual labs and practice exams to provide you with hands-on experience to reach your next level.', '154632077302237_bamboo_1920x1080.jpg', 1, 1, NULL, NULL, NULL, '2019-01-01 03:36:15', '2019-01-01 03:36:15');
INSERT INTO `posts` VALUES (3, 1, 'আসসালামুআলাইকুম,\r\n\r\nমুছে যাক সকল গ্লানি। পুরাতনের প্রস্থানে নতুন বছরের আগমন জীবনে বয়ে আনুক সুখ ও শান্তির বার্তা। আলোকিত হোক সকলের আগামীর পথ চলা...\r\n\r\nশুভ ইংরেজী নববর্ষ ২০১৯.....', NULL, 1, 1, NULL, NULL, NULL, '2019-01-01 03:37:01', '2019-01-01 03:37:01');
INSERT INTO `posts` VALUES (4, 1, 'sdfadsfasdfa', '154634057302171_romanticcottage_1920x1080.jpg', 1, 1, NULL, NULL, NULL, '2019-01-01 05:02:53', '2019-01-01 05:02:53');
INSERT INTO `posts` VALUES (5, 4, 'fdgdsfg', '1546404830blank-eyeglasses-eyewear-163034.jpg', 1, 1, NULL, NULL, NULL, '2019-01-01 22:53:50', '2019-01-01 22:53:50');
INSERT INTO `posts` VALUES (6, 1, 'Hello', '1547446360franck-v-795970-unsplash.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 00:12:47', '2019-01-14 00:12:47');
INSERT INTO `posts` VALUES (7, 1, 'hello', '154744665102164_sahara_2560x1600.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 00:17:32', '2019-01-14 00:17:32');
INSERT INTO `posts` VALUES (8, 2, 'Banner Of Badminton Tournament 2019', '1547462287Badminton.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 04:38:10', '2019-01-14 04:38:10');
INSERT INTO `posts` VALUES (9, 1, 'Royal Chasers', '154755112520190115_132638.png', 1, 16, NULL, NULL, NULL, '2019-01-15 11:18:45', '2019-01-15 11:18:45');
INSERT INTO `posts` VALUES (11, 2, 'Venue Being Ready... ', '1547716401IMG_20190117_144955.jpg', 1, 12, NULL, NULL, NULL, '2019-01-17 09:13:22', '2019-01-17 09:13:22');
INSERT INTO `posts` VALUES (14, 2, 'Preparing chicken', '1547716986DSC_0008.JPG', 1, 17, NULL, NULL, NULL, '2019-01-17 09:23:06', '2019-01-17 09:23:06');
INSERT INTO `posts` VALUES (15, 2, 'Grill on Fire 🔥', '1547718680DSC_2230.JPG', 1, 16, NULL, NULL, NULL, '2019-01-17 09:51:21', '2019-01-17 09:51:21');
INSERT INTO `posts` VALUES (16, 2, 'Fish 🐠 on fry Mode', '1547718821DSC_2232.JPG', 1, 16, NULL, NULL, NULL, '2019-01-17 09:53:43', '2019-01-17 09:53:43');
INSERT INTO `posts` VALUES (17, 2, 'Almost ready', '1547719611IMG_20190117_160515.jpg', 1, 12, NULL, NULL, '2019-01-22 10:08:31', '2019-01-17 10:06:54', '2019-01-22 10:08:31');
INSERT INTO `posts` VALUES (18, 2, 'Entrance gate of badminton fest 2019', '1547719761IMG_20190117_154158.jpg', 1, 18, NULL, NULL, NULL, '2019-01-17 10:09:22', '2019-01-17 10:09:22');
INSERT INTO `posts` VALUES (19, 2, '1st Official Match', '1547725100IMG_20190117_173625.jpg', 1, 12, NULL, NULL, NULL, '2019-01-17 11:38:21', '2019-01-17 11:38:21');
INSERT INTO `posts` VALUES (20, 2, 'Trophy Opening 🏆', '1547726080DSC_0017.JPG', 1, 17, NULL, NULL, NULL, '2019-01-17 11:54:40', '2019-01-17 11:54:40');
INSERT INTO `posts` VALUES (21, 2, 'The ultimate goal.', '1547726828IMG20190117172339.jpg', 1, 20, NULL, NULL, NULL, '2019-01-17 12:07:09', '2019-01-17 12:07:09');
INSERT INTO `posts` VALUES (22, 2, 'Enjoining Badminton Fest 2019 at Isa Central, Transcom Limited', NULL, 1, 21, NULL, NULL, NULL, '2019-01-17 12:24:01', '2019-01-17 12:24:01');
INSERT INTO `posts` VALUES (23, 2, 'Enjoining Badminton Fest', '1547728456IMG_20190117_182230.jpg', 1, 21, NULL, NULL, NULL, '2019-01-17 12:34:21', '2019-01-17 12:34:21');
INSERT INTO `posts` VALUES (24, 2, NULL, '1547728610IMG_20190117_183546.jpg', 1, 21, NULL, NULL, NULL, '2019-01-17 12:36:51', '2019-01-17 12:36:51');
INSERT INTO `posts` VALUES (25, 2, NULL, '154772943915477294064761005651975.jpg', 1, 17, NULL, NULL, NULL, '2019-01-17 12:50:40', '2019-01-17 12:50:40');
INSERT INTO `posts` VALUES (26, 2, 'Fish fry', '1547974063IMG-20190119-WA0001.jpg', 1, 16, NULL, NULL, NULL, '2019-01-20 08:47:45', '2019-01-20 08:47:45');
INSERT INTO `posts` VALUES (27, 1, 'Testing', '1547979154file_2019_09_22_-1718943925.jpg', 1, 1, NULL, NULL, NULL, '2019-01-20 10:12:35', '2019-01-20 10:12:35');
INSERT INTO `posts` VALUES (28, 1, 'Test', '1547979704Wolverine-wallpaper-10247461.jpg', 1, 12, NULL, NULL, NULL, '2019-01-20 10:21:45', '2019-01-20 10:21:45');
INSERT INTO `posts` VALUES (29, 1, 'Hello', '1548310907magazine-unlock-01-2.3.1229-_E4E3266BAB900D309AC573BAB1B8A104.jpg', 1, 1, 1, NULL, NULL, '2019-01-24 06:21:50', '2019-01-24 06:23:14');
INSERT INTO `posts` VALUES (30, 1, NULL, '1548314391file_2019_18_20_1033700231.jpg', 1, 1, 1, NULL, NULL, '2019-01-24 07:19:52', '2019-04-17 12:38:37');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (1, 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'administrator', 'web', '2018-12-08 22:05:48', '2018-12-08 22:05:48');
INSERT INTO `roles` VALUES (2, 'executive', 'web', '2018-12-08 22:05:48', '2018-12-08 22:05:48');
INSERT INTO `roles` VALUES (3, 'user', 'web', '2018-12-08 22:05:48', '2018-12-08 22:05:48');

-- ----------------------------
-- Table structure for schedules
-- ----------------------------
DROP TABLE IF EXISTS `schedules`;
CREATE TABLE `schedules`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `from_time` time(0) NULL DEFAULT NULL,
  `to_time` time(0) NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `venue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of schedules
-- ----------------------------
INSERT INTO `schedules` VALUES (4, 2, '2019-01-17', '17:30:00', '17:35:00', 'Opening Speech By ZRF', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 03:51:36', '2019-01-14 03:51:36');
INSERT INTO `schedules` VALUES (5, 2, '2019-01-17', '17:36:00', '18:05:00', 'Friendly Match, AAM-BBB Vs SHB-HDB', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 04:00:47', '2019-01-14 04:00:47');
INSERT INTO `schedules` VALUES (11, 2, '2019-01-17', '18:06:00', '21:00:00', 'Tournament Matches', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 04:10:12', '2019-01-14 04:10:12');
INSERT INTO `schedules` VALUES (12, 2, '2019-01-17', '21:01:00', '21:20:00', 'Friendly Match, AAM-ZRF SHB-HDT', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 04:18:20', '2019-01-14 04:18:20');
INSERT INTO `schedules` VALUES (13, 2, '2019-01-17', '21:31:00', '22:00:00', 'Final Match', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 04:19:58', '2019-01-14 04:19:58');
INSERT INTO `schedules` VALUES (14, 2, '2019-01-17', '22:01:00', '22:20:00', 'Prize Distribution', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 04:20:36', '2019-01-14 04:20:36');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE INDEX `sessions_id_unique`(`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('1luKuksZcgewvrdmYfjA574NZYx73iLkFZF7nl8b', NULL, '139.155.16.233', 'Mozilla/5.0 (compatible; TestBot/0.1; +In_the_test_phase,_if_the_spider_brings_you_trouble,_please_add_our_IP_to_the_blacklist._Thank_you.)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekdHbjlSZnBhVmJpSXZTendvcE14VDVEekJ5akl6Y1RDR3liSWtzayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ldmVudC5lcnBybmQuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1615234011);
INSERT INTO `sessions` VALUES ('8Syv4c0T3zdL7bnqa4Ra63D8FoQjBRMK8DQEQbPW', NULL, '40.71.102.9', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.50', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDdBUzdndkJLQlExM2JoM3c5NWY2TUdjMG9Lak9mNkVmTmFtdVpJdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ldmVudC5lcnBybmQuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1615338966);
INSERT INTO `sessions` VALUES ('9NvYQwYR8Tb7Ofqe5bDRNz7SqZj0jTlbo7oAWPB5', NULL, '40.71.102.9', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.50', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidlVLQjJSOHNDSXkyTjcwZ05PMDNsbW5XRm1iQWNiTTc1YXAyY0JRQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuZXZlbnQuZXJwcm5kLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1615342063);
INSERT INTO `sessions` VALUES ('AHv6b5hjlC2WH1Otk1gNhjbd7UWuxZnaGeizFbKx', NULL, '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiV01sckthYmUzTmpYQXBYNm1MaDJTd01OYnhBM0pTc1N1bzlyT0p1ciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616067834);
INSERT INTO `sessions` VALUES ('BUYoH7MZH3xB4GteqKRwBBsv76DEcrx2gp8y1Mqx', NULL, '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibU9YOGVhcEFCMEUwbjdENTlJSDVaMzhvWjVVbmE4d2Y5V0prbG9OOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1615479152);
INSERT INTO `sessions` VALUES ('DBFiQ9mkoAqN6NICLY02XUqhHroRFLiG6QGr46Kd', NULL, '34.77.162.15', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1hXcEtXS0gxT3owbXZ5d0Ewc2lmUkQ0QUpjMWxrMnc1eHNhMk1RZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZXZlbnQuZXJwcm5kLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1615787984);
INSERT INTO `sessions` VALUES ('dICk3fhwWgjy9cb1dVeRD4eZBjMZyHagPdlU0wg9', NULL, '34.77.162.11', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3ByaVNUbGtNMDBpNkpGYUVjZkdyT013cWhWS3hWSXdvVnYxVUhBbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZXZlbnQuZXJwcm5kLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1615320128);
INSERT INTO `sessions` VALUES ('DQKOJAWFvsSBtDNIBa3ocMto22lGOkHrg2L5qUax', NULL, '34.77.162.7', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia3VHdlNVRXZvSjJjSkVLMmlMTnFYeFRwSHJvNGZBVldiVjJqTGlkUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmV2ZW50LmVycHJuZC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1615503061);
INSERT INTO `sessions` VALUES ('fOGiHqsh8t1cGflJ4m5RrWRalakMNyk1yg3cCh0F', NULL, '192.200.16.74', 'Mozilla/5.0 (compatible; Konqueror/3; Linux)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1FBMkVNZDhBRGowWGEyYmhLQ3kycWNNbUZiRUVCWGRiNDRkaUE1cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZXZlbnQuZXJwcm5kLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1615503567);
INSERT INTO `sessions` VALUES ('FVDTyj9RxrT4T0zzaqkaQsw4brv12zkRkOjgPMMR', NULL, '129.159.32.71', 'Mozilla/5.0 (Windows NT 6.1; rv:57.0) Gecko/20100101 Firefox/57.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGliaEpucGN5MEVMZTl1eXZwYndtM2FYOXlWR0k3ZktFd0FNN3dUZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ldmVudC5lcnBybmQuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616362690);
INSERT INTO `sessions` VALUES ('Jq2NpZYf29CcVZXE94bh2dHDjn1SaWeMonlb0HrJ', NULL, '103.105.167.175', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzA1ekkzQ01DZVlnUGU1TEZLd3hqMk5YU0FjcElzUlVaVmhRcHpUOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZXZlbnQuZXJwcm5kLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1615503635);
INSERT INTO `sessions` VALUES ('l2pUuaIZyi82IO72aDcEYsryb4tcKdZoJFqXWuPc', NULL, '34.77.162.6', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXBPeGpvb2p2emNRTlFCd2xpTnVPTHFvMGR2QURVeGNTUk9UWXFnVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuZXZlbnQuZXJwcm5kLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1615529894);
INSERT INTO `sessions` VALUES ('lfaaKPxfrPPrtthIaoKEia55D1lp5GXQqJJwpwrF', NULL, '34.203.37.48', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.2 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDdRejc2dDlZU3lIWXBRdzhCVGFiNk0yQU1HSThqOUx0dUJnYXNtMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ldmVudC5lcnBybmQuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616087245);
INSERT INTO `sessions` VALUES ('Li2MslYdgod7ETvpPm5VWXSbPul9Zt2MpKysC9Uo', NULL, '34.77.162.15', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUm5mTlc3ME9kcDA4S2RmVFNCbHc3WE1iYmNHWkZYenhxM2VVYnlxMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmV2ZW50LmVycHJuZC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1615427487);
INSERT INTO `sessions` VALUES ('MlEz1JzdtHwYzjpwwMA90kPm63OAUXiIzJrMkq3O', NULL, '34.209.193.141', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmxWM09NMjJlNVNzbkc5N0ZmbjNQdGk0Z1hvVGxtZXNZdXFCZUU1YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZXZlbnQuZXJwcm5kLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1615659478);
INSERT INTO `sessions` VALUES ('nszDbDv60vnge6E4NZMMpod2CU9FPmFZ0s6LhVtr', NULL, '129.159.32.71', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-J111F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.90 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWZablpyOUhHRFNtNE5JWEpDeU95OHU0MWNGb0FneHRqOXlPVjJVNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ldmVudC5lcnBybmQuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616372854);
INSERT INTO `sessions` VALUES ('OVf1YrLD1SBYa3CrKLCoVNbovb5pLXl8AjtEORqz', NULL, '34.77.162.18', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnFOdVM2blVpaVAzOFp2bVFXSE9yVlJOaUdpNEFjNFpVRWlyMjZPUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuZXZlbnQuZXJwcm5kLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1615428288);
INSERT INTO `sessions` VALUES ('plt6QrpQkOCb5G5LABChjDrS8PAzmEDLvmjqUJwq', NULL, '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoicDU4YVo4eElrZzF1QmxvalVZZ0h6Q29VUWNVd3dNdHZTSnVob2xjMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1615499188);
INSERT INTO `sessions` VALUES ('WU8McdX8njhujszgTlriof56X73aAs37MA2gZkT5', NULL, '34.77.162.21', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDdzbzNyZm1EeWlBYVgweW9UZEE4eDVQZTRnMXBZdzBkcnVIT2NTbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ldmVudC5lcnBybmQuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1615598644);
INSERT INTO `sessions` VALUES ('YJd9EQuWRErqpxK6N1FnLqoQrJP5ZVBbA0MoaNvK', NULL, '139.155.16.233', 'Mozilla/5.0 (compatible; TestBot/0.1; +In_the_test_phase,_if_the_spider_brings_you_trouble,_please_add_our_IP_to_the_blacklist._Thank_you.)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGVIOWE3ZzZ1Y2Q2bXBJY280VEJ0UGhRSXEyNjlzVHBaaWpDQU5PMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuZXZlbnQuZXJwcm5kLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1615234011);
INSERT INTO `sessions` VALUES ('yR9r3vPr23EWSkAmH6HcxbpyNvBQrQiJKZWlk9kT', NULL, '92.118.160.57', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM0IxempKcmdkM2p3WjZKU3Z6N3kzQnI5blN6WHRob1N6QW90aHdUNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmV2ZW50LmVycHJuZC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1615811057);
INSERT INTO `sessions` VALUES ('zeptrmZQ9bRM6LMTc3Z9OR7ylxGtF7N7BoGlB6KH', NULL, '34.77.162.26', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN05KejlvaE1BMXl6M08ydnV4dWZZZk1GTXNNa1ZRdkZubEh6UUJlVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ldmVudC5lcnBybmQuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1615333411);
INSERT INTO `sessions` VALUES ('zEw4eqUNJhcaO3EvIOjbvS59E95rue4Eki7O3n7g', NULL, '182.16.158.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZENkMzZQbWpPc2NpNXRSZzJPQlZWQk4yRVZFWGNPNjFQWjRTYmh3ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ldmVudC5lcnBybmQuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616559331);
INSERT INTO `sessions` VALUES ('zQtYyVv8XGGoND8H7Qaez8I3vlGaFEdYYJiv6DMh', NULL, '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTEU4SnRja21MbXZyWG1Maks1eTYwdjgwYzAzT2hhenNBUWh3b2Y2RCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616174107);

-- ----------------------------
-- Table structure for social_accounts
-- ----------------------------
DROP TABLE IF EXISTS `social_accounts`;
CREATE TABLE `social_accounts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `social_accounts_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sponsors
-- ----------------------------
DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE `sponsors`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `company_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `banner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sponsors
-- ----------------------------
INSERT INTO `sponsors` VALUES (1, 'Transtec', 'Transcom Limited', 'Transcom Limited', '1544507916batman_why_so_serious_4k_8k-7680x4320.jpg', 1, 1, 1, NULL, NULL, '2018-12-10 23:58:36', '2018-12-13 01:10:39');

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of teams
-- ----------------------------
INSERT INTO `teams` VALUES (3, 'Team A', 'Team A', '1547458097A.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 03:28:26', '2019-01-14 03:28:26');
INSERT INTO `teams` VALUES (4, 'Team B', 'Team B', '1547458130B.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 03:28:59', '2019-01-14 03:28:59');
INSERT INTO `teams` VALUES (5, 'Team C', 'Team C', '1547458186C.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 03:29:55', '2019-01-14 03:29:55');
INSERT INTO `teams` VALUES (6, 'Team D', 'Team D', '1547458218D.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 03:30:26', '2019-01-14 03:30:26');
INSERT INTO `teams` VALUES (7, 'Team E', 'Team E', '1547458465E.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 03:34:33', '2019-01-14 03:34:33');
INSERT INTO `teams` VALUES (8, 'Team F', 'Team F', '1547458507F.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 03:35:16', '2019-01-14 03:35:16');
INSERT INTO `teams` VALUES (9, 'Team G', 'Team G', '1547459135G.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 03:45:43', '2019-01-14 03:45:43');
INSERT INTO `teams` VALUES (10, 'Team H', 'Team H', '1547459161H.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 03:46:10', '2019-01-14 03:46:10');

-- ----------------------------
-- Table structure for trans_events
-- ----------------------------
DROP TABLE IF EXISTS `trans_events`;
CREATE TABLE `trans_events`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of trans_events
-- ----------------------------
INSERT INTO `trans_events` VALUES (1, 'TPL 2019', 'Residential Model College', 'Transcom Limited', 1, 'It is an event for the Transcom family. It is for glory, friendship, and unity.', '1547701480tpl_logo_2019.png', 1, 1, NULL, '2019-02-15', '2019-02-22', NULL, '2018-12-10 03:54:13', '2019-01-17 05:04:40');
INSERT INTO `trans_events` VALUES (2, 'Badminton Tournament 2019', 'ISA Premises', 'ISA', 1, 'An event for friendship, glory, and bonding...', '1547457466Badminton.jpg', 1, 1, NULL, '2019-01-17', '2019-01-17', NULL, '2018-12-12 04:03:28', '2020-10-01 16:09:30');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL DEFAULT 0,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gravatar',
  `avatar_location` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password_changed_at` timestamp(0) NULL DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `confirmation_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `timezone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UTC',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 0, '6254132f-96f0-44fa-9d58-6c4db1e185b4', 'Admin', 'Istrator', 'admin@admin.com', 'gravatar', NULL, '$2y$10$CT/8/.ImoMerhptgX5g3Au9uQlKvbYCHMGSpZIvYf3bOR4cWciF0O', '2019-01-15 10:06:45', 1, '67695eda382766fbc36ce97c9b6fe868', 1, 'UTC', 'opJT1bC9fZdKI1AiXgj1wMGkL5lYjmRBguCMnm06JbcIosSo5oZsS4n7TyT1', '2018-12-08 22:05:48', '2019-01-15 10:06:45', NULL);
INSERT INTO `users` VALUES (2, 0, '32442787-bc19-4ce1-b2b0-d186fb6b5ed6', 'Backend', 'User', 'executive@executive.com', 'gravatar', NULL, '$2y$10$eiiylqAIopywlWPRu4npkuEDgzzxLRNgMDZH.ehfnS0cYiTuTFXme', NULL, 1, 'e8c7fb688023a515c978a42d3b601a8f', 1, 'UTC', NULL, '2018-12-08 22:05:48', '2018-12-08 22:05:48', NULL);
INSERT INTO `users` VALUES (3, 0, 'fd4bde3b-496b-4a84-ad55-cbb8cd9a8636', 'Default', 'User', 'user@user.com', 'gravatar', NULL, '$2y$10$Ofm1wfodd4FfvYVZbLPztexQRTSzVBvwHnIv6hdqm/joLGt92X332', NULL, 1, '0b8bca78d7437c8f675352a39e2a6f67', 1, 'UTC', NULL, '2018-12-08 22:05:48', '2018-12-08 22:05:48', NULL);
INSERT INTO `users` VALUES (11, 0, '7c64c68d-7018-4264-aea2-19fbf0e4b205', 'Hello', 'Hello', 'Hello@gmail.com', 'gravatar', NULL, '$2y$10$tu8TiQshl/TB7sDwrOWmZuLbpKrfkJvlc.20iw954QRbOXMo06xJe', NULL, 1, '32ae64d5a3862446d6bf3b25e1dfa21b', 0, 'UTC', NULL, '2018-12-08 23:36:26', '2018-12-08 23:36:26', NULL);
INSERT INTO `users` VALUES (12, 1, 'bc64e284-5f51-4cff-b8d7-d58c23aa3c47', 'Ashik', 'Chowdhury', 'ashikbracu@gmail.com', 'gravatar', NULL, '$2y$10$jkfONxS28787l6GznOcQR.83RFAswdtxiStADDBaGOR/Q96fcBsRe', NULL, 1, '3efec12d361949e46c05f6ff801ebd87', 1, 'UTC', 'yfqDRlONPIayIteoqnphcd6YXzpyqAwrGMD5BrPNn1lz7YsIye9qkg5VHFpw', '2018-12-08 23:40:33', '2018-12-08 23:40:33', NULL);
INSERT INTO `users` VALUES (13, 2, '2ed5d5bb-2071-4c6e-98a5-715857038f32', 'Ashikul', 'Chowdhury', 'ashikbracu1@gmail.com', 'gravatar', NULL, '$2y$10$bzeVbmPEYqB5vJbB63lVGOkSLa9OY8T1x8GTtvBiXz.30X0CKfKG.', NULL, 1, '61c5afed7a05076a514a783d4ff3901b', 1, 'UTC', NULL, '2018-12-18 22:50:56', '2018-12-18 22:50:56', NULL);
INSERT INTO `users` VALUES (14, 3, '5f121bd6-6b06-41d1-98a0-852430fd02d7', 'Almas', 'Suzon', 'almas1@gmail.com', 'gravatar', NULL, '$2y$10$ipmmiXCmHxh5Dtdfj8udcerlkxAmVWEnAKv0pDhPBMaxI83rNLNWG', NULL, 1, '6824424cd24d6b5339941308e070237f', 0, 'UTC', 'pxr9SEO7QKrHHrO2Ejc8CThHVA7R3NdNAcizz8wSz9ekD59F2BHBetXUJDIn', '2018-12-20 00:45:52', '2018-12-20 00:45:52', NULL);
INSERT INTO `users` VALUES (15, 4, '6f7fbc34-25ef-4671-9da2-dcf7887273dd', 'Nokib', 'Chowdhury', 'nokib@gmail.com', 'gravatar', NULL, '$2y$10$qw2ZtS9wJL7qZy1JSl3ns./SJpXZttP/qFtXvibUSuAotHIRstPdi', NULL, 1, 'ce3b79c1f8901dd7e76fa63f9b2be233', 1, 'UTC', '7NvxCUatOGejMUCobyJMjAxcEFTgWNAO5N3FZxV96e1zJOs4WWx9UEQUCgjv', '2018-12-20 00:53:20', '2018-12-20 00:53:20', NULL);
INSERT INTO `users` VALUES (16, 5, '79946cfd-51a0-44b3-9624-c5b8368a7f75', 'Md. Aftab', 'Uddin', 'aftab.uddin@transcombd.com', 'gravatar', NULL, '$2y$10$7BNDc.8Z/txBkMXDlO565usLBdHuKwCbfnl3ojyKh4AEoG2xgTv7G', NULL, 1, '4cbd16e812c9e63e91223333acec574c', 1, 'UTC', 'r4F7GIQNqh41i2HfkMpxMEAEQ6AUOxh0H1GI5LefYiUl5VqpAEoucAPe6jmz', '2019-01-15 11:16:28', '2019-01-15 11:16:28', NULL);
INSERT INTO `users` VALUES (17, 6, '9bf57ef4-5724-4b78-bfba-82178048b3a9', 'Almas', 'Suzon', 'almas.estiak@transcombd.com', 'gravatar', NULL, '$2y$10$IhxxrBBI1zpSejG4AQB0KuvYTIjeXngkzCX2osPB2LmLZFMgb4PQq', NULL, 1, '99a9be20ff531d40c5d082d6d032d820', 1, 'UTC', 'WrEIwmaMOfTwGTvM1rCMkpl23VkEsvuOSLF0xGCMouCvKbzwMUNvNeSvWF1p', '2019-01-17 08:47:06', '2019-01-17 08:47:06', NULL);
INSERT INTO `users` VALUES (18, 7, 'e91477eb-eae6-421b-b74a-f13bb372c9bd', 'Shakib', 'Raji', 'shakib.alraji@transcombd.com', 'gravatar', NULL, '$2y$10$pNAE942DMX2THfSN27Ziru0/op/bLvRnyHD7yotnkk9/K6VY7HT/m', NULL, 1, '5a35b7b28b177e193ba093248227da47', 1, 'UTC', NULL, '2019-01-17 10:07:08', '2019-01-17 10:07:08', NULL);
INSERT INTO `users` VALUES (19, 8, 'dd9f6fc0-25f3-4ab9-96d1-f479d63f62a4', 'Tamanna Nishat', 'Rini', 'rini_cse@yahoo.com', 'gravatar', NULL, '$2y$10$/OmmY2L8LOC85o6Nvb8Hq.0qulMSmO.xGDZ4HUH7bSYGySJY22xNK', NULL, 1, 'd9af7f20ff621d110484748ba51a119a', 1, 'UTC', 'W5yMGgj2EE9tyNaTAt172ztq2uwx4JDfRsfstEKB14INcnWJjGMN2t5lTDI9', '2019-01-17 11:57:07', '2019-01-17 11:57:07', NULL);
INSERT INTO `users` VALUES (20, 9, 'e68f9b52-bc8b-4ba4-87d1-a23cfde7964d', 'AH', 'Gazi', 'gazi@transcombd.com', 'gravatar', NULL, '$2y$10$Y9u5X9k01AFYd/4JiTYTV./NJ/JPqiVBc7AXSMCc8MKa1X1Hz2dFW', NULL, 1, 'c7d247e9c5685d00b6c5a997b1819cb0', 1, 'UTC', 'pWRNxWPms56aw09HWkHSiRyqe0NAHq9dAVegRqBWV3lUBLsFHegOztNdrLZi', '2019-01-17 11:59:17', '2019-01-17 11:59:17', NULL);
INSERT INTO `users` VALUES (21, 10, 'a9402bca-d980-4155-a3a7-549189a87648', 'Shahriar', 'Parvez', 'shahriar.parvez@transcombd.com', 'gravatar', NULL, '$2y$10$1DNGbIuNG6V4XRpkQclx3etZhPJ77Fsx5rcW7IWj2Q22.YAVoKPm.', NULL, 1, 'b8fbc318953a7d232c477847ab890496', 1, 'UTC', NULL, '2019-01-17 12:21:40', '2019-01-17 12:21:40', NULL);

SET FOREIGN_KEY_CHECKS = 1;
