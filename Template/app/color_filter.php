      <div class="dropdown filters">
        <i class="fa fa-caret-down"></i> <a href="#" class="dropdown-menu"><?= t('Color coding') ?></a>
        <ul class="color_filter">
          <li class="color_filter"><div class="color-color_filter"><a href="#" class="filter-helper" data-filter="status:open"><?= t('Reset filters') ?></a></div></li>
        <?php foreach ($this->task->colors->getColors(isset($project)?$project['id']:0) as $color_id => $color_name): ?>
          <li class="color_filter"><div class="color-color_filter color-<?= $color_id ?>"><a href="#" class="filter-helper" data-filter='color:"<?= $this->text->e($color_id) ?>"'><?= $this->text->e($color_name) ?></a>&nbsp;|&nbsp;<a href="#" class="filter-helper" data-append-filter='color:"<?= $this->text->e($color_id) ?>"'><?= t('append') ?></a></div></li>
        <?php endforeach ?>
        </ul>
      </div>
