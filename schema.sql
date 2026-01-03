-- Thres Student Portal schema
-- 
-- SETUP INSTRUCTIONS:
-- 
-- 1) EDIT DATABASE CREDENTIALS
--    Open includes/db.php and update the MySQL server details to match your local setup.
-- 
-- 2) CREATE THE DATABASE IN PhpMyAdmin
--    - Go to phpMyAdmin home (top left)
--    - Click "New" or "Create database"
--    - Name: thres_db
--    - Charset: utf8mb4
--    - Collation: utf8mb4_unicode_ci
--    - Click "Create"
-- 
-- 3) IMPORT THIS FILE INTO THE DATABASE
--    - Select thres_db from the left sidebar
--    - Click "Import" tab
--    - Upload this file (schema.sql) or paste its contents
--    - Click "Import" button
-- 
-- 4) CREATE AN ADMIN USER (OPTIONAL)
--    Run this command in PHP CLI to generate a password hash:
--       php -r "echo password_hash('Admin123!', PASSWORD_DEFAULT) . PHP_EOL;"
--    Copy the output hash and replace <PASSWORD_HASH> in the example INSERT statement below.
--    Then uncomment and run it in phpMyAdmin to create your admin account.

SET FOREIGN_KEY_CHECKS=0;

-- users table: holds admin/staff/student accounts
CREATE TABLE IF NOT EXISTS users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  email VARCHAR(200) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','staff','student') NOT NULL DEFAULT 'student',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- students: additional student-specific fields (optional)
CREATE TABLE IF NOT EXISTS students (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  student_number VARCHAR(50) NULL,
  course VARCHAR(100) NULL,
  year_level TINYINT UNSIGNED NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- subjects: list of subjects/courses
CREATE TABLE IF NOT EXISTS subjects (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  code VARCHAR(30) NOT NULL UNIQUE,
  title VARCHAR(255) NOT NULL,
  units TINYINT UNSIGNED DEFAULT 3,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- schedules: subject schedule entries
CREATE TABLE IF NOT EXISTS schedules (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  subject_id INT UNSIGNED NOT NULL,
  day ENUM('Mon','Tue','Wed','Thu','Fri','Sat','Sun') NOT NULL,
  start_time TIME NOT NULL,
  end_time TIME NOT NULL,
  room VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- enrollments: which student is enrolled in which subject (many-to-many)
CREATE TABLE IF NOT EXISTS enrollments (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  student_id INT UNSIGNED NOT NULL,
  subject_id INT UNSIGNED NOT NULL,
  semester VARCHAR(20) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
  FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
  UNIQUE KEY uniq_student_subject (student_id, subject_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- grades: per enrollment grade records
CREATE TABLE IF NOT EXISTS grades (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  enrollment_id INT UNSIGNED NOT NULL,
  grade DECIMAL(5,2) NULL,
  remarks VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (enrollment_id) REFERENCES enrollments(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS=1;

-- Example: create initial admin user (replace <PASSWORD_HASH>)
-- INSERT INTO users (name, email, password, role) VALUES ('Admin', 'admin@thres.local', '<PASSWORD_HASH>', 'admin');

-- Helpful SQL to add a sample subject and schedule:
-- INSERT INTO subjects (code, title, units) VALUES ('MATH101', 'Mathematics 101', 3);
-- INSERT INTO schedules (subject_id, day, start_time, end_time, room) VALUES (1, 'Mon', '08:00:00', '09:00:00', '101');

-- End of schema
