<?php

namespace AsyncAws\S3\Tests\Unit\Result;

use AsyncAws\Core\Response;
use AsyncAws\Core\Test\Http\SimpleMockedResponse;
use AsyncAws\Core\Test\TestCase;
use AsyncAws\S3\Result\CreateBucketOutput;
use Psr\Log\NullLogger;
use Symfony\Component\HttpClient\MockHttpClient;

class CreateBucketOutputTest extends TestCase
{
    public function testCreateBucketOutput(): void
    {
        // see example-1.json from SDK
        $response = new SimpleMockedResponse('', ['Location' => '/examplebucket']);

        $client = new MockHttpClient($response);
        $result = new CreateBucketOutput(new Response($client->request('POST', 'http://localhost'), $client, new NullLogger()));

        self::assertSame('/examplebucket', $result->getLocation());
    }
}
