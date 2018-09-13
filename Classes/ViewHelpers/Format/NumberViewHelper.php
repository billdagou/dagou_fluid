<?php
namespace Dagou\DagouFluid\ViewHelpers\Format;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class NumberViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('number', 'float', 'The number being formatted.');
        $this->registerArgument('decimals', 'int', 'Sets the number of decimal points.', FALSE, 0);
        $this->registerArgument('decPoint', 'string', 'Sets the separator for the decimal point.', FALSE, '.');
        $this->registerArgument('thousandsSep', 'string', 'Sets the thousands separator.', FALSE, ',');
    }

    /**
     * @return string
     */
    public function render() {
        $number = $this->arguments['number'] ?: $this->renderChildren();

        return number_format($number, $this->arguments['decimals'], $this->arguments['decPoint'], $this->arguments['thousandsSep']);
    }
}