<?php
if (!empty($_GET['imgurl'])) {
    $imgurl1= $_GET['imgurl'];
$queryUrl = "http://api.kairos.com/detect";
$imageObject = '{"image":"'.$_GET['imgurl'].'"}';
$APP_ID = "c73b7d69";
$APP_KEY = "b944d41b59fe1c9eea928fb0691f6b9a";
$request = curl_init($queryUrl);
// set curl options
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request,CURLOPT_POSTFIELDS, $imageObject);
curl_setopt($request, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json',
        'app_id:' . $APP_ID,
        'app_key:' . $APP_KEY
    )
);
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($request);

//$json_en= json_encode($response);
// show the API response
$response_array = json_decode($response);
 if($response_array->images[0]->faces[0]->attributes->gender->type == "M")
 {
   $gender="MALE";
 }
 else
 {
   $gender="FEMALE";
 }

 if($response_array->images[0]->faces[0]->attributes->asian > $response_array->images[0]->faces[0]->attributes->black and $response_array->images[0]->faces[0]->attributes->asian > $response_array->images[0]->faces[0]->attributes->white)
 {
   $et="Asian";
 }
 elseif($response_array->images[0]->faces[0]->attributes->black > $response_array->images[0]->faces[0]->attributes->white)
 {
   $et="Black";
 }
 else
 {
  $et = "White";
 }
// close the session
curl_close($request);


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.kairos.com/v2/media?source=".$_GET['imgurl']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "app_id: c73b7d69",
  "app_key: b944d41b59fe1c9eea928fb0691f6b9a"
));

$emotion = curl_exec($ch);

$emotion_array = json_decode($emotion);

if(emotion != false){

if($emotion_array->frames[0]->people[0]->emotions->anger > $emotion_array->frames[0]->people[0]->emotions->disgust and $emotion_array->frames[0]->people[0]->emotions->anger > $emotion_array->frames[0]->people[0]->emotions->fear and $emotion_array->frames[0]->people[0]->emotions->anger > $emotion_array->frames[0]->people[0]->emotions->joy and $emotion_array->frames[0]->people[0]->emotions->anger > $emotion_array->frames[0]->people[0]->emotions->sadness and $emotion_array->frames[0]->people[0]->emotions->anger > $emotion_array->frames[0]->people[0]->emotions->suprise )
 {
   $final_emotion="Emotion";
 }
 elseif($emotion_array->frames[0]->people[0]->emotions->disgust > $emotion_array->frames[0]->people[0]->emotions->fear and $emotion_array->frames[0]->people[0]->emotions->disgust > $emotion_array->frames[0]->people[0]->emotions->joy and $emotion_array->frames[0]->people[0]->emotions->disgust > $emotion_array->frames[0]->people[0]->emotions->sadness and $emotion_array->frames[0]->people[0]->emotions->disgust > $emotion_array->frames[0]->people[0]->emotions->suprise)
{
  $final_emotion="Disgust";

}
elseif($emotion_array->frames[0]->people[0]->emotions->fear > $emotion_array->frames[0]->people[0]->emotions->joy and $emotion_array->frames[0]->people[0]->emotions->fear > $emotion_array->frames[0]->people[0]->emotions->sadness and $emotion_array->frames[0]->people[0]->emotions->fear > $emotion_array->frames[0]->people[0]->emotions->suprise)
{
  $final_emotion="Fear";

}
elseif($emotion_array->frames[0]->people[0]->emotions->joy > $emotion_array->frames[0]->people[0]->emotions->sadness and $emotion_array->frames[0]->people[0]->emotions->joy > $emotion_array->frames[0]->people[0]->emotions->suprise)
{
  $final_emotion="Joy";

}
elseif($emotion_array->frames[0]->people[0]->emotions->sadness > $emotion_array->frames[0]->people[0]->emotions->suprise)
{
  $final_emotion="Sadness";

}
else
{
  $final_emotion="Suprise";

}
}
else{
  $final_emotion="Null";

}
 curl_close($ch);



}
?>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Freelancer - Start Bootstrap Theme</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">FACE_X</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Detect</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="img/first.png" alt="Welcome to FACE_X" width="2200" height="600">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">FACE_X</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Age - Gender - Emotion - Ethnicity</p>

    </div>
  </header>

  <?php
            if (!empty($_GET['imgurl'])) {
  echo'              
  <!-- About Section -->

  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">RESULTS</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      

      <div class="row">
      <div class="col-lg-4 ml-auto">
           
      <p class="lead1" >      AGE : ' . $response_array->images[0]->faces[0]->attributes->age . '<br><br>    GENDER : ' .$gender. '<br><br>   EMOTION : '  .$final_emotion. '<br><br> ETHNICITY : '. $et . '</p>

         
    </div>
    <div class="col-lg-4 mr-auto">
    <!--<p class="lead">-- <br><br> -- <br><br> -- <br><br> --</p>-->
     </div>
     </div>

    </div>
  </section>';
}
?>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Select any one</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row">

        <!-- Portfolio Item 1 -->
        <div class="col-md-4 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/cabin.png" alt="">
          </div>
        </div>

        <!-- Portfolio Item 2 -->
        <div class="col-md-4 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/cake.png" alt="">
          </div>
        </div>
       <!-- Portfolio Item 3 -->
       <div class="col-md-6 col-lg-4">
        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
          <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
            <div class="portfolio-item-caption-content text-center text-white">
              <i class="fas fa-plus fa-3x"></i>
            </div>
          </div>
          <img class="img-fluid" src="img/portfolio/circus.png" alt="">
        </div>
      </div>

        

      </div>
      <!-- /.row -->

    </div>
  </section>



  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Name</label>
                <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email Address</label>
                <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Phone Number</label>
                <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Message</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">NO:01,Sengundhar st
            <br>Orleanpet, Puducherry-05.</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">FACE_X is used to detect various features of face created by
            <a href="http://startbootstrap.com">SIVA SANKAR</a>.</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Portfolio Modals -->

  <!-- Portfolio Modal 1 -->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">WEB IMAGE</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/portfolio/cabin.png" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Upload Realtime image from webcam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 2 -->
  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">IMAGE UPLOAD</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/portfolio/cake.png" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Provide url for image.</p>
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <label>URL_IMAGE</label>
                    <form action="" method="get">
                    <input class="form-control" name="imgurl" id="URL_IMAGE" type="text" placeholder="URL" >
                    <button class="btn btn-primary" type="submit">Submit</button>
</form>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <!-- Portfolio Modal 3 -->
 <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-labelledby="portfolioModal3Label" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">
          <i class="fas fa-times"></i>
        </span>
      </button>
      <div class="modal-body text-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <!-- Portfolio Modal - Title -->
              <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">VIDEO UPLOAD</h2>
              <!-- Icon Divider -->
              <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                  <i class="fas fa-star"></i>
                </div>
                <div class="divider-custom-line"></div>
              </div>
              <!-- Portfolio Modal - Image -->
              <img class="img-fluid rounded mb-5" src="img/portfolio/circus.png" alt="">
              <!-- Portfolio Modal - Text -->
              <p class="mb-5">Provide url for video.</p>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>URL_VIDEO</label>
                  <input class="form-control" id="URL_VIDEO" type="text" placeholder="URL" >
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <button class="btn btn-primary" href="#" data-dismiss="modal">
                <i class="fas fa-times fa-fw"></i>
                Close Window
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>

</html>

<?
echo "Hello, ".$Fname." ".$Lname.".<br />";
?>