<?php

namespace Kanboard\Plugin\DeleteTaskOnCloseColumn\Action;

use Kanboard\Model\TaskModel;
use Kanboard\Action\Base;

class DeleteClosedTask extends Base
{
    /**
     * Get action description
     *
     * @access public
     * @return string
     */
    public function getDescription()
    {
        return t('Delete task from a specific column when closed  in a specific column');
    }

    /**
     * Get the list of compatible events
     *
     * @access public
     * @return array
     */
    public function getCompatibleEvents()
    {
        return array(
            TaskModel::EVENT_CLOSE,
        );
    }

    /**
     * Get the required parameter for the action
     *
     * @access public
     * @return array
     */
    public function getActionRequiredParameters()
    {
        return array(
            'column_id' => t('Column'),
        );
    }

    /**
     * Get all tasks
     *
     * @access public
     * @return array
     */

    public function getEventRequiredParameters()
    {
        //return array('tasks');
        return array(
            'task_id',
            'task' => array(
                'project_id',
                'column_id',
                'swimlane_id',
                'is_active',
            )
        );
    }

    /**
     * Execute the action (delete the task )
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool            True if the action was executed or false when not executed
     */
    public function doAction(array $data)
    {
        return $results[] = $this->taskModel->remove($data['task_id']); 

    }

    /**
     * Check if the event data meet the action condition
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool
     */
    public function hasRequiredCondition(array $data)
    {
        return $data['task']['column_id'] == $this->getParam('column_id') && $data['task']['is_active'] == 0;
    }
}
