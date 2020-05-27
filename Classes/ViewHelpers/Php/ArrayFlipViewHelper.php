<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ArrayFlipViewHelper extends AbstractViewHelper {
    /**
     * @return array
     */
    public function render(): array {
        return array_flip($this->renderChildren());
    }
}