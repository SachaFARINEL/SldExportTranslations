<?php

namespace Soledis\Packages\SldExportTranslations\Class;

use Exception;

class TemplateInstaller
{
    private string|false $moduleDirectory;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->moduleDirectory = $this->getModuleDirectory();
        if (!$this->moduleDirectory) {
            throw new Exception("The script must be run from a module directory.");
        }
    }

    private function getModuleDirectory(): bool|string
    {
        $currentDirectory = realpath(dirname(__FILE__));
        $parts = explode('/', $currentDirectory);

        $moduleIndex = array_search('modules', $parts) + 1;

        $desiredPathParts = array_slice($parts, 0, $moduleIndex + 1);

        return implode('/', $desiredPathParts);
    }

    public function installTemplate(): void
    {
        $sourcePath = $this->moduleDirectory . '/../src/Template/';
        $destinationPath = $this->moduleDirectory . '/views/templates/admin/configuration/hooks/';

        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $files = scandir($sourcePath);
        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) continue;
            if (!copy($sourcePath . $file, $destinationPath . $file)) {
                throw new Exception("Failed to copy $file.");
            }
        }

        echo "Templates have been successfully installed.\n";
    }
}