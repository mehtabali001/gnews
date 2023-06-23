<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );



// Register Custom Post Type
function create_custom_post_type() {
    $labels = array(
        'name'                  => _x( 'G News', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'G Post', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'G News', 'text_domain' ),
        'name_admin_bar'        => __( 'G News', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All News', 'text_domain' ),
        'add_new_item'          => __( 'Add New News', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'G News', 'text_domain' ),
        'description'           => __( 'G News Type Description', 'text_domain' ),
        'labels'                => $labels,
		'show_in_rest'			=> true,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-post',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        //'register_meta_box_cb'  => 'add_custom_meta_boxes' // Callback function to add metaboxes
    );

    register_post_type( 'custom_post_type', $args );

	// Register Custom Taxonomy
    $taxonomy_labels = array(
        'name'              => _x( 'Sources', 'taxonomy general name', 'text_domain' ),
        'singular_name'     => _x( 'Source', 'taxonomy singular name', 'text_domain' ),
        'search_items'      => __( 'Search Sources', 'text_domain' ),
        'all_items'         => __( 'All Sources', 'text_domain' ),
        'parent_item'       => __( 'Parent Source', 'text_domain' ),
        'parent_item_colon' => __( 'Parent Source:', 'text_domain' ),
        'edit_item'         => __( 'Edit Source', 'text_domain' ),
        'update_item'       => __( 'Update Source', 'text_domain' ),
        'add_new_item'      => __( 'Add New Source', 'text_domain' ),
        'new_item_name'     => __( 'New Source Name', 'text_domain' ),
        'menu_name'         => __( 'Sources', 'text_domain' ),
    );

    $taxonomy_args = array(
        'labels'            => $taxonomy_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
    );

    register_taxonomy( 'source', 'custom_post_type', $taxonomy_args );
}
add_action( 'init', 'create_custom_post_type' );

/*$apikey = '7701d900d20828c2aab3489af56ae587';
$category = 'general';
$url = "https://gnews.io/api/v4/top-headlines?category=$category&lang=en&country=us&max=10&apikey=$apikey";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = json_decode(curl_exec($ch), true);
curl_close($ch);
$articles = $data['articles'];

print_r($articles);exit;

for ($i = 0; $i < count($articles); $i++) {
    // articles[i].title
    echo "Title: " . $articles[$i]['title'] . "\n";
    // articles[i].description
    echo "Description: " . $articles[$i]['description'] . "\n";
    // You can replace {property} below with any of the article properties returned by the API.
    // articles[i].{property}
    // echo $articles[$i]['{property}'] . "\n";

    // Delete this line to display all the articles returned by the request. Currently only the first article is displayed.
    break;
}*/

// Function to fetch and store news articles
function fetch_and_store_news_articles() {
    // Make API request
    $api_key = '7701d900d20828c2aab3489af56ae587'; // Replace with your gnews.io API key
    $endpoint = 'https://gnews.io/api/v4/search?q=articles&lang=en&country=us&max=5&token=' . $api_key; // Replace "example" with your desired search query
    $response = wp_remote_get( $endpoint );

    if ( is_wp_error( $response ) ) {
        // Error handling
        return;
    }

    $body = wp_remote_retrieve_body( $response );
    $data = json_decode( $body );

    if ( ! isset( $data->articles ) || empty( $data->articles ) ) {
        // No articles found
        return;
    }

	//rint_r($data->articles);exit;

    // Loop through the articles and store in custom post type
    foreach ( $data->articles as $article ) {
        $title = $article->title;
        $content = $article->description;
		$image = $article->image;
        $source = $article->source->name;
		$url = $article->source->url;

        // Create new post
        $post_data = array(
            'post_title'   => $title,
            'post_content' => $content,
            'post_status'  => 'publish',
            'post_type'    => 'custom_post_type', // Replace with your custom post type slug
        );

        $post_id = wp_insert_post( $post_data );

        if ( $post_id ) {
            // Set additional meta information
            update_post_meta( $post_id, 'source', $source );
			update_post_meta( $post_id, 'url', $url );

			// Save featured image
			if ( isset( $image ) ) {
				$image_url = $image;
				$image_name = basename( $image_url );
				$upload_dir = wp_upload_dir();
				$image_data = file_get_contents( $image_url );
				$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
				$filename = $upload_dir['path'] . '/' . $unique_file_name;

				file_put_contents( $filename, $image_data );

				$wp_filetype = wp_check_filetype( $filename, null );
				$attachment = array(
					'post_mime_type' => $wp_filetype['type'],
					'post_title'     => sanitize_file_name( $image_name ),
					'post_content'   => '',
					'post_status'    => 'inherit',
				);

				$attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
				$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
				wp_update_attachment_metadata( $attach_id, $attach_data );

				set_post_thumbnail( $post_id, $attach_id );
			}
        }
    }
}

// Schedule the function to run periodically
function schedule_news_articles_fetch() {
    if ( ! wp_next_scheduled( 'fetch_and_store_news_articles' ) ) {
        wp_schedule_event( time(), 'hourly', 'fetch_and_store_news_articles' );
    }
}
add_action( 'schedule_news_articles_fetch', 'schedule_news_articles_fetch' );

// Hook the function to the scheduled event
add_action( 'fetch_and_store_news_articles', 'fetch_and_store_news_articles' );


//require_once 'custom-post-display.php';


function custom_post_display($atts) {
    ob_start();

    // Retrieve the attributes
    $attributes = shortcode_atts(
        array(
            'post_type' => 'custom_post_type',
            'posts_per_page' => 5,
        ),
        $atts
    );

    // Query the posts based on the attributes
    $args = array(
        'post_type' => $attributes['post_type'],
        'posts_per_page' => $attributes['posts_per_page'],
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Display the post content or any other desired output
            the_title('<h2>', '</h2>');
            the_content();

        }
        wp_reset_postdata();
    }

    return ob_get_clean();
}
add_shortcode('custom_post_display', 'custom_post_display');
