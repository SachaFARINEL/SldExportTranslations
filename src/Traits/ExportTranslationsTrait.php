<?php

namespace Soledis\Packages\SldExportTranslations\Traits;


trait ExportTranslationsTrait
{
    public function hookDisplayModuleConfigureExtraButtons(): string
    {
        return $this->fetch("@Modules/SldExportTranslations/Template/configuration-extra-buttons.tpl");
    }
}