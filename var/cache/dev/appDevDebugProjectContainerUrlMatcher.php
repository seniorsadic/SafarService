<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevDebugProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/agence')) {
            // myservice_agence_addagence
            if ($pathinfo === '/agence/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_myservice_agence_addagence;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\AgenceController::addAgence',  '_route' => 'myservice_agence_addagence',);
            }
            not_myservice_agence_addagence:

            // myservice_agence_getallagence
            if ($pathinfo === '/agences') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_agence_getallagence;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\AgenceController::getAllAgence',  '_route' => 'myservice_agence_getallagence',);
            }
            not_myservice_agence_getallagence:

            // myservice_agence_getagencebyid
            if (preg_match('#^/agence/(?P<idagence>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_agence_getagencebyid;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_agence_getagencebyid')), array (  '_controller' => 'MyServiceBundle\\Controller\\AgenceController::getAgenceById',));
            }
            not_myservice_agence_getagencebyid:

            // myservice_agence_udpdateagence
            if (preg_match('#^/agence/(?P<idagence>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_myservice_agence_udpdateagence;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_agence_udpdateagence')), array (  '_controller' => 'MyServiceBundle\\Controller\\AgenceController::udpdateAgence',));
            }
            not_myservice_agence_udpdateagence:

            // myservice_agence_deleteota
            if (preg_match('#^/agence/(?P<idagence>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_myservice_agence_deleteota;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_agence_deleteota')), array (  '_controller' => 'MyServiceBundle\\Controller\\AgenceController::deleteota',));
            }
            not_myservice_agence_deleteota:

            if (0 === strpos($pathinfo, '/agenceota')) {
                // myservice_agenceotacontoller_addagenceota
                if ($pathinfo === '/agenceota/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_myservice_agenceotacontoller_addagenceota;
                    }

                    return array (  '_controller' => 'MyServiceBundle\\Controller\\AgenceOTAContoller::addAgenceOta',  '_route' => 'myservice_agenceotacontoller_addagenceota',);
                }
                not_myservice_agenceotacontoller_addagenceota:

                // myservice_agenceotacontoller_getotabyagence
                if (preg_match('#^/agenceota/(?P<agence>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_myservice_agenceotacontoller_getotabyagence;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_agenceotacontoller_getotabyagence')), array (  '_controller' => 'MyServiceBundle\\Controller\\AgenceOTAContoller::getOtaByAgence',));
                }
                not_myservice_agenceotacontoller_getotabyagence:

                // myservice_agenceotacontoller_deleteota
                if (preg_match('#^/agenceota/(?P<idagenceota>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_myservice_agenceotacontoller_deleteota;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_agenceotacontoller_deleteota')), array (  '_controller' => 'MyServiceBundle\\Controller\\AgenceOTAContoller::deleteota',));
                }
                not_myservice_agenceotacontoller_deleteota:

            }

        }

        if (0 === strpos($pathinfo, '/categorie')) {
            // myservice_categorie_addcategorie
            if ($pathinfo === '/categorie/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_myservice_categorie_addcategorie;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\CategorieController::addCategorie',  '_route' => 'myservice_categorie_addcategorie',);
            }
            not_myservice_categorie_addcategorie:

            // myservice_categorie_getallcategorie
            if ($pathinfo === '/categories') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_categorie_getallcategorie;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\CategorieController::getAllCategorie',  '_route' => 'myservice_categorie_getallcategorie',);
            }
            not_myservice_categorie_getallcategorie:

            // myservice_categorie_getcategoriebyid
            if (preg_match('#^/categorie/(?P<idcategorie>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_categorie_getcategoriebyid;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_categorie_getcategoriebyid')), array (  '_controller' => 'MyServiceBundle\\Controller\\CategorieController::getCategorieById',));
            }
            not_myservice_categorie_getcategoriebyid:

            // myservice_categorie_getcategoriebydesignation
            if (preg_match('#^/categorie/(?P<designation>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_categorie_getcategoriebydesignation;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_categorie_getcategoriebydesignation')), array (  '_controller' => 'MyServiceBundle\\Controller\\CategorieController::getCategorieByDesignation',));
            }
            not_myservice_categorie_getcategoriebydesignation:

            // myservice_categorie_udpdatequestion
            if (preg_match('#^/categorie/(?P<idcategorie>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_myservice_categorie_udpdatequestion;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_categorie_udpdatequestion')), array (  '_controller' => 'MyServiceBundle\\Controller\\CategorieController::udpdateQuestion',));
            }
            not_myservice_categorie_udpdatequestion:

            // myservice_categorie_deleteota
            if (preg_match('#^/categorie/(?P<idcategorie>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_myservice_categorie_deleteota;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_categorie_deleteota')), array (  '_controller' => 'MyServiceBundle\\Controller\\CategorieController::deleteota',));
            }
            not_myservice_categorie_deleteota:

        }

        // myservice_default_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'myservice_default_index');
            }

            return array (  '_controller' => 'MyServiceBundle\\Controller\\DefaultController::indexAction',  '_route' => 'myservice_default_index',);
        }

        if (0 === strpos($pathinfo, '/guichet')) {
            // myservice_guichet_addguichet
            if ($pathinfo === '/guichet/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_myservice_guichet_addguichet;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\GuichetController::addGuichet',  '_route' => 'myservice_guichet_addguichet',);
            }
            not_myservice_guichet_addguichet:

            // myservice_guichet_getguichetbyagence
            if (preg_match('#^/guichet/(?P<agence>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_guichet_getguichetbyagence;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_guichet_getguichetbyagence')), array (  '_controller' => 'MyServiceBundle\\Controller\\GuichetController::getGuichetByAgence',));
            }
            not_myservice_guichet_getguichetbyagence:

            // myservice_guichet_deleteguichet
            if (preg_match('#^/guichet/(?P<idguichet>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_myservice_guichet_deleteguichet;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_guichet_deleteguichet')), array (  '_controller' => 'MyServiceBundle\\Controller\\GuichetController::deleteguichet',));
            }
            not_myservice_guichet_deleteguichet:

        }

        if (0 === strpos($pathinfo, '/ota')) {
            // myservice_ota_addota
            if ($pathinfo === '/ota/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_myservice_ota_addota;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\OTAController::addOta',  '_route' => 'myservice_ota_addota',);
            }
            not_myservice_ota_addota:

            // myservice_ota_getotabyid
            if (preg_match('#^/ota/(?P<idota>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_ota_getotabyid;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_ota_getotabyid')), array (  '_controller' => 'MyServiceBundle\\Controller\\OTAController::getOTAById',));
            }
            not_myservice_ota_getotabyid:

            // myservice_ota_getallota
            if ($pathinfo === '/otas') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_ota_getallota;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\OTAController::getAllOTA',  '_route' => 'myservice_ota_getallota',);
            }
            not_myservice_ota_getallota:

            // myservice_ota_getotabydesignation
            if (preg_match('#^/ota/(?P<designation>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_ota_getotabydesignation;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_ota_getotabydesignation')), array (  '_controller' => 'MyServiceBundle\\Controller\\OTAController::getOtaByDesignation',));
            }
            not_myservice_ota_getotabydesignation:

            // myservice_ota_udpdatequestion
            if (preg_match('#^/ota/(?P<idoperateur>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_myservice_ota_udpdatequestion;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_ota_udpdatequestion')), array (  '_controller' => 'MyServiceBundle\\Controller\\OTAController::udpdateQuestion',));
            }
            not_myservice_ota_udpdatequestion:

            // myservice_ota_deleteota
            if (preg_match('#^/ota/(?P<idoperateur>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_myservice_ota_deleteota;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_ota_deleteota')), array (  '_controller' => 'MyServiceBundle\\Controller\\OTAController::deleteota',));
            }
            not_myservice_ota_deleteota:

        }

        if (0 === strpos($pathinfo, '/pr')) {
            if (0 === strpos($pathinfo, '/privilege')) {
                // myservice_privilege_addprivilege
                if ($pathinfo === '/privilege/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_myservice_privilege_addprivilege;
                    }

                    return array (  '_controller' => 'MyServiceBundle\\Controller\\PrivilegeController::addPrivilege',  '_route' => 'myservice_privilege_addprivilege',);
                }
                not_myservice_privilege_addprivilege:

                // myservice_privilege_getallprivilege
                if ($pathinfo === '/privileges') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_myservice_privilege_getallprivilege;
                    }

                    return array (  '_controller' => 'MyServiceBundle\\Controller\\PrivilegeController::getAllPrivilege',  '_route' => 'myservice_privilege_getallprivilege',);
                }
                not_myservice_privilege_getallprivilege:

                // myservice_privilege_getprivilegebydesignation
                if (preg_match('#^/privilege/(?P<nom>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_myservice_privilege_getprivilegebydesignation;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_privilege_getprivilegebydesignation')), array (  '_controller' => 'MyServiceBundle\\Controller\\PrivilegeController::getPrivilegeByDesignation',));
                }
                not_myservice_privilege_getprivilegebydesignation:

                // myservice_privilege_udpdateprivilege
                if (preg_match('#^/privilege/(?P<idprivilege>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_myservice_privilege_udpdateprivilege;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_privilege_udpdateprivilege')), array (  '_controller' => 'MyServiceBundle\\Controller\\PrivilegeController::udpdatePrivilege',));
                }
                not_myservice_privilege_udpdateprivilege:

                // myservice_privilege_deleteota
                if (preg_match('#^/privilege/(?P<idprivilege>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_myservice_privilege_deleteota;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_privilege_deleteota')), array (  '_controller' => 'MyServiceBundle\\Controller\\PrivilegeController::deleteota',));
                }
                not_myservice_privilege_deleteota:

            }

            if (0 === strpos($pathinfo, '/produit')) {
                // myservice_produit_addproduit
                if ($pathinfo === '/produit/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_myservice_produit_addproduit;
                    }

                    return array (  '_controller' => 'MyServiceBundle\\Controller\\ProduitController::addProduit',  '_route' => 'myservice_produit_addproduit',);
                }
                not_myservice_produit_addproduit:

                // myservice_produit_getallproduit
                if ($pathinfo === '/produits') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_myservice_produit_getallproduit;
                    }

                    return array (  '_controller' => 'MyServiceBundle\\Controller\\ProduitController::getAllProduit',  '_route' => 'myservice_produit_getallproduit',);
                }
                not_myservice_produit_getallproduit:

                // myservice_produit_getproduitbyid
                if (preg_match('#^/produit/(?P<idproduit>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_myservice_produit_getproduitbyid;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_produit_getproduitbyid')), array (  '_controller' => 'MyServiceBundle\\Controller\\ProduitController::getProduitById',));
                }
                not_myservice_produit_getproduitbyid:

                // myservice_produit_getproduitbyagence
                if (0 === strpos($pathinfo, '/produitbyagence') && preg_match('#^/produitbyagence/(?P<idagence>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_myservice_produit_getproduitbyagence;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_produit_getproduitbyagence')), array (  '_controller' => 'MyServiceBundle\\Controller\\ProduitController::getProduitByAgence',));
                }
                not_myservice_produit_getproduitbyagence:

                // myservice_produit_udpdateproduit
                if (preg_match('#^/produit/(?P<idproduit>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_myservice_produit_udpdateproduit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_produit_udpdateproduit')), array (  '_controller' => 'MyServiceBundle\\Controller\\ProduitController::udpdateProduit',));
                }
                not_myservice_produit_udpdateproduit:

                // myservice_produit_deleteproduit
                if (preg_match('#^/produit/(?P<idproduit>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_myservice_produit_deleteproduit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_produit_deleteproduit')), array (  '_controller' => 'MyServiceBundle\\Controller\\ProduitController::deleteProduit',));
                }
                not_myservice_produit_deleteproduit:

            }

        }

        if (0 === strpos($pathinfo, '/role')) {
            // myservice_role_addrole
            if ($pathinfo === '/role/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_myservice_role_addrole;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\RoleController::addRole',  '_route' => 'myservice_role_addrole',);
            }
            not_myservice_role_addrole:

            // myservice_role_getallrole
            if ($pathinfo === '/roles') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_role_getallrole;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\RoleController::getAllRole',  '_route' => 'myservice_role_getallrole',);
            }
            not_myservice_role_getallrole:

            // myservice_role_getrolebydesignation
            if (preg_match('#^/role/(?P<nom>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_role_getrolebydesignation;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_role_getrolebydesignation')), array (  '_controller' => 'MyServiceBundle\\Controller\\RoleController::getRoleByDesignation',));
            }
            not_myservice_role_getrolebydesignation:

            // myservice_role_udpdateprivilege
            if (preg_match('#^/role/(?P<idrole>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_myservice_role_udpdateprivilege;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_role_udpdateprivilege')), array (  '_controller' => 'MyServiceBundle\\Controller\\RoleController::udpdatePrivilege',));
            }
            not_myservice_role_udpdateprivilege:

            // myservice_role_deleteota
            if (preg_match('#^/role/(?P<idrole>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_myservice_role_deleteota;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_role_deleteota')), array (  '_controller' => 'MyServiceBundle\\Controller\\RoleController::deleteota',));
            }
            not_myservice_role_deleteota:

            // myservice_roleprivilegeutilisateur_addroleprivilege
            if ($pathinfo === '/roleprivilege/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_myservice_roleprivilegeutilisateur_addroleprivilege;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\RolePrivilegeUtilisateurController::addRolePrivilege',  '_route' => 'myservice_roleprivilegeutilisateur_addroleprivilege',);
            }
            not_myservice_roleprivilegeutilisateur_addroleprivilege:

        }

        // myservice_roleprivilegeutilisateur_adduserrole
        if ($pathinfo === '/userrole/') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_myservice_roleprivilegeutilisateur_adduserrole;
            }

            return array (  '_controller' => 'MyServiceBundle\\Controller\\RolePrivilegeUtilisateurController::addUserRole',  '_route' => 'myservice_roleprivilegeutilisateur_adduserrole',);
        }
        not_myservice_roleprivilegeutilisateur_adduserrole:

        // myservice_roleprivilegeutilisateur_getprivilegebyrole
        if (0 === strpos($pathinfo, '/roleprivilege') && preg_match('#^/roleprivilege/(?P<idrole>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_myservice_roleprivilegeutilisateur_getprivilegebyrole;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_roleprivilegeutilisateur_getprivilegebyrole')), array (  '_controller' => 'MyServiceBundle\\Controller\\RolePrivilegeUtilisateurController::getPrivilegeByRole',));
        }
        not_myservice_roleprivilegeutilisateur_getprivilegebyrole:

        // myservice_roleprivilegeutilisateur_getrolebyuser
        if (0 === strpos($pathinfo, '/userrole') && preg_match('#^/userrole/(?P<iduser>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_myservice_roleprivilegeutilisateur_getrolebyuser;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_roleprivilegeutilisateur_getrolebyuser')), array (  '_controller' => 'MyServiceBundle\\Controller\\RolePrivilegeUtilisateurController::getRoleByUser',));
        }
        not_myservice_roleprivilegeutilisateur_getrolebyuser:

        if (0 === strpos($pathinfo, '/typeoperation')) {
            // myservice_typeoperation_addtypeoperation
            if ($pathinfo === '/typeoperation/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_myservice_typeoperation_addtypeoperation;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\TypeOperationController::addTypeOperation',  '_route' => 'myservice_typeoperation_addtypeoperation',);
            }
            not_myservice_typeoperation_addtypeoperation:

            // myservice_typeoperation_getalltypeoperation
            if ($pathinfo === '/typeoperations') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_typeoperation_getalltypeoperation;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\TypeOperationController::getAllTypeOperation',  '_route' => 'myservice_typeoperation_getalltypeoperation',);
            }
            not_myservice_typeoperation_getalltypeoperation:

            // myservice_typeoperation_gettypeoperationbydesignation
            if (preg_match('#^/typeoperation/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_typeoperation_gettypeoperationbydesignation;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_typeoperation_gettypeoperationbydesignation')), array (  '_controller' => 'MyServiceBundle\\Controller\\TypeOperationController::gettypeoperationByDesignation',));
            }
            not_myservice_typeoperation_gettypeoperationbydesignation:

            // myservice_typeoperation_udpdatetypeoperation
            if (preg_match('#^/typeoperation/(?P<idtypeoperation>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_myservice_typeoperation_udpdatetypeoperation;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_typeoperation_udpdatetypeoperation')), array (  '_controller' => 'MyServiceBundle\\Controller\\TypeOperationController::udpdateTypeOperation',));
            }
            not_myservice_typeoperation_udpdatetypeoperation:

            // myservice_typeoperation_deletetypeoperation
            if (preg_match('#^/typeoperation/(?P<idtypeoperation>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_myservice_typeoperation_deletetypeoperation;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_typeoperation_deletetypeoperation')), array (  '_controller' => 'MyServiceBundle\\Controller\\TypeOperationController::deleteTypeOperation',));
            }
            not_myservice_typeoperation_deletetypeoperation:

        }

        if (0 === strpos($pathinfo, '/utilisateur')) {
            // myservice_utilisateur_addutilisateur
            if ($pathinfo === '/utilisateur/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_myservice_utilisateur_addutilisateur;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\UtilisateurController::addUtilisateur',  '_route' => 'myservice_utilisateur_addutilisateur',);
            }
            not_myservice_utilisateur_addutilisateur:

            // myservice_utilisateur_getallutilisateur
            if (rtrim($pathinfo, '/') === '/utilisateurs') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_utilisateur_getallutilisateur;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'myservice_utilisateur_getallutilisateur');
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\UtilisateurController::getAllUtilisateur',  '_route' => 'myservice_utilisateur_getallutilisateur',);
            }
            not_myservice_utilisateur_getallutilisateur:

            // myservice_utilisateur_getuserbyagence
            if (0 === strpos($pathinfo, '/utilisateurbyagence') && preg_match('#^/utilisateurbyagence/(?P<idagence>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_utilisateur_getuserbyagence;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_utilisateur_getuserbyagence')), array (  '_controller' => 'MyServiceBundle\\Controller\\UtilisateurController::getUserByAgence',));
            }
            not_myservice_utilisateur_getuserbyagence:

            // myservice_utilisateur_getuserbyid
            if (preg_match('#^/utilisateur/(?P<iduser>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_utilisateur_getuserbyid;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_utilisateur_getuserbyid')), array (  '_controller' => 'MyServiceBundle\\Controller\\UtilisateurController::getUserById',));
            }
            not_myservice_utilisateur_getuserbyid:

            // myservice_utilisateur_udpdateutilisateur
            if (preg_match('#^/utilisateur/(?P<iduser>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_myservice_utilisateur_udpdateutilisateur;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_utilisateur_udpdateutilisateur')), array (  '_controller' => 'MyServiceBundle\\Controller\\UtilisateurController::udpdateUtilisateur',));
            }
            not_myservice_utilisateur_udpdateutilisateur:

            // myservice_utilisateur_deleteutilisateur
            if (preg_match('#^/utilisateur/(?P<iduser>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_myservice_utilisateur_deleteutilisateur;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_utilisateur_deleteutilisateur')), array (  '_controller' => 'MyServiceBundle\\Controller\\UtilisateurController::deleteUtilisateur',));
            }
            not_myservice_utilisateur_deleteutilisateur:

        }

        // myservice_vente_addvente
        if ($pathinfo === '/vente/') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_myservice_vente_addvente;
            }

            return array (  '_controller' => 'MyServiceBundle\\Controller\\VenteController::addVente',  '_route' => 'myservice_vente_addvente',);
        }
        not_myservice_vente_addvente:

        if (0 === strpos($pathinfo, '/detail')) {
            if (0 === strpos($pathinfo, '/details')) {
                // myservice_vente_adddetailsupload
                if ($pathinfo === '/detailsUpload/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_myservice_vente_adddetailsupload;
                    }

                    return array (  '_controller' => 'MyServiceBundle\\Controller\\VenteController::adddetailsUpload',  '_route' => 'myservice_vente_adddetailsupload',);
                }
                not_myservice_vente_adddetailsupload:

                // myservice_vente_adddetailsvente
                if ($pathinfo === '/detailsVente/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_myservice_vente_adddetailsvente;
                    }

                    return array (  '_controller' => 'MyServiceBundle\\Controller\\VenteController::addDetailsVente',  '_route' => 'myservice_vente_adddetailsvente',);
                }
                not_myservice_vente_adddetailsvente:

            }

            // myservice_vente_getventebyid
            if (0 === strpos($pathinfo, '/detailvente') && preg_match('#^/detailvente/(?P<idvente>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_vente_getventebyid;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_vente_getventebyid')), array (  '_controller' => 'MyServiceBundle\\Controller\\VenteController::getVenteById',));
            }
            not_myservice_vente_getventebyid:

        }

        // myservice_vente_getrapportoperateur
        if (0 === strpos($pathinfo, '/rapportOperateur') && preg_match('#^/rapportOperateur/(?P<idoperation>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_myservice_vente_getrapportoperateur;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_vente_getrapportoperateur')), array (  '_controller' => 'MyServiceBundle\\Controller\\VenteController::getRapportOperateur',));
        }
        not_myservice_vente_getrapportoperateur:

        if (0 === strpos($pathinfo, '/ville')) {
            // myservice_ville_addville
            if ($pathinfo === '/ville/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_myservice_ville_addville;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\VilleController::addVille',  '_route' => 'myservice_ville_addville',);
            }
            not_myservice_ville_addville:

            // myservice_ville_getallville
            if ($pathinfo === '/villes') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_ville_getallville;
                }

                return array (  '_controller' => 'MyServiceBundle\\Controller\\VilleController::getAllVille',  '_route' => 'myservice_ville_getallville',);
            }
            not_myservice_ville_getallville:

        }

        // myservice_ville_gettest
        if ($pathinfo === '/test') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_myservice_ville_gettest;
            }

            return array (  '_controller' => 'MyServiceBundle\\Controller\\VilleController::getTest',  '_route' => 'myservice_ville_gettest',);
        }
        not_myservice_ville_gettest:

        if (0 === strpos($pathinfo, '/ville')) {
            // myservice_ville_getvillebydesignation
            if (preg_match('#^/ville/(?P<designation>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_myservice_ville_getvillebydesignation;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_ville_getvillebydesignation')), array (  '_controller' => 'MyServiceBundle\\Controller\\VilleController::getVilleByDesignation',));
            }
            not_myservice_ville_getvillebydesignation:

            // myservice_ville_udpdatevile
            if (preg_match('#^/ville/(?P<idville>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_myservice_ville_udpdatevile;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_ville_udpdatevile')), array (  '_controller' => 'MyServiceBundle\\Controller\\VilleController::udpdateVile',));
            }
            not_myservice_ville_udpdatevile:

            // myservice_ville_deleteville
            if (preg_match('#^/ville/(?P<idville>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_myservice_ville_deleteville;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'myservice_ville_deleteville')), array (  '_controller' => 'MyServiceBundle\\Controller\\VilleController::deleteVille',));
            }
            not_myservice_ville_deleteville:

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
