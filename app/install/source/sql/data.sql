/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50710
 Source Host           : localhost
 Source Database       : weiqy

 Target Server Type    : MySQL
 Target Server Version : 50710
 File Encoding         : utf-8

 Date: 05/06/2016 10:31:03 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `w_admin`
-- ----------------------------
DROP TABLE IF EXISTS `w_admin`;
CREATE TABLE `w_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(50) NOT NULL COMMENT '用户',
  `password` char(32) NOT NULL COMMENT '密码',
  `realname` varchar(100) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `qq` varchar(15) NOT NULL DEFAULT '0' COMMENT 'QQ',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '电话',
  `last_login_ip` char(15) NOT NULL DEFAULT '127' COMMENT '最后登录ip',
  `last_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `hash` char(6) NOT NULL,
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '用户状态',
  `group_id` smallint(6) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='管理员';

-- ----------------------------
--  Records of `w_admin`
-- ----------------------------
BEGIN;
INSERT INTO `w_admin` VALUES ('1', 'admin', 'f00cebdaa4d0298b003c7a8543f76efd', '', '', '0', '', '127.0.0.1', '1452430043', '251aab', 'Y', '1', '0'), ('2', 'kaolajia123', 'f00cebdaa4d0298b003c7a8543f76efd', '测试狗1', 'qqucx@163.com', '263270148', '13540270352', '127.0.0.1', '1450150366', '251aab', 'Y', '27', '0');
COMMIT;

-- ----------------------------
--  Table structure for `w_admin_acl`
-- ----------------------------
DROP TABLE IF EXISTS `w_admin_acl`;
CREATE TABLE `w_admin_acl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `module` varchar(50) DEFAULT NULL,
  `controller` varchar(50) NOT NULL DEFAULT '',
  `action` varchar(50) NOT NULL DEFAULT '',
  `order_num` smallint(6) unsigned NOT NULL DEFAULT '0',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '左侧是否显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
--  Records of `w_admin_acl`
-- ----------------------------
BEGIN;
INSERT INTO `w_admin_acl` VALUES ('1', '0', '控制面板', 'glyphicon glyphicon-home', 'admin', '', '', '0', '1'), ('2', '0', '系统设置', 'fa fa-th', 'admin', '', '', '0', '1'), ('3', '2', '用户管理', 'fa fa-th', 'admin', 'user', 'index', '0', '1'), ('4', '2', '用户组管理', null, 'admin', 'group', 'index', '0', '1'), ('5', '2', '权限管理', null, 'admin', 'acl', 'index', '0', '1'), ('10', '3', '添加', '', 'admin', 'user', 'create', '0', '0'), ('11', '2', '日志管理', '', 'admin', 'logger', 'index', '0', '1'), ('12', '2', '参数配置', '', 'admin', 'config', 'index', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `w_admin_group`
-- ----------------------------
DROP TABLE IF EXISTS `w_admin_group`;
CREATE TABLE `w_admin_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL COMMENT '组名称',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='管理员组';

-- ----------------------------
--  Records of `w_admin_group`
-- ----------------------------
BEGIN;
INSERT INTO `w_admin_group` VALUES ('1', '超级管理', 'Y', '0'), ('2', '禁用', 'N', '0'), ('3', '测试1', 'Y', '1461918470'), ('28', '222', 'Y', '1462067161'), ('29', '333', 'Y', '1462067729'), ('30', '333', 'Y', '1462067734'), ('31', '333', 'Y', '1462067756'), ('32', '312333', 'Y', '1462071886');
COMMIT;

