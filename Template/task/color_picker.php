<div class="color-picker">
<?php foreach ($this->task->colors->getColors($values['project_id']) as $color_id => $color_name): ?>
    <div
        data-color-id="<?= $color_id ?>"
        class="color-square color-<?= $color_id ?> <?= isset($values['color_id']) && $values['color_id'] === $color_id ? 'color-square-selected' : '' ?>"
        title="<?= $this->e($color_name) ?>"><?= $this->text->e($color_name) ?>
    </div>
<?php endforeach ?>
</div>

<?= $this->form->hidden('color_id', $values) ?>