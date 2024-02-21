<?php
namespace Dagou\DagouFluid\ViewHelpers\Typo3;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class IsLoadedViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('extKey', 'string', 'Extension key.', TRUE);
    }

    /**
     * @return bool
     */
    public function render(): bool {
        return ExtensionManagementUtility::isLoaded($this->arguments['extKey']);
    }
}