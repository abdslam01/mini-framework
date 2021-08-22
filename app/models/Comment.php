<?php

/*
CREATE TABLE `comments` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `post_id` int(11) DEFAULT NULL,
 `content` text DEFAULT NULL,
 `user` varchar(255) DEFAULT NULL,
 `created_at` datetime DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `comments_fkk` (`post_id`),
 CONSTRAINT `comments_fkk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4
*/