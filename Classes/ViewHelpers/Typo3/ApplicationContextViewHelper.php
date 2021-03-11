<?php
namespace Dagou\DagouFluid\ViewHelpers\Typo3;

use TYPO3\CMS\Core\Core\Environment;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ApplicationContextViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('is', 'string', 'Production, Development, or Testing');
    }

    /**
     * @return mixed
     */
    public function render() {
        $applicationContext = Environment::getContext();

        if (in_array($this->arguments['is'], ['Production', 'Development', 'Testing'])) {
            return $applicationContext->{'is'.$this->arguments['is']}();
        }

        return (string)$applicationContext;
    }
}