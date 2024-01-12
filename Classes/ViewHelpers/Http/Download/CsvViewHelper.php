<?php
namespace Dagou\DagouFluid\ViewHelpers\Http\Download;

use Dagou\DagouFluid\ViewHelpers\Http\DownloadViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class CsvViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('data', 'array', 'CSV data');
    }

    /**
     * @return string
     */
    public function render(): string {
        $this->viewHelperVariableContainer->add(
            DownloadViewHelper::class,
            'filename',
            ($this->viewHelperVariableContainer->get(DownloadViewHelper::class, 'filename') ?: 'Data')
                .'.csv'
        );
        $this->viewHelperVariableContainer->add(DownloadViewHelper::class, 'mimeType', 'text/csv');

        return implode(
            LF,
            array_map(
                function(array $line): string {
                    return implode(
                        ',',
                        array_map(
                            function($column): string {
                                return '"'.$this->getValue($column).'"';
                            },
                            $line
                        )
                    );
                },
                $this->arguments['data'] ?? $this->renderChildren()
            )
        );
    }

    /**
     * @param mixed $column
     *
     * @return string
     */
    protected function getValue($column): string {
        if ($column === NULL) {
            $value = 'NULL';
        } elseif (is_object($column)) {
            $value = get_class($column);

            if (method_exists($column, 'getUid')) {
                $value .= ':'.$column->getUid();
            }
        } else {
            $value = str_replace('"', '\\"', $column);
        }

        return $value;
    }
}