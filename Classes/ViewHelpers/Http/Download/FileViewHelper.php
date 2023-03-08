<?php
namespace Dagou\DagouFluid\ViewHelpers\Http\Download;

use Dagou\DagouFluid\ViewHelpers\Http\DownloadViewHelper;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FileViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('file', FileReference::class, 'File reference');
    }

    /**
     * @return string
     */
    public function render(): string {
        /** @var \TYPO3\CMS\Core\Resource\File $file */
        $file = ($this->arguments['file'] ?? $this->renderChildren())->getOriginalResource()->getOriginalFile();

        $this->viewHelperVariableContainer->add(
            DownloadViewHelper::class,
            'filename',
            ($this->viewHelperVariableContainer->get(DownloadViewHelper::class, 'filename') ?: $file->getNameWithoutExtension())
                .'.'.$file->getExtension()
        );

        return file_get_contents(Environment::getPublicPath().$file->getPublicUrl());
    }
}