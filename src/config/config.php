<?php

return [
  // Databse used for user model 
  'model_connection' => env('CROSS_DOMAIN_MODEL_CONNECTION', 'mysql'),

  // Model field where token exist 
  'model_field' => env('CROSS_DOMAIN_MODEL_FIELD', 'token'),

  // Custom secret url structure to call authorization function 
  'webhook_url' => env('CROSS_DOMAIN_WEBHOOK_URL', 'cross-domain-verification'),

  // Url param of token to read from 
  'url_token_field' => env('CROSS_DOMAIN_TOKEN_FIELD', 'token'),
];