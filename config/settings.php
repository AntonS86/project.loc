<?php

return [
    'email'                => env('MAIL_ADMIN'),
    'catClientEmail'       => 'Другое',
    'lastArticlesLimit'    => 5,
    'adminPagination'      => 20,
    'pagination'           => 10,
    'market_pagination'    => 20,
    'popularTagsLimit'     => 20,
    'realestates_fav'      => 'r_e_f',
    'realestates_fav_time' => 60 * 60 * 24 * 30 * 6,
    'imageSave'            => 'images' . '/',
    'thumbsSave'           => 'images' . '/' . 'thumbs' . '/',
    'imageSize'            => [
        'width'  => 1280,
        'height' => 720
    ],
    'thumbsSize'           => [
        'width'  => 200,
        'height' => 112
    ],

];
