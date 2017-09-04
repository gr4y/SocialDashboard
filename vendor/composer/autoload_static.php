<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6f4e4108b7a43c2ef46756ec5ec88937
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
        '13b5355d873bc8402507c98de3ba47c6' => __DIR__ . '/../..' . '/lib/config.php',
        '00d2825a126da5113b77839cd20878f7' => __DIR__ . '/../..' . '/lib/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Whoops\\' => 7,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\HttpFoundation\\' => 33,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Whoops\\' => 
        array (
            0 => __DIR__ . '/..' . '/filp/whoops/src/Whoops',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\HttpFoundation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/http-foundation',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
    );

    public static $fallbackDirsPsr0 = array (
        0 => __DIR__ . '/../..' . '/app/models',
    );

    public static $classMap = array (
        'IdiormMethodMissingException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormResultSet' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormString' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormStringException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'Model' => __DIR__ . '/..' . '/j4mie/paris/paris.php',
        'ORM' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'ORMWrapper' => __DIR__ . '/..' . '/j4mie/paris/paris.php',
        'ParisMethodMissingException' => __DIR__ . '/..' . '/j4mie/paris/paris.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6f4e4108b7a43c2ef46756ec5ec88937::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6f4e4108b7a43c2ef46756ec5ec88937::$prefixDirsPsr4;
            $loader->fallbackDirsPsr0 = ComposerStaticInit6f4e4108b7a43c2ef46756ec5ec88937::$fallbackDirsPsr0;
            $loader->classMap = ComposerStaticInit6f4e4108b7a43c2ef46756ec5ec88937::$classMap;

        }, null, ClassLoader::class);
    }
}
