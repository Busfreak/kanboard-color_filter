        <li <?= $this->app->checkMenuSelection('ColorsController', 'index') ?>>
            <?= $this->url->link(t('Color Settings'), 'ColorsController', 'index', array('plugin' => 'color_filter', 'project_id' => $project['id'])) ?>
        </li>