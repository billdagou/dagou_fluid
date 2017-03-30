<?php
namespace Dagou\DagouFluid\ViewHelpers\Html;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;

abstract class AbstractAssetViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	/**
	 * @return string
	 */
	protected function getAssetFilePath() {
		if (preg_match('/^(?:https?:)?\/\//i', $this->arguments['src'])) {
			return $this->arguments['src'];
		} else {
			return PathUtility::stripPathSitePrefix(
				GeneralUtility::getFileAbsFileName($this->arguments['src'])
			);
		}
	}

	/**
	 * @return string
	 */
	protected function getName() {
		if ($this->arguments['name']) {
			return $this->arguments['name'];
		} else {
			/** @var \TYPO3\CMS\Extbase\Mvc\Request $request */
			$request = $this->controllerContext->getRequest();

			return $request->getControllerExtensionKey().'.'.$request->getControllerName().'.'.$request->getControllerActionName();
		}
	}

	/**
	 * {@inheritDoc}
	 * @see \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper::initializeArguments()
	 */
	public function initializeArguments() {
		$this->registerArgument('name', 'string', 'Asset name.');
		$this->registerArgument('src', 'string', 'Asset source.');
		$this->registerArgument('library', 'boolean', 'Is library or not.');
	}
}