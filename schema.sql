CREATE DATABASE taskforce
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE taskforce;

CREATE TABLE `category` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` char(128) NOT NULL DEFAULT ''
);

CREATE TABLE `status` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` char(128) NOT NULL DEFAULT ''
);

CREATE TABLE `user` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `email` char(128) NOT NULL DEFAULT '',
    `password` text NOT NULL,
    `rating` int(11) NOT NULL DEFAULT '1',
    `popularity` int(11) NOT NULL DEFAULT '1',
    `bio` text,
    `avatar` text,
    `specialisation` char(128) DEFAULT NULL,
    `isWorker` tinyint(1) NOT NULL DEFAULT '0',
    `isClient` tinyint(1) NOT NULL DEFAULT '0',
    `birthday` datetime DEFAULT NULL,
    `location` char(128) DEFAULT NULL,
    `phone` char(128) DEFAULT NULL,
    `skype` char(128) DEFAULT NULL,
    `messenger` char(128) DEFAULT NULL,
    `portfolio` text,
    `subscription` tinyint(1) NOT NULL DEFAULT '1',
    `showContacts` tinyint(1) NOT NULL DEFAULT '0',
    `showProfile` tinyint(1) NOT NULL DEFAULT '0'
);

CREATE TABLE `task` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` char(128) NOT NULL DEFAULT '',
    `description` text NOT NULL,
    `category` int(11) unsigned NOT NULL,
    `files` text,
    `location` text,
    `budget` int(11) NOT NULL,
    `dueDate` datetime DEFAULT NULL,
    `status` int(11) unsigned NOT NULL,
    `worker` int(11) unsigned DEFAULT NULL,
    `author` int(11) unsigned DEFAULT NULL,
    CONSTRAINT `author` FOREIGN KEY (`author`) REFERENCES `user` (`id`),
    CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `category` (`id`),
    CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
    CONSTRAINT `worker` FOREIGN KEY (`worker`) REFERENCES `user` (`id`)
);

CREATE TABLE `reviews` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
   `comment` text NOT NULL,
   `mark` int(5) NOT NULL,
   `reviewer` int(11) unsigned DEFAULT NULL,
   `worker` int(11) unsigned DEFAULT NULL,
   `task` int(11) unsigned DEFAULT NULL,
   CONSTRAINT `reviewer` FOREIGN KEY (`reviewer`) REFERENCES `user` (`id`),
   CONSTRAINT `task` FOREIGN KEY (`task`) REFERENCES `user` (`id`),
   CONSTRAINT `user` FOREIGN KEY (`worker`) REFERENCES `user` (`id`)
);
