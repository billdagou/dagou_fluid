<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use Dagou\DagouFluid\Traits\PageRenderer;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class MetaViewHelper extends AbstractViewHelper {
    use PageRenderer;

    public function initializeArguments() {
        $this->registerArgument('type', 'string', 'The type of the meta tag. Allowed values are property, name or http-equiv', FALSE, 'name');
        $this->registerArgument('name', 'string', 'The name of the property to add', TRUE);
        $this->registerArgument('content', 'string', 'The content of the meta tag');
    }

    public function render() {
        $this->getPageRenderer()->setMetaTag(
            $this->arguments['type'],
            $this->arguments['name'],
            $this->arguments['content'] ?? $this->renderChildren()
        );
    }
}