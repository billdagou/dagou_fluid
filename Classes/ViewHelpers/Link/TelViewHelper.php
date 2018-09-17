<?php
namespace Dagou\DagouFluid\ViewHelpers\Link;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class TelViewHelper extends AbstractTagBasedViewHelper {
    /**
     * @var string
     */
    protected $tagName = 'a';

    public function initializeArguments() {
        $this->registerArgument('tel', 'string', 'Phone number.');
    }

    /**
     * @return string
     */
    public function render() {
        $content = $this->renderChildren();

        $tel = $this->arguments['tel'] ?: $content;

        $this->tag->addAttribute('href', 'tel:'.preg_replace('/[^\d]+/', '', $tel));

        $this->tag->setContent($content);

        $this->tag->forceClosingTag(TRUE);

        return $this->tag->render();
    }
}