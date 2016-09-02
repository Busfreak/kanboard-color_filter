        <li <?= $this->app->checkMenuSelection('ColorsController', 'config') ?>>
            <?= $this->url->link(t('Color Settings'), 'ColorsController', 'config', array('plugin' => 'color_filter')) ?>
        </li>