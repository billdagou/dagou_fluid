<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FloorViewHelper extends AbstractViewHelper {
    /**
     * @return int
     */
    public function render(): int {
        return floor($this->renderChildren());
    }
}