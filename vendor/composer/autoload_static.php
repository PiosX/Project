<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2863d80dafeda3eb664fc8412ce9ffb0
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Classes',
        ),
    );

    public static $classMap = array (
        'Classes\\Config\\Dbh' => __DIR__ . '/../..' . '/App/Classes/Config/dbh_connection.php',
        'Classes\\Controller\\UsersContr' => __DIR__ . '/../..' . '/App/Classes/Controller/userscontr.php',
        'Classes\\Model\\Users' => __DIR__ . '/../..' . '/App/Classes/Model/users.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2863d80dafeda3eb664fc8412ce9ffb0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2863d80dafeda3eb664fc8412ce9ffb0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2863d80dafeda3eb664fc8412ce9ffb0::$classMap;

        }, null, ClassLoader::class);
    }
}
