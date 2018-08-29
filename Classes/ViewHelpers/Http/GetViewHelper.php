<?php
namespace Dagou\DagouFluid\ViewHelpers\Http;

use TYPO3\CMS\Core\Utility\HttpUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class RedirectViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('url', 'string', 'The target URL to redirect to.');
        $this->registerArgument('httpStatus', 'string', 'An optional HTTP status header.');
    }

    public function render() {
        HttpUtility::redirect($this->arguments['url'] ?: $this->renderChildren(), $this->arguments['httpStatus']);
    }
}