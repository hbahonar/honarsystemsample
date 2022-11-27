<?php

if (!defined('ABSPATH')) {
    exit;
}
?>
<form role="search" method="get" class="hss-search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" placeholder="Search" class="search-field" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
    <button type="submit" class="search-submit"><span class="dashicons dashicons-search"></span></button>
</form>