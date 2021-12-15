<?php

namespace Adecoder\SendEmail\Container;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

class AbstractMailer
{
   public object $mail;

   public function __construct(
      private string $host,
      private string $user,
      private string $pass,
      private string $port,
      private string $name
   ) {
      $this->mail = new PHPMailer(true);

      if ($_ENV['APP_ENV'] !== 'production') {
         $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
      }

      $this->mail->isSMTP();
      $this->mail->Host     = $this->host;
      $this->mail->SMTPAuth = true;
      $this->mail->Username = $this->user;
      $this->mail->Password = $this->pass;
      $this->mail->Port     = $this->port;
      $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $this->mail->setFrom($this->user, $this->name);
   }

   public function contents(string $subject, string $details): object
   {
      $this->mail->isHTML(true);
      $this->mail->Subject = $subject;
      $this->mail->Body    = $details;
      $this->mail->AltBody = strip_tags($details);

      return $this;
   }

   public function attached(string $filepath, ?string $filename = 'Email Attachment'): object
   {
      $this->mail->addAttachment($filepath, $filename);
      return $this;
   }

   public function to(string|array $email): object
   {
      if (is_array($email)) {
         foreach ($email as $each) {
            $this->mail->addAddress(filter_var($each, FILTER_SANITIZE_EMAIL));
         }
      } elseif (is_string($email)) {
         $this->mail->addAddress(filter_var($email, FILTER_SANITIZE_EMAIL));
      }

      return $this;
   }

   public function cc(string|array $email): object
   {
      if (is_array($email)) {
         foreach ($email as $each) {
            $this->mail->addCC(filter_var($each, FILTER_SANITIZE_EMAIL));
         }
      } elseif (is_string($email)) {
         $this->mail->addCC(filter_var($email, FILTER_SANITIZE_EMAIL));
      }

      return $this;
   }

   public function bcc(string|array $email): object
   {
      if (is_array($email)) {
         foreach ($email as $each) {
            $this->mail->addBCC(filter_var($each, FILTER_SANITIZE_EMAIL));
         }
      } elseif (is_string($email)) {
         $this->mail->addBCC(filter_var($email, FILTER_SANITIZE_EMAIL));
      }

      return $this;
   }

   public function reply(): object
   {
      $this->mail->addReplyTo($this->user, $this->name);
      return $this;
   }
}
