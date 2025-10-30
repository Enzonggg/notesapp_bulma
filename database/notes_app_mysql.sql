-- MySQL schema for Notes App (targets existing database `notes_app`)
-- If your DB name differs, replace `notes_app` below.
USE `notes_app`;
-- USE `ci4_notes`;

CREATE TABLE IF NOT EXISTS `notes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(150) NOT NULL,
  `content` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `notes` (`title`, `content`, `created_at`, `updated_at`) VALUES
('Welcome 🌸', 'This is your first note. Feel free to edit or delete it!', NOW(), NOW());

-- Users table for authentication

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample user (password: password)
INSERT INTO `users` (`username`, `password_hash`, `created_at`, `updated_at`) VALUES
('demo', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW());
    