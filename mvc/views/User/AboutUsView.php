<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Feedback</title>
</head>
<style>
    .stats-section {
        display: flex;
        justify-content: center;
        gap: 5rem;
        padding: 20px 0;
        background-color: #fff;

    }

    .stat-item {
        text-align: center;
    }
    .stat-item p{
        display: block;
        background-color:indianred;
        color:white;
        padding: 10px 25px;
        border-radius: 5px;

    }
    .circle {
        width: 100px;
        height: 100px;
        line-height: 100px;
        border-radius: 50%;
        background-color: #63c768;
        color:aliceblue;
        font-weight: bold;
        margin: 0 auto 10px;
    }

    .section-title {
        margin: 20px 0;
        font-size: 24px;
        color: #333;
        text-align: center;
    }
    .comments-section {
        display: flex;
        justify-content: center;
        gap: 20px;
        padding: 20px;
    }

    .comment-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 300px;
        text-align: left;
    }

    .comment-card h3 {
        margin: 0 0 10px;
        color:indianred;
        font-weight: bold;
    }

    .comment-card p {
        margin: 5px 0;
        color:indianred;
    }

    .stars {
        color: #ffcc00;
        font-size: 18px;
    }

    .contact-section {
        display: flex;
        justify-content: center;
        gap: 50px;
        padding: 20px;
        background-color: #fff;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .contact-item img {
        width: 24px;
        height: 24px;
    }


</style>
<body>
    <div class="aboutUs-section">
        <div class="stats-section">
          <div class="stat-item">
            <div class="circle">+1000</div>
            <p>Customers</p>
          </div>
          <div class="stat-item">
            <div class="circle">+20000</div>
            <p>Products</p>
          </div>
          <div class="stat-item">
            <div class="circle">+500</div>
            <p>Oder</p>
          </div>
        </div>
        <h2 class="section-title">Comment From Our Customer</h2>
        <div class="comments-section">
          <div class="comment-card">
            <h3>Toan Le</h3>
            <p>Đánh giá</p>
            <div class="stars">★★★★★</div>
            <p>Shop giao hàng uy tín, đúng sản phẩm. Xứng đáng 5 sao</p>
          </div>
          <div class="comment-card">
            <h3>Bình Do.</h3>
            <p>Đánh giá</p>
            <div class="stars">★★★★★</div>
            <p>Giao hàng nhanh, đóng gói cẩn thận cảm ơn Shop</p>
          </div>
        </div>
        <h2 class="section-title">Contact With Us</h2>
        <div class="contact-section">
          <div class="contact-item">
            <img src="https://cdn-icons-png.flaticon.com/512/2250/2250078.png" alt="icon gmail">
            <p>Toanle@gmail.com</p>
          </div>
          <div class="contact-item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0CD2iXpkxH77lL9vYokVv9RzJC0fy5vnWPg&s" alt="Phone Icon">
         <p>0862955125</p>
          </div>
        </div>
    </div>
</body>
</html>