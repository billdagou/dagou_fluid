<?php
namespace Dagou\DagouFluid\ViewHelpers\Link;

class TelViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {
	/**
	 * @var string
	 */
	protected $tagName = 'a';

	/**
	 * {@inheritDoc}
	 * @see \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper::initializeArguments()
	 */
	public function initializeArguments() {
		$this->registerArgument('tel', 'string', 'The phone number.');
	}

	/**
	 * @return string
	 */
	public function render() {
		$this->tag->setContent($this->arguments['tel']);
		$this->tag->addAttribute('href', 'tel:'.preg_replace('/[^\d]+/', '', $this->arguments['tel'] ?? $this->renderChildren()));
		$this->tag->forceClosingTag(TRUE);

		return $this->tag->render();
	}
}