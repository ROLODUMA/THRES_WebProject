<?php
// Database connection using PDO.
// Configure via environment variables or edit the defaults below.

// Sample SQL to create a minimal users table (run once):
/*
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','staff','student') NOT NULL DEFAULT 'student',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
*/

// Default configuration (override using env vars if available)
$DB_HOST = getenv('THRES_DB_HOST') ?: '127.0.0.1';
$DB_NAME = getenv('THRES_DB_NAME') ?: 'thres_db';
$DB_USER = getenv('THRES_DB_USER') ?: 'root';
$DB_PASS = getenv('THRES_DB_PASS') ?: '';
$DB_CHAR = 'utf8mb4';

function getDB(): \PDO
{
	global $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS, $DB_CHAR;
	static $pdo = null;
	if ($pdo === null) {
		$dsn = "mysql:host={$DB_HOST};dbname={$DB_NAME};charset={$DB_CHAR}";
		$options = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
		];
		try {
			$pdo = new PDO($dsn, $DB_USER, $DB_PASS, $options);
		} catch (PDOException $e) {
			// In production, hide details and log instead.
			die('Database connection failed: ' . $e->getMessage());
		}
	}
	return $pdo;
}

