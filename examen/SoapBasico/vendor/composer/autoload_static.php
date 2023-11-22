<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4bc8edcf0900690016a8025a46a89f42
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sergi\\Unidad6\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sergi\\Unidad6\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit4bc8edcf0900690016a8025a46a89f42::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4bc8edcf0900690016a8025a46a89f42::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4bc8edcf0900690016a8025a46a89f42::$classMap;

        }, null, ClassLoader::class);
    }
}
