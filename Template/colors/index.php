<div class="page-header">
    <h2><?= t('Color Settings') ?></h2>
</div>
    <table>
        <tr>
            <th><?= t('Color') ?></th>
            <th><?= t('Application label') ?></th>
            <th><?= t('Project label') ?></th>
            <th><?= t('Actions') ?></th>
        </tr>
        <?php foreach ($colors as $color_id => $color_name): ?>
        <tr>
            <td class="color color-<?= $color_id ?>"><?= $color_id ?></td>
            <td class="color color-<?= $color_id ?>"><?= $color_name ?></td>
            <td class="color color-<?= $color_id ?>"><?= $project_colors[$color_id] ?></td>
            <td>
                <?php if ($this->user->hasProjectAccess('color_filter', 'edit', $project['id'])): ?>
                    <ul style="font-size:80%">
                      <?php if (!empty($project_colors[$color_id])): ?>
                        <li><?= $this->url->link(t('Remove'), 'colors', 'confirm', array('plugin' => 'color_filter', 'project_id' => $project['id'], 'color_id' => $color_id), true) ?></li>
                      <?php else: ?>
                        <li><?= t('Remove') ?></li>
                      <?php endif ?>
                        <li><?= $this->url->link(t('Edit'), 'colors', 'edit', array('plugin' => 'color_filter', 'project_id' => $project['id'], 'color_id' => $color_id)) ?></li>
                    </ul>
                <?php endif ?>
            </td>
        </tr>
        <?php endforeach ?>
    </table>