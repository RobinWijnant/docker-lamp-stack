<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitab94bd6a1e0933664fa52a9e961aa134
{
    public static $files = array (
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitab94bd6a1e0933664fa52a9e961aa134::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitab94bd6a1e0933664fa52a9e961aa134::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
