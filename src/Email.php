<?php

namespace Adecoder\SendEmail;

use Adecoder\SendEmail\Container\ClientInterface;
use Adecoder\SendEmail\Container\RequestContent;

class Email
{
   private static ?Email $instance;

   private final function __construct()
   {
      // @todo: skip codding
   }

   private function __clone()
   {
      // @todo: skip codding
   }

   public final function __wakeup()
   {
      throw new \Exception("Cannot unserialize singleton");
   }

   public static function instance()
   {
      if (!isset(self::$instance)) {
         return self::$instance = new Email();
      }
      return self::$instance;
   }

   public function client(ClientInterface $interact, $callback)
   {
      $this->client = new $interact();
      $this->client->content = new RequestContent();
      if (is_callable($callback)) {
         call_user_func($callback, $this->client->content);
      }
      return $this->client;
   }
}
