<div class="page-header">
    <h2><?= t('Edit custom color') ?></h2>
</div>

<form method="post" action="<?= $this->url->href('colors', 'save', array('plugin' => 'color_filter', 'project_id' => $project['id'])) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('color_id', $values) ?>

    <?= $this->form->label(t('Systemcolor'), 'systemcolor') ?>

    <div class="color color-<?= $values['color_id'] ?>">
        <?= $values['color_id'] ?>
    </div>
    <?= $this->form->label(t('Systemlabel'), 'systemlabel') ?>
    <div class="color color-<?= $values['color_id'] ?>">
        <?= t($color_name) ?>
    </div>

    <?= $this->form->label(t('Project label'), 'projectcolorname ') ?>
    <?= $this->form->text('projectcolorname', $values, $errors, array('maxlength="100"')) ?>
    <?= $this->form->checkbox('projectuse', t('Don\'t use in project'), 1,  $values['projectuse'] == 1) ?>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue">
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'colors', 'index', array('plugin' => 'color_filter', 'project_id' => $project['id'])) ?>
    </div>
</form>