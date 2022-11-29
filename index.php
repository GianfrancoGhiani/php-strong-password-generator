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


$char = [
    'alph' => 'abcdefghijlmnopqrstuvwyxz',
    'num' => '01234456789',
    'symb' => '$%&@#+*-_.:,;!?=',
];
$charKeys = [
    'alph',
    'num',
    'symb'
];
$password = '';

function genPassword($char, $charKeys, &$password)
{
    $length = (isset($_POST['length'])) ? ($_POST['length']) : '';

    if (!empty($length) && $length >= 1) {
        for ($i = 0; $i < $length; $i++) {
            $itemKey = $charKeys[rand(0, 2)];
            if ($itemKey == 'alph') {
                $passwordItem = $char[$itemKey][rand(0, (strlen($char[$itemKey]) - 1))];
                $password .= rand(0, 1) ? (strtoupper($passwordItem)) : $passwordItem;
            } else {
                $password .= $char[$itemKey][rand(0, (strlen($char[$itemKey]) - 1))];
            }
        }

    }

}
;
genPassword($char, $charKeys, $password);
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

    <form action="index.php" class="d-flex align-items-center my-3 justify-content-around w-50 m-auto" method="POST">

        <div>
            <label for="length">Quanti caratteri deve contenere la tua password?</label>
            <input type="number" class="p-2" name="length" id="length" min="1" step="1">
        </div>
        <button type="submit" class="btn bg-secondary fw-bold text-white">Invia</button>
    </form>
    <p>
        <?php echo $password ?>
    </p>

</body>

</html>