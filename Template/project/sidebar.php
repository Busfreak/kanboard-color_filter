        <li <?= $this->app->checkMenuSelection('colors', 'index') ?>>
            <?= $this->url->link(t('Color Settings'), 'colors', 'index', array('plugin' => 'color_filter', 'project_id' => $project['id'])) ?>
        </li>