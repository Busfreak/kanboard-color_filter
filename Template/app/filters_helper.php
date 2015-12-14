<div class="dropdown filters">
    <i class="fa fa-caret-down"></i> <a href="#" class="dropdown-menu"><?= t('Filters') ?></a>
    <ul>
        <li><a href="#" class="filter-helper filter-reset" data-filter="<?= isset($reset) ? $reset : '' ?>" title="<?= t('Keyboard shortcut: "%s"', 'r') ?>"><?= t('Reset filters') ?></a></li>
        <li><a href="#" class="filter-helper" data-filter="status:open assignee:me"><?= t('My tasks') ?></a></li>
        <li><a href="#" class="filter-helper" data-filter="status:open assignee:me due:tomorrow"><?= t('My tasks due tomorrow') ?></a></li>
        <li><a href="#" class="filter-helper" data-filter="status:open due:today"><?= t('Tasks due today') ?></a></li>
        <li><a href="#" class="filter-helper" data-filter="status:open due:tomorrow"><?= t('Tasks due tomorrow') ?></a></li>
        <li><a href="#" class="filter-helper" data-filter="status:open due:yesterday"><?= t('Tasks due yesterday') ?></a></li>
        <li><a href="#" class="filter-helper" data-filter="status:closed"><?= t('Closed tasks') ?></a></li>
        <li><a href="#" class="filter-helper" data-filter="status:open"><?= t('Open tasks') ?></a></li>
        <li><a href="#" class="filter-helper" data-filter="status:open assignee:nobody"><?= t('Not assigned') ?></a></li>
        <li><a href="#" class="filter-helper" data-filter="status:open category:none"><?= t('No category') ?></a></li>
        <li>
            <?= $this->url->doc(t('View advanced search syntax'), 'search') ?>
        </li>
    </ul>
</div>

<?php 
  $colors_list = $this->task->getColors();
?>
    <div class="filter-dropdowns">
      <div class="dropdown filters">
        <i class="fa fa-caret-down"></i> <a href="#" class="dropdown-menu"><?= t('Color coding') ?></a>
        <ul class="color_filter">
          <li class="color_filter"><div class="color-color_filter"><a href="#" class="filter-helper" data-filter="status:open"><?= t('Reset filters') ?></a></div></li>
        <?php foreach ($colors_list as $color_id => $color_name): ?>
          <li class="color_filter"><div class="color-color_filter color-<?= $color_id ?>"><a href="#" class="filter-helper" data-filter='color:"<?= $this->e($color_id) ?>"'><?= $this->e($color_name) ?></a>&nbsp;|&nbsp;<a href="#" class="filter-helper" data-append-filter='color:"<?= $this->e($color_id) ?>"'><?= t('append') ?></a></div></li>
        <?php endforeach ?>
        </ul>
      </div>
    </div>