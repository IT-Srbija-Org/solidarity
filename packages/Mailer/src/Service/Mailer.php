<?php
namespace Solidarity\Mailer\Service;

use Laminas\Config\Config;
use Laminas\Mail\Message;
use Laminas\Mail\Transport\TransportInterface;
use Laminas\Mime\Message as MimeMessage;
use Laminas\Mime\Mime;
use Laminas\Mime\Part;
use Psr\Log\LoggerInterface as Logger;

class Mailer extends \Skeletor\Core\Mailer\Service\Mailer
{
    public function sendDelegateRegisteredMail($email)
    {
        $body = $this->render('delegateRegistered', []);
        $mimeMessage = new MimeMessage();
        $text = new Part();
        $text->type = Mime::TYPE_HTML;
        $text->charset = 'utf-8';
        $text->setContent($body);
        $mimeMessage->addPart($text);

        $message = (new Message())
            ->addTo($email)
            ->setFrom($this->config->offsetGet('mailer')->toArray()['from'])
            ->setSubject('Potvrda registracije za delegata na Mrežu solidarnosti')
            ->setBody($mimeMessage);
        $this->send($message);
    }

    public function sendDonorRegisteredMail($email)
    {
        $body = $this->render('donorRegistered', [
//            'email' => $email,
//            'baseUrl' => $this->config->offsetGet('baseUrl')
        ]);
        $mimeMessage = new MimeMessage();
        $text = new Part();
        $text->type = Mime::TYPE_HTML;
        $text->charset = 'utf-8';
        $text->setContent($body);
        $mimeMessage->addPart($text);

        $message = (new Message())
            ->addTo($email)
            ->setFrom($this->config->offsetGet('mailer')->toArray()['from'])
            ->setSubject('Potvrda registracije na Mrežu solidarnosti')
            ->setBody($mimeMessage);
        $this->send($message);
    }

    public function handle(\Monolog\LogRecord $record): bool
    {
        return $this->handleApplicationError($record);
    }

}