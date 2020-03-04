<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3Fluid\Fluid\Core\ViewHelper\Exception;

class MediaViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\MediaViewHelper {
    public function initializeArguments() {
        parent::initializeArguments();

        $this->registerArgument('src', 'string', 'Path to a file');
        $this->overrideArgument('file', 'object', 'File', FALSE);
    }

    public function render() {
        if (($this->arguments['src'] === NULL && $this->arguments['file'] === NULL) || ($this->arguments['src'] !== NULL && $this->arguments['file'] !== NULL)) {
            throw new Exception('You must either specify a string src or a File object.', 1578371589);
        }

        if ($this->arguments['src']) {
            $this->arguments['file'] = ResourceFactory::getInstance()->retrieveFileOrFolderObject($this->arguments['src']);
        }

        return parent::render();
    }
}