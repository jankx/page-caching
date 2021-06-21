<?php
use Jankx\PageCache\AdvancedCache;

if (!defined('JANKX_PAGE_CACHE_ROOT')) {
    define('JANKX_PAGE_CACHE_ROOT', dirname(__FILE__));
}

function jankx_page_cache_symlink_advanced_cache()
{
    $advanced_cache = sprintf( '%s/advanced-cache.php', constant('WP_CONTENT_DIR') );
    if (!file_exists($advanced_cache) && !class_exists(AdvancedCache::class)) {
        symlink(
            sprintf('%s/advanced-cache.php', constant('JANKX_PAGE_CACHE_ROOT')),
            $advanced_cache
        );
    }
}
add_action('jankx_framework_activation_hook', 'jankx_page_cache_symlink_advanced_cache');
