/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : summit

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 15/01/2019 12:48:00
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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 4, 'Very Nice', 1, 1, NULL, NULL, NULL, '2019-01-03 04:04:06', '2019-01-03 04:04:06');
INSERT INTO `comments` VALUES (2, 4, 'Hello Everyone', 1, 1, NULL, NULL, NULL, '2019-01-03 05:01:40', '2019-01-03 05:01:40');

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (1, NULL, 'Ashik', 'Chowdhury', 'ashikbracu@gmail.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2018-12-09 05:40:32', '2018-12-09 05:40:32');
INSERT INTO `employees` VALUES (2, NULL, 'Ashikul', 'Chowdhury', 'ashikbracu1@gmail.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2018-12-19 04:50:56', '2018-12-19 04:50:56');
INSERT INTO `employees` VALUES (3, NULL, 'Almas', 'Suzon', 'almas1@gmail.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2018-12-20 06:45:52', '2018-12-20 06:45:52');
INSERT INTO `employees` VALUES (4, NULL, 'Nokib', 'Chowdhury', 'nokib@gmail.com', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2018-12-20 06:53:20', '2018-12-20 06:53:20');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of matches
-- ----------------------------
INSERT INTO `matches` VALUES (1, 1, '2018-12-26', '09:00:00', 1, 2, 'DRMC', 1, 1, 1, NULL, NULL, '2018-12-12 07:09:53', '2018-12-13 08:16:01');
INSERT INTO `matches` VALUES (2, 1, '2018-12-26', '15:42:33', 2, 1, 'DRMC', 1, 1, NULL, NULL, NULL, '2018-12-12 09:30:55', '2018-12-12 09:30:55');
INSERT INTO `matches` VALUES (3, 1, '2018-12-31', NULL, 1, 2, 'sdgsgsdg', 1, 1, 1, NULL, NULL, '2018-12-12 09:34:49', '2018-12-13 07:19:58');

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES (1, 'Aftab Uddin', 1, 'Batsman', 'Right handed Bat', 'Right Arm Off-break', 'Aftab Uddin', '1546937876franck-v-795970-unsplash.jpg', 1, 1, NULL, NULL, NULL, '2019-01-08 08:57:56', '2019-01-08 08:57:56');
INSERT INTO `members` VALUES (2, 'Almas Suzon', 1, 'Batsman', 'Right handed Bat', 'Right Arm Off-break', 'Almas Suzon', '154693795702164_sahara_2560x1600.jpg', 1, 1, NULL, NULL, NULL, '2019-01-08 08:59:17', '2019-01-08 08:59:17');

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
INSERT INTO `permissions` VALUES (1, 'view backend', 'web', '2018-12-09 04:05:49', '2018-12-09 04:05:49');

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 1, 'aserfasdf', '154633505002164_sahara_2560x1600.jpg', 1, 1, NULL, NULL, NULL, '2019-01-01 09:30:50', '2019-01-01 09:30:50');
INSERT INTO `posts` VALUES (2, 1, 'Pass new certifications or just upgrade your skills in the new year by getting UNLIMITED virtual labs and practice exams to provide you with hands-on experience to reach your next level.', '154632077302237_bamboo_1920x1080.jpg', 1, 1, NULL, NULL, NULL, '2019-01-01 09:36:15', '2019-01-01 09:36:15');
INSERT INTO `posts` VALUES (3, 1, 'আসসালামুআলাইকুম,\r\n\r\nমুছে যাক সকল গ্লানি। পুরাতনের প্রস্থানে নতুন বছরের আগমন জীবনে বয়ে আনুক সুখ ও শান্তির বার্তা। আলোকিত হোক সকলের আগামীর পথ চলা...\r\n\r\nশুভ ইংরেজী নববর্ষ ২০১৯.....', NULL, 1, 1, NULL, NULL, NULL, '2019-01-01 09:37:01', '2019-01-01 09:37:01');
INSERT INTO `posts` VALUES (4, 1, 'sdfadsfasdfa', '154634057302171_romanticcottage_1920x1080.jpg', 1, 1, NULL, NULL, NULL, '2019-01-01 11:02:53', '2019-01-01 11:02:53');
INSERT INTO `posts` VALUES (5, 4, 'fdgdsfg', '1546404830blank-eyeglasses-eyewear-163034.jpg', 1, 1, NULL, NULL, NULL, '2019-01-02 04:53:50', '2019-01-02 04:53:50');
INSERT INTO `posts` VALUES (6, 1, 'Hello', '1547446360franck-v-795970-unsplash.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 06:12:47', '2019-01-14 06:12:47');
INSERT INTO `posts` VALUES (7, 1, 'hello', '154744665102164_sahara_2560x1600.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 06:17:32', '2019-01-14 06:17:32');
INSERT INTO `posts` VALUES (8, 2, 'Banner Of Badminton Tournament 2019', '1547462287Badminton.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 10:38:10', '2019-01-14 10:38:10');

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
INSERT INTO `roles` VALUES (1, 'administrator', 'web', '2018-12-09 04:05:48', '2018-12-09 04:05:48');
INSERT INTO `roles` VALUES (2, 'executive', 'web', '2018-12-09 04:05:48', '2018-12-09 04:05:48');
INSERT INTO `roles` VALUES (3, 'user', 'web', '2018-12-09 04:05:48', '2018-12-09 04:05:48');

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
INSERT INTO `schedules` VALUES (1, 1, '2018-12-15', '08:00:00', '09:00:00', 'Match 1', 'Mirpur', 1, NULL, NULL, NULL, '2018-12-18 08:59:56', '2018-12-18 08:59:56');
INSERT INTO `schedules` VALUES (2, 1, '2018-12-16', '09:15:00', '10:00:00', 'Match 2', 'Mirpur', 1, NULL, NULL, NULL, '2018-12-18 08:59:56', '2018-12-18 08:59:56');
INSERT INTO `schedules` VALUES (3, 1, '2018-12-17', '11:20:00', '12:10:00', 'Match 3', 'Mirpur', 1, NULL, NULL, NULL, '2018-12-18 08:59:56', '2018-12-18 08:59:56');
INSERT INTO `schedules` VALUES (4, 2, '2019-01-17', '17:30:00', '17:35:00', 'Opening Speech By ZRF', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 09:51:36', '2019-01-14 09:51:36');
INSERT INTO `schedules` VALUES (5, 2, '2019-01-17', '17:36:00', '18:05:00', 'Friendly Match AAM-BBB Vs SHB-HDB', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 10:00:47', '2019-01-14 10:00:47');
INSERT INTO `schedules` VALUES (6, 2, '2019-01-17', '18:06:00', '18:30:00', 'Match 1 Team-A Vs Team-H', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 10:01:55', '2019-01-14 10:01:55');
INSERT INTO `schedules` VALUES (7, 2, '2019-01-17', '18:31:00', '19:00:00', 'Match 2 Team-B Vs Team-G', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 10:04:15', '2019-01-14 10:04:15');
INSERT INTO `schedules` VALUES (8, 2, '2019-01-17', '19:01:00', '19:30:00', 'Match 3 Team-C Vs Team-F', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 10:05:49', '2019-01-14 10:05:49');
INSERT INTO `schedules` VALUES (9, 2, '2019-01-17', '19:31:00', '20:00:00', 'Match 4 Team-D Vs Team-E', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 10:07:08', '2019-01-14 10:07:08');
INSERT INTO `schedules` VALUES (10, 2, '2019-01-17', '20:01:00', '20:30:00', 'Semi-Final 1, Match-1 Winner Vs Match-2 Winner', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 10:09:12', '2019-01-14 10:09:12');
INSERT INTO `schedules` VALUES (11, 2, '2019-01-17', '20:31:00', '21:00:00', 'Semi-Final 2, Match 3 Winner Vs Match-4 Winner', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 10:10:12', '2019-01-14 10:10:12');
INSERT INTO `schedules` VALUES (12, 2, '2019-01-17', '21:01:00', '21:20:00', 'Friendly Match AAM-ZRF SHB-HDT', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 10:18:20', '2019-01-14 10:18:20');
INSERT INTO `schedules` VALUES (13, 2, '2019-01-17', '21:31:00', '22:00:00', 'Final, Semi-Final 1 Winner Vs Semi-Final 2 Winner', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 10:19:58', '2019-01-14 10:19:58');
INSERT INTO `schedules` VALUES (14, 2, '2019-01-17', '22:01:00', '22:20:00', 'Prize Distribution', 'ISA Premises', 1, NULL, NULL, NULL, '2019-01-14 10:20:36', '2019-01-14 10:20:36');

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
INSERT INTO `sponsors` VALUES (1, 'Transtec', 'Transcom Limited', 'Transcom Limited', '1544507916batman_why_so_serious_4k_8k-7680x4320.jpg', 1, 1, 1, NULL, NULL, '2018-12-11 05:58:36', '2018-12-13 07:10:39');

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
INSERT INTO `teams` VALUES (3, 'Team A', 'Team A', '1547458097A.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 09:28:26', '2019-01-14 09:28:26');
INSERT INTO `teams` VALUES (4, 'Team B', 'Team B', '1547458130B.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 09:28:59', '2019-01-14 09:28:59');
INSERT INTO `teams` VALUES (5, 'Team C', 'Team C', '1547458186C.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 09:29:55', '2019-01-14 09:29:55');
INSERT INTO `teams` VALUES (6, 'Team D', 'Team D', '1547458218D.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 09:30:26', '2019-01-14 09:30:26');
INSERT INTO `teams` VALUES (7, 'Team E', 'Team E', '1547458465E.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 09:34:33', '2019-01-14 09:34:33');
INSERT INTO `teams` VALUES (8, 'Team F', 'Team F', '1547458507F.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 09:35:16', '2019-01-14 09:35:16');
INSERT INTO `teams` VALUES (9, 'Team G', 'Team G', '1547459135G.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 09:45:43', '2019-01-14 09:45:43');
INSERT INTO `teams` VALUES (10, 'Team H', 'Team H', '1547459161H.jpg', 1, 1, NULL, NULL, NULL, '2019-01-14 09:46:10', '2019-01-14 09:46:10');

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
INSERT INTO `trans_events` VALUES (1, 'TPL', 'TPL', 'Transcom Limited', 1, 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', '154460852602164_sahara_2560x1600.jpg', 1, 1, NULL, '2018-12-15', '2018-12-17', NULL, '2018-12-10 09:54:13', '2018-12-13 09:48:28');
INSERT INTO `trans_events` VALUES (2, 'Badminton Tournament 2019', 'ISA Premises', 'ISA', 1, 'An event for friendship, glory, and bonding...', '1547457466Badminton.jpg', 1, 1, NULL, '2019-01-17', '2019-01-17', NULL, '2018-12-12 10:03:28', '2019-01-14 09:17:51');

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
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 0, '6254132f-96f0-44fa-9d58-6c4db1e185b4', 'Admin', 'Istrator', 'admin@admin.com', 'gravatar', NULL, '$2y$10$i.SsQ4jQ5zPdXKyPUhobouz57W6oNDco.oMmNDe52BULqXHKJxd/W', NULL, 1, '67695eda382766fbc36ce97c9b6fe868', 1, 'UTC', 'A6128ch7zABznTPaaw38IIozeOE8COEzEXiKLOOxglaSpiFopHja6GnfrGbg', '2018-12-09 04:05:48', '2018-12-09 04:05:48', NULL);
INSERT INTO `users` VALUES (2, 0, '32442787-bc19-4ce1-b2b0-d186fb6b5ed6', 'Backend', 'User', 'executive@executive.com', 'gravatar', NULL, '$2y$10$eiiylqAIopywlWPRu4npkuEDgzzxLRNgMDZH.ehfnS0cYiTuTFXme', NULL, 1, 'e8c7fb688023a515c978a42d3b601a8f', 1, 'UTC', NULL, '2018-12-09 04:05:48', '2018-12-09 04:05:48', NULL);
INSERT INTO `users` VALUES (3, 0, 'fd4bde3b-496b-4a84-ad55-cbb8cd9a8636', 'Default', 'User', 'user@user.com', 'gravatar', NULL, '$2y$10$Ofm1wfodd4FfvYVZbLPztexQRTSzVBvwHnIv6hdqm/joLGt92X332', NULL, 1, '0b8bca78d7437c8f675352a39e2a6f67', 1, 'UTC', NULL, '2018-12-09 04:05:48', '2018-12-09 04:05:48', NULL);
INSERT INTO `users` VALUES (11, 0, '7c64c68d-7018-4264-aea2-19fbf0e4b205', 'Hello', 'Hello', 'Hello@gmail.com', 'gravatar', NULL, '$2y$10$tu8TiQshl/TB7sDwrOWmZuLbpKrfkJvlc.20iw954QRbOXMo06xJe', NULL, 1, '32ae64d5a3862446d6bf3b25e1dfa21b', 0, 'UTC', NULL, '2018-12-09 05:36:26', '2018-12-09 05:36:26', NULL);
INSERT INTO `users` VALUES (12, 1, 'bc64e284-5f51-4cff-b8d7-d58c23aa3c47', 'Ashik', 'Chowdhury', 'ashikbracu@gmail.com', 'gravatar', NULL, '$2y$10$jkfONxS28787l6GznOcQR.83RFAswdtxiStADDBaGOR/Q96fcBsRe', NULL, 1, '3efec12d361949e46c05f6ff801ebd87', 1, 'UTC', 'TgIvk5A8MvLTzly3a9EyinQxgnvGj6S4PcxMZF2ntg3SOz7u3VSXPDRQxw8Y', '2018-12-09 05:40:33', '2018-12-09 05:40:33', NULL);
INSERT INTO `users` VALUES (13, 2, '2ed5d5bb-2071-4c6e-98a5-715857038f32', 'Ashikul', 'Chowdhury', 'ashikbracu1@gmail.com', 'gravatar', NULL, '$2y$10$bzeVbmPEYqB5vJbB63lVGOkSLa9OY8T1x8GTtvBiXz.30X0CKfKG.', NULL, 1, '61c5afed7a05076a514a783d4ff3901b', 1, 'UTC', NULL, '2018-12-19 04:50:56', '2018-12-19 04:50:56', NULL);
INSERT INTO `users` VALUES (14, 3, '5f121bd6-6b06-41d1-98a0-852430fd02d7', 'Almas', 'Suzon', 'almas1@gmail.com', 'gravatar', NULL, '$2y$10$ipmmiXCmHxh5Dtdfj8udcerlkxAmVWEnAKv0pDhPBMaxI83rNLNWG', NULL, 1, '6824424cd24d6b5339941308e070237f', 0, 'UTC', 'pxr9SEO7QKrHHrO2Ejc8CThHVA7R3NdNAcizz8wSz9ekD59F2BHBetXUJDIn', '2018-12-20 06:45:52', '2018-12-20 06:45:52', NULL);
INSERT INTO `users` VALUES (15, 4, '6f7fbc34-25ef-4671-9da2-dcf7887273dd', 'Nokib', 'Chowdhury', 'nokib@gmail.com', 'gravatar', NULL, '$2y$10$qw2ZtS9wJL7qZy1JSl3ns./SJpXZttP/qFtXvibUSuAotHIRstPdi', NULL, 1, 'ce3b79c1f8901dd7e76fa63f9b2be233', 1, 'UTC', '7NvxCUatOGejMUCobyJMjAxcEFTgWNAO5N3FZxV96e1zJOs4WWx9UEQUCgjv', '2018-12-20 06:53:20', '2018-12-20 06:53:20', NULL);

SET FOREIGN_KEY_CHECKS = 1;
