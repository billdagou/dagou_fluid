<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ImplodeViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('glue', 'string', 'Defaults to an empty string', FALSE, '');
        $this->registerArgument('pieces', 'array', 'The array of strings to implode');
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext): string {
        return implode($arguments['glue'], $arguments['pieces'] ?? $renderChildrenClosure());
    }
}