<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class UrlencodeViewHelper extends AbstractViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        return urlencode($this->renderChildren());
    }
}