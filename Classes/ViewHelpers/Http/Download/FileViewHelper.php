<?php
namespace Dagou\DagouFluid\ViewHelpers\Http\Download;

use Dagou\DagouFluid\ViewHelpers\Http\DownloadViewHelper;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FileViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('file', FileReference::class, 'File reference', TRUE);
    }

    /**
     * @return string
     */
    public function render(): string {
        /** @var \TYPO3\CMS\Core\Resource\File $file */
        $file = $this->arguments['file']->getOriginalResource()->getOriginalFile();

        $filename = $this->viewHelperVariableContainer->get(DownloadViewHelper::class, 'filename');

        $this->viewHelperVariableContainer->add(DownloadViewHelper::class, 'filename', $filename ? $filename.'.'.$file->getExtension() : $file->getName());

        return file_get_contents($file->getPublicUrl());
    }
}