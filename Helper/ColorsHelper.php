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
		return $this->colors->getProjectColorNames($this->colors->getProjectColors($project_id));
    }
}