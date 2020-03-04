<?php
namespace Dagou\DagouFluid\ViewHelpers\Seo;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Seo\Canonical\CanonicalGenerator;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class CanonicalViewHelper extends AbstractViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        if (preg_match('/href="([^"]*)/i', GeneralUtility::makeInstance(CanonicalGenerator::class)->generate(), $matches)) {
            return $matches[1];
        }
    }
}