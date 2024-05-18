<?php

namespace Soledis\Packages\SldExportTranslations\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use http\Client\Response;

class ExportTranslationsController extends FrameworkBundleAdminController
{
    public function exportAction(): Response
    {
        return new Response('Traductions exportées avec succès !');
    }
}