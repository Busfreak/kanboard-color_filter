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
     * Colors index page
     *
     * @access public
     */
    public function index()
    {
        $project = $this->getProject();
        $project_colors = $this->colors->getAssigned($project['id']);
        $colors = $this->helper->task->getColors();

        $this->response->html($this->helper->layout->project('color_filter:colors/index', array(
            'project' => $project,
            'colors' => $colors,
            'project_colors' => $project_colors,
            'title' => t('Color Settings')
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
        $values['user_id'] = $this->userSession->getId();
        $values['project_id'] = $project['id'];

#        list($valid, $errors) = $this->colors->validateCreation($values);

#        if ($valid) {
            if ($this->colors->create($values)) {
                $this->flash->success(t('Your custom colorname has been updated successfully.'));
                $this->response->redirect($this->helper->url->to('colors', 'index', array('plugin' => 'color_filter', 'project_id' => $project['id'])));
            } else {
                $this->flash->failure(t('Unable to updated your custom colorname.'));
            }
#        }

        $this->index();
    }

    /**
     * Confirmation dialog before removing a colorname
     *
     * @access public
     */
    public function confirm()
    {
        $project = $this->getProject();

        $this->response->html($this->helper->layout->project('color_filter:colors/remove', array(
            'project' => $project,
            'color_id' => $this->request->getStringParam('color_id'),
            'color_name' => $this->colors->getColorName($project['id'], $this->request->getStringParam('color_id')),
            'title' => t('Edit custom color'),
        )));
    }

    /**
     * Edit a project color (display the form)
     *
     * @access public
     */
    public function edit(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();
        $colors = $this->helper->task->getColors();
        $color_id = $this->request->getStringParam('color_id');
        $color_name = $colors[$color_id];
        $values['color_id'] = $color_id;
        $values['projectcolorname'] = $this->colors->getColorName($project['id'], $color_id);
        $values['projectuse'] = $this->colors->getColorUsage($project['id'], $color_id);

        $this->response->html($this->helper->layout->project('color_filter:colors/edit', array(
            'values' => $values,
            'errors' => $errors,
            'project' => $project,
            'color_name' => $color_name,
            'title' => t('Edit custom color')
        )));
    }

    /**
     * Remove a project color
     *
     * @access public
     */
    public function remove()
    {
        $this->checkCSRFParam();
        $project = $this->getProject();

        if ($this->colors->remove($project['id'], $this->request->getStringParam('color_id'))) {
            $this->flash->success(t('Your custom colorname has been removed successfully.'));
        } else {
            $this->flash->failure(t('UUnable to remove your custom colorname.'));
			$this->flash->failure($this->request->getStringParam('color_id'));
        }

        $this->response->redirect($this->helper->url->to('colors', 'index', array('plugin' => 'color_filter', 'project_id' => $project['id'])));
    }
}
