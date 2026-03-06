<?php

namespace Yebto\ArticleGeneratorAPI;

use Illuminate\Support\ServiceProvider;

class ArticleGeneratorAPIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/yebto-article-generator.php', 'yebto-article-generator');

        $this->app->singleton('yebto-article-generator', function () {
            return new ArticleGeneratorAPI(config('yebto-article-generator'));
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/yebto-article-generator.php' => config_path('yebto-article-generator.php'),
        ], 'yebto-article-generator-config');
    }
}
