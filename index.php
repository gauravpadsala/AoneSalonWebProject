
<!DOCTYPE html>
<html lang="en">

<?php

include('connection.php');

$nameErr = $emailErr = $phoneErr = $categoryErr = $addressErr = $dateErr = "";
$name = $email = $phone = $category = $address = $date =  "";

// Flag to check if inputs are valid
$inputsAreValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $inputsAreValid = false;
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $inputsAreValid = false;
        }
    }
    
    if (empty($_POST["email_address"])) {
        $emailErr = "Email is required";
        $inputsAreValid = false;
    } else {
        $email = test_input($_POST["email_address"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $inputsAreValid = false;
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $inputsAreValid = false;
    } else {
        $phone = test_input($_POST["phone"]);
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
        $inputsAreValid = false;
    } else {
        $address = test_input($_POST["address"]);
        // Assuming you want to allow more than just letters and whitespace in address
    }

    if (empty($_POST["date"])) {
        $dateErr = "Date is required";
        $inputsAreValid = false;
    } else {
        $date = test_input($_POST["date"]);
    }

    if (empty($_POST["category"])) {
        $categoryErr = "Selecting a category is required";
        $inputsAreValid = false;
    } else {
        $category = test_input($_POST["category"]);
    }

    // Only attempt to insert into the database if all inputs are valid
    if ($inputsAreValid) {
        $query = mysqli_query($con, "INSERT INTO appointment (name, email_address, phone, category, date, address) VALUES ('$name','$email','$phone','$category','$date','$address')");
        if ($query) {
            echo "<script>alert('Data inserted successfully.');</script>";
        } else {
            echo "<script>alert('There was an error.');</script>";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>



<head>

  <style>
  .error {color: #FF0000;}
  </style>

  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tags
  -->
  <title> A-One Salon| Barbers & Hair Cutting</title>
  <meta name="title" content="Barber - Barbers & Hair Cutting">
  <meta name="description" content="This is a barber html template made by codewithsadee">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik:wght@300,400;700&display=swap"
    rel="stylesheet">

  <!-- 
    - flaticon
  -->
  <link rel="stylesheet" href="assets/css/flaticon.min.css">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/hero-banner.jpg">

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header">

    <div class="header-top">
      <div class="container">

        <ul class="header-top-list">

          <li class="header-top-item">
            <ion-icon name="call-outline" aria-hidden="true"></ion-icon>

            <p class="item-title">Call Us :</p>

            <a href="tel:01234567895" class="item-link">+1 437 878 4563</a>
          </li>

          <li class="header-top-item">
            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

            <p class="item-title">Opening Hour :</p>

            <p class="item-text">Monday - Sunday, 08 am - 09 pm</p>
          </li>

          <li>
            <ul class="social-list">

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-youtube"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>
    </div>

    <div class="header-bottom" data-header>
      <div class="container">

        <a href="#" class="logo">
          A-ONE
          <span class="span">Hair Salon</span>
        </a>

        <nav class="navbar container" data-navbar>
          <ul class="navbar-list">

            <li class="navbar-item">
              <a href="#home" class="navbar-link" data-nav-link>Home</a>
            </li>

            <li class="navbar-item">
              <a href="#services" class="navbar-link" data-nav-link>Services</a>
            </li>

            <li class="navbar-item">
              <a href="#pricing" class="navbar-link" data-nav-link>Pricing</a>
            </li>

            <li class="navbar-item">
              <a href="#gallery" class="navbar-link" data-nav-link>Gallery</a>
            </li>

            <li class="navbar-item">
              <a href="#appointment" class="navbar-link" data-nav-link>Appointment</a>
            </li>

            <li class="navbar-item">
              <a href="#" class="navbar-link" data-nav-link>Contact</a>
            </li>

          </ul>
        </nav>

        <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
          <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
        </button>

        <a href="#" class="btn has-before">
          <span class="span">Appointment</span>

          <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
        </a>

      </div>
    </div>

  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero has-before has-bg-image" id="home" aria-label="home"
        style="background-image: url('./assets/images/hero-banner.jpg')">
        <div class="container">

          <h1 class="h1 hero-title">Barbers & Hair Cutting</h1>

          <p class="hero-text">
            Life isn’t perfect, but your hair can be.
          </p>

          <a href="#" class="btn has-before">
            <span class="span">Explore Our Services</span>

            <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
          </a>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->

      <section class="section service" id="services" aria-label="services">
        <div class="container">

          <h2 class="h2 section-title text-center">Saloon & Barber Services</h2>

          <p class="section-text text-center">
            WE HELP YOU LOOK GREAT
          </p>

          <ul class="grid-list">

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <i class="flaticon-salon"></i>
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Hair Cutting Style</a>
                </h3>

                <p class="card-text">
                  "Get a cut that's all you. Our stylists craft the perfect look that screams 'your style'. Casual trim or total makeover, we've got you covered."
                </p>

                <a href="#" class="card-btn" aria-label="more">
                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>


            <li>
              <div class="service-card">

                <div class="card-icon">
                  <i class="flaticon-shaving-razor"></i>
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Stylist Shaving</a>
                </h3>

                <p class="card-text">
                  "Get the sharp look you want. Our stylists are razor pros, ready to give you that perfect shave and style. It's not just a shave, it's your style, perfected."
                </p>

                <a href="#" class="card-btn" aria-label="more">
                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #PRICING
      -->

      <section class="section pricing has-bg-image has-before" id="pricing" aria-label="pricing"
        style="background-image: url('./assets/images/pricing-bg.jpg')">
        <div class="container">

          <h2 class="h2 section-title text-center">Awesome Pricing Plan</h2>

          <p class="section-text text-center">
            Fab Looks, Friendly Prices. Dive Into Our Amazing Deals!
          </p>

          <div class="pricing-tab-container">

            <ul class="tab-filter">

              <li>
                <button class="filter-btn active" data-filter-btn="all">
                  <div class="btn-icon">
                    <i class="flaticon-beauty-salon" aria-hidden="true"></i>
                  </div>

                  <p class="btn-text">Hair-Cutting</p>
                </button>
              </li>

              <li>
                <button class="filter-btn" data-filter-btn="shaving">
                  <div class="btn-icon">
                    <i class="flaticon-razor-blade" aria-hidden="true"></i>
                  </div>

                  <p class="btn-text">Shaving</p>
                </button>
              </li>

            </ul>

            <ul class="grid-list">

              <li data-filter="shaving">
                <div class="pricing-card">

                  <figure class="card-banner img-holder" style="--width: 90; --height: 90;">
                    <img src="./assets/images/pricing-1.jpg" width="90" height="90" alt="Hair Cutting & Fitting"
                      class="img-cover">
                  </figure>

                  <div class="wrapper">
                    <h3 class="h3 card-title">Hair Cutting & Style</h3>

                    <p class="card-text">Clean & simple 30-40 minutes</p>
                  </div>

                  <data class="card-price" value="89">$20</data>

                </div>
              </li>

              <li data-filter="shaving">
                <div class="pricing-card">

                  <figure class="card-banner img-holder" style="--width: 90; --height: 90;">
                    <img src="./assets/images/pricing-2.jpg" width="90" height="90" alt="Shaving & Facial"
                      class="img-cover">
                  </figure>

                  <div class="wrapper">
                    <h3 class="h3 card-title">Shaving</h3>

                    <p class="card-text">Clean & simple 5-10 minutes</p>
                  </div>

                  <data class="card-price" value="45">$5</data>

                </div>
              </li>

            </ul>

          </div>

        </div>
      </section>





      <!-- 
        - #GALLERY
      -->

      <section class="section gallery" id="gallery" aria-label="photo gallery">
        <div class="container">

          <div class="title-wrapper">

            <div>
              <h2 class="h2 section-title">Latest Photo Gallery</h2>

              <p class="section-text">
                Feast your eyes on our Latest Photo Gallery – a vibrant showcase of transformative styles and cutting-edge trends from our salon floor!
              </p>
            </div>

            <a href="#" class="btn has-before">
              <span class="span">Explore More Gallery</span>

              <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
            </a>

          </div>

          <ul class="grid-list">

            <li>
              <div class="gallery-card">

                <figure class="card-banner img-holder" style="--width: 422; --height: 550;">
                  <img src="./assets/images/gallery-1.jpg" width="422" height="550" loading="lazy" alt="Hair Cutting"
                    class="img-cover">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Hair Cutting</h3>

                  <p class="card-text">Barbers & Salon Services</p>

                  <a href="#" class="card-btn" aria-label="Read more">
                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

            <li>
              <div class="gallery-card">

                <figure class="card-banner img-holder" style="--width: 422; --height: 550;">
                  <img src="./assets/images/gallery-2.jpg" width="422" height="550" loading="lazy" alt="Hair Cutting"
                    class="img-cover">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Hair Cutting</h3>

                  <p class="card-text">Barbers & Salon Services</p>

                  <a href="#" class="card-btn" aria-label="Read more">
                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

            <li>
              <div class="gallery-card">

                <figure class="card-banner img-holder" style="--width: 422; --height: 550;">
                  <img src="./assets/images/gallery-3.jpg" width="422" height="550" loading="lazy" alt="Hair Cutting"
                    class="img-cover">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Hair Cutting</h3>

                  <p class="card-text">Barbers & Salon Services</p>

                  <a href="#" class="card-btn" aria-label="Read more">
                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

            <li>
              <div class="gallery-card">

                <figure class="card-banner img-holder" style="--width: 422; --height: 550;">
                  <img src="./assets/images/gallery-4.jpg" width="422" height="550" loading="lazy" alt="Hair Cutting"
                    class="img-cover">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Hair Cutting</h3>

                  <p class="card-text">Barbers & Salon Services</p>

                  <a href="#" class="card-btn" aria-label="Read more">
                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #APPOINTMENT
      -->

      <section class="section appoin" id="appointment" aria-label="appointment">
        <div class="container">

          <div class="appoin-card">

            <figure class="card-banner img-holder" style="--width: 250; --height: 774;">
              <img src="./assets/images/appoin-banner-1.jpg" width="250" height="774" loading="lazy" alt=""
                class="img-cover">
            </figure>

            <div class="card-content">

              <h2 class="h2 section-title">Make Appointment</h2>

              <p class="section-text">
                
              </p>


              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="appoin-form">

                <div class="input-wrapper">
                  <input type="text" name="name" placeholder="Your Full Name"  class="input-field">
                  <span class="error">* <?php echo $nameErr;?></span>

                  <input type="email" name="email_address" placeholder="Email Address"  class="input-field">
                  <span class="error">* <?php echo $emailErr;?></span>
                </div>

                <div class="input-wrapper">
                  <input type="text" name="phone" placeholder="Phone Number" class="input-field">
                  <span class="error">* <?php echo $phoneErr;?></span>

                  <select name="category" class="input-field">

                    <option value="Select category">Select category</option>
                    <option value="Beauty & spa">Hair-Cutting</option>
                    <option value="Shaving & Facial">Shaving</option>
                    <option value="Hair Color">Both</option>

                  </select>
                </div>

                <input type="date" name="date"  class="input-field date">
                <span class="error">*<?php echo $dateErr;?> </span>
               


                <textarea name="address" placeholder="Address" class="input-field"></textarea>
                <span class="error">* <?php echo $addressErr;?></span>


                <button type="submit" name="submit" value="Submit" class="form-btn">
                  <span class="span">Appointment Now</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </button>

              </form>

            </div>

            <figure class="card-banner img-holder" style="--width: 250; --height: 774;">
              <img src="./assets/images/appoin-banner-2.jpg" width="250" height="774" loading="lazy" alt=""
                class="img-cover">
            </figure>

          </div>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer has-bg-image" style="background-image: url('./assets/images/footer-bg.png')">
    <div class="container">

      <div class="footer-top">

        <div class="footer-brand">

          <a href="#" class="logo">
            A-ONE
            <span class="span">Hair Salon</span>
          </a>

          <form action="" class="input-wrapper">

            <input type="email" name="email_address" placeholder="Enter Your Email" required class="email-field">

            <button type="submit" class="btn has-before">
              <span class="span">Subscribe Now</span>

              <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
            </button>

          </form>

        </div>

        <div class="footer-link-box">

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Quick Links</p>
            </li>

            <li>
              <a href="#" class="footer-link has-before">Our Services</a>
            </li>

            <li>
              <a href="#" class="footer-link has-before">Our Portfolio</a>
            </li>

          </ul>

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Services</p>
            </li>

            <li>
              <a href="#" class="footer-link has-before">Hair Cutting</a>
            </li>

            <li>
              <a href="#" class="footer-link has-before">Shaving & Design</a>
            </li>

          </ul>

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Recent News</p>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder" style="--width: 70; --height: 75;">
                  <img src="./assets/images/footer-blog-1.jpg" width="70" height="75" loading="lazy"
                    alt="The beginners guide to Henna Brows in Brisbane" class="img-cover">
                </figure>

                <div class="card-content">
                  <h3>
                    <a href="#" class="card-title">The beginners guide to Henna Brows in Brisbane</a>
                  </h3>

                  <div class="card-date">
                    <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                    <time datetime="2022-08-25">25 August 2022</time>
                  </div>
                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder" style="--width: 70; --height: 75;">
                  <img src="./assets/images/footer-blog-2.jpg" width="70" height="75" loading="lazy"
                    alt="How do I get rid of unwanted hair on my face?" class="img-cover">
                </figure>

                <div class="card-content">
                  <h3>
                    <a href="#" class="card-title">How do I get rid of unwanted hair on my face?</a>
                  </h3>

                  <div class="card-date">
                    <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                    <time datetime="2022-08-25">25 August 2022</time>
                  </div>
                </div>

              </div>
            </li>

          </ul>

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Contact Us</p>
            </li>

            <li class="footer-list-item">
              <ion-icon name="location-outline" aria-hidden="true"></ion-icon>

              <address class="contact-link">
                Brampton, ON
              </address>
            </li>

            <li class="footer-list-item">
              <ion-icon name="call-outline" aria-hidden="true"></ion-icon>

              <a href="tel:+0123456789" class="contact-link">+1 437 878 4563</a>
            </li>

            <li class="footer-list-item">
              <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

              <span class="contact-link">MON - SUN, 08 am - 09 pm</span>
            </li>

            <li class="footer-list-item">
              <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
              <a href="mailto:gauravpadsala63@gmail.com" class="contact-link">gauravpadsala63@gmail.com</a>
            </li>

          </ul>

        </div> 

      </div>

      <div class="footer-bottom">
        <p class="copyright">
          &copy; 2024 <a href="#" class="copyright-link">GauravPadsala</a>. All Rights Reserved.
        </p>
      </div>

    </div>
  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>