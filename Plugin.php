<?php

namespace Kanboard\Plugin\Color_filter;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{
    public function initialize()
    {

        $this->template->hook->attach('template:app:filters_helper:after', 'color_filter:app/color_filter');
# patched core files
        $this->template->setTemplateOverride('task/color_picker', 'color_filter:task/color_picker');
        $this->template->setTemplateOverride('app/filters_helper', 'color_filter:app/filters_helper');
        $this->template->setTemplateOverride('app/overview', 'color_filter:app/overview');
        $this->template->setTemplateOverride('project/filters', 'color_filter:project/filters');
        $this->template->setTemplateOverride('search/index', 'color_filter:search/index');
####################
        $this->hook->on('template:layout:css', 'plugins/Color_filter/css/style.css');
        $this->on('app.bootstrap', function($container) {
            Translator::load($container['config']->getCurrentLanguage(), __DIR__.'/Locale');
        });

    $this->projectAccessMap->add('colors', '*', Role::PROJECT_MANAGER);
    $this->template->hook->attach('template:project:sidebar', 'color_filter:project/sidebar');
    }

    public function getClasses()
    {
        return array(
            'Plugin\Color_filter\Model' => array(
                'Colors',
                'Colors_helper',
            )
        );
    }

    public function getPluginName()
    {
        return 'Color Filter';
    }

    public function getPluginDescription()
    {
        return t('Add color filter to board view');
    }

    public function getPluginAuthor()
    {
        return 'Martin Middeke';
    }

    public function getPluginVersion()
    {
        return '1.0.2';
    }
}