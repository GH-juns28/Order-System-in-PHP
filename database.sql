CREATE TABLE `Customer`
(
  `Customer_Id` bigint NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(255),
  `Last_Name` varchar(255),
  `User_id` bigint,
  `Middle_Inital` varchar(255),
  `Address` varchar(255),
  `Contact_Number` varchar(255),
  `Company_Id` bigint,
  CONSTRAINT PK_Customer PRIMARY KEY (`Customer_Id`)
)
;

CREATE TABLE `Main_Office`
(
  `Company_Id` bigint NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(255),
  `Last_Name` varchar(255),
  `Middle_Initial` varchar(255),
  `Contact_Number` varchar(255),
  CONSTRAINT PK_Main_Office PRIMARY KEY (`Company_Id`)
)
;

CREATE TABLE `Order`
(
  `Order_Id` bigint NOT NULL AUTO_INCREMENT,
  `Order_Date` datetime,
  `User_Id` bigint,
  `Quantity` bigint,
  `Price` bigint,
  `Total` bigint,
  `Product_Id` bigint,
  CONSTRAINT PK_Order PRIMARY KEY (`Order_Id`)
)
;

CREATE TABLE `Product`
(
  `Product_Id` bigint NOT NULL AUTO_INCREMENT,
  `Product_type` varchar(255),
  `Product_Description` varchar(255),
  `Quantity` bigint,
  `Price` bigint,
  `Expiration_Date` datetime,
  `Customer_Id` bigint,
  CONSTRAINT PK_Product PRIMARY KEY (`Product_Id`)
)
;

CREATE TABLE `users`
(
  `User_Id` bigint NOT NULL AUTO_INCREMENT,
  `Email` varchar(255),
  `Password` varchar(255),
  `Username` varchar(255),
  CONSTRAINT pk_users PRIMARY KEY (`User_Id`)
)
;

ALTER TABLE `Customer` ADD CONSTRAINT `FK_Customer_`
  FOREIGN KEY (`User_id`) REFERENCES `users` (`User_Id`)
;

ALTER TABLE `Customer` ADD CONSTRAINT `FK_Customer_Company_Id`
  FOREIGN KEY (`Company_Id`) REFERENCES `Main_Office` (`Company_Id`)
;

ALTER TABLE `Order` ADD CONSTRAINT `FK_Order_`
  FOREIGN KEY (`Product_Id`) REFERENCES `Product` (`Product_Id`)
;

ALTER TABLE `Order` ADD CONSTRAINT `FK_Order_User_Id`
  FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`)
;

ALTER TABLE `Product` ADD CONSTRAINT `FK_Product_`
  FOREIGN KEY (`Customer_Id`) REFERENCES `Customer` (`Customer_Id`)
;

