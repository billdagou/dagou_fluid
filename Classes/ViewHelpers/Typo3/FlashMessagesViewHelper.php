<?php
namespace Dagou\DagouFluid\ViewHelpers\Typo3;

use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Extbase\Service\ExtensionService;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FlashMessagesViewHelper extends AbstractViewHelper {
    protected ExtensionService $extensionService;
    protected FlashMessageService $flashMessageService;

    protected array $severities = [
        'notice' => ContextualFeedbackSeverity::NOTICE,
        'info' => ContextualFeedbackSeverity::INFO,
        'ok' => ContextualFeedbackSeverity::OK,
        'warning' => ContextualFeedbackSeverity::WARNING,
        'error' => ContextualFeedbackSeverity::ERROR,
    ];

    /**
     * @param \TYPO3\CMS\Extbase\Service\ExtensionService $extensionService
     */
    public function injectExtensionService(ExtensionService $extensionService): void {
        $this->extensionService = $extensionService;
    }

    /**
     * @param \TYPO3\CMS\Core\Messaging\FlashMessageService $flashMessageService
     */
    public function injectFlashMessageService(FlashMessageService $flashMessageService): void {
        $this->flashMessageService = $flashMessageService;
    }

    public function initializeArguments(): void {
        $this->registerArgument('identifier', 'string', 'Flash-message queue identifier');
        $this->registerArgument('severity', 'string', 'Optional severity, must be either of one of \TYPO3\CMS\Core\Messaging\FlashMessage constants');
        $this->registerArgument('flush', 'boolean', 'Flush the message queue or not', FALSE, TRUE);
    }

    /**
     * @return string
     */
    public function render(): string {
        $severity = $this->severities[$this->arguments['severity']] ?? NULL;
        $getAllMessagesFunc = $this->arguments['flush'] ? 'getAllMessagesAndFlush' : 'getAllMessages';

        if ($this->arguments['identifier'] === NULL) {
            $this->arguments['identifier'] = 'extbase.flashmessages.'
                .$this->extensionService->getPluginNamespace(
                    $this->renderingContext->getControllerContext()->getRequest()->getControllerExtensionName(),
                    $this->renderingContext->getControllerContext()->getRequest()->getPluginName()
                );
        }

        return $this->flashMessageService->getMessageQueueByIdentifier($this->arguments['identifier'])
            ->$getAllMessagesFunc($severity);
    }
}