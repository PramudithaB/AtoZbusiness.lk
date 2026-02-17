-- Reset and create fresh lms_db database
DROP DATABASE IF EXISTS lms_db;
CREATE DATABASE lms_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE lms_db;

-- Create users table
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('super_admin', 'admin', 'teacher', 'student') DEFAULT 'student',
    remember_token VARCHAR(100),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB;

-- Create class_rooms table
CREATE TABLE class_rooms (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    month VARCHAR(255) NOT NULL,
    teacher_name VARCHAR(255) NOT NULL,
    time VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB;

-- Create packages table
CREATE TABLE packages (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    class_id BIGINT UNSIGNED NOT NULL,
    package_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    note TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (class_id) REFERENCES class_rooms(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Create lessons table
CREATE TABLE lessons (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    class_id BIGINT UNSIGNED NOT NULL,
    link VARCHAR(255),
    tute VARCHAR(255),
    notice TEXT,
    lesson_type ENUM('paid', 'nonpaid') DEFAULT 'paid',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (class_id) REFERENCES class_rooms(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Create migrations table for Laravel
CREATE TABLE migrations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    migration VARCHAR(255) NOT NULL,
    batch INT NOT NULL
) ENGINE=InnoDB;

-- Insert migration records
INSERT INTO migrations (migration, batch) VALUES
('2024_01_01_000000_create_users_table', 1),
('2026_01_11_171337_create_class_rooms_table', 1),
('2026_01_13_122238_create_packages_table', 1),
('2026_01_14_000000_create_lessons_table', 1);
