<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use Dagou\DagouFluid\Traits\PageRenderer;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Resource\Exception;
use TYPO3\CMS\Core\Type\File\ImageInfo;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3\CMS\Frontend\Resource\FilePathSanitizer;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FaviconViewHelper extends AbstractViewHelper {
    use PageRenderer;

    public function initializeArguments() {
        $this->registerArgument('src', 'string', 'Favicon path.', TRUE);
    }

    public function render() {
        try {
            $favIcon = GeneralUtility::makeInstance(FilePathSanitizer::class)->sanitize($this->arguments['src']);
            $iconFileInfo = GeneralUtility::makeInstance(ImageInfo::class, Environment::getPublicPath().'/'.$favIcon);

            if ($iconFileInfo->isFile()) {
                if (($iconMimeType = $iconFileInfo->getMimeType())) {
                    $this->getPageRenderer()->setIconMimeType(' type="'.$iconMimeType.'"');
                }

                $this->getPageRenderer()->setFavIcon(PathUtility::getAbsoluteWebPath($favIcon));
            }
        } catch (Exception $e) {
        }
    }
}