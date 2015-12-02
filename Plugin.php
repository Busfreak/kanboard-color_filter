<?php

namespace Kanboard\Plugin\Color_filter;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {

        $this->template->hook->attach('template:project:header:after', 'color_filter:project/filters');
        $this->template->setTemplateOverride('task/color_picker', 'color_filter:task/color_picker');
        $this->hook->on('template:layout:css', 'plugins/Color_filter/css/style.css');
        $this->on('session.bootstrap', function($container) {
            Translator::load($container['config']->getCurrentLanguage(), __DIR__.'/Locale');
        });
    }

    public function getPluginName()
    {
        return 'Color Filter';
    }

    public function getPluginDescription()
    {
        return t('Legende f&uuml;r Zentrumsfarbe zum Board hinzuf&uuml;gen');
    }

    public function getPluginAuthor()
    {
        return 'Martin Middeke';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }
}
