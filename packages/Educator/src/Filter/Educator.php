<?php

namespace Solidarity\Educator\Filter;

use Doctrine\ORM\EntityManagerInterface;
use Laminas\Filter\ToInt;
use Skeletor\Core\Filter\FilterInterface;
use Skeletor\User\Service\Session;
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
        $alnum = new Alnum(true);
        $int = new ToInt();

        $data = [
            'id' => (isset($postData['id'])) ? $int->filter($postData['id']) : null,
            'amount' => $int->filter($postData['amount']),
            'name' => $postData['name'],
            'schoolName' => $postData['schoolName'],
            'slipLink' => (isset($postData['slipLink'])) ? $postData['slipLink'] : '',
            'city' => $postData['city'],
            'accountNumber' => $postData['accountNumber'],
            'comment' => (isset($postData['comment'])) ? $postData['comment'] : '',
            'status' => (isset($postData['status'])) ? $postData['status'] : 1,
//            CSRF::TOKEN_NAME => $postData[CSRF::TOKEN_NAME],
        ];
        if (!$this->validator->isValid($data)) {
            throw new ValidatorException();
        }
        unset($data[CSRF::TOKEN_NAME]);

        return $data;
    }

}