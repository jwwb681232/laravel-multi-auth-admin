/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : zhanghaobao

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-06-29 17:30:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('6', 'Admin Istrator', 'admin@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('7', 'Admin Istrator', 'admin7@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('8', 'Admin Istrator', 'admin8@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('9', 'Admin Istrator', 'admin9@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('10', 'Admin Istrator', 'admin10@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('11', 'Admin Istrator', 'admin11@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('12', 'Admin Istrator', 'admin12@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('13', 'Admin Istrator', 'admin13@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('14', 'Admin Istrator', 'admin14@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('15', 'Admin Istrator', 'admin15@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('16', 'Admin Istrator', 'admin16@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('17', 'Admin Istrator', 'admin17@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('18', 'Admin Istrator', 'admin18@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');
INSERT INTO `admins` VALUES ('19', 'Admin Istrator', 'admin19@admin.com', '$2y$10$N5npR5dZ4LzSBncZ6NekQOnvRFmQ70v7rBnDylcVy0nmN0Q9oH/IW', '', '2017-06-28 09:06:17', '2017-06-28 09:06:17');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单名称',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单链接',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '权限名称',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单图标',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级菜单id',
  `heightlight_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单高亮',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', '控制台', 'admin', 'system.login', 'fa fa-dashboard', '0', '', '0', '0000-00-00 00:00:00', '2017-06-13 02:47:00');
INSERT INTO `menus` VALUES ('2', '系统', 'admin/menus', 'system.manage', 'fa fa-cogs', '0', '', '0', '0000-00-00 00:00:00', '2016-11-29 18:56:31');
INSERT INTO `menus` VALUES ('3', '后台目录管理', 'admin/menus', 'menu.list', '', '2', '', '0', '0000-00-00 00:00:00', '2016-11-29 18:56:31');
INSERT INTO `menus` VALUES ('4', '后台用户管理', 'admin/adminuser', 'adminuser.list', '', '2', '', '0', '0000-00-00 00:00:00', '2017-06-29 03:17:01');
INSERT INTO `menus` VALUES ('5', '权限管理', 'admin/permission', 'permission.list', '', '2', '', '0', '0000-00-00 00:00:00', '2016-11-29 18:56:31');
INSERT INTO `menus` VALUES ('6', '角色管理', 'admin/role', 'role.list', '', '2', '', '0', '0000-00-00 00:00:00', '2017-06-03 15:31:25');
INSERT INTO `menus` VALUES ('7', 'BLOG', 'admin/article', 'system.blog', 'fa fa-dashboard', '0', '', '0', '0000-00-00 00:00:00', '2016-11-30 21:45:50');
INSERT INTO `menus` VALUES ('8', '文章管理', 'admin/article', 'article.list', '', '7', '', '0', '0000-00-00 00:00:00', '2016-12-01 11:45:45');
INSERT INTO `menus` VALUES ('10', '博客分类', 'admin/blogCategory', 'blogCategory.list', '', '7', '', '0', '0000-00-00 00:00:00', '2016-12-06 16:51:18');
INSERT INTO `menus` VALUES ('11', '轮播管理', 'admin/banner', 'banner.list', '', '7', '', '0', '0000-00-00 00:00:00', '2016-12-21 17:16:06');
INSERT INTO `menus` VALUES ('12', '主题', 'admin/project', 'system.subject', 'fa fa-dashboard', '0', '', '0', '0000-00-00 00:00:00', '2017-02-23 20:37:21');
INSERT INTO `menus` VALUES ('13', '项目管理', 'admin/project', 'project.list', '', '12', '', '0', '0000-00-00 00:00:00', '2017-02-23 20:44:49');
INSERT INTO `menus` VALUES ('14', '维度管理', 'admin/dimension', 'dimension.list', '', '12', '', '0', '0000-00-00 00:00:00', '2017-02-23 20:51:32');
INSERT INTO `menus` VALUES ('15', '主题管理', 'admin/subject', 'subject.list', '', '12', '', '0', '0000-00-00 00:00:00', '2017-02-23 20:57:42');
INSERT INTO `menus` VALUES ('16', '分类管理', 'admin/category', 'category.list', '', '12', '', '0', '0000-00-00 00:00:00', '2017-02-25 16:24:07');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_tables', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2017_06_02_131817_create_menus_table', '2');
INSERT INTO `migrations` VALUES ('2017_06_28_085137_laratrust_setup_tables', '3');
INSERT INTO `migrations` VALUES ('2017_06_29_024954_entrust_setup_tables', '4');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('admin@admin.com', 'a6c57f81d260fda7098b4b4ea94c4d779cd8bcb7ea9deadd59149320e3b50897', '2017-06-02 07:59:20');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', '1', '1', '1', '2017-06-29 14:34:04', '2017-06-29 14:34:09');
INSERT INTO `permissions` VALUES ('2', 'test.test', '测试权限测试', '测试的', '2017-06-29 07:22:15', '2017-06-29 07:22:15');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('1', '10');
INSERT INTO `permission_role` VALUES ('1', '11');
INSERT INTO `permission_role` VALUES ('2', '10');
INSERT INTO `permission_role` VALUES ('2', '11');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('5', 'SuperAdmin', '超级管理员', '管理整个系统', '2017-06-29 03:06:22', '2017-06-29 03:06:22');
INSERT INTO `roles` VALUES ('6', 'Admin', '管理员', '管理后台', '2017-06-29 03:06:22', '2017-06-29 03:06:22');
INSERT INTO `roles` VALUES ('10', '123', '1231242', '13241', '2017-06-29 17:17:39', '2017-06-29 17:17:39');
INSERT INTO `roles` VALUES ('11', '12333', '123124244', '13241', '2017-06-29 17:18:58', '2017-06-29 17:18:58');

-- ----------------------------
-- Table structure for role_admin
-- ----------------------------
DROP TABLE IF EXISTS `role_admin`;
CREATE TABLE `role_admin` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_admin_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_admin
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'End User', 'user@user.com', '$2y$10$sKIGceeZvyK0WbUYXRYMxe/jB6z/SMu5OHw.EvYFJgYXxxF3KSzTi', null, '2017-06-28 09:06:18', '2017-06-28 09:06:18');
