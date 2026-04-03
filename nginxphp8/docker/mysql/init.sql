-- Initialize database with products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data if table is empty
INSERT IGNORE INTO products (title) VALUES
    ('Sample Product 1'),
    ('Sample Product 2'),
    ('Sample Product 3');