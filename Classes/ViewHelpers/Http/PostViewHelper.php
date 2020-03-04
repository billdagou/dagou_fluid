<?php
namespace Dagou\DagouFluid\ViewHelpers\Http;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class PostViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('variables', 'string', 'Optional pointer to value in POST array');
    }

    /**
     * @return mixed
     */
    public function render() {
        return GeneralUtility::_POST($this->arguments['variables']);
    }
}