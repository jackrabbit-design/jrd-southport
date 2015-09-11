<?php
/*

// Sample Register Post
$postName         = 'Newsroom'; // Name of post type
$postNameSlug     = 'news-post'; // Name of post type
$postNameSingular = 'News Posts'; // Singular Name
$postNamePlural   = 'News Posts'; // Plural Name
register_post_type(
	$postNameSlug, array(
		'labels' => array(
	       'name' => $postName,
	       'singular_name' => $postNameSingular,
	       'add_new' => 'Add ' . $postNameSingular,
	       'add_new_item' => 'Add ' . $postNameSingular,
	       'edit_item' => 'Edit ' . $postNameSingular,
	       'search_items' => 'Search ' . $postNamePlural,
	       'not_found' => 'No ' . $postNamePlural. ' found',
	       'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
	    ),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array('slug' => $postNameSlug),
		'query_var' => true,
		'show_in_nav_menus' => true,
		'exclude_from_search' => false,
		'has_archive' => false,
		'supports' => array(
    		'title',
    		'editor',
    		'author',
    		'thumbnail', //featured image, theme must also support thumbnails
    		'excerpt',
    		'trackbacks',
    		'custom-fields',
    		'comments',
    		'revisions',
    		'page-attributes' //template and menu order, hierarchical must be true
		)
	)
);

// Sample Register Taxonomy
$taxonomyName         = 'News Type';
$taxonomyNameSlug     = 'news-type';
$taxonomyNameSingular = 'News Type';
$taxonomyNamePlural   = 'News Types';
register_taxonomy(
	$taxonomyNameSlug, array($postNameSlug), array(
		'hierarchical' => true, // Category or Tag functionality
		'query_var' => true,
		'rewrite' => array('slug' => $taxonomyNameSlug),
		'labels' => array(
		     'name' => $taxonomyName,
		     'singular_name' => $taxonomyNameSingular,
		     'search_items' => 'Search ' . $taxonomyNamePlural,
		     'popular_items' => 'Popular ' . $taxonomyNamePlural,
		     'all_items' => 'All ' . $taxonomyNamePlural,
		     'parent_item' => null,
		     'parent_item_colon' => null,
		     'edit_item' => 'Edit ' . $taxonomyNameSingular,
		     'update_item' => 'Update ' . $taxonomyNameSingular,
		     'add_new_item' => 'Add New ' . $taxonomyNameSingular,
		     'new_item_name' => 'New ' . $taxonomyNameSingular,
		     'separate_items_with_commas' => 'Separate ' . $taxonomyNamePlural . ' with commas',
		     'add_or_remove_items' => 'Add or remove ' . $taxonomyNamePlural,
		     'choose_from_most_used' => 'Choose from most used ' . $taxonomyNamePlural
		 )
	)
);
*/
// Sample Register Post
$postName         = 'Models'; // Name of post type
$postNameSlug     = 'model'; // Name of post type
$postNameSingular = 'Model'; // Singular Name
$postNamePlural   = 'Models'; // Plural Name
register_post_type(
    $postNameSlug, array(
        'labels' => array(
           'name' => $postName,
           'singular_name' => $postNameSingular,
           'add_new' => 'Add ' . $postNameSingular,
           'add_new_item' => 'Add ' . $postNameSingular,
           'edit_item' => 'Edit ' . $postNameSingular,
           'search_items' => 'Search ' . $postNamePlural,
           'not_found' => 'No ' . $postNamePlural. ' found',
           'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => $postNameSlug),
        'query_var' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'supports' => array(
            'title',
            'editor',
            'page-attributes' //template and menu order, hierarchical must be true
        )
    )
);


// Sample Register Post
$postName         = 'News'; // Name of post type
$postNameSlug     = 'news-article'; // Name of post type
$postNameSingular = 'News Article'; // Singular Name
$postNamePlural   = 'News Articles'; // Plural Name
register_post_type(
    $postNameSlug, array(
        'labels' => array(
           'name' => $postName,
           'singular_name' => $postNameSingular,
           'add_new' => 'Add ' . $postNameSingular,
           'add_new_item' => 'Add ' . $postNameSingular,
           'edit_item' => 'Edit ' . $postNameSingular,
           'search_items' => 'Search ' . $postNamePlural,
           'not_found' => 'No ' . $postNamePlural. ' found',
           'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => $postNameSlug),
        'query_var' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'supports' => array(
            'title',
            'editor'
        )
    )
);


// Sample Register Post
$postName         = 'Events'; // Name of post type
$postNameSlug     = 'event'; // Name of post type
$postNameSingular = 'Event'; // Singular Name
$postNamePlural   = 'Events'; // Plural Name
register_post_type(
    $postNameSlug, array(
        'labels' => array(
           'name' => $postName,
           'singular_name' => $postNameSingular,
           'add_new' => 'Add ' . $postNameSingular,
           'add_new_item' => 'Add ' . $postNameSingular,
           'edit_item' => 'Edit ' . $postNameSingular,
           'search_items' => 'Search ' . $postNamePlural,
           'not_found' => 'No ' . $postNamePlural. ' found',
           'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => $postNameSlug),
        'query_var' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'supports' => array(
            'title',
            'editor'
        )
    )
);
// Sample Register Taxonomy
$taxonomyName         = 'Event Type';
$taxonomyNameSlug     = 'event-type';
$taxonomyNameSingular = 'Event Type';
$taxonomyNamePlural   = 'Event Types';
register_taxonomy(
    $taxonomyNameSlug, array($postNameSlug), array(
        'hierarchical' => true, // Category or Tag functionality
        'query_var' => true,
        'rewrite' => array('slug' => $taxonomyNameSlug),
        'labels' => array(
             'name' => $taxonomyName,
             'singular_name' => $taxonomyNameSingular,
             'search_items' => 'Search ' . $taxonomyNamePlural,
             'popular_items' => 'Popular ' . $taxonomyNamePlural,
             'all_items' => 'All ' . $taxonomyNamePlural,
             'parent_item' => null,
             'parent_item_colon' => null,
             'edit_item' => 'Edit ' . $taxonomyNameSingular,
             'update_item' => 'Update ' . $taxonomyNameSingular,
             'add_new_item' => 'Add New ' . $taxonomyNameSingular,
             'new_item_name' => 'New ' . $taxonomyNameSingular,
             'separate_items_with_commas' => 'Separate ' . $taxonomyNamePlural . ' with commas',
             'add_or_remove_items' => 'Add or remove ' . $taxonomyNamePlural,
             'choose_from_most_used' => 'Choose from most used ' . $taxonomyNamePlural
         )
    )
);
// Sample Register Taxonomy
$taxonomyName         = 'Region';
$taxonomyNameSlug     = 'region';
$taxonomyNameSingular = 'Region';
$taxonomyNamePlural   = 'Regions';
register_taxonomy(
    $taxonomyNameSlug, array($postNameSlug), array(
        'hierarchical' => true, // Category or Tag functionality
        'query_var' => true,
        'rewrite' => array('slug' => $taxonomyNameSlug),
        'labels' => array(
             'name' => $taxonomyName,
             'singular_name' => $taxonomyNameSingular,
             'search_items' => 'Search ' . $taxonomyNamePlural,
             'popular_items' => 'Popular ' . $taxonomyNamePlural,
             'all_items' => 'All ' . $taxonomyNamePlural,
             'parent_item' => null,
             'parent_item_colon' => null,
             'edit_item' => 'Edit ' . $taxonomyNameSingular,
             'update_item' => 'Update ' . $taxonomyNameSingular,
             'add_new_item' => 'Add New ' . $taxonomyNameSingular,
             'new_item_name' => 'New ' . $taxonomyNameSingular,
             'separate_items_with_commas' => 'Separate ' . $taxonomyNamePlural . ' with commas',
             'add_or_remove_items' => 'Add or remove ' . $taxonomyNamePlural,
             'choose_from_most_used' => 'Choose from most used ' . $taxonomyNamePlural
         )
    )
);


// Sample Register Post
$postName         = 'Gallery'; // Name of post type
$postNameSlug     = 'gallery-item'; // Name of post type
$postNameSingular = 'Gallery Item'; // Singular Name
$postNamePlural   = 'Gallery Items'; // Plural Name
register_post_type(
    $postNameSlug, array(
        'labels' => array(
           'name' => $postName,
           'singular_name' => $postNameSingular,
           'add_new' => 'Add ' . $postNameSingular,
           'add_new_item' => 'Add ' . $postNameSingular,
           'edit_item' => 'Edit ' . $postNameSingular,
           'search_items' => 'Search ' . $postNamePlural,
           'not_found' => 'No ' . $postNamePlural. ' found',
           'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => $postNameSlug),
        'query_var' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'supports' => array(
            'title'
        )
    )
);

// Sample Register Post
$postName         = 'FAQs'; // Name of post type
$postNameSlug     = 'faq'; // Name of post type
$postNameSingular = 'FAQ'; // Singular Name
$postNamePlural   = 'FAQs'; // Plural Name
register_post_type(
    $postNameSlug, array(
        'labels' => array(
           'name' => $postName,
           'singular_name' => $postNameSingular,
           'add_new' => 'Add ' . $postNameSingular,
           'add_new_item' => 'Add ' . $postNameSingular,
           'edit_item' => 'Edit ' . $postNameSingular,
           'search_items' => 'Search ' . $postNamePlural,
           'not_found' => 'No ' . $postNamePlural. ' found',
           'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => $postNameSlug),
        'query_var' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'supports' => array(
            'title',
            'editor'
        )
    )
);
// Sample Register Taxonomy
$taxonomyName         = 'FAQ Categories';
$taxonomyNameSlug     = 'faq-category';
$taxonomyNameSingular = 'FAQ Category';
$taxonomyNamePlural   = 'FAQ Categories';
register_taxonomy(
    $taxonomyNameSlug, array($postNameSlug), array(
        'hierarchical' => true, // Category or Tag functionality
        'query_var' => true,
        'rewrite' => array('slug' => $taxonomyNameSlug),
        'labels' => array(
             'name' => $taxonomyName,
             'singular_name' => $taxonomyNameSingular,
             'search_items' => 'Search ' . $taxonomyNamePlural,
             'popular_items' => 'Popular ' . $taxonomyNamePlural,
             'all_items' => 'All ' . $taxonomyNamePlural,
             'parent_item' => null,
             'parent_item_colon' => null,
             'edit_item' => 'Edit ' . $taxonomyNameSingular,
             'update_item' => 'Update ' . $taxonomyNameSingular,
             'add_new_item' => 'Add New ' . $taxonomyNameSingular,
             'new_item_name' => 'New ' . $taxonomyNameSingular,
             'separate_items_with_commas' => 'Separate ' . $taxonomyNamePlural . ' with commas',
             'add_or_remove_items' => 'Add or remove ' . $taxonomyNamePlural,
             'choose_from_most_used' => 'Choose from most used ' . $taxonomyNamePlural
         )
    )
);


// Sample Register Post
$postName         = 'Locations'; // Name of post type
$postNameSlug     = 'location'; // Name of post type
$postNameSingular = 'Location'; // Singular Name
$postNamePlural   = 'Locations'; // Plural Name
register_post_type(
    $postNameSlug, array(
        'labels' => array(
           'name' => $postName,
           'singular_name' => $postNameSingular,
           'add_new' => 'Add ' . $postNameSingular,
           'add_new_item' => 'Add ' . $postNameSingular,
           'edit_item' => 'Edit ' . $postNameSingular,
           'search_items' => 'Search ' . $postNamePlural,
           'not_found' => 'No ' . $postNamePlural. ' found',
           'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => $postNameSlug),
        'query_var' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'supports' => array(
            'title',
            'editor'
        )
    )
);

// Sample Register Post
$postName         = 'Locations'; // Name of post type
$postNameSlug     = 'location'; // Name of post type
$postNameSingular = 'Location'; // Singular Name
$postNamePlural   = 'Locations'; // Plural Name
register_post_type(
    $postNameSlug, array(
        'labels' => array(
           'name' => $postName,
           'singular_name' => $postNameSingular,
           'add_new' => 'Add ' . $postNameSingular,
           'add_new_item' => 'Add ' . $postNameSingular,
           'edit_item' => 'Edit ' . $postNameSingular,
           'search_items' => 'Search ' . $postNamePlural,
           'not_found' => 'No ' . $postNamePlural. ' found',
           'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => $postNameSlug),
        'query_var' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'supports' => array(
            'title',
            'editor',
            'page-attributes' //template and menu order, hierarchical must be true
        )
    )
);


// Sample Register Post
$postName         = 'Team Members'; // Name of post type
$postNameSlug     = 'team-member'; // Name of post type
$postNameSingular = 'Team Member'; // Singular Name
$postNamePlural   = 'Team Members'; // Plural Name
register_post_type(
    $postNameSlug, array(
        'labels' => array(
           'name' => $postName,
           'singular_name' => $postNameSingular,
           'add_new' => 'Add ' . $postNameSingular,
           'add_new_item' => 'Add ' . $postNameSingular,
           'edit_item' => 'Edit ' . $postNameSingular,
           'search_items' => 'Search ' . $postNamePlural,
           'not_found' => 'No ' . $postNamePlural. ' found',
           'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => $postNameSlug),
        'query_var' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'supports' => array(
            'title',
            'editor',
            'page-attributes' //template and menu order, hierarchical must be true
        )
    )
);


// Sample Register Post
$postName         = 'Videos'; // Name of post type
$postNameSlug     = 'video'; // Name of post type
$postNameSingular = 'Video'; // Singular Name
$postNamePlural   = 'Videos'; // Plural Name
register_post_type(
    $postNameSlug, array(
        'labels' => array(
           'name' => $postName,
           'singular_name' => $postNameSingular,
           'add_new' => 'Add ' . $postNameSingular,
           'add_new_item' => 'Add ' . $postNameSingular,
           'edit_item' => 'Edit ' . $postNameSingular,
           'search_items' => 'Search ' . $postNamePlural,
           'not_found' => 'No ' . $postNamePlural. ' found',
           'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => false,
        'rewrite' => array('slug' => $postNameSlug),
        'query_var' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'supports' => array(
            'title'
        )
    )
);

// Sample Register Post
$postName         = 'Blog Posts'; // Name of post type
$postNameSlug     = 'blog-post'; // Name of post type
$postNameSingular = 'Blog Post'; // Singular Name
$postNamePlural   = 'Blog Posts'; // Plural Name
register_post_type(
    $postNameSlug, array(
        'labels' => array(
           'name' => $postName,
           'singular_name' => $postNameSingular,
           'add_new' => 'Add ' . $postNameSingular,
           'add_new_item' => 'Add ' . $postNameSingular,
           'edit_item' => 'Edit ' . $postNameSingular,
           'search_items' => 'Search ' . $postNamePlural,
           'not_found' => 'No ' . $postNamePlural. ' found',
           'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => $postNameSlug),
        'query_var' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'supports' => array(
            'title',
            'editor'
        )
    )
);

// Sample Register Taxonomy
$taxonomyName         = 'Blog Category';
$taxonomyNameSlug     = 'blog-category';
$taxonomyNameSingular = 'Blog Category';
$taxonomyNamePlural   = 'Blog Categories';
register_taxonomy(
    $taxonomyNameSlug, array($postNameSlug), array(
        'hierarchical' => true, // Category or Tag functionality
        'query_var' => true,
        'rewrite' => array('slug' => $taxonomyNameSlug),
        'labels' => array(
             'name' => $taxonomyName,
             'singular_name' => $taxonomyNameSingular,
             'search_items' => 'Search ' . $taxonomyNamePlural,
             'popular_items' => 'Popular ' . $taxonomyNamePlural,
             'all_items' => 'All ' . $taxonomyNamePlural,
             'parent_item' => null,
             'parent_item_colon' => null,
             'edit_item' => 'Edit ' . $taxonomyNameSingular,
             'update_item' => 'Update ' . $taxonomyNameSingular,
             'add_new_item' => 'Add New ' . $taxonomyNameSingular,
             'new_item_name' => 'New ' . $taxonomyNameSingular,
             'separate_items_with_commas' => 'Separate ' . $taxonomyNamePlural . ' with commas',
             'add_or_remove_items' => 'Add or remove ' . $taxonomyNamePlural,
             'choose_from_most_used' => 'Choose from most used ' . $taxonomyNamePlural
         )
    )
);

// Sample Register Post
$postName         = 'Testimonials'; // Name of post type
$postNameSlug     = 'testimonial'; // Name of post type
$postNameSingular = 'Testimonial'; // Singular Name
$postNamePlural   = 'Testimonials'; // Plural Name
register_post_type(
    $postNameSlug, array(
        'labels' => array(
           'name' => $postName,
           'singular_name' => $postNameSingular,
           'add_new' => 'Add ' . $postNameSingular,
           'add_new_item' => 'Add ' . $postNameSingular,
           'edit_item' => 'Edit ' . $postNameSingular,
           'search_items' => 'Search ' . $postNamePlural,
           'not_found' => 'No ' . $postNamePlural. ' found',
           'not_found_in_trash' => 'No ' . $postNamePlural. ' found in trash'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => $postNameSlug),
        'query_var' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'supports' => array(
            'title'
        )
    )
);

