<?php

namespace Soledis\Packages\SldExportTranslations\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Response;

class ExportTranslationsController extends FrameworkBundleAdminController
{
    public function exportTranslationsAction(): Response
    {
        return new Response('Traductions exportées avec succès !');
    }
}