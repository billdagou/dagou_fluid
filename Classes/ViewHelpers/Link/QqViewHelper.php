<?php
namespace Dagou\DagouFluid\ViewHelpers\Link;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class QqViewHelper extends AbstractTagBasedViewHelper {
    /**
     * @var string
     */
    protected $tagName = 'a';

    public function initializeArguments() {
        parent::initializeArguments();
        $this->registerArgument('qq', 'string', 'The QQ number to be turned into a link');
        $this->registerUniversalTagAttributes();
        $this->registerTagAttribute('name', 'string', 'Specifies the name of an anchor');
        $this->registerTagAttribute('rel', 'string', 'Specifies the relationship between the current document and the linked document');
        $this->registerTagAttribute('rev', 'string', 'Specifies the relationship between the linked document and the current document');
        $this->registerTagAttribute('target', 'string', 'Specifies where to open the linked document');
    }

    /**
     * @return string
     */
    public function render(): string {
        $linkHref = 'tencent://message/?uin='.$this->arguments['qq'];
        $linkText = $this->arguments['qq'];

        $tagContent = $this->renderChildren();
        if ($tagContent !== NULL) {
            $linkText = $tagContent;
        }

        $this->tag->setContent($linkText);
        $this->tag->addAttribute('href', $linkHref, TRUE);
        $this->tag->forceClosingTag(TRUE);

        return $this->tag->render();
    }
}