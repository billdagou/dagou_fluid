<?php
namespace Dagou\DagouFluid\ViewHelpers\Link;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class QqViewHelper extends AbstractTagBasedViewHelper {
    /**
     * @var string
     */
    protected $tagName = 'a';

    public function initializeArguments() {
        $this->registerArgument('qq', 'string', 'QQ number.');
    }

    /**
     * @return string
     */
    public function render() {
        $content = $this->renderChildren();

        $qq = $this->arguments['qq'] ?: $content;

        $this->tag->addAttribute('href', 'tencent://message/?uin='.preg_replace('/[^\d]+/', '', $qq));

        $this->tag->setContent($content);

        $this->tag->forceClosingTag(TRUE);

        return $this->tag->render();
    }
}