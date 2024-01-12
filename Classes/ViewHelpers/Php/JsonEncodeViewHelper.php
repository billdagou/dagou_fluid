<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class JsonEncodeViewHelper extends AbstractViewHelper{
    public function initializeArguments(): void {
        $this->registerArgument('value', 'mixed', 'The value being encoded');
        $this->registerArgument('options', 'int', 'Bitmask', FALSE, 0);
        $this->registerArgument('depth', 'int', 'The maximum depth', FALSE, 512);
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext): string {
        return json_encode($arguments['value'] ?? $renderChildrenClosure(), $arguments['options'], $arguments['depth']);
    }
}