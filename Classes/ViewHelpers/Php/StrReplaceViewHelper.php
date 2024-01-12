<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class StrReplaceViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('search', 'mixed', 'The value being searched for', TRUE);
        $this->registerArgument('replace', 'mixed', 'The replacement value that replaces found search values', TRUE);
        $this->registerArgument('subject', 'mixed', 'The string or array being searched and replaced on');
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return mixed
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext) {
        return str_replace($arguments['search'], $arguments['replace'], $arguments['subject'] ?? $renderChildrenClosure());
    }
}