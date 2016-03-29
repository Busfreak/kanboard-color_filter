<form method="post" action="<?= $this->url->href('colors', 'save', array('plugin' => 'color_filter', 'project_id' => $project['id'])) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>

    <table>
        <tr>
            <th><?= t('Color') ?></th>
            <th><?= t('Application label') ?></th>
            <th><?= t('Project label') ?></th>
            <th><?= t('Don\'t use in project') ?></th>
        </tr>
        <?php foreach ($colors as $color_id => $color_names): ?>
        <tr>
            <td class="color color-<?= $color_id ?>"><?= $color_names['color_name'] ?></td>
            <td class="color color-<?= $color_id ?>"><?= $color_names['app_color'] ?></td>
            <td class="color color-<?= $color_id ?>"><?= $this->form->text($color_id, $values, $errors) ?></td>
            <td class="color color-<?= $color_id ?>"><?= $this->form->checkbox($color_id . '_hide', t('hide'), 1, $values[$color_id . '_hide']) ?></td>
       </tr>
        <?php endforeach ?>
    </table>
    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue">
    </div>
</form>