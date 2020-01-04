CREATE DATABASE taskforce
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE taskforce;

CREATE TABLE `category` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE `status` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE `user` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE `task` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE `reviews` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
);
