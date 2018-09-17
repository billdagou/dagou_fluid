<?php
namespace Dagou\DagouFluid\Traits;

use TYPO3\CMS\Core\Utility\GeneralUtility;

trait PageRenderer {
    /**
     * @return \TYPO3\CMS\Core\Page\PageRenderer
     */
    protected static function getPageRenderer() {
        return GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
    }
}