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
        $this->registerArgument('qq', 'string', 'QQ number.');
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
        $content = $this->renderChildren();

        $qq = $this->arguments['qq'] ?: $content;

        $this->tag->addAttribute('href', 'tencent://message/?uin='.$qq);

        $this->tag->setContent($content);

        $this->tag->forceClosingTag(TRUE);

        return $this->tag->render();
    }
}