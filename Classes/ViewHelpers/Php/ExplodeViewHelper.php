<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ExplodeViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('delimiter', 'string', 'Delimiter string.', FALSE, ',');
        $this->registerArgument('limit', 'int', 'Delimiter string.', FALSE, PHP_INT_MAX);
    }

    /**
     * @return array
     */
    public function render(): array {
        return explode($this->arguments['delimiter'], $this->renderChildren(), $this->arguments['limit']);
    }
}