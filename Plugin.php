<?php

namespace Kanboard\Plugin\Color_filter;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{
    public function initialize()
    {

        $this->template->hook->attach('template:app:filters-helper:after', 'color_filter:app/color_filter');
        $this->template->hook->attach('template:config:sidebar', 'color_filter:config/sidebar');

        $this->template->setTemplateOverride('task/color_picker', 'color_filter:task/color_picker');
        $this->hook->on('template:layout:css', 'plugins/Color_filter/css/style.css');
        $this->on('app.bootstrap', function($container) {
            Translator::load($container['config']->getCurrentLanguage(), __DIR__.'/Locale');
        });

        $this->projectAccessMap->add('colors', '*', Role::PROJECT_MANAGER);
        $this->applicationAccessMap->add('colors', 'config', Role::APP_ADMIN);
        $this->template->hook->attach('template:project:sidebar', 'color_filter:project/sidebar');
    }

    public function getClasses()
    {
        return array(
            'Plugin\Color_filter\Model' => array(
                'Colors',
            )
        );
    }

    public function getHelpers()
    {
        return array(
            'Plugin\Color_filter\Helper' => array(
                'ColorsHelper'
            )
        );
    }

    public function getPluginName()
    {
        return 'Color Filter';
    }

    public function getPluginDescription()
    {
        return t('Add color filter to board view and dashboard');
    }

    public function getPluginAuthor()
    {
        return 'Martin Middeke';
    }

    public function getPluginVersion()
    {
        return '1.2.1';
    }

	    public function getPluginHomepage()
    {
        return 'https://github.com/Busfreak/kanboard-color_filter';
    }
}