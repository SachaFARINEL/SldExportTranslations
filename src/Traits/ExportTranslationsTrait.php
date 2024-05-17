<?php

namespace Soledis\Packages\SldExportTranslations\Traits;

use Soledis\Packages\SldExportTranslations\Class\TemplateInstaller;

trait ExportTranslationsTrait
{
    public function hookDisplayModuleConfigureExtraButtons(): string
    {
        try {
            (new TemplateInstaller())->installTemplate();
        } catch (\Exception $e) {
            return "Error : " . $e->getMessage() . "\n";
        }

        return $this->fetch("module:{$this->name}/views/templates/admin/configuration/hooks/configuration-extra-buttons.tpl");
    }
}