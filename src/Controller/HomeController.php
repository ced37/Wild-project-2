<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

declare(strict_types=1);

namespace App\Controller;

use App\Model\TricksManager;

class HomeController extends MyAbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $tricksManager = new TricksManager();
        $lastFiveTricks = $tricksManager->selectJoin('tricks_id', 'DESC', '5');
        return $this->twig->render(
            'Home/index.html.twig',
            ['lastFiveTricks' => $lastFiveTricks]
        );
    }
}
