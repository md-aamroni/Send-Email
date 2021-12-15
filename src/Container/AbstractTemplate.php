<?php

namespace Adecoder\SendEmail\Container;

class AbstractTemplate
{
   private static array $instance = [];

   private ?string $name = null;
   private ?string $logo = null;
   private ?string $link = null;
   private ?string $company = null;
   private ?string $address = null;
   private ?string $established = null;
   private ?string $facebookPageName = null;
   private ?string $twitterPageName = null;
   private ?string $linkedinPageName = null;
   private ?string $youtubePageName = null;
   private ?string $instagramPageName = null;

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
      if (!isset(self::$instance[get_called_class()])) {
         return self::$instance[get_called_class()] = new static();
      }
      return self::$instance[get_called_class()];
   }

   public function getName(): string|null
   {
      return $this->name;
   }

   public function setName(string $name): object
   {
      $this->name = $name;
      return $this;
   }

   public function getLogo(): string|null
   {
      return $this->logo;
   }

   public function setLogo(string $logo): object
   {
      $this->logo = $logo;
      return $this;
   }

   public function getLink(): string|null
   {
      return $this->link;
   }

   public function setLink(string $link): object
   {
      $this->link = $link;
      return $this;
   }

   public function getCompany(): string|null
   {
      return $this->company;
   }

   public function setCompany(string $company): object
   {
      $this->company = $company;
      return $this;
   }

   public function getAddress(): string|null
   {
      return $this->address;
   }

   public function setAddress(string $address): object
   {
      $this->address = $address;
      return $this;
   }

   public function getEstablished(): string|null
   {
      return $this->established;
   }

   public function setEstablished(string $established): object
   {
      $this->established = $established;
      return $this;
   }

   public function getFacebookPageName(): string|null
   {
      return $this->facebookPageName;
   }

   public function setFacebookPageName(string $facebookPageName): object
   {
      $this->facebookPageName = sprintf('https://facebook.com/%s', $facebookPageName);
      return $this;
   }

   public function getTwitterPageName(): string|null
   {
      return $this->twitterPageName;
   }

   public function setTwitterPageName(string $twitterPageName): object
   {
      $this->twitterPageName = sprintf('https://twitter.com/%s', $twitterPageName);
      return $this;
   }

   public function getLinkedinPageName(): string|null
   {
      return $this->linkedinPageName;
   }

   public function setLinkedinPageName(string $linkedinPageName): object
   {
      $this->linkedinPageName = sprintf('https://www.linkedin.com/%s', $linkedinPageName);
      return $this;
   }

   public function getYoutubePageName(): string|null
   {
      return $this->youtubePageName;
   }

   public function setYoutubePageName(string $youtubePageName): object
   {
      $this->youtubePageName = sprintf('https://youtube.com/%s', $youtubePageName);
      return $this;
   }

   public function getInstagramPageName(): string|null
   {
      return $this->instagramPageName;
   }

   public function setInstagramPageName(string $instagramPageName): object
   {
      $this->instagramPageName = sprintf('https://instagram.com/%s', $instagramPageName);
      return $this;
   }
}
