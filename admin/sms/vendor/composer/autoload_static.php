<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0c01d971f87d88d47f81e1328b7393fc
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0c01d971f87d88d47f81e1328b7393fc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0c01d971f87d88d47f81e1328b7393fc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
