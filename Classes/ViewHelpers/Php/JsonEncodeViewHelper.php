<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class JsonEncodeViewHelper extends AbstractViewHelper{
    public function initializeArguments() {
        $this->registerArgument('options', 'int', 'Bitmask', FALSE, 0);
        $this->registerArgument('depth', 'int', 'The maximum depth', FALSE, 512);
    }

    public function render() {
        return json_encode($this->renderChildren(), $this->arguments['options'], $this->arguments['depth']);
    }
}