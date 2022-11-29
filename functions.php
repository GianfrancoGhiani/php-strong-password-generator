<?php
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
    if (!empty($password)) {
        header('location:' . 'password.php');
    }
}
;
?>