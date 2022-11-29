<?php
/*
Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
-----
Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale 
(composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php
-----
Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale
-----
Milestone 3
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
-----
Milestone 4 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente 
(es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
*/

session_start();
include __DIR__ . '/variables.php';
include __DIR__ . '/functions.php';



genPassword($char, $charKeys, $password);
$_SESSION['password'] = $password;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Password Generator</title>
</head>

<body>

    <div class="w-50 m-auto container">
        <form action="index.php" method="POST">
            <div class="row my-5">
                <div class="input col-9">
                    <label for="length" class="me-5">Quanti caratteri deve contenere la tua password?</label>
                    <input type="number" class="py-2 px-4 rounded-pill w-auto" name="length" id="length" min="1"
                        step="1">
                </div>
                <button type="submit" class="col-1 offset-1 btn bg-secondary fw-bold text-white">Invia</button>

            </div>

            <div class="row">
                <div class="col-2 offset-10">
                    <input type="checkbox" name="charKeys[]" id="charType1" value="alph" checked>
                    <label for="charType1">Lettere</label>
                </div>
                <div class="col-2 offset-10">
                    <input type="checkbox" name="charKeys[]" id="charType2" value="num" checked>
                    <label for="charType2">Numeri</label>
                </div>
                <div class="col-2 offset-10">
                    <input type="checkbox" name="charKeys[]" id="charType3" value="symb" checked>
                    <label for="charType3">Simboli</label>
                </div>
            </div>
            <div class="row">
                <div class="col-4">Vuoi che si ripetano i caratteri?</div>
                <div class="col-1">
                    <input type="radio" name="repetitive" id="repetitive1" checked value="true">
                    <label for="repetitive1">Si</label>
                </div>
                <div class="col-1">
                    <input type="radio" name="repetitive" id="repetitive1" value="false">
                    <label for="repetitive2">No</label>
                </div>

            </div>

        </form>
    </div>
</body>

</html>