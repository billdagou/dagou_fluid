<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class PregMatchViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('pattern', 'string', 'The pattern to search for, as a string', TRUE);
        $this->registerArgument('subject', 'string', 'The input string');
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return bool
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext): bool {
        return (bool)preg_match($arguments['pattern'], $arguments['subject'] ?? $renderChildrenClosure());
    }
}