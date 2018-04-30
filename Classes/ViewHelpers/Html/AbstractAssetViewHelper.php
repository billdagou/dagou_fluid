<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

abstract class AbstractAssetViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('name', 'string', 'Asset name.');
        $this->registerArgument('src', 'string', 'Asset path.');
        $this->registerArgument('library', 'boolean', 'Is library or not.');
    }
}