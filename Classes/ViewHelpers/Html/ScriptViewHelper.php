<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class ScriptViewHelper extends AbstractAssetViewHelper {
	/**
	 * {@inheritDoc}
	 * @see \Dagou\DagouFluid\ViewHelpers\Html\AbstractAssetViewHelper::initializeArguments()
	 */
	public function initializeArguments() {
		parent::initializeArguments();

		$this->registerArgument('footer', 'boolean', 'Add to footer or not.', FALSE, TRUE);
	}

	/**
	 * @return void
	 */
	public function render() {
		/** @var \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer */
		$pageRenderer = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);

		if ($this->arguments['footer']) {
			if ($this->arguments['src']) {
				if ($this->arguments['library']) {
					$pageRenderer->addJsFooterLibrary($this->getName(), $this->getAssetFilePath());
				} else {
					$pageRenderer->addJsFooterFile($this->getAssetFilePath());
				}
			} else {
				$pageRenderer->addJsFooterInlineCode($this->getName(), $this->renderChildren());
			}
		} else {
			if ($this->arguments['src']) {
				if ($this->arguments['library']) {
					$pageRenderer->addJsLibrary($this->getName(), $this->getAssetFilePath());
				} else {
					$pageRenderer->addJsFile($this->getAssetFilePath());
				}
			} else {
				$pageRenderer->addJsInlineCode($this->getName(), $this->renderChildren());
			}
		}
	}
}