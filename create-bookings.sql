CREATE TABLE bookings (
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(100),
   email VARCHAR(100),
   phone VARCHAR(15),
   date DATE,
   time TIME,
   facility VARCHAR(100),
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);