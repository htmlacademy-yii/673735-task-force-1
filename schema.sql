CREATE DATABASE taskforce
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE taskforce;

CREATE TABLE `categories` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE `statuses` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE `users` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE `tasks` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE `reviews` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
);
