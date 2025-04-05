<?php


$number = '325930070541411060';
//$number = '3259300705414110';


$accNumber = str_replace([' ', '-'], '', $number);
$accNumber = str_replace('O', '0', $accNumber);
$validatedNumber = mod97_2($accNumber);
//var_dump(substr($accNumber, -2));
//var_dump(substr($validatedNumber, -2));
var_dump(mod97(substr($accNumber, 0, -2)));
var_dump(mod97(substr($validatedNumber, 0, -2)));
die();


function mod97(string $accountNumber, int $base = 100) : int
{
    $controlNumber = 0;
    for ($x = strlen($accountNumber)-1; !($x < 0); $x--) {
        $num = (int)$accountNumber[$x];
        $controlNumber = ($controlNumber + ($base * $num)) % 97;
        $base = ($base * 10) % 97;
    }

    return 98 - $controlNumber;
}


function mod97_2($accountNumber) {
    $form_input = $accountNumber;
    $snum = "";
    $sstr = strtoupper($form_input);

    for ($x = 0; $x < strlen($sstr); $x++) {
        $c = ord($sstr[$x]); // Get the ASCII value of the character

        if ($c >= 65 && $c <= 90) { // A-Z
            $snum .= ($c - 55);
        } elseif ($c >= 48 && $c <= 57) { // 0-9
            $snum .= ($c - 48);
        } elseif ($c != 45 && $c != 32) { // Not '-' or 'space'
//            return 0;
                echo "Pogresan karakter " . $sstr[$x] . " na poziciji " . ($x + 1);
                return 1;
        }
    }

    return $snum;
}