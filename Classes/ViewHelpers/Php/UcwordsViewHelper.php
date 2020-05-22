<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class UcwordsViewHelper extends AbstractViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        return ucwords($this->renderChildren());
    }
}