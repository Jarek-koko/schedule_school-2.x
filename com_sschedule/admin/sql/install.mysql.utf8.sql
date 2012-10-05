
CREATE TABLE IF NOT EXISTS `#__sschedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherid` int(11) NOT NULL,
  `lessonid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `classroomid` int(11) NOT NULL,
  `day` tinyint(4) NOT NULL,
  `timeid` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `modified` datetime NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`teacherid`),
  KEY `NewIndex2` (`lessonid`),
  KEY `NewIndex3` (`classid`),
  KEY `NewIndex4` (`classroomid`),
  KEY `NewIndex5` (`day`)
)  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__sschedule_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `published` tinyint(1) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sschedule_classrooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sschedule_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sschedule_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `image` varchar(1023) DEFAULT NULL,
  `description` text,
  `published` tinyint(1) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__sschedule_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8;
