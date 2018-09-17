<?php
namespace Dagou\DagouFluid\ViewHelpers\Content;

use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class FlashMessageViewHelper extends AbstractViewHelper {
    /**
     * @var bool
     */
    protected $escapeOutput = FALSE;
    /**
     * @var array
     */
    protected $severities = [
        'notice' => AbstractMessage::NOTICE,
        'info' => AbstractMessage::INFO,
        'ok' => AbstractMessage::OK,
        'warning' => AbstractMessage::WARNING,
        'error' => AbstractMessage::ERROR,
    ];

    public function initializeArguments() {
        $this->registerArgument('as', 'string', 'Iteration variable name.', TRUE);
        $this->registerArgument('identifier', 'string', 'Flash-message queue identifier.');
        $this->registerArgument(
            'severity',
            'string',
            'Optional severity, must be one of \TYPO3\CMS\Core\Messaging\AbstractMessage constants.'
        );
        $this->registerArgument('flush', 'boolean', 'Flush or not.', FALSE, TRUE);
    }

    /**
     * @return string
     */
    public function render() {
        $severity =
            isset($this->severities[$this->arguments['severity']]) ? $this->severities[$this->arguments['severity']] :
                NULL;
        $getAllMessagesFunc = $this->arguments['flush'] ? 'getAllMessagesAndFlush' : 'getAllMessages';

        $flashMessages =
            $this->controllerContext->getFlashMessageQueue($this->arguments['identifier'])->$getAllMessagesFunc(
                $severity
            );

        $content = '';

        if (count($flashMessages)) {
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