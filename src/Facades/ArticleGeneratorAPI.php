<?php

namespace Yebto\ArticleGeneratorAPI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array generate(string $topic, array $extra = [])
 * @method static array validate(string $content, array $extra = [])
 */
class ArticleGeneratorAPI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'yebto-article-generator';
    }
}
