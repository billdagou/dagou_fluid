<?php
namespace Dagou\DagouFluid\ViewHelpers\Http;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class GetViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('variables', 'string', 'Optional pointer to value in GET array');
    }

    /**
     * @return mixed
     */
    public function render() {
        return GeneralUtility::_GET($this->arguments['variables']);
    }
}