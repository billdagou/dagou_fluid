<?php
namespace Dagou\DagouFluid\ViewHelpers\Typo3;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ApplicationContextViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('is', 'string', 'Production, Development, or Testing');
    }

    /**
     * @return mixed
     */
    public function render() {
        $applicationContext = GeneralUtility::getApplicationContext();

        if (in_array($this->arguments['is'], ['Production', 'Development', 'Testing'])) {
            return $applicationContext->{'is'.$this->arguments['is']}();
        }

        return (string)$applicationContext;
    }
}