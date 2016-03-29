<form method="post" action="<?= $this->url->href('colors', 'save_config', array('plugin' => 'color_filter')) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>

    <table>
        <tr>
            <th><?= t('Color') ?></th>
            <th><?= t('Application label') ?></th>
        </tr>
        <?php foreach ($colors as $color_id => $color_name): ?>
        <tr>
            <td class="color color-<?= $color_id ?>">
        <?= $color_name ?></td>
            <td class="color color-<?= $color_id ?>"><?= $this->form->text('colors_' . $color_id, $values, $errors) ?></td>
        </tr>
        <?php endforeach ?>
    </table>
    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue">
    </div>
</form>