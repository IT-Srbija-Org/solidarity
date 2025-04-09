<?php

namespace Solidarity\Delegate\Validator;

use Laminas\Validator\EmailAddress;
use Skeletor\Core\Validator\ValidatorInterface;
use Volnix\CSRF\CSRF;

/**
 * Class Client.
 * User validator.
 *
 * @package Fakture\Client\Validator
 */
class Delegate implements ValidatorInterface
{

    /**
     * @var CSRF
     */
    private $csrf;

    private $delegateRepository;

    private $messages = [];

    /**
     * User constructor.
     *
     * @param CSRF $csrf
     */
    public function __construct(CSRF $csrf, \Solidarity\Delegate\Repository\DelegateRepository $delegateRepository)
    {
        $this->csrf               = $csrf;
        $this->delegateRepository = $delegateRepository;
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
        if (!$emailValidator->isValid($data['email'])) {
            $this->messages['general'][] = 'Uneta email adresa nije ispravna.' . $data['email'];
            $valid = false;
        }

        if (!isset($data['id'])) {
            $existingDelegates = $this->delegateRepository->fetchAll([
                'schoolName' => $data['schoolName'],
                'schoolType' => $data['schoolType'],
                'city' => $data['city'],
            ]);
            if (count($existingDelegates) > 0) {
                if ($existingDelegates[0]->email !== $data['email']) {
                    $this->messages['email'][] = 'Mesto delegata za vašu školu je zauzeto.';
                } else {
                    $this->messages['email'][] = 'Već ste prijavljeni na mrežu solidarnosti.';
                }
                $valid = false;
            }
        }

//        if (!$this->csrf->validate($data)) {
//            $this->messages['general'][] = 'Stranica je istekla, probajte ponovo.';
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
