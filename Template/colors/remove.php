<div class="page-header">
    <h2><?= t('Remove custom Colorname') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info"><?= t('Do you really want to remove this custom Colorname (%s) for "%s"?', $color_name, $color_id) ?></p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'colors', 'remove', array('plugin' => 'color_filter', 'project_id' => $project['id'], 'color_id' => $color_id), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'colors', 'index', array('plugin' => 'color_filter', 'project_id' => $project['id'])) ?>
    </div>
</div>