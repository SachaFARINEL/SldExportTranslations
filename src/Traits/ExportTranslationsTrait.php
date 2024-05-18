<?php

namespace Soledis\Packages\SldExportTranslations\Traits;

use Context;
use PrestaShop\PrestaShop\Adapter\SymfonyContainer;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\Routing\Route;


trait ExportTranslationsTrait
{
    public function addExportRoute()
    {
        $router = SymfonyContainer::getInstance()->get('router');
        $context = Context::getContext();


        $route = new Route(
            '/modules/' . $this->name . '/export-translations', // Chemin de la route
            [
                '_controller' => 'Soledis\\Packages\\SldExportTranslations\\Controller\\ExportTranslationsController::exportTranslationsAction',
            ],
            [], // Requirements
            [], // Options
            '', // Host
            [], // Schemes
            ['GET'] // Methods
        );

        // Ajouter la route au routeur
        $router->getRouteCollection()->add('export_translations', $route);
    }

    public function hookDisplayModuleConfigureExtraButtons()
    {
        // Assurez-vous que la route est ajoutée avant de générer le lien
        $this->addExportRoute();

        $router = SymfonyContainer::getInstance()->get('router');
        $link = $router->generate('export_translations');

        return "<a href='{$link}'>Export Translations</a>";
    }
}