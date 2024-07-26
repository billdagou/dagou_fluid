<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class StatViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('filename', 'string', 'Path to the file');
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     *
     * @return array|bool
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext): array|bool {
        return stat(
            GeneralUtility::getFileAbsFileName($arguments['filename'] ?? $renderChildrenClosure())
        );
    }
}