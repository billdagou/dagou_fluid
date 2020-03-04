<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FileViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('file', FileReference::class, 'File reference.', TRUE);
    }

    public function render() {
        /** @var \TYPO3\CMS\Core\Resource\File $file */
        $file = $this->arguments['file']->getOriginalResource()->getOriginalFile();

        ob_clean();

        header('Content-type: '.$file->getMimeType());

        echo $file->getContents();

        exit();
    }
}