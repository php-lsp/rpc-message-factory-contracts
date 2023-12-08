<?php

declare(strict_types=1);

namespace Lsp\Contracts\Message\Factory;

use Lsp\Contracts\Message\IdentifiableInterface;
use Lsp\Contracts\Message\IdInterface;
use Lsp\Contracts\Message\NotificationInterface;
use Lsp\Contracts\Message\RequestInterface;

interface RequestFactoryInterface
{
    /**
     * Creates a new {@see RequestInterface} instance by method and
     * its parameters.
     *
     * In case of "$id" identifier is {@see null}, then the identifier can be
     * generated automatically.
     *
     * ```php
     *  $factory->createRequest('example-request');
     *
     *  $factory->createRequest('example-request', ['arg1', 'arg2']);
     *
     *  $factory->createRequest('example-request', ['name' => 'value', 'other' => 42]);
     * ```
     *
     * @param non-empty-string $method Non-empty RPC request method name.
     * @param array<array-key, mixed> $parameters List of RPC request parameters.
     */
    public function createRequest(string $method, array $parameters = [], IdInterface|IdentifiableInterface $id = null): RequestInterface;

    /**
     * Creates a new {@see NotificationInterface} instance by method and
     * its parameters.
     *
     * ```php
     *  $factory->createNotification('example-notification');
     *
     *  $factory->createNotification('example-notification', ['arg1', 'arg2']);
     *
     *  $factory->createNotification('example-notification', ['name' => 'value', 'other' => 42]);
     * ```
     *
     * @param non-empty-string $method Non-empty RPC request method name.
     * @param array<array-key, mixed> $parameters List of RPC request parameters.
     */
    public function createNotification(string $method, array $parameters = []): NotificationInterface;
}
