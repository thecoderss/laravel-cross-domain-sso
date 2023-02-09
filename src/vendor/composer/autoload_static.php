<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1301a6c0d62216b48eac0a5160f4a2ec
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tcoders\\TokenLogin\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tcoders\\TokenLogin\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit1301a6c0d62216b48eac0a5160f4a2ec::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1301a6c0d62216b48eac0a5160f4a2ec::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1301a6c0d62216b48eac0a5160f4a2ec::$classMap;

        }, null, ClassLoader::class);
    }
}
