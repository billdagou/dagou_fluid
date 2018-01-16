<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class StyleViewHelper extends AbstractAssetViewHelper
{
    public function render()
    {
        /** @var \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer */
        $pageRenderer = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);

        if ($this->arguments['src']) {
            if ($this->arguments['library']) {
                $pageRenderer->addCssLibrary($this->getAssetFilePath());
            } else {
                $pageRenderer->addCssFile($this->getAssetFilePath());
            }
        } else {
            $pageRenderer->addCssInlineBlock($this->getName(), $this->renderChildren());
        }
    }
}