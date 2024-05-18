<?php

namespace Soledis\Packages\SldExportTranslations\Traits;


trait ExportTranslationsTrait
{
    public function hookDisplayModuleConfigureExtraButtons(): string
    {
        return $this->fetch("modules/{$this->name}/vendor/soledis/sldexporttranslations/views/templates/admin/configuration/hook/configuration-extra-buttons.tpl");
    }
}