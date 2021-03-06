<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita713f38ab543a7f986862d294b83617f
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
            $loader->prefixLengthsPsr4 = ComposerStaticInita713f38ab543a7f986862d294b83617f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita713f38ab543a7f986862d294b83617f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita713f38ab543a7f986862d294b83617f::$classMap;

        }, null, ClassLoader::class);
    }
}
