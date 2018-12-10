<?php
//si c'est bien la méthode add 
if(!empty($_POST["doItAnakin"])){
    $inputRaw = array("doItAnakin" => FILTER_SANITIZE_STRING);
    $input = filter_input_array(INPUT_POST, $inputRaw);
    //sanatisation
    $TEST = file_get_contents("js/test.json");
    $testphp = json_decode($TEST, true);
    //permet de décortiquer le json en array php
    array_push($testphp, $input);
    //premier argument = là ou tu met les infos
    //deuxième = ce que tu push ici l'input de la personne 
    $testphpJson = json_encode($testphp);
    //recrée un json à partir du tableau
    file_put_contents("js/test.json",$testphpJson);
    //modifier le contenu du fichier test.json contenu dans le dossier js et cela va mettre le contenu de la vrabile $testphpJson       
    }
else{
    echo("<h2>Somethings wrong</h2>");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Just Do It</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="css/materialize.css">
</head>
<body>
    <div class="row">
        <div class="col s4 push-s4 row bg-color formuDiv">
            <div>
                <h3 class="CenterText">To-Do List</h3>
            </div>
            <form action="index.php" method="POST">
                <div class="row">
                    <div class="input-field col s8 push-s2">
                        <textarea value="Bonsoir" class="materialize-textarea" name="doItAnakin" id="doItAnakin"></textarea>
                    </div>
                </div>
                <div class="row">
                    <button class="green col s4 push-s4 waves-effect waves-light btn" name="button" value="a" type="submit"> 
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="js/formu.js"></script>
</html>


