/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : codeigniterboostrap

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2021-06-10 00:59:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for murid
-- ----------------------------
DROP TABLE IF EXISTS `murid`;
CREATE TABLE `murid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nisn` int(25) NOT NULL,
  `kelas` int(2) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of murid
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_penulis
-- ----------------------------
DROP TABLE IF EXISTS `tbl_penulis`;
CREATE TABLE `tbl_penulis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penulis` varchar(50) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi` text,
  `tanggal_input` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_penulis
-- ----------------------------
INSERT INTO `tbl_penulis` VALUES ('1', 'reski', 'reski', 'cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc ubah', '2021-06-10 00:37:19', '2021-06-09 19:37:19');
INSERT INTO `tbl_penulis` VALUES ('2', 'xxxxxxxxxxxx', 'ssssssssssss', 'ccccccccccccccccccccccccccccccc', '0000-00-00 00:00:00', null);
INSERT INTO `tbl_penulis` VALUES ('3', 'sdddddddddddddd', 'asssssssssssssssssssss', 'qccccccccccccccccccccccccccccccc', '2021-06-09 19:19:28', null);
SET FOREIGN_KEY_CHECKS=1;
