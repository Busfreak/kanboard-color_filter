<div class="dropdown">
    <a href="#" class="dropdown-menu dropdown-menu-link-icon" title="<?= t('Color coding') ?>"><i class="fa fa-paint-brush fa-fw"></i><i class="fa fa-caret-down"></i></a>
    <ul>
        <li><a href="#" class="filter-helper filter-reset" data-filter="status:open"><?= t('Reset filters') ?></a></li>
        <?php foreach ($this->ColorsHelper->getColors(isset($project)?$project['id']:0) as $color_id => $color_name): ?>
        <li class="color_filter"><div class="color-picker-square color-<?= $color_id ?>"></div><div class="color-picker-label"><a href="#" class="filter-helper" data-filter='color:"<?= $this->text->e($color_id) ?>"'><?= $this->text->e($color_name) ?></a>&nbsp;|&nbsp;<a href="#" class="filter-helper" data-append-filter='color:"<?= $this->text->e($color_id) ?>"'><?= t('append') ?></a></div></li>
        <?php endforeach ?>
    </ul>
</div>
