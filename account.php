<?php 
    //Require a session and ensure that the visitor is logged in.
    require("forbidden/init_session.php"); 
    require("forbidden/check_login.php");
    redirectIfNotLoggedIn("account.php");
?>

<!DOCTYPE html>
<html lang="sv">
    <head>
        <title>Student | Mitt Konto</title>
        <link rel="icon" href="images/mössa.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="En sida dedikerad till Felicia Björneklints student 2022">
        <meta name="author" content="Liam Andersson">
        <?php require("forbidden/required_imports.php") ?>
        <!-- Contact specific links / scripts -->
        <link rel="stylesheet" href="css/account_style.css">
        <link rel="stylesheet" href="css/fade_in.css">

    </head>
    <body>
       
        <!-- Header -->
        <?php 
            require("forbidden/header.php"); 
            require("forbidden/check_error.php");
            
            //If the user is newly logged in / registered we want to show a green header at the top.
            require("forbidden/login_register_animation.php");
        ?>
        <main>
            <!--- Main body --->
            <div class="container-fluid px-0">
                <section>
                    <!-- Three images at the top -->
                    <div class="row align-self-center wrapper">
                        
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
                    <div class="col-12 mt-5 text-center">
                        <h1 id="page-header">Mitt Konto</h1>
                        <h4 class="page-info mt-4">
                            Välkommen!
                        </h4>
                        <h5 class="page-info mt-2 pb-5">
                            Här har du möjlighet att ändra information gällande ditt konto samt 
                            ta bort eventuella markerade presenter.
                        </h5>
                        <a href="login_system/logout.php" id="logout">Jag vill logga ut. </a>
                    </div>

                </section>

                <!-- Account information section -->
                <section>
                    <div class="card my-5 text-center mx-auto">
                    <div class="card-header text-center pt-4">
                            <h2 id="card-header-text">Dina Uppgifter</h2>
                        </div>
                        <div class="card-body">
                            <form action="account_dbcon.php" method="POST">
                                <!-- Hidden input, We have to keep track of what form is submitted on the page -->
                                <input type="hidden" name="form-id" id="form-id" value="ACCOUNT-INFORMATION">

                                <div class="row">
                                    <div class="col py-2">
                                        <label class="my-1 mr-2 float-left" for="firstname">Förnamn</label>
                                        <!--- The onkeydown event makes sure that "Space" is not pressed --->
                                        <input type="text" onkeydown="if(['Space'].includes(arguments[0].code)){return false;}" class="form-control" name="firstname" id="firstname" required="required" value="<?php print($_SESSION["firstName"]); ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col py-2">
                                        <label class="my-1 mr-2 float-left" for="lastname">Efternamn</label>
                                        <!--- The onkeydown event makes sure that "Space" is not pressed --->
                                        <input type="text" onkeydown="if(['Space'].includes(arguments[0].code)){return false;}" class="form-control" name="lastname" id="lastname" required="required" value="<?php print($_SESSION["lastName"]); ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col py-2">
                                        <label class="my-1 mr-2 float-left" for="email">E-Post</label>
                                        <!--- The onkeydown event makes sure that "Space" is not pressed --->
                                        <input type="email" onkeydown="if(['Space'].includes(arguments[0].code)){return false;}" class="form-control" name="email" id="email" required="required" value="<?php print($_SESSION["email"]); ?>">
                                    </div>
                                </div>
                                
                                <button type="submit" name="submit" id="submit" class="btn btn-primary px-2 mx-auto py-2 mt-4">Ändra Uppgifter</button>
                                <a id="forgot-password" name="forgot-password" class="my-3" href="login_system/forgot_password.php">Har du glömt ditt lösenord?</a>
                            </form>
                        </div>
                    </div>
                </section>
                
                <!--- Gift section -->
                <section>
                    <div class="card mx-auto mt-5">
                        <div class="card-header text-center pt-4">
                            <h2 id="card-header-text">Dina Presenter</h2>
                        </div>
                        <div class="card-body">
                            <form action="account_dbcon.php" method="POST">  
                                <!--- Print the gifts that the user has "selected" on wishlist.php. --->
                                <?php
                                   
                                    require("forbidden/db_connection.php");
                                    //Select all Gifts that the current  Guest has selected. 
                                    $email = $_SESSION["email"];
                                    $get_gifts = "SELECT name FROM Gift JOIN Guest ON Gift.guest_id = Guest.id WHERE Gift.taken = 1 AND Guest.email = '$email'";

                                    if($result = mysqli_query($link,$get_gifts)) {
                                        if(mysqli_num_rows($result) > 0) {
                                            while($rows = mysqli_fetch_array($result)) {
                                                //Get the values
                                                $name = $rows["name"];
                                       
                                                print("<div class='form-group'>
                                                            <div class='col py-3 ml-3 float-left'>
                                                                <input class='form-check-input' type='checkbox' value='$name' name='gift[]' id='$name'>
                                                                <label class='form-check-label' for='$name'>
                                                                    $name
                                                                </label>
                                                            </div>
                                                        </div>"
                                                );
                                                
                                            }
                                        }
                                        else {
                                            print("<p class='text-center'>Du har inte valt några presenter ännu. Se <a style='color: rgb(1, 15, 212);' href='wishlist.php#gift-form'>Önskelista</a>");
                                        }

                                        mysqli_free_result($result);
                                    }
                                    else {
                                        //Query failed
                                        $_SESSION["code"] = $ERROR_UNKNOWN;

                                        //This error is handled below.
                                    }
                                
                                ?>
                                <input type="hidden" name="form-id" id="form-id" value="GIFT-INFORMATION">
                                <button type="submit" name="submit" id="submit"class="btn btn-primary mx-auto py-2 mt-4">Ta bort valda presenter</button>
                            
                                <!--- Handle any error -->
                                <?php 
                                
                                    $code = getCode($CODES);
                                
                                    switch($code) {
                                        // Possible scenarios.
                                        case $ERROR_UNKNOWN:
                                            echo "<p style='color: red' class='my-3 text-center'>Något gick fel. Vänligen försök igen eller kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a></p>";
                                            break;
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </section>
                
                <!--- Admin Sections -->
                <!--- We include a separate admin page, because it would be quite messy otherwise. -->
                <?php
                    if($_SESSION["admin"])
                        include("admin.php");
                ?>


            </div>
        </main>

        <!-- FOOTER -->
        <?php require("forbidden/footer.php"); ?>
    </body>
</html>