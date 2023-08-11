<?php

namespace src;

function slimConfiguration()
{

    $configuration = [
        'settings' => [
            'displayErrorDetails' => getEnv('DISPLAY_ERROR_DETAILS'),

        ],
    ];

    return new \Slim\Container($configuration);
}