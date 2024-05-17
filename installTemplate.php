<?php

require_once __DIR__ . '/src/Class/TemplateInstaller.php';

try {
    $installer = new TemplateInstaller();
    $installer->installTemplate();
} catch (\Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}
