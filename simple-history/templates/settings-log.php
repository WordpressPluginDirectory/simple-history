<?php

namespace Simple_History;

/**
 * @var Services\Setup_Settings_Page $this
 */
defined( 'ABSPATH' ) || die();

$pager_size = Helpers::get_pager_size();

/**
 * Filter the pager size setting for the settings page
 *
 * @since 2.0
 *
 * @param int $pager_size
 */
$pager_size = apply_filters( 'simple_history/settings_page_pager_size', $pager_size );

?>
<div class="SimpleHistoryGui"
	 data-pager-size='<?php esc_attr( $pager_size ); ?>'
	 ></div>
<?php
