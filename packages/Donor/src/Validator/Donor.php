<?php

namespace Solidarity\Donor\Validator;

use Laminas\Validator\EmailAddress;
use Skeletor\Core\Validator\ValidatorInterface;
use Volnix\CSRF\CSRF;

/**
 * Class Client.
 * User validator.
 *
 * @package Fakture\Client\Validator
 */
class Donor implements ValidatorInterface
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
        $emailValidator = new EmailAddress();
        $this->messages = [];
        if (!$emailValidator->isValid($data['email'])) {
            $this->messages['email'][] = 'Uneta email adresa nije ispravna. ' . $data['email'];
            $valid = false;
        }

//        if (!$this->csrf->validate($data)) {
//            $this->messages['general'][] = 'Stranice je istekla, probajte ponovo.';
//            $valid = false;
//        }

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
}
