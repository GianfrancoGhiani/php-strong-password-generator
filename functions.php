<?php
function genPassword($char, $charKeys, &$password)
{
    $length = (isset($_POST['length'])) ? ($_POST['length']) : '';
    $repetitive = (isset($_POST['repetitive'])) ? ($_POST['repetitive']) : '';


    if (!empty($length) && $length >= 1) {
        while (strlen($password) < $length) {
            $itemKey = $charKeys[rand(0, (count($charKeys) - 1))];
            if ($repetitive == 'true') {
                if ($itemKey == 'alph') {
                    $passwItem = $char[$itemKey][rand(0, (strlen($char[$itemKey]) - 1))];
                    $password .= rand(0, 1) ? (strtoupper($passwItem)) : $passwItem;
                } else {
                    $password .= $char[$itemKey][rand(0, (strlen($char[$itemKey]) - 1))];
                }
                if (!empty($password)) {
                    header('location:' . 'password.php');
                }
            } else {

                if ($itemKey == 'alph') {
                    $passwItem = $char[$itemKey][rand(0, (strlen($char[$itemKey]) - 1))];
                    $passwItemRandomUp = rand(0, 1) ? (strtoupper($passwItem)) : $passwItem;
                    if (!str_contains($password, $passwItemRandomUp)) {
                        $password .= $passwItemRandomUp;
                    }
                    ;
                } else {
                    $passwItem = $char[$itemKey][rand(0, (strlen($char[$itemKey]) - 1))];
                    if (!str_contains($password, $passwItem)) {
                        $password .= $passwItem;
                    }
                    ;
                }
                if (!empty($password)) {
                    header('location:' . 'password.php');
                }
            }

        }
    }

}


;
?>