<?php
namespace Dagou\DagouFluid\ViewHelpers\Http;

use TYPO3\CMS\Core\Utility\HttpUtility;

class RedirectViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    public function initializeArguments()
    {
        $this->registerArgument('url', 'string', 'The target URL to redirect to');
        $this->registerArgument('httpStatus', 'string', 'An optional HTTP status header');
    }

    public function render()
    {
        HttpUtility::redirect($this->arguments['url'] ?: $this->renderChildren(), $this->arguments['httpStatus']);
    }
}