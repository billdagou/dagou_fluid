<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class RandViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('min', 'int', 'The lowest value to return', FALSE, 0);
        $this->registerArgument('max', 'int', 'The highest value to return', FALSE, getrandmax());
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return int
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext): int {
        return rand($arguments['min'], $arguments['max'] ?? $renderChildrenClosure());
    }
}