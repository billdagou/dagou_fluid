<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class InArrayViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('needle', 'mixed', 'The searched value');
        $this->registerArgument('haystack', \Iterator::class, 'The array', TRUE);
        $this->registerArgument('strict', 'boolean', 'Strict mode', FALSE, FALSE);
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return bool
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext): bool {
        if ($arguments['haystack'] instanceof \ArrayAccess) {
            return $arguments['haystack']->offsetExists($arguments['needle'] ?? $renderChildrenClosure());
        } else {
            return in_array($arguments['needle'] ?? $renderChildrenClosure(), $arguments['haystack'], $arguments['strict']);
        }
    }
}