<?php

namespace Soledis\Packages\SldExportTranslations\Traits;

trait ExportTranslationsTrait
{
    public function hookDisplayModuleConfigureExtraButtons(): string
    {
        return $this->fetch("module:{$this->name}/views/templates/admin/configuration/hooks/configuration-extra-buttons.tpl");
    }
}