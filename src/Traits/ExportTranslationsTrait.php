<?php

namespace Soledis\Packages\SldExportTranslations\Traits;

use Soledis\Packages\SldExportTranslations\Class\TemplateInstaller;
use PrestaShop\PrestaShop\Adapter\SymfonyContainer;

trait ExportTranslationsTrait
{
    public function hookDisplayModuleConfigureExtraButtons(): string
    {
//        try {
//            (new TemplateInstaller())->installTemplate();
//            // get a route in prestashop
//            $this->context->link->getAdminLink('AdminModules', true);
//        } catch (\Exception $e) {
//            return "Error : " . $e->getMessage() . "\n";
//        }

//        return $this->fetch("module:{$this->name}/views/templates/admin/configuration/hooks/configuration-extra-buttons.tpl");
        $router = SymfonyContainer::getInstance()->get('router');
        $link = $router->generate('export_translations');

        return "<a href='{$link}'>Hello World!</a>";
    }
}