


<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 style="font-style: italic; margin: 0; padding: 0; font-family: 'Bree Serif', serif; font-size: 36px; transform: skewX(-15deg); text-align: left; width: 100%;">Hello, <?php echo e(Auth::user()->first_name); ?>!</h1>
    </div>
    
    <div class="phrase">
        <h1>Get the Best Deal on a Used Car! </h1>
    </div>

    <!-- Search Car Model -->
    <div class="search-container" style="margin-top: 40px; text-align: center;">
        <label for="carModel" style="font-size: 20px; color: #333;">Search Car Model:</label>
        <input type="text" id="carModel" placeholder="Search cars by model" class="form-control" style="max-width: 400px; margin-top: 10px; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid #ccc;">
        <button id="searchButton" class="btn " style="margin-top: 20px; background-color: #D484FF">Search</button>
    </div>

<!-- Predict Price button (initially hidden) -->
<div id="predict-price-btn" style="display: none; text-align: center; margin-top: 20px; ">
    <a href="#" id="predictPriceLink" class="btn " style="background-color: #800080; color: white; padding: 10px 20px; text-decoration: none;">Predict Price</a>
</div>




    <!-- Image Slider -->
    <div class="slider" style="margin-top: 40px;">
        <div class="slides">
            <img src="<?php echo e(asset('images/benz (1).jpg')); ?>" alt="Audi">
            <img src="<?php echo e(asset('images/bmw.jpg')); ?>" alt="BMW">
            <img src="<?php echo e(asset('images/honda.jpg')); ?>" alt="Honda City">
            <img src="<?php echo e(asset('images/mazda.jpg')); ?>" alt="Mazda">
            <img src="<?php echo e(asset('images/toyota.jpg')); ?>" alt="Mercedes Benz">
        </div>
    </div>

    <!-- Card Section without Border -->
    <div class="container mt-5" style=" padding: 60px;">
        <div class="card-header" style="font-size:40px;padding:20px;">
           <h1 style="font-weight:bold;font-size:34px;"> Featured Attributes </h1>
                 <h2 style="font-weight:350;font-size:18px;"> Top attributes when searching for a car </h2>
            
        </div>
        <div class="row">
            <!-- First Card -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <i class="bi bi-car-front" style="font: size 520px;color:purple;"></i>
                        <h5 class="card-title">Make</h5>
                        <p class="card-text">Refers to the brand or the manufacturer of a vehicle.It is the company that produces and sells the car under a specific name.</p>
                    </div>
                </div>
            </div>

            <!-- Second Card -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <i class="bi bi-truck-front-fill" style="color:purple;"></i>
                        <h5 class="card-title">Model</h5>
                        <p class="card-text">Refers to the specific version of vehicle produced.It represents the design size and features and specifications of a car under particular brand .</p>
                    </div>
                </div>
            </div>

            <!-- Third Card -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <i class="bi bi-calendar2-day" style="font: size 40px;color:purple;"></i>
                        <h5 class="card-title">Year of Manufacture</h5>
                        <p class="card-text">Refers to the year a vehicle was built and assembled by the manufacture.Newer cars usually have a higher value than the older cars</p>
                    </div>
                </div>
            </div>

            <!-- Fourth Card -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <i class="bi bi-speedometer2" style="color:purple;font: size 40px;"></i>
                        <h5 class="card-title">Mileage</h5>
                        <p class="card-text">The total distance is a car traveled is usually measured in miles or kilometers.It is total kilometers driven on the car.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5" style="padding: 20px;  width: 70%; display: flex; justify-content: center; align-items: center;">
    <div class="card1 mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <!-- Image on the Left -->
            <div class="col-md-4">
                <img src="<?php echo e(asset('images/kayla.jpg')); ?>" 
                    class="img-fluid rounded-start" 
                    onerror="this.onerror=null; this.src='<?php echo e(asset('images/default.jpg')); ?>';" 
                    style="border-right: 1px solid #ccc; height: 100%; object-fit: cover; border-radius: 15px; width: 800%; margin-right: 55px;">
            </div>
            <!-- Details on the Right -->
            <div class="col-md-8">
            <div class="card-body" 
    style="padding-bottom: 2px; 
           display: flex; 
           flex-direction: column;  
           align-items: center; 
           justify-content: center; /* Centers content vertically */
           text-align: center; 
           height: 100%; /* Ensure it fills the card */
           width: 100%;">
    <h5 class="card-title">Featured Car</h5>
    <p class="card-text">
    Elevate your driving experience with this exceptional car! 🚗💨  
    Designed for comfort, style, and top-tier performance, it’s built to turn heads and deliver an unforgettable ride.  
    Don’t miss your chance to own excellence drive it today!  
</p>
    <a href="#" class="btn btn-primary">Learn More</a>
</div>

