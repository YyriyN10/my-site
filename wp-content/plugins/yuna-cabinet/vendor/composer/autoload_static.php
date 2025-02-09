<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9d405032ab3060df985f85efb93cb323
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9d405032ab3060df985f85efb93cb323::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9d405032ab3060df985f85efb93cb323::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9d405032ab3060df985f85efb93cb323::$classMap;

        }, null, ClassLoader::class);
    }
}
