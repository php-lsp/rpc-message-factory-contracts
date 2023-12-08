<?php

declare(strict_types=1);

namespace Lsp\Contracts\Message\Factory\Tests;

use Lsp\Contracts\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Message\Factory\RequestFactoryInterface;
use Lsp\Contracts\Message\Factory\ResponseFactoryInterface;
use Lsp\Contracts\Message\FailureResponseInterface;
use Lsp\Contracts\Message\IdInterface;
use Lsp\Contracts\Message\NotificationInterface;
use Lsp\Contracts\Message\RequestInterface;
use Lsp\Contracts\Message\SuccessfulResponseInterface;
use PHPUnit\Framework\Attributes\Group;

/**
 * Note: Changing the behavior of these tests is allowed ONLY when updating
 *       a MAJOR version of the package.
 */
#[Group('php-lsp/rpc-message-factory-contracts')]
final class InterfaceCompatibilityTest extends TestCase
{
    public function testIdFactoryCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class () implements IdFactoryInterface {
            public function createFromString(string $id): IdInterface {}
            public function createFromInt(int $id): IdInterface {}
            public function createEmpty(): IdInterface {}
        };
    }

    public function testRequestFactoryCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class () implements RequestFactoryInterface {
            public function createRequest(
                string $method,
                array $parameters = [],
                IdInterface $id = null
            ): RequestInterface {}

            public function createNotification(
                string $method,
                array $parameters = []
            ): NotificationInterface {}
        };
    }

    public function testResponseFactoryCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class () implements ResponseFactoryInterface {
            public function createSuccess($id, $result): SuccessfulResponseInterface {}
            public function createFailure($id, int $code = 0, string $message = '', $data = null): FailureResponseInterface {}
        };
    }
}
