<!DOCTYPE html>
<html lang="sv">
    <head>
        <?php 
            require($_SERVER['DOCUMENT_ROOT']."/forbidden/init_session.php");

            if(!isset($_SESSION["verification"]) && !$_SESSION["verification"]) {
                header("Location: forgot_password.php");
                exit;
            }

        ?>
        <!--- Ordinary Information -->
        <title>Student | Glömt Lösenord Verifikation</title>
        <link rel="icon" href="../images/mössa.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="En sida dedikerad till Felicia Björneklints student 2022">
        <meta name="author" content="Liam Andersson">

        <!--- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <!--- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <!-- CSS file -->
        <link rel="stylesheet" href="../css/forgot_password_verification_style.css">

    </head>
    <body>
        <div class="container-fluid px-0">
            <div class="d-flex background align-items-center">
                <div class="card my-4 text-center mx-auto">
                    <div class="card-header pt-4">
                        <h2 id="card-header-text">Bekräftelse</h2>
                    </div>
                    <div class="card-body">
                        <form action="forgot_password_verification_dbcon.php" method="POST">
                            <div class="row">
                                <div class="col py-3">
                                    <label class="my-1 mr-2 float-left" for="verificationCode">Verifikationskod</label>
                                    <input type="text" class="form-control"  style="text-transform:uppercase" onkeydown="if(['Space'].includes(arguments[0].code)){return false;}" name="verificationCode" id="verificationCode" required="required" placeholder="...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3">
                                    <label class="my-1 mr-2 float-left" for="password">Nytt lösenord</label>
                                    <input type="password" class="form-control" onkeydown="if(['Space'].includes(arguments[0].code)){return false;}" name="password" id="password" required="required" placeholder="...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3">
                                    <label class="my-1 mr-2 float-left" for="confirmPassword">Upprepa lösenord</label>
                                    <input type="password" class="form-control" onkeydown="if(['Space'].includes(arguments[0].code)){return false;}" name="confirmPassword" id="confirmPassword" required="required" placeholder="...">
                                </div>
                            </div>
                            <p> Om verifikationskoden stämmer så kommer vi att byta ditt lösenord till det du angav ovan. Annars kommer inget att ske.</p>
                            <button type="submit" name="submit" class="btn btn-primary px-2 py-2 mt-4">Skicka</button>

                            <!--- Handle any error -->
                            <?php 
                                include($_SERVER['DOCUMENT_ROOT']."/forbidden/check_error.php");
                                $code = getCode($CODES);
                                
                                switch($code) {
                                    // Possible scenarios.
                                    case $ERROR_UNKNOWN:
                                        echo "<p style='color: red' class='my-3'>Något gick fel. Vänligen försök igen eller kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a></p>";
                                        break;
                                    case $ERROR_WRONG_PASSWORD:
                                        echo "<p style='color: red' class='my-3'>Dina lösenord matchar inte! Vänligen försök igen. </p>";
                                        break;
                                    case $ERROR_WRONG_CODE:
                                        echo "<p style='color: red' class='my-3'>Verifikationskoden var felaktig. Vänligen försök igen.</p>";
                                        break;
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>