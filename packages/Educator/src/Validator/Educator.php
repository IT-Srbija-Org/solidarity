<?php

namespace Solidarity\Educator\Validator;

use Skeletor\Core\Validator\ValidatorInterface;
use Volnix\CSRF\CSRF;

/**
 * Class Client.
 * User validator.
 *
 * @package Fakture\Client\Validator
 */
class Educator implements ValidatorInterface
{

    /**
     * @var CSRF
     */
    private $csrf;

    private $messages = [];

    /**
     * User constructor.
     *
     * @param CSRF $csrf
     */
    public function __construct(CSRF $csrf)
    {
        $this->csrf = $csrf;
    }

    /**
     * Validates provided data, and sets errors with Flash in session.
     *
     * @param $data
     *
     * @return bool
     */
    public function isValid(array $data): bool
    {
        $valid = true;

        if (!$this->validateAccountNumber($data['accountNumber'])) {
            $this->messages['accountNumber'][] = 'Uneti broj žiro računa nije ispravan.';
            $valid = false;
        }

        if (!$this->csrf->validate($data)) {
            $this->messages['general'][] = 'Stranica je istekla, probajte ponovo.';
            $valid = false;
        }

        return $valid;
    }

    /**
     * Hack used for testing
     *
     * @return string
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param string $accountNumber
     *
     * @return bool
     */
    private function validateAccountNumber(string $accountNumber) : bool
    {
        $validatedNumber = $this->mod97_2($accountNumber);
        $controlNumber = $this->mod97(substr($validatedNumber, 0,-2));

        return $controlNumber == substr($accountNumber, -2);
    }

    /**
     * @param string $accountNumber
     * @param int    $base
     *
     * @return int
     */
    private function mod97(string $accountNumber, int $base = 100) : int
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
                return 0;
//                echo "Pogresan karakter " . $sstr[$x] . " na poziciji " . ($x + 1);
            }
        }

//        return substr($snum, -2);
        return $snum;
    }
}
