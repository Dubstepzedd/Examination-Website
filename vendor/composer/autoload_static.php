<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcb61f752dc94a463e44144906b1944f4
{
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcb61f752dc94a463e44144906b1944f4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcb61f752dc94a463e44144906b1944f4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcb61f752dc94a463e44144906b1944f4::$classMap;

        }, null, ClassLoader::class);
    }
}
