<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class UcwordsViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('str', 'string', 'The input string');
        $this->registerArgument('delimiters', 'string', 'The optional delimiters contains the word separator characters', FALSE, "\t\r\n\f\v");
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext): string {
        return ucwords($arguments['str'] ?? $renderChildrenClosure(), $arguments['delimiters']);
    }
}