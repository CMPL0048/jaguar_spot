<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Translate Widget
    |--------------------------------------------------------------------------
    |
    | Enable or disable the client-side Google Translate widget and configure
    | the default page language and which languages to include. The widget
    | will only be injected into the base layout if `enabled` is true.
    |
    */

    'enabled' => env('GOOGLE_TRANSLATE_WIDGET', false),

    // The source language of your site (blade will output this to the widget)
    'page_language' => env('APP_LOCALE', 'es'),

    // Comma-separated language codes to include in the widget (eg. 'en,es')
    'included_languages' => env('GOOGLE_TRANSLATE_LANGUAGES', 'en,es'),
];

