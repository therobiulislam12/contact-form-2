<?php 

class Menu{
    public function __construct(){
        add_action('admin_menu', [ $this, 'action_admin_menu' ], 99 );

    }

    /**
     * Fires before the administration menu loads in the admin.
     *
     * @param string $context Empty context.
     */
    public function action_admin_menu() : void {
        $parent_menu = 'contactform2';
        $capability = 'manage_options';

        add_menu_page(
            'Contact Form 2',
            'Contact Form 2',
            $capability,
            $parent_menu,
            array($this, 'cf2_main_admin_page'),
            'dashicons-screenoptions',
            25
        );

        add_submenu_page(
            $parent_menu,
            'Contact Form 2',
            'All Forms',
            $capability,
            $parent_menu,
            array($this, 'cf2_main_admin_page')
        );

        add_submenu_page(
            $parent_menu,
            'Add New Form',
            'Add New Form',
            $capability,
            'addnewform',
            array($this, 'cf2_main_add_new_form_page')
        );
    }

    public function cf2_main_admin_page(){
        require_once CF2_FILE . '/includes/Admin/views/main.view.php';
    }
    public function cf2_main_add_new_form_page(){
        require_once CF2_FILE . '/includes/Admin/views/add-new.view.php';
    }
}