<?php

/*
 * This file is part of the phpstan/phpstan-banned-code project.
 *
 * (c) Ekino
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPStan\Rules;

use PhpParser\Node;
use PhpParser\Node\Expr\Exit_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

/**
 * @author Rémi Marseille <marseille@ekino.com>
 */
class BannedExitRule implements Rule
{
    /**
     * @var bool
     */
    private $enabled;

    /**
     * @param bool $enabled
     */
    public function __construct(bool $enabled = true)
    {
        $this->enabled = $enabled;
    }

    /**
     * {@inheritdoc}
     */
    public function getNodeType(): string
    {
        return Exit_::class;
    }

    /**
     * {@inheritdoc}
     */
    public function processNode(Node $node, Scope $scope): array
    {
        return $this->enabled ? ['Should not use "die/exit", please change the code.'] : [];
    }
}
