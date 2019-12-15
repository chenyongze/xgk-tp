# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.17)
# Database: xgk_tp
# Generation Time: 2019-12-15 04:30:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table sys_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_admin`;

CREATE TABLE `sys_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `admin_name` varchar(55) NOT NULL COMMENT '管理员名字',
  `admin_password` varchar(32) NOT NULL COMMENT '管理员密码',
  `role_id` int(11) DEFAULT NULL COMMENT '所属角色',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 禁用 1 启用',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `last_login_time` datetime DEFAULT NULL COMMENT '上次登录时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

LOCK TABLES `sys_admin` WRITE;
/*!40000 ALTER TABLE `sys_admin` DISABLE KEYS */;

INSERT INTO `sys_admin` (`admin_id`, `admin_name`, `admin_password`, `role_id`, `status`, `add_time`, `last_login_time`, `update_time`)
VALUES
	(1,'admin','21232f297a57a5a743894a0e4a801fc3',1,1,'2019-09-03 13:31:20','2019-12-15 11:46:35',NULL),
	(3,'小白','d41d8cd98f00b204e9800998ecf8427e',6,1,'0000-00-00 00:00:00','2019-10-11 10:32:38',NULL);

/*!40000 ALTER TABLE `sys_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sys_login_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_login_log`;

CREATE TABLE `sys_login_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志id',
  `login_user` varchar(55) NOT NULL COMMENT '登录用户',
  `login_ip` varchar(15) NOT NULL COMMENT '登录ip',
  `login_area` varchar(55) DEFAULT NULL COMMENT '登录地区',
  `login_user_agent` varchar(155) DEFAULT NULL COMMENT '登录设备头',
  `login_time` datetime DEFAULT NULL COMMENT '登录时间',
  `login_status` tinyint(1) DEFAULT '1' COMMENT '登录状态 1 成功 2 失败',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sys_login_log` WRITE;
/*!40000 ALTER TABLE `sys_login_log` DISABLE KEYS */;

INSERT INTO `sys_login_log` (`log_id`, `login_user`, `login_ip`, `login_area`, `login_user_agent`, `login_time`, `login_status`)
VALUES
	(1,'admin','127.0.0.1','内网IP-内网IP','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36','2019-10-11 16:03:07',1),
	(2,'admin','127.0.0.1','内网IP-内网IP','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36','2019-12-15 11:27:52',1),
	(3,'admin','127.0.0.1','内网IP-内网IP','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36','2019-12-15 11:46:35',1);

/*!40000 ALTER TABLE `sys_login_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sys_node
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_node`;

CREATE TABLE `sys_node` (
  `node_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `node_name` varchar(55) NOT NULL COMMENT '节点名称',
  `node_path` varchar(55) NOT NULL COMMENT '节点路径',
  `node_pid` int(11) NOT NULL COMMENT '所属节点',
  `node_icon` varchar(55) DEFAULT NULL COMMENT '节点图标',
  `is_menu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否是菜单项 1 不是 2 是',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`node_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

LOCK TABLES `sys_node` WRITE;
/*!40000 ALTER TABLE `sys_node` DISABLE KEYS */;

