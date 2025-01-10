DROP DATABASE IF EXISTS Flash_Shop;
    
CREATE DATABASE Flash_Shop;
use Flash_Shop;

CREATE TABLE categories(
    Category_Id VARCHAR(10) PRIMARY KEY,
    Category_Name VARCHAR(100) NOT NULL,
    Description TEXT NOT NULL
); 

INSERT INTO categories (Category_Id, Category_Name, Description) VALUES
    ("SHI", "Shirt", "The Shirt with high quality will make you feel comfortable in the hot summer"),
    ("JEA", "Jean", "Whit the Jean you can express your personal style in everywhere");
;

CREATE TABLE products(
    Product_Id INT PRIMARY KEY AUTO_INCREMENT,
    Category_Id VARCHAR(10) NOT NULL REFERENCES categories(Category_Id),
    Product_Name VARCHAR(100) NOT NULL,
    Old_price NUMERIC(12, 2) NULL,
    New_Price NUMERIC(12, 2) NOT NULL,
    Stock INT NOT NULL,
    Image_URL VARCHAR(100),
    Description TEXT
);

INSERT INTO products (Product_Id, Category_Id, Product_Name, Old_price, New_Price, stock, Image_URL, Description) VALUES
    (1, "SHI", "Shirt Style 1", 220000, 180000, 40, "./public/image/ao_thun/aothun1.jpg", "High Quality"),
    (2, "SHI", "Shirt Style 2", 350000, 320000, 5,  "./public/image/ao_thun/aothun2.jpg", "High Quality"),
    (3, "SHI", "Shirt Style 3", 180000, 100000, 100,"./public/image/ao_thun/aothun3.jpg", "High Quality"),
    (4, "SHI", "Shirt Style 4", 450000, 300000, 20, "./public/image/ao_thun/aothun4.jpg", "High Quality"),
    (5, "SHI", "Shirt Style 5", 230000, 190000, 14, "./public/image/ao_thun/aothun5.jpg", "High Quality"),
    
    (6, "JEA", "Polo Style 1 ", 240000, 210000, 17, "./public/image/polo/polo1.jpg", "High Quality"),
    (7, "JEA", "Polo Style 2 ", 340000, 320000, 38, "./public/image/polo/polo2.jpg", "High Quality"),
    (8, "JEA", "Polo Style 3 ", 150000, 130000, 50, "./public/image/polo/polo3.jpg", "High Quality"),
    (9, "JEA", "Jean Style 4 ", 210000, 170000, 3,  "./public/image/jearn/jearn1.jpg", "High Quality"),
    (10,"JEA", "Jean Style 5 ", 699000, 599000 , 1, "./public/image/jearn/jearn3.jpg", "High Quality");

    -- Bảng User
CREATE TABLE Users (
    User_Id INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(200) NOT NULL UNIQUE,
    Phone VARCHAR(15) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Role TINYINT NOT NULL,
    Address VARCHAR (100)
);
INSERT INTO Users (Name, Email, Phone, Password, Role, Address) VALUES 
    ("Admin", "admin@gmail.com", "0234578254", "admin123@", 0, "KONTUM"),
    ("Toan", "toanle@gmail.com", "043728391", "toan456@", 1,''),
    ("Thuy", "thuy@gmail.com", "0362376246", "thuy789@", 1, ''),
    ("Binh", "binh@gmail.com", "0325784392", "binh987@", 1, ''),
    ("Thanh", "thanh@gmail.com", "0453856382", "thanh765@", 1, '');

-- Bảng order

CREATE TABLE Orders (
    Order_id int NOT NULL PRIMARY KEY,
    Order_date timestamp NOT NULL DEFAULT current_timestamp(),
    Status enum('pending','completed','shipped','cancelled') NOT NULL DEFAULT 'pending',
    User_id int NOT NULL
);
INSERT INTO Orders (Order_id, Order_date, Status, User_id) 
VALUES 
(1, '2024-12-18 18:39:55', 'pending', 1),
(2, '2024-12-18 18:39:55', 'completed', 2),
(3, '2024-12-18 18:39:55', 'completed', 4),
(4, '2024-12-18 18:39:55', 'cancelled', 3),
(5, '2024-12-18 18:39:55', 'pending', 5),
(6, '2024-09-17 13:44:23', 'pending', 1),
(7, '2024-12-13 15:22:52', 'completed', 2),
(8, '2024-02-12 17:20:31', 'completed', 4),
(9, '2024-11-15 18:49:23', 'cancelled', 3),
(10, '2024-09-17 13:44:23', 'completed', 1),
(11, '2024-12-13 15:22:52', 'pending', 2),
(12, '2024-02-12 17:20:31', 'shipped', 4),
(13, '2024-11-15 18:49:23', 'cancelled', 3),
(14, '2024-11-13 18:49:23', 'cancelled', 5);

