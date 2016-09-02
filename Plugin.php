<?php

namespace Kanboard\Plugin\Color_filter;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{
    public function initialize()
    {

        // Route to global settings
        $this->route->addRoute('/settings/colors', 'ColorsController', 'config', 'color_filter');
        // Route to project settings
        $this->route->addRoute('/project/:project_id/colors', 'ColorsController', 'index', 'color_filter');
        // show color-filter drop-down
        $this->template->hook->attach('template:app:filters-helper:after', 'color_filter:app/color_filter');
        // show sidebar link in global settings
        $this->template->hook->attach('template:config:sidebar', 'color_filter:config/sidebar');
        // show sidebar link in project settings
        $this->template->hook->attach('template:project:sidebar', 'color_filter:project/sidebar');

        // include custom css
        $this->hook->on('template:layout:css', array('template' => 'plugins/Color_filter/css/style.css'));

        // set access rights
        $this->projectAccessMap->add('colors', '*', Role::PROJECT_MANAGER);
        $this->applicationAccessMap->add('colors', 'config', Role::APP_ADMIN);

    }

     public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
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
        return '1.2.3';
    }

	    public function getPluginHomepage()
    {
        return 'https://github.com/Busfreak/kanboard-color_filter';
    }
}