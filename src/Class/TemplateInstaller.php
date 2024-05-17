<?php

namespace Soledis\Packages\SldExportTranslations\Class;

use Exception;

class TemplateInstaller
{
    private string|false $moduleDirectory;
    private string $currentDirectory;

    /**
     * Constructor for the TemplateInstaller.
     *
     * @throws Exception If the script is not run from a module directory.
     */
    public function __construct()
    {
        $this->currentDirectory = realpath(dirname(__FILE__));
        $this->moduleDirectory = $this->getModuleDirectory();
        if (!$this->moduleDirectory) {
            throw new Exception("The script must be run from a module directory.");
        }
    }

    /**
     * Attempts to identify the module directory by searching the current path.
     *
     * @return bool|string The module directory path if found, otherwise false.
     */
    private function getModuleDirectory(): bool|string
    {
        $parts = explode('/', $this->currentDirectory);
        $moduleIndex = array_search('modules', $parts);

        if ($moduleIndex === false) {
            return false;
        }

        $moduleIndex += 1;
        $desiredPathParts = array_slice($parts, 0, $moduleIndex + 1);

        return implode('/', $desiredPathParts);
    }

    /**
     * Installs the template files to the specified module directory.
     *
     * @throws Exception If there are issues copying the files.
     */
    public function installTemplate(): void
    {
        $sourcePath = $this->currentDirectory . '/../Template/';
        $destinationPath = $this->moduleDirectory . '/views/templates/admin/configuration/hooks/';

        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $files = scandir($sourcePath);
        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            $targetFilePath = $destinationPath . $file;

            if (file_exists($targetFilePath)) {
                continue;
            }

            if (!copy($sourcePath . $file, $targetFilePath)) {
                throw new Exception("Failed to copy $file.");
            }
        }
    }

}
