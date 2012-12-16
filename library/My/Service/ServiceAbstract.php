<?php 

/**
 * Abstraction de la couche service
 *
 * Abstraction de la couche service :
 * <ul>
 * <li>DI et Lazy loading du cache pour les services</li>
 * </ul>
 *
 */

/**
 * Abstraction de la couche service
 *
 * Abstraction de la couche service :
 * <ul>
 * <li>DI et Lazy loading du cache pour les services</li>
 * </ul>
 *
 * @category My
 * @package Service
 * @version 0.01
 * @since 2012-08-08
 * @author Moi <moi@monmail.com>
 */
abstract class My_Service_ServiceAbstract
{
    /**
     * Gestionnaire de cache propre à Zend Framework - Assure l'interface
     * de l'application avec le cache
     *
     * @var Zend_Cache
     */
    private $cache;
    
    /**
     * Permet d'accéder, en lazy loading, à l'adaptateur
     * de cache de données
     *
     * @return Zend_Cache
     */
    protected function getCache()
    {
        if (null === $this->cache) {
            $fc = Zend_Controller_Front::getInstance();
            $this->cache = $fc->getParam('bootstrap')
            ->getResource('cachemanager')
            ->getCache('global');
        }
    
        return $this->cache;
    }
    
    /**
     * Point d'injection pour le gestionnaire de cache
     * @param Zend_Cache $cache
     */
    public function setCache(Zend_Cache $cache)
    {
        $this->cache = $cache;
    }
    
}