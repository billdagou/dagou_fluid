<?php
namespace Dagou\DagouFluid\ViewHelpers\Http;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\HttpUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class RedirectViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('url', 'string', 'The target URL to redirect to', TRUE);
        $this->registerArgument('httpStatus', 'string', 'An optional HTTP status header');
    }

    public function render(): void {
        if ($this->arguments['httpStatus']) {
            header($this->arguments['httpStatus']);
        }

        header('Location: '.GeneralUtility::locationHeaderUrl($this->arguments['url'] ?: $this->renderChildren()));

        exit();
    }
}