        <li <?= $this->app->getRouterAction() === 'colors' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('Color Settings'), 'colors', 'index', array('plugin' => 'color_filter', 'project_id' => $project['id'])) ?>
        </li>