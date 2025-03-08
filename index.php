<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nanavaty Advocates</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Consulting Website Template Free Download" name="keywords">
    <meta content="Consulting Website Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Top Bar Start -->
    <?php 
            include 'topbar.php';
            ?>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="index.html" class="navbar-brand"><img src="img/White logo - no background.png" alt="Image"></a>
            <!-- <a href="index.html" class="navbar-brand">Confer</a> -->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php 
            include 'menu.php';
            ?>
        </div>
    </div>
    <!-- Nav Bar End -->


    <!-- Carousel Start -->
    <div class="carousel">
        <div class="container-fluid">
            <div class="owl-carousel">
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/slider/1.jpg" alt="Image">
                    </div>
                   
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/slider/2.jpg" alt="Image">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/slider/3.jpg" alt="Image">
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Video Modal Start-->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Fact Start -->
    <!-- <div class="fact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6">
                    <div class="fact-item">
                        <img src="img/icon-4.png" alt="Icon">
                        <h2>Qualified Team</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="fact-item">
                        <img src="img/icon-1.png" alt="Icon">
                        <h2>Individual Approach</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="fact-item">
                        <img src="img/icon-8.png" alt="Icon">
                        <h2>100% Success</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="fact-item">
                        <img src="img/icon-6.png" alt="Icon">
                        <h2>100% Satisfaction</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Fact Start -->


    <!-- About Start -->
    <!-- <div class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="about-img">
                        <div class="about-img-1">
                            <img src="img/about-2.jpg" alt="Image">
                        </div>
                        <div class="about-img-2">
                            <img src="img/about-1.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-header">
                        <p>Learn About Us</p>
                        <h2>25 Years Experience</h2>
                    </div>
                    <div class="about-text">
                        <p>
                            Nanavaty Advocates main purpose is to protect their client's rights with the help of law.
                            Lawyers in Ahmedabad are always on demand to fight many legal issues between people or
                            companies. They are well-known for their guidance, advice and knowledge.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- About End -->


    <!-- Service Start -->
    <div class="service">
        <div class="container">
            <!-- <div class="section-header">
                <p>Consulting Services</p>
                <h2>Our Best Consulting Services</h2>
            </div> -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <img src="img/icon-1.png" alt="Icon">
                        <h3>Goals</h3>
                        <p>
                            Responsibility of our a criminal defense lawyer is to ensure that the client receives all
                            the protections provided by the criminal code.
                        </p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <img src="img/icon-2.png" alt="Icon">
                        <h3>Plans</h3>
                        <p>
                            Our lawyers has to plan the steps starting from the bail or anticipatory bail, as the case
                            may be. The criminal lawyer has to plan the defence of the case and the nature of evidence
                            to be lead to defend the charges as alleged in the charge sheet.
                        </p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <img src="img/icon-3.png" alt="Icon">
                        <h3>Actions</h3>
                        <p>
                            Our Team will work on building a strong case for the client. This involves interviewing
                            witnesses, collecting evidence and preparing for court hearings.
                        </p>

                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <div class="service-item">
                        <img src="img/icon-4.png" alt="Icon">
                        <h3>Human Resource</h3>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasellus nec pretium ornare velit non
                        </p>
                        <a href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-item">
                        <img src="img/icon-5.png" alt="Icon">
                        <h3>Online Business</h3>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasellus nec pretium ornare velit non
                        </p>
                        <a href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-item">
                        <img src="img/icon-6.png" alt="Icon">
                        <h3>Capital Management</h3>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasellus nec pretium ornare velit non
                        </p>
                        <a href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-item">
                        <img src="img/icon-7.png" alt="Icon">
                        <h3>Business Insurance</h3>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasellus nec pretium ornare velit non
                        </p>
                        <a href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-item">
                        <img src="img/icon-8.png" alt="Icon">
                        <h3>Online Marketing</h3>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasellus nec pretium ornare velit non
                        </p>
                        <a href="">Read More</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Service End -->


  


    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="section-header">
                <p>Get In Touch</p>
                <h2>Get In Touch For Any Query</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Our Head Office</h3>
                            <p>B/307, Satyamev Complex, Opposite Gujarat High Court, Sarkhej - Gandhinagar Highway,
                                Sola, Ahmedabad, Gujarat 380060</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Call for Help</h3>
                            <p>+917927663778 </p>
                            <p>+917948559101 </p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email for Information</h3>
                            <p>info@nanavatyadvocates.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Your Name"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="Your Email"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject"
                                    required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" placeholder="Message" required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->





    <!-- Footer Start -->
    <?php include('footer.php'); ?> 
    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>