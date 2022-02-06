<!DOCTYPE html>
<html>
    <head>
        <?php 
            require("components/init_session.php");
            
        ?>
        <!--- Ordinary Information -->
        <title>Student | Logga in</title>
        <link rel="icon" href="bilder/mössa.jpg">
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
        <link rel="stylesheet" href="css/login_style.css">

    </head>
    <body>
        <div class="container-fluid px-0">
            <div class="d-flex background align-items-center">
                <div class="card my-4 text-center mx-auto">
                    <div class="card-header pt-4">
                        <h2 id="card-header-text">Felicias Student</h2>
                    </div>
                    <div class="card-body">
                        <form action="login_dbcon.php" method="POST">
                            <div class="row">
                                <div class="col py-3">
                                    <label class="my-1 mr-2 float-left" for="email">E-Post</label>
                                    <input type="email" class="form-control" name="email" id="email" required="required" placeholder="...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3">
                                    <label class="my-1 mr-2 float-left" for="password">Lösenord</label>
                                    <input type="password" class="form-control" name="password" id="password" required="required" placeholder="...">
                                </div>
                            </div>
                            <p>Notera: Du kommer endast att loggas ut när webbläsaren stängs ner.</p>
                            <button type="submit" name="submit" class="btn btn-primary px-2 py-2 mt-4">Logga in</button>
                            <a id="forgot-password" class="my-3" href="#">Jag har glömt mitt lösenord</a>

                            <!--- Handle any error -->
                            <?php 
                                include("components/check_error.php");
                                $code = getCode($CODES);
                                
                                switch($code) {
                                    // Possible scenarios.
                                    case $ERROR_QUERY_FAILED:
                                        echo "<p style='color: red' class='my-3'>Något gick fel. Vänligen försök igen eller kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a></p>";
                                        break;
                                    case $ERROR_USER_DOES_NOT_EXIST:
                                        echo "<p style='color: red' class='my-3'>Den angivna e-posten existerar inte i databasen.</p>";
                                        break;
                                    case $ERROR_WRONG_PASSWORD:
                                        echo "<p style='color: red' class='my-3'>Fel lösenord.</p>";
                                        break;
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>