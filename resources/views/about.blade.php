@extends('layouts.app')

@section('content')

<!-- About Us Section -->
<div class="about-us-section" style="border: 3px solid #6a0dad; border-radius: 10px; padding: 40px; margin: 40px auto; background-color: #f9f9f9; width: 80%; text-align: center;">
    <h2 style="font-size: 28px; color: #6a0dad; margin-bottom: 20px;">Learn About Us</h2>
    <p style="font-size: 18px; color: #555; max-width: 800px; margin: 0 auto;">
        We are a leading platform dedicated to connecting buyers and sellers in the world of second-hand cars. 
        Our mission is simple: to make your car-buying experience seamless, transparent, and rewarding. 
        Whether you're looking for an affordable used car or selling your own, we provide a user-friendly platform where you can easily explore a range of vehicles, compare prices, and make well-informed decisions. 
        With our commitment to quality and customer satisfaction, we are here to help you find the best deals in the market!
    </p>
</div>

<!-- Customer Testimonials Section -->
<div class="testimonials-section" style="max-width: 80%; margin: 40px auto; text-align: center;">
    <h3 style="font-size: 24px; color: #6a0dad;">What Our Customers Are Saying</h3>
    
    <div class="testimonial" style="margin: 20px 0; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f1f1f1; max-width: 800px; margin-left: auto; margin-right: auto;">
        <p style="font-size: 18px; color: #555; font-style: italic;">
            "I bought my first used car here and couldn't be happier with the quality. The team was transparent, answered all my questions, and made the process so easy. Highly recommended!" 
        </p>
        <p style="font-size: 16px; color: #6a0dad; font-weight: bold;">- Sarah L.</p>
    </div>

    <div class="testimonial" style="margin: 20px 0; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f1f1f1; max-width: 800px; margin-left: auto; margin-right: auto;">
        <p style="font-size: 18px; color: #555; font-style: italic;">
            "The platform was so easy to use. I found a car that was exactly what I was looking for, and the transaction was smooth and straightforward. The customer service was excellent too!" 
        </p>
        <p style="font-size: 16px; color: #6a0dad; font-weight: bold;">- John M.</p>
    </div>
</div>

<!-- Contact Us Button -->
<div style="text-align: center; margin-top: 40px;">
<a href="/contact" class="btn-contact" style="font-size: 18px; padding: 12px 30px; background-color: #6a0dad; color: white; border-radius: 5px; text-decoration: none; transition: background-color 0.3s;">
  Contact Us
</a>
    
</div>

@endsection
