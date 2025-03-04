<?php return array(
    'root' => array(
        'name' => 'ssmason/satori-digital-build',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => null,
        'type' => 'project',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'composer/installers' => array(
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'roundcube/plugin-installer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'shama/baton' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'ssmason/satori-digital' => array(
            'pretty_version' => 'v1.0.0',
            'version' => '1.0.0.0',
            'reference' => '2ca18636d6db6ad0a23ffaa003b70f7af32b6ca3',
            'type' => 'wordpress-theme',
            'install_path' => __DIR__ . '/../../wordpress/wp-content/themes/satoridigital',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'ssmason/satori-digital-build' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => null,
            'type' => 'project',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'ssmason/tech-carousel' => array(
            'pretty_version' => 'v1.0.0',
            'version' => '1.0.0.0',
            'reference' => '6e89db22e20fc28f5f72782b5d68a3045f4fb791',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../wordpress/wp-content/plugins/tech-carousel',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