-- ----------------------------
--  Table structure for `w_admin_groupacl`
-- ----------------------------
DROP TABLE IF EXISTS `w_admin_groupacl`;
CREATE TABLE `w_admin_groupacl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `acl_ids` varchar(500) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `w_admin_groupacl`
-- ----------------------------
BEGIN;
INSERT INTO `w_admin_groupacl` VALUES ('1', '1', ''), ('6', '27', '3,4,2'), ('7', '2', '3,4,10');
COMMIT;

-- ----------------------------
--  Table structure for `w_admin_logger`
-- ----------------------------
DROP TABLE IF EXISTS `w_admin_logger`;
CREATE TABLE `w_admin_logger` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `catalog` varchar(10) NOT NULL DEFAULT '' COMMENT '类型',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT 'url',
  `intro` text COMMENT '操作',
  `ip` char(15) NOT NULL DEFAULT '127.0.0.1' COMMENT '操作ip',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COMMENT='管理员日志';

-- ----------------------------
--  Records of `w_admin_logger`
-- ----------------------------
BEGIN;
INSERT INTO `w_admin_logger` VALUES ('2', '1', 'create', '/admin/group/create?_pjax=%23page-content', '添加组成功', '127.0.0.1', '1462067756'), ('3', '1', 'update', '/admin/group/update?id=27&_pjax=%23page-content', '编辑组[测试1]成功', '127.0.0.1', '1462071758'), ('4', '1', 'create', '/admin/group/create?_pjax=%23page-content', '添加组[312333]成功', '127.0.0.1', '1462071886'), ('5', '1', 'setacl', '/admin/group/set-acl?id=27', '更新权限成功', '127.0.0.1', '1462071984'), ('6', '1', 'setacl', '/admin/group/set-acl?id=27', '更新权限成功', '127.0.0.1', '1462072003'), ('7', '1', 'setacl', '/admin/group/set-acl?id=27', '更新权限[测试1]成功', '127.0.0.1', '1462072354'), ('8', '1', 'create', '/admin/acl/create', '添加权限[参数配置]成功', '127.0.0.1', '1462244976'), ('9', '1', 'create', '/admin/config/create', '创建配置[123]成功', '127.0.0.1', '1462428717'), ('10', '1', 'create', '/admin/config/create?_pjax=%23page-content', '创建配置[5]成功', '127.0.0.1', '1462428750'), ('11', '1', 'delete', '/admin/config/delete?id=4', '删除配置[123]成功', '127.0.0.1', '1462428856'), ('12', '1', 'create', '/admin/config/create?_pjax=%23page-content', '创建配置[2]成功', '127.0.0.1', '1462431093'), ('13', '1', 'create', '/admin/config/create?_pjax=%23page-content', '创建配置[test]成功', '127.0.0.1', '1462431206'), ('14', '1', 'create', '/admin/config/create?_pjax=%23page-content', '创建配置[test]成功', '127.0.0.1', '1462431268'), ('15', '1', 'create', '/admin/config/create', '创建配置[test]成功', '127.0.0.1', '1462431897'), ('16', '1', 'create', '/admin/config/create', '创建配置[test]成功', '127.0.0.1', '1462432066'), ('17', '1', 'create', '/admin/config/create', '创建配置[test]成功', '127.0.0.1', '1462432226'), ('18', '1', 'create', '/admin/config/create', '创建配置[test]成功', '127.0.0.1', '1462432349'), ('19', '1', 'create', '/admin/config/create', '创建配置[test]成功', '127.0.0.1', '1462432373'), ('20', '1', 'create', '/admin/config/create', '创建配置[test]成功', '127.0.0.1', '1462432401'), ('21', '1', 'create', '/admin/config/create', '创建配置[test]成功', '127.0.0.1', '1462432467'), ('22', '1', 'create', '/admin/config/create', '创建配置[test]成功', '127.0.0.1', '1462432499'), ('23', '1', 'create', '/admin/config/create', '创建配置[test]成功', '127.0.0.1', '1462432699'), ('24', '1', 'create', '/admin/config/create', '创建配置[test]成功', '127.0.0.1', '1462432750'), ('25', '1', 'create', '/admin/config/create', '创建配置[test]成功', '127.0.0.1', '1462432750'), ('26', '1', 'create', '/admin/config/create', '创建配置[a]成功', '127.0.0.1', '1462433018'), ('27', '1', 'create', '/admin/config/create', '创建配置[a]成功', '127.0.0.1', '1462433018'), ('28', '1', 'create', '/admin/config/create', '创建配置[a]成功', '127.0.0.1', '1462433024'), ('29', '1', 'create', '/admin/config/create', '创建配置[b]成功', '127.0.0.1', '1462433131'), ('30', '1', 'create', '/admin/config/create', '创建配置[b]成功', '127.0.0.1', '1462433131'), ('31', '1', 'create', '/admin/config/create', '创建配置[c]成功', '127.0.0.1', '1462433156'), ('32', '1', 'create', '/admin/config/create', '创建配置[c]成功', '127.0.0.1', '1462433156'), ('33', '1', 'create', '/admin/config/create', '创建配置[c]成功', '127.0.0.1', '1462433189'), ('34', '1', 'create', '/admin/config/create', '创建配置[c]成功', '127.0.0.1', '1462433329'), ('35', '1', 'create', '/admin/config/create', '创建配置[c]成功', '127.0.0.1', '1462433333'), ('36', '1', 'create', '/admin/config/create', '创建配置[v]成功', '127.0.0.1', '1462433902'), ('37', '1', 'create', '/admin/config/create', '创建配置[v]成功', '127.0.0.1', '1462433902'), ('38', '1', 'create', '/admin/config/create', '创建配置[cc]成功', '127.0.0.1', '1462433956'), ('39', '1', 'create', '/admin/config/create', '创建配置[cc]成功', '127.0.0.1', '1462433956'), ('40', '1', 'create', '/admin/config/create', '创建配置[5555]成功', '127.0.0.1', '1462434088'), ('41', '1', 'create', '/admin/config/create', '创建配置[5555]成功', '127.0.0.1', '1462434089'), ('42', '1', 'create', '/admin/config/create', '创建配置[]成功', '127.0.0.1', '1462434108'), ('43', '1', 'create', '/admin/config/create', '创建配置[32323]成功', '127.0.0.1', '1462434111'), ('44', '1', 'create', '/admin/config/create', '创建配置[32323]成功', '127.0.0.1', '1462434112'), ('45', '1', 'create', '/admin/config/create', '创建配置[444]成功', '127.0.0.1', '1462434136'), ('46', '1', 'create', '/admin/config/create', '创建配置[444]成功', '127.0.0.1', '1462434136'), ('47', '1', 'create', '/admin/config/create?_pjax=%23page-content', '创建配置[11]成功', '127.0.0.1', '1462500552'), ('48', '1', 'create', '/admin/config/create?_pjax=%23page-content', '创建配置[11]成功', '127.0.0.1', '1462500552'), ('49', '1', 'create', '/admin/config/create?_pjax=%23page-content', '创建配置[11]成功', '127.0.0.1', '1462500557'), ('50', '1', 'create', '/admin/config/create', '创建配置[523212]成功', '127.0.0.1', '1462500892'), ('51', '1', 'create', '/admin/config/create', '创建配置[523212]成功', '127.0.0.1', '1462500892'), ('52', '1', 'create', '/admin/config/create?_pjax=%23page-content', '创建配置[测试]成功', '127.0.0.1', '1462501003'), ('53', '1', 'create', '/admin/config/create?_pjax=%23page-content', '创建配置[测试]成功', '127.0.0.1', '1462501013'), ('54', '1', 'update', '/admin/config/update?id=1&_pjax=%23page-content', '编辑配置[测试]成功', '127.0.0.1', '1462501327'), ('55', '1', 'update', '/admin/config/update?id=1&_pjax=%23page-content', '编辑配置[测试]成功', '127.0.0.1', '1462501327'), ('56', '1', 'reload', '/admin/config/reload?_pjax=%23page-content', '重载配置成功', '127.0.0.1', '1462501616'), ('57', '1', 'reload', '/admin/config/reload', '重载配置成功', '127.0.0.1', '1462501618'), ('58', '1', 'reload', '/admin/config/reload', '重载配置成功', '127.0.0.1', '1462501795'), ('59', '1', 'reload', '/admin/config/reload', '重载配置成功', '127.0.0.1', '1462501799'), ('60', '1', 'reload', '/admin/config/reload', '重载配置成功', '127.0.0.1', '1462501815');
COMMIT;

-- ----------------------------
--  Table structure for `w_config`
-- ----------------------------
DROP TABLE IF EXISTS `w_config`;
CREATE TABLE `w_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `data` varchar(500) NOT NULL,
  `info` varchar(500) NOT NULL,
  `status_is` tinyint(1) DEFAULT '1' COMMENT '状态 1启用',
  `create_time` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `w_config`
