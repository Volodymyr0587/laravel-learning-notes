<?php

namespace App\Enums;

enum ResourceType: string
{
    case Article = 'article';
    case Video = 'video';
    case Playlist = 'playlist';

    public static function all(): array
    {
        return [
            self::Article->value => 'Article',
            self::Video->value => 'Video',
            self::Playlist->value => 'Playlist',
        ];
    }
}
