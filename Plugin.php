<?php
namespace Kanboard\Plugin\DeleteTaskOnCloseColumn;

use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\DeleteTaskOnCloseColumn\Action\DeleteClosedTask;

class Plugin extends Base
{
    public function initialize()
    {
        $this->actionManager->register(new DeleteClosedTask($this->container));
    }
    public function getPluginName()
    {
        return 'DeleteTaskOnCloseColumn';
    }

    public function getPluginDescription()
    {
        return t('Automatically delete task to a specific column when closed');
    }

    public function getPluginAuthor()
    {
        return 'Timothe FLENET';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/dreamtim/kanboard-DeleteTaskOnCloseColumn';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.44';
    }
}
