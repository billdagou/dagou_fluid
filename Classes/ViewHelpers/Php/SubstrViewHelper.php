<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class SubstrViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('string', 'string', 'The input string');
        $this->registerArgument('offset', 'int', 'Offset value', TRUE);
        $this->registerArgument('length', 'int', 'Length');
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext): string {
        return substr($arguments['string'] ?? $renderChildrenClosure(), $arguments['offset'], $arguments['length']);
    }
}