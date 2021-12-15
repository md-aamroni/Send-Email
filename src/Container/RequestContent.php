<?php 

namespace Adecoder\SendEmail\Container;

class RequestContent
{
   private ?string $subject;
   private ?string $content;
   
   /**
    * Get the value of subject
    */ 
   public function getSubject()
   {
      return $this->subject;
   }

   /**
    * Set the value of subject
    *
    * @return  self
    */ 
   public function setSubject($subject)
   {
      $this->subject = $subject;

      return $this;
   }

   /**
    * Get the value of content
    */ 
   public function getContent()
   {
      return $this->content;
   }

   /**
    * Set the value of content
    *
    * @return  self
    */ 
   public function setContent($content)
   {
      $this->content = $content;

      return $this;
   }
}