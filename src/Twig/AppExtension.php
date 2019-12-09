<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Twig\TwigFilter;
use Twig\TwigFunction;

/*
 * création de variables globales : implémenter l'interface GlobalsInterface
 *  getGlobals est à créer
 */

class AppExtension extends AbstractExtension implements GlobalsInterface
{
	public function getGlobals()
	{
		return [
			'site_name' => 'Khadija Souidi',
			'GA_code' => 'XXXX-XXXXXXX-XXXXXX'
		];
	}

	public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping

	        /*
	         * paramètres
	         *  - nom du filtre à utiliser dans twig
	         *  - nom de la méthode php gérant le filtre
	         *  - options du filtre
	         */
            new TwigFilter('hide_links', [$this, 'hideLinks'], [
            	'is_safe' => [ 'html' ]
            ]),
        ];
    }

    // fonction de filtre doit recevoir en paramètre la donnée à filtrer
	public function hideLinks(string $value):string
	{
		// remplace les liens par du texte
		$result = preg_replace('#<a.*/a>#U', '<mark>[hidden link]</mark>', $value);
		return $result;
	}








    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name', [$this, 'doSomething']),
        ];
    }

    public function doSomething($value)
    {
        // ...
    }
}
