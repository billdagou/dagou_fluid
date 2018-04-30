<?php
namespace Dagou\DagouFluid\Traits;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

trait Asset {
    /**
     * @param string|NULL $name
     *
     * @return string
     */
    protected function getAssetName(string $name = NULL) {
        if ($name !== NULL) {
            return $name;
        } else {
            /** @var \TYPO3\CMS\Extbase\Mvc\Request $request */
            $request = $this->controllerContext->getRequest();

            return $request->getControllerExtensionKey()
                .'.'
                .$request->getControllerName()
                .'.'
                .$request->getControllerActionName();
        }
    }

    /**
     * @param string $path
     *
     * @return string
     */
    protected function getAssetPath(string $path) {
        if (preg_match('/^(https?:)?\/\//i', $path)) {
            return $path;
        } elseif (strpos($path, 'EXT:') === 0) {
            list($extKey, $path) = explode('/', substr($path, 4), 2);

            return ExtensionManagementUtility::siteRelPath($extKey).$path;
        } else {
            return $path;
        }
    }
}