CREATE TABLE Order_Detail (
  Order_Detail_id INT NOT NULL,
  Quantity INT NOT NULL,
  Price INT NOT NULL,
  Order_id INT NOT NULL,
  Product_id INT NOT NULL
);
INSERT INTO Order_Detail (Order_Detail_id, Quantity, Price, Order_id, Product_id)
VALUES 
(1, 2, 500, 101, 1001),
(2, 5, 1200, 102, 1002),
(3, 1, 300, 103, 1003),
(4, 3, 800, 104, 1004),
(5, 4, 1000, 105, 1005);


CREATE TABLE Cart (
    Cart_Id INT PRIMARY KEY AUTO_INCREMENT,
    User_Id INT NOT NULL,
    Total_Quantity INT NOT NULL,
    Total_Price int,
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (User_Id) REFERENCES Users(User_Id),
    Status enum('pending','completed') NOT NULL DEFAULT 'pending'
);
INSERT INTO Cart (User_Id, Total_Quantity, Total_Price, Status)
VALUES 
    (1, 3, 600000, 'pending'),  -- Giỏ hàng của Binh
    (2, 5, 1500000, 'pending'),  -- Giỏ hàng của Toan
    (3, 2, 800000, 'completed'), -- Giỏ hàng của Thuy
    (4, 4, 1100000, 'pending'),  -- Giỏ hàng của Sen
    (5, 6, 2000000, 'completed'); -- Giỏ hàng của Thanh


CREATE TABLE CartItem (
    CartItem_Id INT PRIMARY KEY AUTO_INCREMENT,
    Cart_Id INT NOT NULL,
    Product_Id INT NOT NULL,
    Quantity INT NOT NULL,
    Price NUMERIC(12, 2) NOT NULL,  -- Giá sản phẩm khi thêm vào giỏ
    FOREIGN KEY (Cart_Id) REFERENCES Cart(Cart_Id),
    FOREIGN KEY (Product_Id) REFERENCES products(Product_Id),
    Total_Price int
);

INSERT INTO CartItem (Cart_Id, Product_Id, Quantity, Price, Total_Price)
VALUES 
    -- Cart_Id = 1 (Giỏ hàng của Binh)
    (1, 1, 1, 180000, 180000),  -- 1 sản phẩm Shirt Style 1
    (1, 2, 1, 320000, 320000),  -- 1 sản phẩm Shirt Style 2
    (1, 3, 1, 100000, 100000),  -- 1 sản phẩm Shirt Style 3
    
    -- Cart_Id = 2 (Giỏ hàng của Toan)
    (2, 4, 2, 300000, 600000),  -- 2 sản phẩm Shirt Style 4
    (2, 5, 1, 190000, 190000),  -- 1 sản phẩm Shirt Style 5
    (2, 6, 1, 210000, 210000),  -- 1 sản phẩm Polo Style 1
    (2, 7, 1, 320000, 320000),  -- 1 sản phẩm Polo Style 2
    (2, 8, 1, 130000, 130000),  -- 1 sản phẩm Polo Style 3
    
    -- Cart_Id = 3 (Giỏ hàng của Thuy)
    (3, 9, 1, 170000, 170000),  -- 1 sản phẩm Jean Style 4
    (3, 10, 1, 599000, 599000), -- 1 sản phẩm Jean Style 5
    
    -- Cart_Id = 4 (Giỏ hàng của Sen)
    (4, 1, 2, 180000, 360000),  -- 2 sản phẩm Shirt Style 1
    (4, 2, 2, 320000, 640000),  -- 2 sản phẩm Shirt Style 2
    (4, 6, 1, 210000, 210000),  -- 1 sản phẩm Polo Style 1
    
    -- Cart_Id = 5 (Giỏ hàng của Thanh)
    (5, 3, 3, 100000, 300000),  -- 3 sản phẩm Shirt Style 3
    (5, 5, 2, 190000, 380000),  -- 2 sản phẩm Shirt Style 5
    (5, 7, 1, 320000, 320000),  -- 1 sản phẩm Polo Style 2
    (5, 9, 1, 170000, 170000),  -- 1 sản phẩm Jean Style 4
    (5, 10, 1, 599000, 599000); -- 1 sản phẩm Jean Style 5
    