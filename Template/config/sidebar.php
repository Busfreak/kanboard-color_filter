        <li <?= $this->app->checkMenuSelection('colorsController', 'config') ?>>
            <?= $this->url->link(t('Color Settings'), 'colorsController', 'config', array('plugin' => 'color_filter')) ?>
        </li>