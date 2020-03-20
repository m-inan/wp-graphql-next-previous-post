<?php

namespace WPGraphQL\Extensions\NextPreviousPost;

use WPGraphQL\AppContext;
use WPGraphQL\Data\DataSource;
use WPGraphQL\Model\Post;

/**
 * Class Laoder
 *
 * This class allows you to see the next and previous posts in the 'post' type.
 *
 * @package WNextPreviousPost
 * @since   0.1.0
 */
class Loader
{
    public static function init()
    {
        define('WP_GRAPHQL_NEXT_PREVIOUS_POST', 'initialized');
        (new Loader())->bind_hooks();
    }

    public function bind_hooks()
    {
        add_action(
            'graphql_register_types',
            [$this, 'npp_action_register_types'],
            9,
            0
        );

    }

    public function npp_action_register_types()
    {
        register_graphql_field('Post', 'next', [
            'type' => 'post',
            'description' => __(
                'Get Next Post',
                'wp-graphql-offset-pagination'
            ),
            'resolve' => function (Post $post, array $args, AppContext $context) {
                $next = get_next_post();

                return DataSource::resolve_post_object($next->ID, $context);
            },
        ]);

        register_graphql_field('Post', 'previous', [
            'type' => 'post',
            'description' => __(
                'Get Previous Post',
                'wp-graphql-offset-pagination'
            ),

            'resolve' => function (Post $post, array $args, AppContext $context) {
                $prev = get_previous_post();

                return DataSource::resolve_post_object($prev->ID, $context);
            },
        ]);
    }
}
