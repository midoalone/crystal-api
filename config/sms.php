<?php

return [

  'provider' => env('SMS_PROVIDER', 'HiSMS'),
  'username' => env('SMS_USERNAME'),
  'password' => env('SMS_PASSWORD'),
  'sender'   => env('SMS_SENDER')

];
