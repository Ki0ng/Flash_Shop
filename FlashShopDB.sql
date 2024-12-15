-- Tạo database
CREATE DATABASE flash_shop;
-- drop database flash_shop;
-- Sử dụng database
USE flash_shop;
-- Tạo bảng Products
CREATE TABLE Products (
    Product_id INT AUTO_INCREMENT PRIMARY KEY, -- Khóa chính
    Category_id INT,                           -- Khóa ngoại tham chiếu đến bảng Categories (nếu có)
    Name VARCHAR(255) NOT NULL,               -- Tên sản phẩm
    Description TEXT,                         -- Mô tả sản phẩm
    Price DECIMAL(10, 2) NOT NULL,            -- Giá sản phẩm
    Image_URL VARCHAR(255),                  -- URL hình ảnh sản phẩm
    Stock INT DEFAULT 0                      -- Số lượng tồn kho
);

INSERT INTO Products (Category_id, Name, Description, Price, Image_URL, Stock)
VALUES 
(1, 'Long Sleeve Jacket', 'Warm and stylish jacket', 250.00, 'https://www.clubmonaco.com/dw/image/v2/BGJB_PRD/on/demandware.static/-/Sites-masterCatalog_ClubMonaco/default/dwcabfd4b1/hi-res/cm-795898523002_lifestyle.jpg?sw=1000&sh=1250&sfrm=jpg', 10),
(1, 'Sweater', 'Comfortable and trendy sweater', 200.00, 'https://lados.vn/wp-content/uploads/2024/07/z4976284560781-929fb54d5d312b208009d525427b7496-1702698885480-1.jpeg', 15),
(2, 'T-Shirt', 'Casual and lightweight T-shirt', 100.00, 'https://bizweb.dktcdn.net/100/358/122/products/du-an-moi-9-1-2-1-0aae9e00-11ef-4855-b3e4-193283d868e3-9a7e738a-6a6b-4179-91b4-98091a3cb436-1.jpg?v=1678955225603', 50),
(2, 'Warm Coat', 'Winter coat for cold weather', 300.00, 'https://www.fashionbeans.com/wp-content/uploads/2024/09/Buck-Mason-Herringbone-Italian-Double-Faced-Wool-Town-Coat.jpg', 5),
(3, 'Cardigan', 'Elegant and soft cardigan', 180.00, 'https://onsiteclothes.com/wp-content/uploads/2024/05/ao-khoac-cardigan-nam-nu-chat-cotton-to-ong-cao-cap-kem.png', 20);

