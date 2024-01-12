<?php
namespace Dagou\DagouFluid\ViewHelpers\Typo3;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ExtensionViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('extKey', 'string', 'Extension key.', TRUE);
        $this->registerArgument('path', 'string', 'Configuration path.', FALSE, '');
    }

    /**
     * @return mixed
     */
    public function render(): mixed {
        return GeneralUtility::makeInstance(ExtensionConfiguration::class)
            ->get($this->arguments['extKey'], $this->arguments['path']);
    }
}