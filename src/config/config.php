<?php

return [
  'model_field' => env('CROSS_DOMAIN_MODEL_FIELD', 'token'),
  'webhook_url' => env('CROSS_DOMAIN_WEBHOOK_URL', 'cross-domain-verification'),
  'url_token_field' => env('CROSS_DOMAIN_TOKEN_FIELD', 'token'),
];