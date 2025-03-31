<?php
namespace Solidarity\Mailer\Service;

use Laminas\Config\Config;
use Laminas\Mail\Message;
use Laminas\Mail\Transport\TransportInterface;
use Laminas\Mime\Message as MimeMessage;
use Laminas\Mime\Mime;
use Laminas\Mime\Part;
use League\Plates\Engine;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\MailerSend;
use Psr\Log\LoggerInterface as Logger;

class Mailer extends \Skeletor\Core\Mailer\Service\Mailer
{
    public function __construct(MailerSend $mail, Config $config, Engine $template)
    {
        parent::__construct($mail, $config, $template);
    }

    public function sendDelegateRegisteredMail($email)
    {
        $body = $this->render('delegateRegistered', []);
        $recipients = [
            new Recipient($email, $email),
        ];
        $emailParams = (new \MailerSend\Helpers\Builder\EmailParams())
            ->setFrom('delegati@mrezasolidarnosti.org')
            ->setFromName('Mreža solidarnosti')
            ->setRecipients($recipients)
            ->setSubject('Potvrda registracije za delegata na Mrežu solidarnosti')
            ->setHtml($body)
            ->setReplyTo($this->config->offsetGet('mailer')->toArray()['from'])
            ->setReplyToName('Mreža solidarnosti');

        $this->send($emailParams);
    }

    public function sendDonorRegisteredMail($email)
    {
        $body = $this->render('donorRegistered', [
//            'email' => $email,
//            'baseUrl' => $this->config->offsetGet('baseUrl')
        ]);

        $recipients = [
            new Recipient($email, $email),
        ];
        $emailParams = (new \MailerSend\Helpers\Builder\EmailParams())
            ->setFrom('donatori@mrezasolidarnosti.org')
            ->setFromName('Mreža solidarnosti')
            ->setRecipients($recipients)
            ->setSubject('Potvrda registracije na Mrežu solidarnosti')
            ->setHtml($body)
            ->setReplyTo($this->config->offsetGet('mailer')->toArray()['from'])
            ->setReplyToName('Mreža solidarnosti');

        $this->send($emailParams);
    }

    protected function send($message)
    {
        try {
            $response = $this->getMail()->email->send($message);
        } catch (\Exception $e) {
//            var_dump($e->getMessage());
//            die();
//            $this->logger->log(\Monolog\Level::Error,
//                sprintf('Could not send mail %s: %s', $message->getSubject(), $e->getMessage()));
        }
    }

    public function handle(\Monolog\LogRecord $record): bool
    {
        return $this->handleApplicationError($record);
    }

}