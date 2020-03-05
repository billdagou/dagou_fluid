<?php
namespace Dagou\DagouFluid\Traits;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;

trait Asset {
    /**
     * @param string|NULL $name
     *
     * @return string
     */
    protected function getAssetName(string $name = NULL): string {
        if ($name !== NULL) {
            return $name;
        } else {
            /** @var \TYPO3\CMS\Extbase\Mvc\Request $request */
            $request = $this->renderingContext->getControllerContext()->getRequest();

            return $request->getControllerExtensionKey().'.'.$request->getControllerName().'.'.$request->getControllerActionName();
        }
    }

    /**
     * @param string $path
     *
     * @return string
     */
    protected function getAssetPath(string $path): string {
        if (preg_match('/^(https?:)?\/\//i', $path)) {
            return $path;
        } else {
            return PathUtility::getAbsoluteWebPath(
                GeneralUtility::getFileAbsFileName($path)
            );
        }
    }
}