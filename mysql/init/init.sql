-- Create user table if schema isn't already being managed by Doctrine
CREATE TABLE IF NOT EXISTS user (
  id INT PRIMARY KEY,
  firstName VARCHAR(100),
  lastName VARCHAR(100),
  email VARCHAR(255),
  password VARCHAR(255),
  role VARCHAR(10),
  isActive BOOLEAN,
  displayName VARCHAR(100)
);

-- Insert test user
INSERT INTO user (id, firstName, lastName, email, password, role, isActive, displayName)
VALUES (3, 'test', 'test', 'test@example.com', '$2y$10$GGArVO/7.xPDg6D5Kl6GHeELUg2Dnod68ynkFaZ7R2Vfx/K1oZ96O', '1', true, 'test')
ON DUPLICATE KEY UPDATE email = VALUES(email);