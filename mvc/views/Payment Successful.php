<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Successful</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e0e0e0;
    }
    .success-card {
      max-width: 400px;
      margin: 100px auto;
      padding: 30px;
      text-align: center;
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .success-icon {
      width: 60px;
      height: 60px;
      margin: 0 auto 20px;
      background-color: #28a745;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .success-icon::before {
      content: '\2713';
      color: #fff;
      font-size: 30px;
      font-weight: bold;
    }
    .success-header {
      color: #28a745;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .thank-you {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .success-message {
      font-size: 14px;
      color: #6c757d;
    }
  </style>
</head>
<body>
  <div class="success-card">
    <div class="success-icon"></div>
    <h2 class="success-header">Payment Successful</h2>
    <h5 class="thank-you">Thank you</h5>
    <p class="success-message">
      Your order is being packed and will be delivered to you soon. Please give us your attention so we can contact and deliver it.
    </p>
  </div>
</body>
</html>
