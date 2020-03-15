<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class UcfirstViewHelper extends AbstractViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        return ucfirst($this->renderChildren());
    }
}