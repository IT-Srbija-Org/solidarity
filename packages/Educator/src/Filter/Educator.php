<?php

namespace Solidarity\Educator\Filter;

use Doctrine\ORM\EntityManagerInterface;
use Laminas\Filter\ToInt;
use Skeletor\Core\Filter\FilterInterface;
use Skeletor\User\Service\Session;
use Turanjanin\SerbianTransliterator\Transliterator;
use Volnix\CSRF\CSRF;
use Laminas\I18n\Filter\Alnum;
use Skeletor\Core\Validator\ValidatorException;
class Educator implements FilterInterface
{

    public function __construct(private \Solidarity\Educator\Validator\Educator $validator)
    {
    }

    public function getErrors()
    {
        return $this->validator->getMessages();
    }

    public function filter($postData): array
    {
        $int = new ToInt();

        $data = [
            'id' => (isset($postData['id'])) ? $int->filter($postData['id']) : null,
            'amount' => $int->filter($postData['amount']),
            'name' => Transliterator::toLatin($postData['name']),
            'schoolName' => Transliterator::toLatin($postData['schoolName']),
            'slipLink' => (isset($postData['slipLink'])) ? $postData['slipLink'] : '',
            'city' => Transliterator::toLatin($postData['city']),
            'accountNumber' => $this->normalizeAccountNumber($postData['accountNumber']),
            'comment' => (isset($postData['comment'])) ? $postData['comment'] : '',
            'status' => (isset($postData['status'])) ? $postData['status'] : 1,
            'school' => $postData['school'],
            'createdAt' => $postData['createdAt'],
            CSRF::TOKEN_NAME => $postData[CSRF::TOKEN_NAME],
        ];
        if (!$this->validator->isValid($data)) {
            throw new ValidatorException();
        }
        unset($data[CSRF::TOKEN_NAME]);

        return $data;
    }

    /**
     * Normalize passed string into 18 digits bank account number
     *
     * @param string $accountNumber
     *
     * @return string
     */
    private function normalizeAccountNumber(string $accountNumber) : string
    {
        $numbersOnly = preg_replace('/[^0-9]/', '', $accountNumber);

        if (strlen($numbersOnly) === 18) {
            return $numbersOnly;
        }

        $parts = [
            substr($numbersOnly, 0, 3),
            substr($numbersOnly, 3, -2),
            substr($numbersOnly, -2),
        ];

        if (strlen($parts[1]) < 13) {
            $parts[1] = str_pad(
                $parts[1],
                13,
                '0',
                STR_PAD_LEFT
            );
        }

        return join('', $parts);
    }
}
