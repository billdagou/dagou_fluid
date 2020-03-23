<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class RandViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('min', 'int', 'The lowest value to return', FALSE, 0);
        $this->registerArgument('max', 'int', 'The highest value to return', FALSE, getrandmax());
    }

    /**
     * @return int
     */
    public function render(): int {
        return rand($this->arguments['min'], $this->arguments['max']);
    }
}