INSERT INTO `sys_node` (`node_id`, `node_name`, `node_path`, `node_pid`, `node_icon`, `is_menu`, `add_time`)
VALUES
	(1,'主页','#',0,'layui-icon layui-icon-home',2,'2019-09-03 14:17:38'),
	(2,'后台首页','index/index',1,'',1,'2019-09-03 14:18:24'),
	(3,'修改密码','index/editpwd',1,'',1,'2019-09-03 14:19:03'),
	(4,'权限管理','#',0,'layui-icon layui-icon-template',2,'2019-09-03 14:19:34'),
	(5,'管理员管理','manager/index',4,'',2,'2019-09-03 14:27:42'),
	(6,'添加管理员','manager/addadmin',5,'',1,'2019-09-03 14:28:26'),
	(7,'编辑管理员','manager/editadmin',5,'',1,'2019-09-03 14:28:43'),
	(8,'删除管理员','manager/deladmin',5,'',1,'2019-09-03 14:29:14'),
	(9,'日志管理','#',0,'layui-icon layui-icon-template-1',2,'2019-10-08 16:07:36'),
	(10,'系统日志','log/system',9,'',2,'2019-10-08 16:24:55'),
	(11,'登录日志','log/login',9,'',2,'2019-10-08 16:26:27'),
	(12,'操作日志','log/operate',9,'',2,'2019-10-08 17:02:10'),
	(13,'角色管理','role/index',4,'',2,'2019-10-09 21:35:54'),
	(14,'添加角色','role/add',13,'',1,'2019-10-09 21:40:06'),
	(15,'编辑角色','role/edit',13,'',1,'2019-10-09 21:40:53'),
	(16,'删除角色','role/delete',13,'',1,'2019-10-09 21:41:07'),
	(17,'权限分配','role/assignauthority',13,'',1,'2019-10-09 21:41:38'),
	(18,'节点管理','node/index',4,'',2,'2019-10-09 21:42:06'),
	(19,'添加节点','node/add',18,'',1,'2019-10-09 21:42:51'),
	(20,'编辑节点','node/edit',18,'',1,'2019-10-09 21:43:29'),
	(21,'删除节点','node/delete',18,'',1,'2019-10-09 21:43:44');

/*!40000 ALTER TABLE `sys_node` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sys_operate_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_operate_log`;

CREATE TABLE `sys_operate_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '操作日志id',
  `operator` varchar(55) NOT NULL COMMENT '操作用户',
  `operator_ip` varchar(15) NOT NULL COMMENT '操作者ip',
  `operate_method` varchar(100) NOT NULL COMMENT '操作方法',
  `operate_desc` varchar(155) NOT NULL COMMENT '操作简述',
  `operate_time` datetime NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sys_operate_log` WRITE;
/*!40000 ALTER TABLE `sys_operate_log` DISABLE KEYS */;

INSERT INTO `sys_operate_log` (`log_id`, `operator`, `operator_ip`, `operate_method`, `operate_desc`, `operate_time`)
VALUES
	(1,'admin','127.0.0.1','manager/editadmin','编辑管理员小白','2019-10-11 14:19:21'),
	(2,'admin','127.0.0.1','role/assignauthority','分配权限6','2019-10-11 14:19:37'),
	(3,'admin','127.0.0.1','role/edit','编辑角色研发','2019-10-11 14:19:40'),
	(4,'admin','127.0.0.1','role/edit','编辑角色：部门经理','2019-10-11 14:21:33'),
	(5,'admin','127.0.0.1','node/edit','编辑节点：主页','2019-10-11 14:22:18'),
	(6,'admin','127.0.0.1','node/delete','删除节点：1','2019-12-15 11:28:31'),
	(7,'admin','127.0.0.1','manager/addadmin','添加管理员：aaa','2019-12-15 11:28:46');

/*!40000 ALTER TABLE `sys_operate_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sys_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_role`;

CREATE TABLE `sys_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(55) NOT NULL COMMENT '角色名称',
  `role_node` varchar(255) NOT NULL COMMENT '角色拥有的权限节点',
  `role_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '角色状态 1 启用 2 禁用',
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

LOCK TABLES `sys_role` WRITE;
/*!40000 ALTER TABLE `sys_role` DISABLE KEYS */;

INSERT INTO `sys_role` (`role_id`, `role_name`, `role_node`, `role_status`)
VALUES
	(1,'超级管理员','#',1),
	(3,'会计','1,2,3',1),
	(4,'部门经理','1,2,3,4,5,6,7,8',1),
	(5,'DBA','1,2,3',1),
	(6,'研发','1,2,3,4,13,14,15,16,17,18,19,20,21,9,10,11,12',1);

/*!40000 ALTER TABLE `sys_role` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
