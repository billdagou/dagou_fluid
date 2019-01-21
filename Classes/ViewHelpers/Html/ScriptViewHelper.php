<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use Dagou\DagouFluid\Traits\Asset;
use Dagou\DagouFluid\Traits\PageRenderer;

class ScriptViewHelper extends AbstractAssetViewHelper {
    use Asset, PageRenderer;

    public function initializeArguments() {
        parent::initializeArguments();

        $this->registerArgument('footer', 'boolean', 'Add to footer or not.', FALSE, TRUE);
    }

    public function render() {
        if ($this->arguments['footer']) {
            if ($this->arguments['src']) {
                if ($this->arguments['library']) {
                    $this->getPageRenderer()->addJsFooterLibrary(
                        $this->getAssetName($this->arguments['name']),
                        $this->getAssetPath($this->arguments['src']),
                        'text/javascript',
                        $this->arguments['compress'],
                        $this->arguments['top']
                    );
                } else {
                    $this->getPageRenderer()->addJsFooterFile(
                        $this->getAssetPath($this->arguments['src']),
                        'text/javascript',
                        $this->arguments['compress'],
                        $this->arguments['top']
                    );
                }
            } else {
                $this->getPageRenderer()->addJsFooterInlineCode(
                    $this->getAssetName($this->arguments['name']),
                    $this->renderChildren(),
                    $this->arguments['compress'],
                    $this->arguments['top']
                );
            }
        } else {
            if ($this->arguments['src']) {
                if ($this->arguments['library']) {
                    $this->getPageRenderer()->addJsLibrary(
                        $this->getAssetName($this->arguments['name']),
                        $this->getAssetPath($this->arguments['src']),
                        'text/javascript',
                        $this->arguments['compress'],
                        $this->arguments['top']
                    );
                } else {
                    $this->getPageRenderer()->addJsFile(
                        $this->getAssetPath($this->arguments['src']),
                        'text/javascript',
                        $this->arguments['compress'],
                        $this->arguments['top']
                    );
                }
            } else {
                $this->getPageRenderer()->addJsInlineCode(
                    $this->getAssetName($this->arguments['name']),
                    $this->renderChildren(),
                    $this->arguments['compress'],
                    $this->arguments['top']
                );
            }
        }
    }
}