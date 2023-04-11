CREATE DATABASE IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `portfolio`;
CREATE TABLE IF NOT EXISTS `portfolio`.`posts` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(45) NULL,
    `content` TEXT NULL,
    `date` DATE DEFAULT CURRENT_TIMESTAMP,
    -- Will always be "Me". I don't plan on having collaborators post as well.
    `author` VARCHAR(45) NULL,
    `hidden` TINYINT(1) DEFAULT 0);
CREATE TABLE IF NOT EXISTS `portfolio`.`tags` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `tag` VARCHAR(45) NULL);
CREATE TABLE IF NOT EXISTS `portfolio`.`post_tags` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `post_id` INT NOT NULL,
    `tag_id` INT NOT NULL);
CREATE TABLE IF NOT EXISTS `portfolio`.`image_paths` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `post_id` INT NOT NULL,
    `path` VARCHAR(45) NULL);

-- CREATE USER 'portfolio_web'@'localhost' IDENTIFIED BY 'password';
-- GRANT INSERT, UPDATE, DELETE, SELECT ON portfolio.* TO 'portfolio_web'@'localhost';
-- FLUSH PRIVILEGES;
