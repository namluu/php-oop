<?php declare(strict_types=1);

namespace Core;

abstract class Controller
{
    public function __construct(
        protected array $routeParams = []
    ) {
    }
}
