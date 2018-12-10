<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Just Do It</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div class="row">
        <div class="col s4 push-s4 row bg-color formuDiv">
            <div>
                <h3 style="text-align : center">To-Do List</h3>
            </div>
            <form action="php/formu.php" method="POST" class="col s10 offset-s1">
                <div class="row">
                    <div class="input-field col s8 push-s2">
                        <textarea value="Bonsoir" class="materialize-textarea" name="message" id="message"><?php if(isset($_SESSION["message"])){echo($_SESSION["message"]);} ?></textarea>
                        <label for="message">Un message à nous transmettre ?</label>
                        <p class="redy"><?php if(isset($_SESSION["ErrorMessage"])){echo($_SESSION["ErrorMessage"]);} ?></p>
                    </div>
                </div>
                <div class="row">
                    <button class="green col s4 push-s4 waves-effect waves-light btn" type="submit"> 
                        Enregistrer
                    </button>
                </div>
            </form>
            <div class="video-container">
                <iframe width="860" height="480" src="https://www.youtube.com/watch?v=5-sfG8BV8wU" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</body>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="js/formu.js"></script>
</html>


