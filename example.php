<?php

require_once __DIR__ . '/vendor/autoload.php';

use Adecoder\SendEmail\Container\RequestContent;
use Adecoder\SendEmail\Email;
use Adecoder\SendEmail\Services\Admin;
use Adecoder\SendEmail\Services\Support;
use Adecoder\SendEmail\Template\OneTimePassword;
use Adecoder\SendEmail\Container\AbstractTemplate;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// $test1 = Email::instance()->client(interact: new Admin(), callback: function (RequestContent $req) {
//    $req->setSubject('subject 1');
//    $req->setContent('this is a mail content 1');
// });



// print_r($test1);
// print_r($test2);


$otp = OneTimePassword::instance()
   ->setName(name: 'Email Verification')
   ->setLogo(logo: 'https://i.postimg.cc/8znCWLDY/brand-logo.png')
   ->setLink(link: 'https://google.com')
   ->setCompany(company: 'Guideasy Ltd.')
   ->setEstablished(established: date('Y'))
   ->setAddress(address: '11th Floor, Tropical Alauddin Tower, Rajlaxmi, Uttara, Dhaka')
   ->setFacebookPageName(facebookPageName: 'guideasy')
   ->setInstagramPageName(instagramPageName: 'guideasy')
   ->generate();

$support = new Support();
$support->resolve(callback: function (RequestContent $req) {
   $req->setSubject('this support');
   $req->setContent('this is a mail content 2');
})->send(title: 'Email Verification', content: $otp, to: 'johny.ice10@gmail.com');
