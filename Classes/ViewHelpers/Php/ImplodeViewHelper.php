<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ImplodeViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('glue', 'string', 'Glue string.', FALSE, LF);
    }

    /**
     * @return string
     */
    public function render(): string {
        return implode($this->arguments['glue'], $this->renderChildren());
    }
}