<?php
namespace Dagou\DagouFluid\ViewHelpers\Seo;

use TYPO3\CMS\Core\Domain\Page;
use TYPO3\CMS\Seo\Canonical\CanonicalGenerator;
use TYPO3\CMS\Seo\Event\ModifyUrlForCanonicalTagEvent;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class CanonicalViewHelper extends AbstractViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        return $this->getCanonicalGenerator()
            ->generate([
                'request' => $this->renderingContext->getRequest(),
            ]);
    }

    /**
     * @return \TYPO3\CMS\Seo\Canonical\CanonicalGenerator
     */
    protected function getCanonicalGenerator(): CanonicalGenerator {
        return new class() extends CanonicalGenerator {
            /**
             * @param array $params
             *
             * @return string
             */
            public function generate(array $params): string {
                if ($this->typoScriptFrontendController->config['config']['disableCanonical'] ?? FALSE) {
                    return '';
                }

                $event = new ModifyUrlForCanonicalTagEvent('', $params['request'], new Page($this->typoScriptFrontendController->page));
                $event = $this->eventDispatcher->dispatch($event);
                $href = $event->getUrl();

                if (empty($href) && (int)$this->typoScriptFrontendController->page['no_index'] === 1) {
                    return '';
                }

                if (empty($href)) {
                    $href = $this->checkForCanonicalLink();
                }
                if (empty($href)) {
                    $href = $this->checkContentFromPid();
                }
                if (empty($href)) {
                    $href = $this->checkDefaultCanonical();
                }

                return $href;
            }
        };
    }
}