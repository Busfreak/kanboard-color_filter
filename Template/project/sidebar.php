        <li <?= $this->app->checkMenuSelection('colorsController', 'index') ?>>
            <?= $this->url->link(t('Color Settings'), 'colorsController', 'index', array('plugin' => 'color_filter', 'project_id' => $project['id'])) ?>
        </li>