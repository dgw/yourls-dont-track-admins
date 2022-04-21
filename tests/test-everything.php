<?php

/**
 * Test correct behaviors of the plugin.
 */
class PluginTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        // remove all filters
        yourls_remove_all_filters('shunt_is_valid_user');
        yourls_remove_all_filters('shunt_update_clicks');
        yourls_remove_all_filters('shunt_log_redirect');
    }

    function test_redirection_with_logged_in_user() {
        yourls_add_filter('shunt_is_valid_user', 'yourls_return_true');
        yourls_do_action('redirect_shorturl');

        $this->assertSame( array_key_first(yourls_get_filters('shunt_update_clicks')[10]), 'yourls_return_true' );
        $this->assertSame( array_key_first(yourls_get_filters('shunt_log_redirect')[10]), 'yourls_return_true' );
    }

    function test_redirection_with_unlogged_user() {
        yourls_add_filter('shunt_is_valid_user', 'yourls_return_false');
        yourls_do_action('redirect_shorturl');

        $this->assertSame( [], yourls_get_filters('shunt_update_clicks') );
        $this->assertSame( [], yourls_get_filters('shunt_log_redirect') );
    }

    function test_when_no_redirection() {
        $this->assertSame( [], yourls_get_filters('shunt_update_clicks') );
        $this->assertSame( [], yourls_get_filters('shunt_log_redirect') );
    }

}
