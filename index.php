<?php 
  //Require a session and ensure that the visitor is logged in.
  require("forbidden/init_session.php");
  require("forbidden/check_login.php");
  redirectIfNotLoggedIn("index.php");
?>

<!DOCTYPE html>
<html lang="sv">
    <head>
        <!--- Ordinary Information -->
        <title>Student | Start</title>
        <link rel="icon" href="images/mössa.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="En sida dedikerad till X student 2022">
        <meta name="author" content="Liam Andersson">
        
        <?php require("forbidden/required_imports.php"); ?>
        <!--- Index specific links / scripts -->
        <link rel="stylesheet" href="css/index_style.css">
        <link rel="stylesheet" href="css/fade_in.css">
        <script src="js/index.js"></script>
        
    </head>
    <body>
        <!--- Header -->
        <?php  
          require("forbidden/header.php"); 
          require("forbidden/check_error.php");
          
          //If the user is newly logged in / registered we want to show a green header at the top.
          require("forbidden/login_register_animation.php");
          
        ?>

        <!-- Main body -->
        <main>
          <div class="container-fluid px-0">
            <section>
              <!-- Three images at the top -->
              <div class="row align-self-center wrapper">

                  <div class="countdown-wrapper align-self-center">
                    <h1 id="countdown">13 </h1>
                    <h2 id="countdown-text">DAGAR KVAR TILL STUDENTEN</h2>
                  </div>
                  
                  <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4" id="left-image"></div>
                  
                  <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4" id="middle-image"></div>
                  
                  <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4" id="right-image"></div>


                  <!-- Thank you ShadeDivider [https://www.shapedivider.app/] for providing this tool. -->
                  <div class="custom-shape-divider-bottom-1644017640">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                    </svg>
                  </div>
              </div>
            </section>

            <section>
              <!-- Big text -->
              <div class="row">
                <div class="col-12">
                  <div class="big-text-wrapper">
                    <h2 id="welcome-text">VÄLKOMMEN TILL MIN</h1>
                    <h1 class="student-text">STUDENT!</h1>

                    <div class="text-information">
                      <h2 id="date">Fredagen den 17 Juni 2022</h3>
                      <h3 id="utspring">Utspring: Lars Kaggskolan</h4>
                      <h3 id="fika">Firande & Mat: Kristianvägen 3</h4>
                      <p id="ytterligare_info">OSA senast 1:a Juni på <a href="examination.php#examForm">Studentdagen.</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </main>
        
        <!-- FOOTER -->
        <?php require("forbidden/footer.php"); ?>

    </body>
    

</html>