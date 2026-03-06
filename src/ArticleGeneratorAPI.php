<?php

namespace Yebto\ArticleGeneratorAPI;

use Yebto\ApiClient\YebtoClient;

class ArticleGeneratorAPI extends YebtoClient
{
    protected function module(): string
    {
        return 'article';
    }

    protected function defaults(): array
    {
        return [
            'base_url' => 'https://api.yeb.to/v1',
            'key'      => null,
            'curl'     => [
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
                CURLOPT_USERAGENT      => 'yebto-article-generator-api-php',
            ],
        ];
    }

    /**
     * Generate an article on a topic
     */
    public function generate(string $topic, array $extra = []): array
    {
        return $this->post('generate', array_merge(compact('topic'), $extra));
    }

    /**
     * Validate article content
     */
    public function validate(string $content, array $extra = []): array
    {
        return $this->post('validate', array_merge(compact('content'), $extra));
    }
}
