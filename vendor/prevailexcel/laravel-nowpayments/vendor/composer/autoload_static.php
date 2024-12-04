<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf2703251081e00d290418a10a15c4757
{
    public static $files = array (
        '7c85b489815bd8b5ec4256895b1d300d' => __DIR__ . '/../..' . '/utils/helpers/nowpayments.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PrevailExcel\\Nowpayments\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PrevailExcel\\Nowpayments\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf2703251081e00d290418a10a15c4757::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf2703251081e00d290418a10a15c4757::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf2703251081e00d290418a10a15c4757::$classMap;

        }, null, ClassLoader::class);
    }
}