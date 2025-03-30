<?php

namespace Solidarity\Transaction\Filter;

use Doctrine\ORM\EntityManagerInterface;
use Laminas\Filter\ToInt;
use Skeletor\Core\Filter\FilterInterface;
use Skeletor\User\Service\Session;
use Volnix\CSRF\CSRF;
use Laminas\I18n\Filter\Alnum;
use Skeletor\Core\Validator\ValidatorException;
class Transaction implements FilterInterface
{

    public function __construct(private \Solidarity\Transaction\Validator\Transaction $validator)
    {
    }

    public function getErrors()
    {
        return $this->validator->getMessages();
    }

    public function filter($postData): array
    {
        $alnum = new Alnum(true);
        $int = new ToInt();

        $data = [
            'id' => (isset($postData['id'])) ? $int->filter($postData['id']) : null,
            'name' => $postData['name'],
            'accountNumber' => $postData['accountNumber'],
            'email' => $postData['email'],
            'amount' => $postData['amount'],
            'comment' => $postData['comment'],
            'status' => $postData['status'],
            'round' => $postData['round'],
            'archived' => $postData['archived'] ?? 0,
//            'createdAt' => $postData['createdAt'],
//            'updatedAt' => $postData['updatedAt'],
//            CSRF::TOKEN_NAME => $postData[CSRF::TOKEN_NAME],
        ];
        if (!$this->validator->isValid($data)) {
            throw new ValidatorException();
        }
        unset($data[CSRF::TOKEN_NAME]);

        return $data;
    }

}