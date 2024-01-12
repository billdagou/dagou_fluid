<?php
namespace Dagou\DagouFluid\ViewHelpers\Http;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class DownloadViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('filename', 'string', 'Downloaded filename');
    }

    public function render():void {
        ob_clean();

        $this->viewHelperVariableContainer->add(__CLASS__, 'filename', $this->arguments['filename']);
        $this->viewHelperVariableContainer->add(__CLASS__, 'mimeType', 'application/octet-stream');

        $content = $this->renderChildren();

        $header = [
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => 'attachment; filename='.$this->viewHelperVariableContainer->get(__CLASS__, 'filename'),
            'Content-Length' => strlen($content),
            'Content-Transfer-encoding' => 'binary',
            'Content-Type' => $this->viewHelperVariableContainer->get(__CLASS__, 'mimeType'),
            'Expires' => '0',
            'Cache-Control' => 'must-revalidate',
            'Pragma' => 'public',
        ];

        $this->viewHelperVariableContainer->remove(__CLASS__, 'mimeType');
        $this->viewHelperVariableContainer->remove(__CLASS__, 'filename');

        $this->renderHeader($header);

        echo $content;

        exit();
    }

    /**
     * @param array $header
     */
    protected function renderHeader(array $header) {
        foreach ($header as $k => $v) {
            header($k.': '.$v);
        }
    }
}