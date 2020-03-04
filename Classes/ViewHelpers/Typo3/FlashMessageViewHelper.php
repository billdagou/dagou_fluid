<?php
namespace Dagou\DagouFluid\ViewHelpers\Typo3;

use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FlashMessageViewHelper extends AbstractViewHelper {
    /**
     * @var bool
     */
    protected $escapeOutput = FALSE;
    /**
     * @var array
     */
    protected $severities = [
        'notice' => FlashMessage::NOTICE,
        'info' => FlashMessage::INFO,
        'ok' => FlashMessage::OK,
        'warning' => FlashMessage::WARNING,
        'error' => FlashMessage::ERROR,
    ];

    public function initializeArguments() {
        $this->registerArgument('as', 'string', 'Iteration variable name', TRUE);
        $this->registerArgument('identifier', 'string', 'Flash-message queue identifier');
        $this->registerArgument('severity', 'string', 'Optional severity, must be either of one of \TYPO3\CMS\Core\Messaging\FlashMessage constants');
        $this->registerArgument('flush', 'boolean', 'Flush the message queue or not', FALSE, TRUE);
    }

    /**
     * @return string
     */
    public function render() {
        $severity = isset($this->severities[$this->arguments['severity']]) ? $this->severities[$this->arguments['severity']] : NULL;
        $getAllMessagesFunc = $this->arguments['flush'] ? 'getAllMessagesAndFlush' : 'getAllMessages';

        $content = '';

        if (count($flashMessages = $this->controllerContext->getFlashMessageQueue($this->arguments['identifier'])->$getAllMessagesFunc($severity))) {
            $variableProvider = $this->renderingContext->getVariableProvider();

            foreach ($flashMessages as $flashMessage) {
                $variableProvider->add($this->arguments['as'], $flashMessage);

                $content .= $this->renderChildren();

                $variableProvider->remove($this->arguments['as']);
            }
        }

        return $content;
    }
}