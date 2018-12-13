<?php

//si c'est bien la méthode add 
if(!empty($_POST["doItAnakin"])){
    $inputRaw = $_POST["doItAnakin"];
    $input = trim(filter_var($inputRaw, FILTER_SANITIZE_STRING));
    //sanatisation
    if(!empty($input)){ // si l'input n'est pas nul l'intégrer
        $TEST = file_get_contents("js/test.json");
        $testphp = json_decode($TEST, true);
        echo(count($testphp)); //////////////////////////DEBUG//////////////////////////
        //permet de décortiquer le json en array php
        $inputToDo = ["ID" => count($testphp), "ToDo" => $input, "status" => "enCours"];
        //méga-important ; crée un tableau avec 2 clé et 2 value
        array_push($testphp, $inputToDo);
        //premier argument = là ou tu met les infos
        //deuxième = ce que tu push ici l'input de la personne 

        ///////////////
        //SWITCH ETAT//
        ///////////////
            foreach($_POST["yolo"] as $value){
                echo($value["ToDo"]);
            }


        $phpArray = $testphp; 

        $testphpJson = json_encode($phpArray, JSON_FORCE_OBJECT);
        //recrée un json à partir du tableau
        file_put_contents("js/test.json",$testphpJson);
        //modifier le contenu du fichier test.json contenu dans le dossier js et cela va mettre le contenu de la variable $testphpJson 
    }    
}   

if(($_POST["buttonReset"] == "a")){ //vérifie que la valeur arbitraire du button est tjs bien fixé à "a"
    $empty = '{}';
    file_put_contents("js/test.json",$empty);
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
        <div class="col s6 push-s3 row bg-color formuDiv">
            <div>
                <h3 class="CenterText">To-Do List</h3>
            </div>
            <div class="row">
                <h4 id="demo"></h4>
            </div>
            <form method="POST">
            <div class="row CenterText">
                <?php $i = 0;//setup du compteur i ?>
                <?php foreach ($phpArray as $value) : ?> <!--Boucle sur tout le tableau contenant les données-->
                    <?php if ($value['status'] == "enCours"): ?> <!--Si le statue de l'objectif est enCours l'affiche-->
                    <h5>tâche = <?php echo($value['ToDo']); echo(" ID = ".$value['ID']); ?> </h5>
                    <p>
                        <label>
                            <input name="yolo" value=<?php echo($i); $i++; ?> type="checkbox"/>
                            <span></span>
                        </label>
                    </p>
                    <?php endif; ?>
                <?php  endforeach; ?>
            </div>
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
                <div class="row">
                    <button class="red col s4 push-s4    waves-effect waves-light btn" name="buttonReset" value="a" type="submit"> 
                        Supprimer
                    </button>
                </div>
            </form>
        <div>
            <h4 class="CenterText">Historique</h4>
            <?php foreach ($testphp as $value) : ?> <!--Boucle sur tout le tableau contenant les données-->
                <?php if ($value['status'] == "fini"): ?> <!--Si le statue de l'objectif est à true l'affiche-->
                    <h5>tâche = <?php echo($value['ToDo']) ?> </h5>
                <?php endif; ?>
            <?php  endforeach; ?>
        </div>
        </div>
    </div>
</body>

<script>
function DoIt() {
    let xhttp = new XMLHttpRequest();
    //crée une variable requête
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) { //condition vérifiant si connexion est établi
        document.getElementById("demo").innerHTML = this.responseText;
        let jsonTest = this.responseText;
        console.log(jsonTest[0]);
    }
};
    xhttp.open("GET", "js/test.json", true);
    xhttp.send();
}
//DoIt();
</script>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="js/formu.js"></script>
</html>


