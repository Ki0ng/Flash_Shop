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
        Old_price int NOT NULL,
        New_Price int NOT NULL,
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

        -- Bảng User
    CREATE TABLE Users (
        User_Id INT PRIMARY KEY AUTO_INCREMENT,
        Name VARCHAR(100) NOT NULL,
        Email VARCHAR(200) NOT NULL UNIQUE,
        Phone VARCHAR(15) NOT NULL UNIQUE,
        Password VARCHAR(255) NOT NULL,
        Role TINYINT NOT NULL,
        Address VARCHAR (100)
    );
    INSERT INTO Users (Name, Email, Phone, Password, Role, Address) VALUES 
        ("Binh", "binhdo@gmail.com", "0234578254", "binh123@", 1, "KONTUM"),
        ("Toan", "toanle@gmail.com", "043728391", "toan456@", 1, ''),
        ("Thuy", "thuy@gmail.com", "0362376246", "thuy789@", 1 , ''),
        ("Sen", "sen@gmail.com", "0325784392", "sen987@", 1, "unknow"),
        ("Thanh", "thanh@gmail.com", "0453856382", "thanh765@", 1,'');