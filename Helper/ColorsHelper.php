<?php
namespace Kanboard\Plugin\Color_filter\Helper;
use Kanboard\Core\Base;

class ColorsHelper extends Base
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
        $project_colors = $this->colors->getProjectColors($project_id);
		    $colors = array();

        foreach ($project_colors as $color_id => $color_values) {
            if (! array_key_exists ('color_filter_' . $color_id, $project_colors)) {
                if(! $color_values['color_hide']){
                    $colors[$color_id] = $color_values['color_name'];
                    if (strlen($color_values['app_color']) > 0) $colors[$color_id] = $color_values['app_color'];
                    if (strlen($color_values['project_color']) > 0) $colors[$color_id] = $color_values['project_color'];
                }
            }
        }
        return $colors;
    }
}