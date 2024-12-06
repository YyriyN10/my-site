<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

/**
 * User courses
 */

require 'user-courses.php';

/**
 * User role
 */

require 'user-role.php';

/**
 * Cabinet meta
 */

require 'user-cabinet-meta.php';

/**
 * Plugin templates
 */

require 'add-plugin-templates.php';

/**
 * Custom post types
 */

require 'custom-post-types.php';

/**
 * Carbon fields
 */

require YUNA_CAB_DIR . '/carbon/carbon-main.php';

/**
 * Add lesson testing result
 */

require 'user-lesson-tests.php';



