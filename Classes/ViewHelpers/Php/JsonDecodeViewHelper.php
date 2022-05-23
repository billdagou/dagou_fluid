<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class JsonDecodeViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('json', 'string', 'The json string being decoded');
        $this->registerArgument('assoc', 'boolean', 'Assoc', FALSE, FALSE);
        $this->registerArgument('depth', 'int', 'User specified recursion depth', FALSE, 512);
        $this->registerArgument('options', 'int', 'Bitmask', FALSE, 0);
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return mixed
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext) {
        return json_decode($arguments['json'] ?? $renderChildrenClosure(), $arguments['assoc'], $arguments['depth'], $arguments['options']);
    }
}