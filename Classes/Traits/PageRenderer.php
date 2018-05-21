<?php
namespace Dagou\DagouFluid\Traits;

use TYPO3\CMS\Core\Utility\GeneralUtility;

trait PageRenderer {
    /**
     * @var \TYPO3\CMS\Core\Page\PageRenderer
     */
    protected static $pageRenderer = NULL;

    /**
     * @return \TYPO3\CMS\Core\Page\PageRenderer
     */
    protected function getPageRenderer() {
        if (static::$pageRenderer === NULL) {
            static::$pageRenderer = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        }

        return static::$pageRenderer;
    }
}