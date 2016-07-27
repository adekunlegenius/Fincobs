CREATE DATABASE IF NOT EXISTS Kunle_olx;

USE  Kunle_olx;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(
  user_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  fullname VARCHAR (100) NOT NULL,
  username VARCHAR (255) NOT NULL,
  password_hash VARCHAR (255) NOT NULL,
  auth_key VARCHAR (32) NOT NULL,
  password_reset_token VARCHAR (255) NULL ,
  email VARCHAR (100) NOT NULL UNIQUE,
  phone_no VARCHAR(20) NOT NULL,
  sex enum('Male', 'Female') NULL ,
  nationality VARCHAR (50) DEFAULT NULL,
  current_country VARCHAR (50) DEFAULT NULL,
  current_city VARCHAR (50) DEFAULT NULL,
  profile_picture VARCHAR (100) DEFAULT NULL,
  created_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  account_status BOOLEAN DEFAULT 0,
  online_status BOOLEAN DEFAULT 0
  
);

DROP TABLE IF EXISTS products;
CREATE TABLE IF NOT EXISTS products(
  product_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  product_name varchar(100) NOT NULL,
  price varchar(100) NOT NULL,
  product_bargainable enum('Yes','No') NOT NULL,
  front_view_image VARCHAR (100) NOT NULL,
  back_view_image VARCHAR (100) NOT NULL,
  side_view_image VARCHAR (100) NOT NULL,
  top_view_image VARCHAR (100) NOT NULL,
  description TEXT NOT NULL,
  product_status BOOLEAN DEFAULT 1,
  user_id int(11) NOT NULL,
  category VARCHAR (100) NOT NULL,
  no_of_views INT (11) NOT NULL DEFAULT 0,
  date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_products_user_id FOREIGN KEY (user_id) REFERENCES users(user_id)
);

DROP TABLE IF EXISTS interests;
CREATE TABLE IF NOT EXISTS interests(
  interest_id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  user_id INT UNSIGNED NOT NULL ,
  product_id INT UNSIGNED NOT NULL ,
  status BOOLEAN DEFAULT 0 NOT NULL ,
  CONSTRAINT fk_interests_user_id FOREIGN KEY (user_id) REFERENCES users(user_id),
  CONSTRAINT fk_interests_product_id FOREIGN KEY (product_id) REFERENCES products(product_id)
);

DROP TABLE IF EXISTS buy_requests;
CREATE TABLE IF NOT EXISTS buy_requests(
  request_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  interest_id INT UNSIGNED NOT NULL ,
  request_price VARCHAR (100) NOT NULL,
  status BOOLEAN DEFAULT 0 NOT NULL ,
  CONSTRAINT fk_buy_requests_interest_id FOREIGN KEY (interest_id) REFERENCES interests(interest_id)
);

DROP TABLE IF EXISTS customer_lists;
CREATE TABLE IF NOT EXISTS customer_lists(
  customer_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  buyer_user_id INT UNSIGNED NOT NULL ,
  seller_user_id INT UNSIGNED NOT NULL ,
  request_id INT UNSIGNED NOT NULL ,
  status enum('Active', 'Inactive') NOT NULL DEFAULT 'Active',
  CONSTRAINT fk_customer_lists_buyer_user_id FOREIGN KEY (buyer_user_id) REFERENCES users(user_id),
  CONSTRAINT fk_customer_lists_seller_user_id FOREIGN KEY (seller_user_id) REFERENCES users(user_id),
  CONSTRAINT fk_customer_lists_request_id FOREIGN KEY (request_id) REFERENCES buy_requests(request_id)
);

DROP TABLE IF EXISTS category;
CREATE TABLE IF NOT EXISTS category(
  category_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  category_name VARCHAR (100) NOT NULL
);

--
--Predefined data values for product category
--
INSERT INTO category(category_id, category_name) VALUES (1, 'Animals & Pets'), (2, 'Car'), (3, 'Electronics & Video'),
 (4, 'Mobile Phones & Tablets'),(5, 'Fashion & Beauty'), (6, 'Laptops'), (7, 'Home furniture & Garden'), (8, 'Vehicles'),
  (9, 'Real Estate'), (10, 'Hobbies, Art and Sport'), (11, 'Jobs and Services');

DROP TABLE IF EXISTS currency;
CREATE TABLE IF NOT EXISTS currency(
  currency_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  currency_name VARCHAR (100) NOT NULL
);

--
--Predefined data values for currency
--
INSERT INTO currency(currency_id, category_name) VALUES (1, 'US Dollar ($)'),(2, 'Naira');

--
--Chat for buyer and seller to bargain
--
DROP TABLE IF EXISTS chat;
CREATE TABLE IF NOT EXISTS chat(
  chat_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  sender_user_id INT UNSIGNED NOT NULL,
  receiver_user_id INT UNSIGNED NOT NULL ,
  message TEXT,
  message_status enum('pending','delivered'),
  date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_chat_sender_user_id FOREIGN KEY (sender_user_id) REFERENCES users(user_id),
  CONSTRAINT fk_chat_receiver_user_id FOREIGN KEY (receiver_user_id) REFERENCES users(user_id)
);

DROP TABLE IF EXISTS notification_types;
CREATE TABLE IF NOT EXISTS notification_types(
  type_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  type_name VARCHAR (50) NOT NULL
);

INSERT INTO notification_types(type_name) VALUES ('Interest request rejected','Buy request rejected');

DROP TABLE IF EXISTS notifications;
CREATE TABLE IF NOT EXISTS notifications(
  user_id INT UNSIGNED,
  notification_type VARCHAR (100),
  created_by_user INT UNSIGNED,
  message VARCHAR (250) NOT NULL,
  created_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_notifications_user_id FOREIGN KEY (user_id) REFERENCES users(user_id),
  CONSTRAINT fk_notifications_created_by_user FOREIGN KEY (created_by_user) REFERENCES users(user_id)
);