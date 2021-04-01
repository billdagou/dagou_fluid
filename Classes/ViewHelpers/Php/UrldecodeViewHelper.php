<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class UrldecodeViewHelper extends AbstractViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        return urldecode($this->renderChildren());
    }
}