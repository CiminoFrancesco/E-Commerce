<!DOCTYPE html>
<html>

<head>
    <title> Registrati e Entra</title>
    <link rel="stylesheet" type="text/css" href="resources/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password !== confirmPassword) {
                document.getElementById("password-error").innerHTML = "Le password non corrispondono.";
                return false;
            } else {
                document.getElementById("password-error").innerHTML = "";
                return true;
            }
        }
    </script>
</head>

<body>

    <?php
    session_start();

    if (isset($_SESSION['ErroreLogin']) && $_SESSION['ErroreLogin'] == true) {
    ?>
        <script>
            window.alert("Credenziali Errate!");
        </script>
    <?php
    }

    ?>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="Login_Methods/registrazione.php" id="registrationForm" method="post" onsubmit="return validateForm()">
                <h2 style="padding-top: 15px"> Crea un Utente</h2>
                <input type="email" id="Email" name="Email" placeholder="Email" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="text" name="cognome" placeholder="Cognome" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="password" id="confirmPassword" placeholder="Conferma Password" naeme="confirmPassword" required>
                <div id="password-error"></div>
                <button type="submit" style="margin-top:10px"> Crea Utente</button>
                <h5>Sono gi&agrave; registrato <a class="ghost" id="signIn" style="color:blue;"><u>Entra!</u></a></h5>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="Login_Methods/login.php" method="post" onsubmit="return validateForm()">
                <h2 style="padding-bottom: 15px"> Entra</h2>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button style="margin-top: 10px"> Entra...</button>
                <h5><a class="ghost" id="signUp" style="color:blue;"><u>Registrati!</u></a></h5>
            </form>

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="resources/images/img1.PNG" alt="movie-1" height="480" width="500" />

                </div>
                <div class="overlay-panel overlay-right">
                    <img src="resources/images/img2.PNG" alt="movie-2" height="480" width="500" />
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>