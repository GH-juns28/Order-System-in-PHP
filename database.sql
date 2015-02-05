CREATE TABLE `customer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Tin_Nu` INT,
  `Fname` VARCHAR,
  `Lname` VARCHAR,
  `Minitial` VARCHAR,
  `Address` VARCHAR,
  `Contact_no` VARCHAR,
  `Company_id` INT,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR,
  `password` VARCHAR,
  `username` VARCHAR,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `Product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Product_no` INT,
  `Product_type` VARCHAR,
  `Product_desc` VARCHAR,
  `Quanity` INT,
  `Price` INT,
  `Exp_date` DATE,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `Order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Order_date` DATE,
  `Customer_name` VARCHAR,
  `Product` VARCHAR,
  `Quantity` INT,
  `Price` INT,
  `Total` INT,
  `Payment_type` VARCHAR,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `Invoice` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Invoice_id` INT,
  `Product_order` VARCHAR,
  `Quantity` INT,
  `Total_amount` INT,
  `Order_date` DATE,
  PRIMARY KEY  (`id`)
);