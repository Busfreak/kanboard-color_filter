<?php

namespace Kanboard\Plugin\Color_filter\Model;

use Kanboard\Controller\Base;

/**
 * Colors
 *
 * @package  model
 * @author   Martin Middeke
 */
class Colors_helper extends \Kanboard\Helper\Task
{

    /**
     * Get all colornames from system and overwrite with custom board names
     *
     * @access public
     * @param  integer   $project_id
     * @return array
     */
    public function getColors($project_id)
    {
        $colors_assigned = $this->projectMetadata->getAll($project_id);
		    $colors = $this->helper->task->getColors();

        foreach ($colors as $color_id => $color_name) {
		    if (array_key_exists ('color_filter_' . $color_id, $colors_assigned))
			      $colors[$color_id] = $colors_assigned['color_filter_' . $color_id];
        }
            
        return $colors;
    }

}