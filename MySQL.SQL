DROP DATABASE IF EXISTS Flash_Shop;
    
CREATE DATABASE Flash_Shop;
use Flash_Shop;

CREATE TABLE categories(
    Category_Id VARCHAR(10) PRIMARY KEY,
    Category_Name VARCHAR(100) NOT NULL,
    Decription TEXT NOT NULL
); 

INSERT INTO categories (Category_Id, Category_Name, Decription) VALUES
    ("SHI", "Shirt", "The Shirt with high quality will meke you feel comfortable in the hot summer"),
   	("JEA", "Jean", "Whit the Jean you can express your personal style in everwhere");
;

CREATE TABLE products(
    Product_Id INT PRIMARY KEY,
    Category_Id VARCHAR(10) NOT NULL REFERENCES categories(Category_Id),
    Product_Name VARCHAR(100) NOT NULL,
    Old_price NUMERIC(12, 2) NOT NULL,
    New_Price NUMERIC(12, 2) NOT NULL,
    stock INT NOT NULL,
    Image_URL VARCHAR(100),
    Decription TEXT
);

INSERT INTO products (Product_Id, Category_Id, Product_Name, Old_price, New_Price, stock, Image_URL, Decription) VALUES
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