<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class StrtolowerViewHelper extends AbstractViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        return strtolower($this->renderChildren());
    }
}