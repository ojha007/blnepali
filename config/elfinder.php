<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Upload dir
    |--------------------------------------------------------------------------
    |
    | The dir where to store the images (relative from public)
    |
    */
    'dir' => ['files'],

    /*
    |--------------------------------------------------------------------------
    | Filesystem disks (Flysytem)
    |--------------------------------------------------------------------------
    |
    | Define an array of Filesystem disks, which use Flysystem.
    | You can set extra options, example:
    |
    | 'my-disk' => [
    |        'URL' => url('to/disk'),
    |        'alias' => 'Local storage',
    |    ]
    */
    'disks' => [
        'public' => [
            'alias' => "Local Storage"
        ],
        's3' => [
            'alias' => "S3 Storage"
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Routes group config
    |--------------------------------------------------------------------------
    |
    | The default group settings for the elFinder routes.
    |
    */

    'route' => [
        'prefix' => 'elfinder',
        'middleware' => array('web', 'auth'), //Set to null to disable middleware filter
    ],

    /*
    |--------------------------------------------------------------------------
    | Access filter
    |--------------------------------------------------------------------------
    |
    | Filter callback to check the files
    |
    */

    'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess',

    /*
    |--------------------------------------------------------------------------
    | Roots
    |--------------------------------------------------------------------------
    |
    | By default, the roots file is LocalFileSystem, with the above public dir.
    | If you want custom options, you can set your own roots below.
    |
    */

    'roots' => null,

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | These options are merged, together with 'roots' and passed to the Connector.
    | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1
    |
    */
    'options' => array(
        'bind' => array(
            'upload.pre mkdir.pre mkfile.pre rename.pre archive.pre ls.pre' => array(
                'Plugin.Normalizer.cmdPreprocess'
            ),
            'upload.presave paste.copyfrom' => array(
                'Plugin.Normalizer.onUpLoadPreSave'
            ),
            'mkdir.pre mkfile.pre rename.pre' => array(
                'Plugin.Sanitizer.cmdPreprocess'
            ),
            'upload.presave' => [
                'Plugin.Sanitizer.onUpLoadPreSave',
                'Plugin.AutoResize.onUpLoadPreSave'
            ],
        ),
        'plugin' => array(
            'Sanitizer' => array(
                'enable' => true,
                'targets' => [
                    '\\', '/', ':', '*',
                    '?', '"', '<', '>', '|',
                    ' ', '(', ')',
                    '[', ']', '{', '}'
                ],
                'replace' => '-'
            ),
            'AutoResize' => [
                'enable' => true,
            ],
            'Normalizer' => array(
                'enable' => true,
                'nfc' => true,
                'nfkc' => true,
                'umlauts' => true,
                'lowercase' => true,
                'convmap' => array()
            )
        ),
    ),

    /*
    |--------------------------------------------------------------------------
    | Root Options
    |--------------------------------------------------------------------------
    |
    | These options are merged, together with every root by default.
    | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1#root-options
    |
    */
    'root_options' => array(
        'tmbURL' => '/np/.tmb',
    ),

);
