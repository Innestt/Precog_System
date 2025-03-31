@extends('layouts.app')

@section('content')

<div style="max-width: 1200px; margin: 50px auto; padding: 0 20px; text-align: center; font-family: Arial, sans-serif; background-color: rgb(150, 144, 144); color: #333;">
    <h1 style="color: #333; margin-bottom: 20px;">Contact Us</h1><div style="background-color: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h2 style="color: #ff6f61; margin-bottom: 20px;">Our Contact Information</h2>
    <p style="color: #666; font-size: 18px; line-height: 1.6;">If you have any questions or concerns, feel free to reach out to us using the contact information below:</p>
    <p>Email: precog@gmail.com</p>
    <p>Phone: +254702925785</p>
    <p>Address: 10300, City, Kerugoya</p>
</div>

<h2 style="margin-top: 30px;">Follow Us on Social Media</h2>
<div>
    <a href="https://facebook.com/WawireGershom" target="_blank" style="font-size: 2rem; margin: 0 10px; color: #1877f2;"><i class="fa-brands fa-facebook"></i></a>
    <a href="https://twitter.com/WawireGerishom" target="_blank" style="font-size: 2rem; margin: 0 10px; color: #000000;"><i class="fa-brands fa-x"></i></a>
    <a href="https://instagram.com/wawieGershom" target="_blank" style="font-size: 2rem; margin: 0 10px; color: #e4405f;"><i class="fa-brands fa-instagram"></i></a>
    <a href="https://linkedin.com" target="_blank" style="font-size: 2rem; margin: 0 10px; color: #0077b5;"><i class="fa-brands fa-linkedin"></i></a>
</div>

<div style="margin-top: 40px; padding: 30px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 40px auto;">
    <h2 style="color: #ff6f61; margin-bottom: 20px; font-size: 24px;">Send Us a Message</h2>
    <form action="wawiregerishom@gmail.com" method="post">
        <input type="text" name="name" placeholder="Your Name" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 8px; font-size: 16px;"><br>
        <input type="email" name="email" placeholder="Your Email" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 8px; font-size: 16px;"><br>
        <textarea name="message" placeholder="Your Message" rows="5" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 8px; font-size: 16px;"></textarea><br>
        <button type="submit" style="background-color: #ff6f61; color: #fff; padding: 12px 30px; border: none; border-radius: 8px; font-size: 16px; cursor: pointer;">Send Message</button>
    </form>
</div>

</div>
@endsection