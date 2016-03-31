<?php

namespace Kanboard\Plugin\Color_filter\Model;

use Kanboard\Model\Base;

/**
 * Colors
 *
 * @package  model
 * @author   Martin Middeke
 */
class Colors extends Base
{

    /**
     * Get all assigned colornames for a project
     *
     * @access public
     * @param  integer   $project_id
     * @return array
     */
    public function getProjectColors($project_id)
    {

        $app_colors = $this->getAppColors();
        $projectMetadata = $this->projectMetadata->getAll($project_id);
        $project_colors = array();

        foreach ($app_colors as $color_id => $color_names) {
            if (array_key_exists ('color_filter_' . $color_id, $projectMetadata)) {
                $project_color = $projectMetadata['color_filter_' . $color_id];
            } else {
                $project_color = '';
            }

            if (array_key_exists ('color_filter_' . $color_id . '_hide', $projectMetadata)) {
                $color_hide = true;
            } else {
                $color_hide = false;
            }

            $project_colors[$color_id] = array('color_name' => $color_names['color_name'], 'app_color' => $color_names['app_color'], 'project_color' => $project_color, 'color_hide' => $color_hide);
        }

        return $project_colors;
    }

    /**
     * Get all assigned colornames for the application
     *
     * @access public
     * @return array
     */
    public function getAppColors()
    {
        $app_colors = array();
        $colors = $this->helper->task->getColors();

        foreach ($colors as $color_id => $color_name) {
#            $app_colors['colors_' . $color_id] = $this->config->get('colors_' . $color_id, $color_name);
            $app_colors[$color_id] = array('color_name' => $color_name, 'app_color' => $this->config->get('colors_' . $color_id, $color_name));
        }
            
        return $app_colors;
    }

    /**
     * Remove a specific colorname
     *
     * @access public
     * @param  integer  $project_id
     * @param  string   $name
     * @return boolean
     */
    public function remove($project_id, $name)
    {
		return $this->projectMetadata->remove($project_id, 'color_filter_' . $name);
    }

    /**
     * Create a custom colorname
     *
     * @access public
     * @param  array    $values    Form values
     * @return boolean
     */
    public function create($project_id, array $values)
    {
        $createarray = array();

        foreach ($values as $key => $value) {
            $createarray['color_filter_' . $key] = $value;
        }

        return $this->projectMetadata->save($project_id, $createarray);
    }
}