CREATE DATABASE customer;
<<<<<<< HEAD
USE food_ordering;
=======
USE customer;
>>>>>>> 11f2ded09a2346f2068d6820833e7b604b833515

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_id VARCHAR(100) UNIQUE,
    payment_status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
