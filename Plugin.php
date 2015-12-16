<?php

namespace Kanboard\Plugin\Color_filter;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {

        $this->template->hook->attach('template:app:filters_helper:after', 'color_filter:app/color_filter');
        $this->template->setTemplateOverride('task/color_picker', 'color_filter:task/color_picker');
        $this->template->setTemplateOverride('app/filters_helper', 'color_filter:app/filters_helper');
        $this->hook->on('template:layout:css', 'plugins/Color_filter/css/style.css');
        $this->on('app.bootstrap', function($container) {
            Translator::load($container['config']->getCurrentLanguage(), __DIR__.'/Locale');
        });
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