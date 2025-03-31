<?php

namespace Solidarity\Delegate\Filter;

use Laminas\Filter\ToInt;
use Skeletor\Core\Filter\FilterInterface;
use Volnix\CSRF\CSRF;
use Skeletor\Core\Validator\ValidatorException;

class Delegate implements FilterInterface
{

    public function __construct(
        private \Solidarity\Delegate\Validator\Delegate $validator,
        private \Solidarity\Transliterator\Service\Transliterator $transliter
    )
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
            'name' => $this->transliter->transliterate($postData['name']),
            'email' => $postData['email'],
            'city' => $this->transliter->transliterate($postData['city']),
            'phone' => $postData['phone'],
            'verifiedBy' => isset($postData['verifiedBy'])
                ? $this->transliter->transliterate($postData['verifiedBy'])
                : '',
            'count' => $postData['count'],
            'formLinkSent' => (isset($postData['formLinkSent'])) ? $postData['formLinkSent'] : 0,
            'countBlocking' => $postData['countBlocking'],
            'schoolType' => $this->transliter->transliterate($postData['schoolType']),
            'schoolName' => $this->transliter->transliterate($postData['schoolName']),
            'comment' => $this->transliter->transliterate($postData['comment']),
            'status' => (isset($postData['status'])) ? $postData['status'] : 1,
//            'createdAt' => $postData['createdAt'],
//            'updatedAt' => $postData['updatedAt'],
            CSRF::TOKEN_NAME => $postData[CSRF::TOKEN_NAME],
        ];
        if (!$this->validator->isValid($data)) {
            throw new ValidatorException();
        }
        unset($data[CSRF::TOKEN_NAME]);

        return $data;
    }

}
