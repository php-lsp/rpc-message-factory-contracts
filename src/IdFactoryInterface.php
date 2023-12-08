<?php

declare(strict_types=1);

namespace Lsp\Contracts\Message\Factory;

use Lsp\Contracts\Message\IdInterface;

interface IdFactoryInterface
{
    /**
     * Returns new identifier instance created from non-empty string literal.
     *
     * ```php
     *  $id = $factory->createFromString('550e8400-e29b-41d4-a716-446655440000');
     * ```
     *
     * @param non-empty-string $id
     */
    public function createFromString(string $id): IdInterface;

    /**
     * Returns new identifier instance created from any int literal.
     *
     * ```php
     *  $id = $factory->createFromInt(0xDEAD_BEEF);
     * ```
     */
    public function createFromInt(int $id): IdInterface;

    /**
     * Returns empty identifier instance.
     *
     * Note: An empty instance can be a singleton, i.e. the object can be
     *       IDENTICAL each time it is called.
     *
     * ```php
     *  $id = $factory->createEmpty();
     *
     *  assert($id === $factory->createEmpty()); // Allowed to be true and/or false
     * ```
     */
    public function createEmpty(): IdInterface;
}