</div>

        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer-columns" >
        <!-- About Us -->
        <div class="footer-column">
            <h4>About Us</h4>
            <p>We provide AI-driven price predictions for second-hand cars to help buyers and sellers make informed decisions.</p>
        </div>

        <!-- Quick Links -->
        <div class="footer-column">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(url('/about')); ?>">About</a></li>
                <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
                <li><a href="<?php echo e(url('/faq')); ?>">FAQ</a></li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div class="footer-column">
            <h4>Contact Us</h4>
            <p>Email: precog@gmail.com</p>
            <p>Phone: +254 796730474</p>
            <div>
            <a href="https://facebook.com/Wawire Gershom" class="facebook" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://twitter.com/Wawire Gerishom" class="twitter" target="_blank"><i class="fa-brands fa-x"></i></a>
            <a href="https://instagram.com/wawie Gershom" class="instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-copyright">
        &copy; <?php echo e(date('Y')); ?> Precog System. All rights reserved.
    </div>
</footer>

    <style>
       body, html {
    margin: 0;
    padding: 0;
    width: 100%;
    overflow-x: hidden; /* Prevents horizontal scrolling */
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
}

        .container {
            text-align: center;
            margin-bottom: 20px;
        }

        .phrase {
            margin-top: 90px; 
        }

        .slider {
            position: relative;
            width: 100%;
            max-width: 600px;
            height: 400px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
        }

        .slider .slides {
            display: flex;
            width: 100%;
            height: 100%;
            transition: transform 1s ease-in-out;
        }

        .slider .slides img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .form-control, .form-select {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: purple;
            border: 1px solid purple;
        }

        .btn-primary:hover {
            background-color: darkviolet;
            border: 1px solid darkviolet;
        }

        .card {
            border: none; /* Remove the border */
            transition: transform 0.3s ease-in-out;
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }

        .card-img-left {
            border-right: 1px solid #ccc;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }
        .footer {
  background-color: #DEBCF4;
  padding: 40px 20px;
  width: 100%;
  margin: 0;
  box-sizing: border-box;
  position: relative;
  left: 0;
  right: 0;
  margin-bottom: 10px;
}

body {
  margin: 0; /* Remove default body margin */
  padding: 0; /* Remove default body padding */
}

.footer-columns {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap; /* Allow wrapping on smaller screens */
  max-width: 1200px;
  margin: 0 auto;
  width: 100%;
}

.footer-column {
  flex: 1;
  padding: 0 15px;
  min-width: 200px; /* Ensure columns have a minimum width */
}

.footer-column h4 {
  font-size: 16px;
  margin-bottom: 10px;
}

.footer-column ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.footer-column ul li {
  margin-bottom: 8px;
}

.footer-column ul li a {
  text-decoration: none;
  color: #333;
  font-size: 14px;
}

.footer-column ul li a:hover {
  color: #000;
}

.footer-copyright {
  margin-top: 20px;
  font-size: 14px;
  color: #333;
  text-align: center;
}

/* Ensure the footer extends fully on all screen sizes */
@media screen and (max-width: 768px) {
  .footer-columns {
    flex-direction: column;
  }
  
  .footer-column {
    margin-bottom: 20px;
  }
}
        
        .card:hover{
            transform:scale(1.1);
            background-color:#DEBCF4;
        }
    </style>

    <!-- Include SweetAlert and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // JavaScript for Slider functionality
        let currentSlide = 0;
        const slides = document.querySelector('.slider .slides');
        const totalSlides = slides.children.length; // Get the total number of images

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlidePosition();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlidePosition();
        }

        function updateSlidePosition() {
            slides.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        // Automatically move to the next slide every 3 seconds
        setInterval(nextSlide, 3000);
        $(document).ready(function () {
    $('#searchButton').click(function (event) {
        event.preventDefault();  // Prevent the form from submitting traditionally
        
        var carModel = $('#carModel').val().trim();  // Get the input value
        
        if (carModel === "") {
            Swal.fire({
                title: 'Error!',
                text: 'Please enter a car model to search.',
                icon: 'error'
            });
            return;
        }

        // Perform the search using AJAX
        $.ajax({
            url: '<?php echo e(route('search.car')); ?>',  // The search route to handle the car search
            method: 'POST',
            data: {
                car_model: carModel,
                _token: '<?php echo e(csrf_token()); ?>'  // CSRF token for security
            },
            success: function (response) {
                if (response.status === 'available') {
                    Swal.fire({
                        title: 'Car Available!',
                        text: response.message,
                        icon: 'success'
                    }).then((result) => {
                        // Show the "Predict Price" button after the success alert
                        if (result.isConfirmed) {
                            $('#predict-price-btn').show();  // Show the button when the car is available
                            $('#predictPriceLink').attr('href', '/search');  // Redirect to the 'search' view
                        }
                    });
                } else if (response.status === 'unavailable') {
                    Swal.fire({
                        title: 'Car Not Available',
                        text: response.message,
                        icon: 'error'
                    });
                    $('#predict-price-btn').hide();  // Hide the button if the car is unavailable
                } else {
                    Swal.fire({
                        title: 'Not Found!',
                        text: response.message,
                        icon: 'warning'
                    });
                    $('#predict-price-btn').hide();  // Hide the button if the car is not found
                }
            },
            error: function (err) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong.',
                    icon: 'error'
                });
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Second-Hand Car Price Project\Preccog_System\resources\views/home.blade.php ENDPATH**/ ?>