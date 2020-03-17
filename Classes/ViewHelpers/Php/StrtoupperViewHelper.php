<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class StrtoupperViewHelper extends AbstractViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        return strtoupper($this->renderChildren());
    }
}