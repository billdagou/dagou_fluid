<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use Dagou\DagouFluid\Traits\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class BaseUrlViewHelper extends AbstractViewHelper {
    use PageRenderer;

    public function render(): void {
        $this->getPageRenderer()->setBaseUrl(
            GeneralUtility::getIndpEnv('TYPO3_SITE_URL')
        );
    }
}