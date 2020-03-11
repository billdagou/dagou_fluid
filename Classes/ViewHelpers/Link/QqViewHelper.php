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
        $this->registerArgument('escape', 'bool', 'Escape special characters', FALSE, TRUE);
        $this->registerUniversalTagAttributes();
        $this->registerTagAttribute('name', 'string', 'Specifies the name of an anchor');
        $this->registerTagAttribute('rel', 'string', 'Specifies the relationship between the current document and the linked document');
        $this->registerTagAttribute('rev', 'string', 'Specifies the relationship between the linked document and the current document');
        $this->registerTagAttribute('target', 'string', 'Specifies where to open the linked document');
    }

    /**
     * @return string
     */
    public function render() {
        $qq = $this->arguments['qq'];

        $linkHref = 'tencent://message/?uin='.$qq;
        $linkText = $qq;

        $tagContent = $this->renderChildren();
        if ($tagContent !== NULL) {
            $linkText = $tagContent;
        }

        $this->tag->setContent($linkText);
        $this->tag->addAttribute('href', $linkHref, $this->arguments['escape']);
        $this->tag->forceClosingTag(TRUE);

        return $this->tag->render();
    }
}