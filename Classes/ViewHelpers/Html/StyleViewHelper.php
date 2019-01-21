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
                    $this->getAssetPath($this->arguments['src']),
                    NULL,
                    NULL,
                    NULL,
                    $this->arguments['compress'],
                    $this->arguments['top']
                );
            } else {
                $this->getPageRenderer()->addCssFile(
                    $this->getAssetPath($this->arguments['src']),
                    NULL,
                    NULL,
                    NULL,
                    $this->arguments['compress'],
                    $this->arguments['top']
                );
            }
        } else {
            $this->getPageRenderer()->addCssInlineBlock(
                $this->getAssetName($this->arguments['name']),
                $this->renderChildren(),
                $this->arguments['compress'],
                $this->arguments['top']
            );
        }
    }
}