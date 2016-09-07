<?php

namespace Kanboard\Plugin\Color_filter\Model;

use Kanboard\Core\Base;

/**
 * Colors model
 *
 * @package  model
 * @author   Martin Middeke
 */
class ColorsModel extends Base
{

    /**
     * Get available colors from application and replace with colors from board if not in ColorsController settings
     *
     * @access public
     * @param  bool $prepend
     * @return array
     */
    public function getList($listing)
    {
		// don nothing if in colors settings
		if ($this->router->getController() === 'ColorsController') return $listing;

        $project_id = $this->request->getIntegerParam('project_id', 0);
        $project_colors = $this->getProjectColors($project_id, $this->getAppColors($listing));

        return $this->colorsModel->getProjectColorNames($project_colors);
    }

    /**
     * Get all assigned colornames for a project
     *
     * @access public
     * @param  integer   $project_id
     * @return array
     */
    public function getProjectColors($project_id, $app_colors = NULL)
    {

        if(! isset($app_colors)) $app_colors = $this->getAppColors($this->helper->task->getColors());
        $projectMetadata = $this->projectMetadataModel->getAll($project_id);
        $project_colors = array();

        foreach ($app_colors as $color_id => $color_names) {
            $project_color = '';
            if (array_key_exists ('color_filter_' . $color_id, $projectMetadata)) {
                $project_color = $projectMetadata['color_filter_' . $color_id];
            }

            $color_hide = false;
            if (array_key_exists ('color_filter_' . $color_id . '_hide', $projectMetadata)) {
                $color_hide = true;
            }

            $project_colors[$color_id] = array('color_name' => $color_names['color_name'], 'app_color' => $color_names['app_color'], 'project_color' => $project_color, 'color_hide' => $color_hide);
        }

        return $project_colors;
    }

    /**
     * Get colornames for a project
     *
     * @access public
     * @param  integer   $project_id
     * @return array
     */
    public function getProjectColorNames($project_colors)
    {
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

    /**
     * Get all assigned colornames for the application
     *
     * @access private
     * @return array
     */
    private function getAppColors($colors)
    {
        $app_colors = array();

        foreach ($colors as $color_id => $color_name) {
            $app_colors[$color_id] = array('color_name' => $color_name, 'app_color' => $this->configModel->get('colors_' . $color_id, $color_name));
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
		return $this->projectMetadataModel->remove($project_id, 'color_filter_' . $name);
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

        return $this->projectMetadataModel->save($project_id, $createarray);
    }
}