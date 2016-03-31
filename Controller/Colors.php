<?php

namespace Kanboard\Plugin\Color_filter\Controller;

use Kanboard\Controller\Base;

/**
 * Colors
 *
 * @package controller
 * @author  Martin Middeke
 */
class Colors extends Base
{
    /**
     * Colors index page in task settings
     *
     * @access public
     */
    public function index()
    {
        $project = $this->getProject();
        $project_colors = $this->colors->getProjectColors($project['id']);
        $colors = $this->helper->task->getColors();
        $values = array();

        foreach ($project_colors as $color_id => $color_names)
        {
            $values[$color_id] = $color_names['project_color'];
            $values[$color_id . '_hide'] = $color_names['color_hide'];
        }

        $this->response->html($this->helper->layout->project('color_filter:colors/index', array(
            'title' => t('Color Settings'),
            'project' => $project,
            'values' => $values,
            'errors' => array(),
            'colors' => $project_colors,
        )));
    }

    /**
     * Colors config page
     *
     * @access public
     */
    public function config()
    {
        $this->response->html($this->helper->layout->config('color_filter:config/index', array(
            'title' => t('Settings').' &gt; '.t('Color Settings'),
            'colors' => $this->helper->task->getColors(),
        )));
    }

    /**
     * Save a new custom colorname
     *
     * @access public
     */
    public function save()
    {
        $project = $this->getProject();
        $values = $this->request->getValues();
        $project_colors = $this->colors->getProjectColors($project['id']);

        foreach ($project_colors as $color_id => $color_names) {
            $this->colors->remove($project['id'], $color_id . '_hide');
            if (array_key_exists ($color_id, $values)) {
                if (strlen($values[$color_id]) == 0) {
                    $this->colors->remove($project['id'], $color_id);
                    unset($values[$color_id]);
                }
            }
        }
        if ($this->colors->create($project['id'], $values)) {
            $this->flash->success(t('Your custom colorname has been updated successfully.'));
            $this->response->redirect($this->helper->url->to('colors', 'index', array('plugin' => 'color_filter', 'project_id' => $project['id'])));
        } else {
            $this->flash->failure(t('Unable to updated your custom colorname.'));
        }

        $this->index();
    }

    /**
     * Save the application colornames
     *
     * @access public
     */
    public function save_config()
    {
        $values = $this->request->getValues();
            if ($this->config->save($values)) {
                $this->flash->success(t('Your custom colorname has been updated successfully.'));
                $this->response->redirect($this->helper->url->to('colors', 'config', array('plugin' => 'color_filter')));
            } else {
                $this->flash->failure(t('Unable to updated your custom colorname.'));
            }

        $this->index();
    }
}
