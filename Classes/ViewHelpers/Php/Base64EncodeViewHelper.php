<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class Base64EncodeViewHelper extends AbstractViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        return base64_encode($this->renderChildren());
    }
}