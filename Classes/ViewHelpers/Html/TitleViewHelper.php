<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use Dagou\DagouFluid\Traits\PageRenderer;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TitleViewHelper extends AbstractViewHelper {
    use PageRenderer;

    public function render(): void {
        $this->getPageRenderer()->setTitle(
            $this->renderChildren()
        );
    }
}