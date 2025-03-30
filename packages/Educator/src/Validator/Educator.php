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
            $this->messages['general'][] = 'Uneti broj žiro računa nije ispravan.';
            $valid = false;
        }

        if (!$this->csrf->validate($data)) {
            $this->messages['general'][] = 'Stranice je istekla, probajte ponovo.';
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
        $controlNumber = $this->mod97(substr($accountNumber, 0, -2));

        return str_pad($controlNumber, 2, '0', STR_PAD_LEFT) === substr($accountNumber, -2);
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
}
