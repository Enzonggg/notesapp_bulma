-- Notes App SQL Schema and Sample Data

CREATE TABLE IF NOT EXISTS notes (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  title VARCHAR(150) NOT NULL,
  content TEXT NULL,
  created_at DATETIME NULL,
  updated_at DATETIME NULL
);

INSERT INTO notes (title, content, created_at, updated_at) VALUES
('Welcome 🌸', 'This is your first note. Feel free to edit or delete it!', datetime('now'), datetime('now'));

-- Users table for authentication (SQLite)

CREATE TABLE IF NOT EXISTS users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  username VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at DATETIME NULL,
  updated_at DATETIME NULL
);

-- Sample user (password: password)
INSERT OR IGNORE INTO users (username, password_hash, created_at, updated_at) VALUES
('demo', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', datetime('now'), datetime('now'));
