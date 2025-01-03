<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit78a22536f152d8b0d8eb75cc53ea89c4
{
    public static $classMap = array (
        'Adb\\Controller\\Navcontroller' => __DIR__ . '/../..' . '/src/Controller/Navcontroller.php',
        'Adb\\Model\\Adbsoc' => __DIR__ . '/../..' . '/src/Model/Adbsoc.php',
        'Adb\\Model\\Auxx' => __DIR__ . '/../..' . '/src/Model/Auxx.php',
        'Adb\\Model\\Backlinks' => __DIR__ . '/../..' . '/src/Model/Backlinks.php',
        'Adb\\Model\\Cwthumbs' => __DIR__ . '/../..' . '/src/Model/Cwthumbs.php',
        'Adb\\Model\\Dirhandler' => __DIR__ . '/../..' . '/src/Model/Dirhandler.php',
        'Adb\\Model\\Environmentmanager' => __DIR__ . '/../..' . '/src/Model/Environmentmanager.php',
        'Adb\\Model\\Helpers' => __DIR__ . '/../..' . '/src/Model/Helpers.php',
        'Adb\\Model\\HtmlDocFoot' => __DIR__ . '/../..' . '/src/Model/Htmldocfoot.php',
        'Adb\\Model\\Htmldochead' => __DIR__ . '/../..' . '/src/Model/Htmldochead.php',
        'Adb\\Model\\Iframe' => __DIR__ . '/../..' . '/src/Model/Iframe.php',
        'Adb\\Model\\Jsonconfigmanager' => __DIR__ . '/../..' . '/src/Model/Jsonconfigmanager.php',
        'Adb\\Model\\Localsites' => __DIR__ . '/../..' . '/src/Model/Localsites.php',
        'Adb\\Model\\Navfactor' => __DIR__ . '/../..' . '/src/Model/Navfactor.php',
        'Adb\\Model\\Navmodel' => __DIR__ . '/../..' . '/src/Model/Navmodel.php',
        'Adb\\Model\\Navsubfactor' => __DIR__ . '/../..' . '/src/Model/Navsubfactor.php',
        'Adb\\Model\\Urlprocessor' => __DIR__ . '/../..' . '/src/Model/Urlprocessor.php',
        'Adb\\View\\Navview' => __DIR__ . '/../..' . '/src/View/Navview.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'P2u2\\Controller\\Evalpath' => __DIR__ . '/../..' . '/src/Controller/Evalpath.php',
        'P2u2\\Model\\Environment' => __DIR__ . '/../..' . '/src/Model/Environment.php',
        'P2u2\\Model\\Evalpath' => __DIR__ . '/../..' . '/src/Model/Evalpath.php',
        'P2u2\\Model\\Functions' => __DIR__ . '/../..' . '/src/Model/Functions.php',
        'P2u2\\Model\\Newmethod' => __DIR__ . '/../..' . '/src/Model/Newmethod.php',
        'P2u2\\Model\\P2u2' => __DIR__ . '/../..' . '/src/Model/P2u2.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit78a22536f152d8b0d8eb75cc53ea89c4::$classMap;

        }, null, ClassLoader::class);
    }
}
