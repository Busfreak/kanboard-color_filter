        <li <?= $this->app->checkMenuSelection('colors', 'config') ?>>
            <?= $this->url->link(t('Color Settings'), 'colors', 'config', array('plugin' => 'color_filter')) ?>
        </li>