<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ExplodeViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('delimiter', 'string', 'The boundary string', TRUE);
        $this->registerArgument('string', 'string', 'The input string');
        $this->registerArgument('limit', 'int', 'Limit', FALSE, PHP_INT_MAX);
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return array
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext): array {
        return explode($arguments['delimiter'], $arguments['string'] ?? $renderChildrenClosure(), $arguments['limit']);
    }
}