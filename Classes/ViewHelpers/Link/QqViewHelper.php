<?php
namespace Dagou\DagouFluid\ViewHelpers\Link;

class QqViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper
{
    /**
     * @var string
     */
    protected $tagName = 'a';

    public function initializeArguments()
    {
        $this->registerArgument('qq', 'string', 'The qq number.');
    }

    /**
     * @return string
     */
    public function render()
    {
        $qq = $this->arguments['qq'] ?: $this->renderChildren();

        $this->tag->setContent($qq);
        $this->tag->addAttribute('href', 'tencent://message/?uin=' . preg_replace('/[^\d]+/', '', $qq));
        $this->tag->forceClosingTag(TRUE);

        return $this->tag->render();
    }
}