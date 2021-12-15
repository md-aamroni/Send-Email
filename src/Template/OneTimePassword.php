<?php 

namespace Adecoder\SendEmail\Template;

use Adecoder\SendEmail\Container\AbstractTemplate;

class OneTimePassword extends AbstractTemplate
{
   public function generate()
   {
      return <<<EOD
      <!DOCTYPE html>
      <html lang="en">
         <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>{$this->getName()}</title>
            <style>
            @import url(https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap);@import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css);*{margin:0;padding:0;box-sizing:border-box}body{background:#F2F3F7;display:flex;align-items:center;height:100vh;font-family:'Roboto',sans-serif}.template{width:600px;margin:0 auto}.template-lg{width:800px;margin:0 auto}.template-body{background:#fff;padding:1.5rem 2rem;color:#6A757C}.template-body img{width:180px}.template-body h1{line-height:48px;font-size:28px;font-style:normal;font-weight:700;color:#6A757C;text-align:left;margin:1.5rem 0}.template-body p{margin:0;line-height:24px;font-size:16px}.template-body a{text-decoration:none;color:#fff;font-size:14px;border-style:solid;border-color:#6A757C;padding:10px 25px 10px 25px;display:inline-block;background:#6A757C;border-radius:4px;font-weight:700;line-height:17px;width:auto;text-align:center;margin-top:1.5rem}.template-body a:hover{background:#6a757cd5}.template-footer{padding:1.5rem 2rem;background:#F2F3F7;display:flex;flex-direction:column;align-items:center}.template-footer img{width:150px}.verifaction-code{padding:1rem;background:#f2f3f7;border-radius:4px;font-size:1.4rem!important;margin:1.5rem 0!important;font-weight:900}.template-footer p{margin:0;line-height:24px;color:#2f1c6a;font-size:14px}.social-icon i{margin:10px;color:#444;font-size:1.2rem}.invoice-header{display:flex;justify-content:space-between}.invoice-info{text-align:end}.invoice-footer{width:190px;margin-left:auto;margin-top:1rem;text-align:end}table,td,th{border-bottom:1px solid #f2f2f2;text-align:center;padding:.5rem}tr:nth-child(odd){background-color:#f2f2f2}table{width:100%;border-collapse:collapse;margin-top:1.5rem}
            </style>
         </head>
         <body>
            <section class="template">
               <div class="template-body">
               <img src="{$this->getLogo()}" alt="{$this->getCompany()}">
               <h1>Verify Email Address</h1>
               <p>
                  Thank you for joining {$this->getCompany()} click the button below to confirm 
                  that this is correct email to reach you.
               </p>
               <a href="{$this->getLink()}">{$this->getName()}</a>
               </div>
               <div class="template-footer">
                  <div class="social-icon">
                     <a href="{$this->getFacebookPageName()}"><i class="fab fa-facebook"></i></a>
                     <a href="{$this->getTwitterPageName()}"> <i class="fab fa-twitter"></i></a>
                     <a href="{$this->getYoutubePageName()}"> <i class="fab fa-youtube"></i></a>
                     <a href="{$this->getInstagramPageName()}"> <i class="fab fa-instagram-square"></i></a>
                     <a href="{$this->getLinkedinPageName()}"> <i class="fab fa-linkedin-in"></i></a>
                  </div>
                  <p>Copyright &copy; {$this->getEstablished()} {$this->getCompany()}</p>
                  <p>{$this->getAddress()}</p>
               </div>
            </section>
         </body>
      </html>
      EOD;
   }
}