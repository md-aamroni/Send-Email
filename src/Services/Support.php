<?php

namespace Adecoder\SendEmail\Services;

use Exception;
use Adecoder\SendEmail\Container\AbstractMailer;
use Adecoder\SendEmail\Container\RequestContent;
use Adecoder\SendEmail\Container\ClientInterface;

class Support implements ClientInterface
{
   public array|object $content;

   public function __construct(
      private ?string $host = null,
      private ?string $user = null,
      private ?string $pass = null,
      private ?string $port = null,
      private ?string $name = null
   ) {
      $this->host = $_ENV['SMTP_SUPPORT_HOST'];
      $this->user = $_ENV['SMTP_SUPPORT_USER'];
      $this->pass = $_ENV['SMTP_SUPPORT_PASS'];
      $this->port = $_ENV['SMTP_SUPPORT_PORT'];
      $this->name = $_ENV['SMTP_SUPPORT_NAME'];

      $this->smtp = new AbstractMailer(host: $this->host, user: $this->user, pass: $this->pass, port: $this->port, name: $this->name);
   }

   public function resolve($callback)
   {
      $this->content = new RequestContent();
      if (is_callable($callback)) {
         call_user_func($callback, $this->content);
      }
      return $this;
   }

   public function send(string $title, string $content, string|array $to, ?string $filepath = null, ?string $filename = null, string|array $cc = null, string|array $bcc = null, bool $reply = true): string|bool
   {
      $this->smtp->contents(subject: $title, details: $content);
      $this->smtp->to(email: $to);

      if (!is_null($filepath) && !is_null($filename)) {
         $this->smtp->attached(filepath: $filepath, filename: $filename);
      }
      if (!empty($cc) || is_array($cc)) {
         $this->smtp->cc(email: $cc);
      }
      if (!empty($bcc) || is_array($bcc)) {
         $this->smtp->bcc(email: $bcc);
      }
      if (is_bool($reply) && $reply === true) {
         $this->smtp->reply();
      }

      try {
         if ($this->smtp->mail->send()) {
            $this->smtp->mail->clearAddresses();
            $this->smtp->mail->clearAttachments();
            echo 'Congrats! Email has been sent successfully';
            return true;
         }
         throw new Exception('Oops! Unable to sent email');
      } catch (\Throwable $th) {
         echo $th->getMessage();
         return false;
      }
   }
}
