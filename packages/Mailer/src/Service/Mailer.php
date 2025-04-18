<?php
namespace Solidarity\Mailer\Service;

use Laminas\Config\Config;
use Laminas\Mail\Message;
use Laminas\Mail\Transport\TransportInterface;
use Laminas\Mime\Message as MimeMessage;
use Laminas\Mime\Mime;
use Laminas\Mime\Part;
use League\Plates\Engine;
use MailerSend\Helpers\Builder\Attachment;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\MailerSend;
use Monolog\LogRecord;
use Psr\Log\LoggerInterface as Logger;

class Mailer extends \Skeletor\Core\Mailer\Service\Mailer
{
    public function __construct(MailerSend $mail, Config $config, Engine $template)
    {
        parent::__construct($mail, $config, $template);
    }

    public function sendTransactionListToDelegate($email, $listPath)
    {
        $body = $this->render('transactionList', []);
        $recipients = [
            new Recipient($email, $email),
        ];
        $emailParams = (new \MailerSend\Helpers\Builder\EmailParams())
            ->setFrom('delegati@mrezasolidarnosti.org')
            ->setFromName('Mreža solidarnosti')
            ->setRecipients($recipients)
            ->setSubject('Nerealizovane isplate za 1. deo februara')
            ->setHtml($body)
            ->setReplyTo('delegati@mrezasolidarnosti.org')
            ->setReplyToName('Mreža solidarnosti')
            ->setAttachments([new Attachment(file_get_contents($listPath), basename($listPath))]);

        $this->send($emailParams);
    }

    public function sendRoundStartMailToDelegate($email)
    {
        $body = $this->render('roundStart', []);
        $recipients = [
            new Recipient($email, $email),
        ];
        $uputstvoPath = DATA_PATH .'/Uputstvo-prijava-2.-deo-februar.pdf';
        $emailParams = (new \MailerSend\Helpers\Builder\EmailParams())
            ->setFrom('delegati@mrezasolidarnosti.org')
            ->setFromName('Mreža solidarnosti')
            ->setRecipients($recipients)
            ->setSubject('Prijava oštećenih, 2. deo februar')
            ->setHtml($body)
            ->setReplyTo('delegati@mrezasolidarnosti.org')
            ->setReplyToName('Mreža solidarnosti')
            ->setAttachments([new Attachment(file_get_contents($uputstvoPath), 'Uputstvo prijava 2. deo februar.pdf')]);

        $this->send($emailParams);
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
            ->setReplyTo('delegati@mrezasolidarnosti.org')
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
            ->setReplyTo('donatori@mrezasolidarnosti.org')
            ->setReplyToName('Mreža solidarnosti');

        $this->send($emailParams);
    }

    public function sendForgotPasswordMail($email, $token, $displayName, $userId)
    {
        $recipients = [
            new Recipient($email, $email),
        ];
        $token = sprintf('$%s$%s', $userId, $token);
        $resetUrl = sprintf('%s/login/resetPasswordForm/%s/', $this->config->offsetGet('adminUrl'), $token);
        $body = $this->render('forgotPassword', [
            'displayName' => $displayName,
            'resetUrl' => $resetUrl,
            'baseUrl' => $this->config->offsetGet('baseUrl')
        ]);
        $emailParams = (new \MailerSend\Helpers\Builder\EmailParams())
            ->setFrom('info+no-reply@mrezasolidarnosti.org')
            ->setFromName('Mreža solidarnosti')
            ->setRecipients($recipients)
            ->setSubject('Potvrda promene lozinke za Mrežu solidarnosti')
            ->setHtml($body)
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

    public function handleApplicationError(LogRecord $record)
    {
        $body = $record->message . PHP_EOL .
            $record->channel . PHP_EOL .
            $record->datetime->format('y/m/d H:i:s') . PHP_EOL .
            $record->level->getName() . PHP_EOL;
        $recipients = [];
        foreach ($this->config->mailer->recipients->errorNotice as $targetMail) {
            $recipients[] = new Recipient($targetMail, $targetMail);
        }
        $emailParams = (new \MailerSend\Helpers\Builder\EmailParams())
            ->setFrom('info+no-reply@mrezasolidarnosti.org')
            ->setFromName('Mreža solidarnosti')
            ->setRecipients($recipients)
            ->setSubject(sprintf('%s application error !', $this->config->offsetGet('appName')))
            ->setHtml($body)
            ->setReplyToName('Mreža solidarnosti');
        $this->send($emailParams);

        return true;
    }

}