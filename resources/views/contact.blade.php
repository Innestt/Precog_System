<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Our Company Name</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: rgb(150, 144, 144);
      color: #333;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 1200px;
      margin: 50px auto;
      padding: 0 20px;
      text-align: center;
    }
    h1 {
      color: #333;
      margin-bottom: 20px;
    }
    .contact-info {
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .contact-info h2 {
      color: #ff6f61;
      margin-bottom: 20px;
    }
    .contact-info p {
      color: #666;
      font-size: 18px;
      line-height: 1.6;
    }
    .contact-form {
      margin-top: 40px;
      padding: 30px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      margin: 40px auto;
    }
    .contact-form h2 {
      color: #ff6f61;
      margin-bottom: 20px;
      font-size: 24px;
    }
    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
      font-size: 16px;
      transition: all 0.3s ease;
    }
    .contact-form input:focus,
    .contact-form textarea:focus {
      border-color: #ff6f61;
      outline: none;
    }
    .contact-form button {
      background-color: #ff6f61;
      color: #fff;
      padding: 12px 30px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .contact-form button:hover {
      background-color: #e05a4e;
    }

    .social-icons {
      text-align: center;
      margin-top: 30px;
    }
    .social-icons a {
      display: inline-block;
      margin: 0 10px;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      transition: 0.3s ease;
      font-size: 2rem;
    }

    .social-icons a:hover {
      transform: scale(1.1);
    }

    .facebook i {
      color: #1877f2;  /* Facebook blue */
    }
    .twitter i {
        color: #000000;  /* Twitter blue */
    }
    .instagram i {
      color: #e4405f;  /* Instagram pink */
    }
    .linkedin i {
      color: #0077b5;  /* LinkedIn blue */
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Contact Us</h1>

  <div class="contact-info">
    <h2>Our Contact Information</h2>
    <p>If you have any questions or concerns, feel free to reach out to us using the contact information below:</p>
    <p>Email: precog@gmail.com</p>
    <p>Phone: +254702925785</p>
    <p>Address: 10300, City, Kerugoya</p>
  </div>

  <h2>Follow Us on Social Media</h2>
  <div class="social-icons">
    <a href="https://facebook.com/Wawire Gershom" class="facebook" target="_blank"><i class="fa-brands fa-facebook"></i></a>
    <a href="https://twitter.com/Wawire Gerishom" class="twitter" target="_blank"><i class="fa-brands fa-x"></i></a>
    <a href="https://instagram.com/wawie Gershom" class="instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
    <a href="https://linkedin.com" class="linkedin" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
  </div>

  <div class="contact-form">
    <h2>Send Us a Message</h2>
    <form action="wawiregerishom@gmail.com" method="post">
      <input type="text" name="name" placeholder="Your Name" required><br>
      <input type="email" name="email" placeholder="Your Email" required><br>
      <textarea name="message" placeholder="Your Message" rows="5" required></textarea><br>
      <button type="submit">Send Message</button>
    </form>
  </div>
</div>

</body>
</html>
