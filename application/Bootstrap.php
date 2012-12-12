<?php
/**
 * Bootstrap principal de l'application.
 *
 * Bootstrap principal de l'application :
 * * Initialise le cache d'autoloading
 * * Initialise l'adaptateur de traduction par défaut
 *
 */

/**
 * Bootstrap principal de l'application.
 *
 * Bootstrap principal de l'application, lancé automatiquement par Zend_Application
 * en complément des initialisations déclarées dans le application.ini :
 * * Initialise le cache d'autoloading
 * * Initialise l'adaptateur de traduction par défaut
 * Hérite de Zend_Application_Bootstrap_Bootstrap
 *
 * @category MyApp
 * @package  Main
 * @example  <br />
 *           Bootstrap est appelé automatiquement grace
 *           à la présence de la ligne <br />
 *           <strong>bootstrap.class = bootstrap </strong><br />
 *           dans application.ini<br />
 * @version  0.01
 * @since    2012-08-06
 * @author   Moi <moi@monmail.com>
 * @see      Zend/Application/Bootstrap/Bootstrap.php
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Vérifie si le cache d'autoloading est déclaré actif dans application.ini
     * Si oui, vérifie si un fichier de cache existe pour le mapping des classes
     * existe et le charge puis le déclare dans l'autoloader
     *
     */
    protected function _initAutoloaderCache()
    {
        if ((bool) $this->getOption('enableIncludeFileCache')) {
            $file = ROOT_PATH . "/data/autoload.php";
            if (file_exists($file)) {
                require_once $file;
            }
            Zend_Loader_PluginLoader::setIncludeFileCache($file);
        }
    }

    /**
     * Déclare un adaptateur de traduction par défaut pour une locale définie dans
     * application.ini
     * Si la locale actuelle n'existe pas (celle demandée par le navigateur),
     * charge cet adaptateur par défaut.
     */
//     protected function _initDefaultTranslation()
//     {
//         if (!$this->hasResource('locale')) {
//             $this->bootstrap('locale');
//         }

//         if (!$this->hasResource('translate')) {
//             $this->bootstrap('translate');
//         }

//         $locale = $this->getResource('locale');
//         $translate = $this->getResource('translate');

//         $translate->setLocale($locale);

//         $config = $this->getOptions();
      
//         $defaultLanguage = $config['resources']['translate']['default'];

//         if (!$translate->isAvailable($locale->getLanguage())) {
//             $translate->setLocale($defaultLanguage);
//         }
//     }
    
//     protected function _initDefaultAcl()
//     {
//     	if (!$this->hasResource('acl')) {
//     		$this->bootstrap('acl');
//     	}
//     }
}

