-- ----------------------------
BEGIN;
INSERT INTO `w_config` VALUES ('1', '测试', '1哈哈', '123', '0', '1462501003');
COMMIT;

-- ----------------------------
--  Table structure for `w_menu`
-- ----------------------------
DROP TABLE IF EXISTS `w_menu`;
CREATE TABLE `w_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `category` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT '',
  `key` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL DEFAULT '',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_del` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `order_no` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`parent_id`),
  KEY `order_no` (`order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `w_source`
-- ----------------------------
DROP TABLE IF EXISTS `w_source`;
CREATE TABLE `w_source` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` enum('single_media1','single_media2','mul_media') NOT NULL DEFAULT 'single_media1' COMMENT '0自定义页面 1单图文 2多图文',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL COMMENT '标题',
  `desc` varchar(500) NOT NULL DEFAULT '' COMMENT '摘要',
  `url` varchar(150) NOT NULL DEFAULT '',
  `content` text NOT NULL COMMENT '详细',
  `picture` varchar(150) DEFAULT '' COMMENT '封面',
  `is_del` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '软删除',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `w_source_category`
-- ----------------------------
DROP TABLE IF EXISTS `w_source_category`;
CREATE TABLE `w_source_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `source_ids` varchar(200) NOT NULL DEFAULT '' COMMENT '素材ids',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
