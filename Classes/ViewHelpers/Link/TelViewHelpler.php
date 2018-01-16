<?php
namespace Dagou\DagouFluid\ViewHelpers\Link;

class TelViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper
{
    /**
     * @var string
     */
    protected $tagName = 'a';

    public function initializeArguments()
    {
        $this->registerArgument('tel', 'string', 'The phone number.');
    }

    /**
     * @return string
     */
    public function render()
    {
        $tel = $this->arguments['tel'] ?: $this->renderChildren();

        $this->tag->setContent($tel);
        $this->tag->addAttribute('href', 'tel:' . preg_replace('/[^\d]+/', '', $tel));
        $this->tag->forceClosingTag(TRUE);

        return $this->tag->render();
    }
}