<?php

return [
    'email'             => env('MAIL_ADMIN'),
    'catClientEmail'    => 'Другое',
    'lastArticlesLimit' => 5,
    'adminPagination'   => 20,
    'pagination'        => 10,
    'popularTagsLimit'  => 20,
    'imageSave'         => 'images' . '/',
    'thumbsSave'        => 'images' . '/' . 'thumbs' . '/',
    'imageSize'         => [
        'width'  => 1280,
        'height' => 720
    ],
    'thumbsSize'        => [
        'width'  => 200,
        'height' => 112
    ],

];
