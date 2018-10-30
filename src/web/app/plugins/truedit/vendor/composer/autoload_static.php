<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit775dd28cb3aa1a1d4cc7d3d768c530b4
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Swagger\\Client\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Swagger\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/truedit/truedit-api-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit775dd28cb3aa1a1d4cc7d3d768c530b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit775dd28cb3aa1a1d4cc7d3d768c530b4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
