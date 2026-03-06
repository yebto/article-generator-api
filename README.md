# YEB ArticleGeneratorAPI

PHP SDK for the YEB Article Generator API. Generate and validate articles with AI.

Works standalone (plain PHP) or with Laravel (Facade + auto-discovery).

## Requirements

- PHP 8.1+
- cURL extension
- [YEB API Key](https://yeb.to) (free tier available)

## Installation

```bash
composer require yebto/article-generator-api
```

## Standalone Usage

```php
use Yebto\ArticleGeneratorAPI\ArticleGeneratorAPI;

$api = new ArticleGeneratorAPI(['key' => 'your-api-key']);
$result = $api->generate('example');
```

## Laravel Usage

Add your API key to `.env`:

```
YEB_KEY_ID=your-api-key
```

Use via Facade:

```php
use ArticleGeneratorAPI;

$result = ArticleGeneratorAPI::generate('example');
```

Or via dependency injection:

```php
use Yebto\ArticleGeneratorAPI\ArticleGeneratorAPI;

public function handle(ArticleGeneratorAPI $api)
{
    $result = $api->generate('example');
}
```

### Publish Config

```bash
php artisan vendor:publish --tag=yebto-article-generator-config
```

## Available Methods

| Method | Description |
|--------|-------------|
| `generate($topic)` | Generate an article on a topic |
| `validate($content)` | Validate article content |


All methods accept an optional `$extra` array parameter for additional API options.

## Error Handling

```php
use Yebto\ApiClient\Exceptions\ApiException;
use Yebto\ApiClient\Exceptions\AuthenticationException;
use Yebto\ApiClient\Exceptions\RateLimitException;

try {
    $result = $api->generate('example');
} catch (AuthenticationException $e) {
    // Missing or invalid API key (401)
} catch (RateLimitException $e) {
    // Too many requests (429)
} catch (ApiException $e) {
    echo $e->getMessage();
    echo $e->getHttpCode();
}
```

## Free API Access

Register at [yeb.to](https://yeb.to) with Google OAuth to get a free API key.

## Support

- Documentation: [docs.yeb.to](https://docs.yeb.to)
- Email: support@yeb.to
- Issues: [GitHub Issues](https://github.com/yebto/article-generator-api/issues)

## License

MIT - NETOX Ltd.
