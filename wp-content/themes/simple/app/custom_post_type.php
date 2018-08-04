<?php

namespace App;

function create_post_type() {
  $argsTeam = array(
    'labels' => array(
				'name' => 'People',
				'singular_name' => 'Person',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Person',
				'edit' => 'Edit',
				'edit_item' => 'Edit Person',
				'new_item' => 'New Person',
				'view_item' => 'View Person',
				'search_items' => 'Search People',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
    ),
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-groups',
    'capability_type' => 'page',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'revisions',
      'page-attributes',
      'thumbnail'
    ),
    'has_archive' => false,
    'rewrite' => array(
      'slug' => 'bio'
    )
  );
  register_post_type( 'simple-team', $argsTeam );
}
add_action( 'init', __NAMESPACE__.'\\create_post_type' );

function create_taxonomies() {

	$argsTeamCategories = array(
		'labels' => array(
			'name' => __( 'Types' ),
			'singular_name' => __( 'Type' )
		),
		'publicly_queryable' => true,
		'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'hierarchical' => true,
		'rewrite' => false
	);
	register_taxonomy('simple-team-category', 'simple-team', $argsTeamCategories);

}
add_action( 'init', __NAMESPACE__.'\\create_taxonomies' );

/**
 * Staff list shortcode
 */
add_shortcode('team', function($atts) {
	extract( shortcode_atts([
    'type' => 'staff'
  ], $atts ) );

	$people = new \WP_Query([
		'post_type' => 'simple-team',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => 'simple-team-category',
				'value' => $type,
				'compare' => '=',
			),
		)
	]);

	ob_start();

	if ($people->have_posts()) : while ($people->have_posts()) : $people->the_post();
		?>
		<div class="row person" itemscope itemprop="author" itemtype="http://schema.org/Person">
      <div class="col m4 s6 xs12">
        <?php
          $imgdata = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium-square');
          if ($imgdata[1] < 400) {
            $thumbnail = get_the_post_thumbnail_url('thumbnail');
          } else {
            $thumbnail = $imgdata[0];
          }
        ?>
        <img src="<?php echo $thumbnail; ?>" alt="Photograph of <?php get_the_title(); ?>" itemprop="image" />

        <?php if (!empty($email = get_field('email'))) { ?>
          <div><a itemprop="email" target="_blank" rel="noopener" href="mailto:<?php echo eae_encode_str($email); ?>"><?php echo eae_encode_str($email); ?></a></div>
        <?php } ?>

				<?php
					$linkedin = get_field('linkedin');
					$twitter = get_field('twitter_name');
				?>

        <?php if (!empty($linkedin) || !empty($twitter)) { ?>
          <ul class="social-icons">
            <?php if (!empty($linkedin)) { ?><li class="linkedin"><a href="<?php echo $linkedin; ?>">LinkedIn</a></li><?php } ?>
            <?php if (!empty($twitter)) { ?><li class="twitter"><a href="https://www.twitter.com/<?php echo $twitter; ?>">Twitter</a></li><?php } ?>
          </ul>
        <?php } ?>
      </div>
			<div class="col m8 s6 xs12">
				<h2 itemprop="name"><?php the_title(); ?></h2>

        <?php if (!empty($title = get_field('title'))) { ?>
  				<div class="title" itemprop="jobTitle"><?php echo $title; ?></div>
        <?php } ?>

        <?php
          if (!empty($short_bio = get_field('short_bio'))) {
            echo $short_bio;
            echo '<p><a href="' . get_permalink() . '">Read more about ' . get_the_title() . '</a></p>';
          } else {
            the_content();
          }
        ?>
			</div>
		</div>
		<?php
	endwhile; endif; wp_reset_postdata();

	return ob_get_clean();
});
