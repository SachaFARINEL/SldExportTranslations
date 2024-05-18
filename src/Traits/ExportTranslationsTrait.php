<?php

namespace Soledis\Packages\SldExportTranslations\Traits;


trait ExportTranslationsTrait
{
    public function hookDisplayModuleConfigureExtraButtons(): string
    {
        return $this->fetch("../Template/configuration-extra-buttons.tpl");
    }
}