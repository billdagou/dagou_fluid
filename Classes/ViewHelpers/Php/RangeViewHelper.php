<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class RangeViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('start', 'string|int|float', 'First value of the sequence');
        $this->registerArgument('end', 'string|int|float', 'The sequence is ended upon reaching the end value');
        $this->registerArgument('step', 'int|float', 'Step value', FALSE, 1);
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return array
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext): array {
        return range($arguments['start'], $arguments['end'], $arguments['step']);
    }
}