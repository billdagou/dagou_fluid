<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use Dagou\DagouFluid\Traits\Asset;
use Dagou\DagouFluid\Traits\PageRenderer;

class StyleViewHelper extends AbstractAssetViewHelper {
    use Asset, PageRenderer;

    public function render() {
        if ($this->arguments['src']) {
            if ($this->arguments['library']) {
                $this->getPageRenderer()->addCssLibrary(
                    $this->getAssetPath($this->arguments['src'])
                );
            } else {
                $this->getPageRenderer()->addCssFile(
                    $this->getAssetPath($this->arguments['src'])
                );
            }
        } else {
            $this->getPageRenderer()->addCssInlineBlock(
                $this->getName($this->arguments['name']),
                $this->renderChildren()
            );
        }
    }
}