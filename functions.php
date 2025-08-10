<?php

use Roots\Acorn\Application;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

Application::configure()
    ->withProviders([
        App\Providers\ThemeServiceProvider::class,
    ])
    ->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| WooCommerce Customizations
|--------------------------------------------------------------------------
*/

// Redirecionar para o carrinho após registro bem-sucedido
add_filter('woocommerce_registration_redirect', 'redirect_to_cart_after_registration');

function redirect_to_cart_after_registration($redirect_url) {
    // Verifica se o WooCommerce está ativo
    if (class_exists('WooCommerce')) {
        // Redireciona para o carrinho
        return wc_get_cart_url();
    }
    
    // Se WooCommerce não estiver ativo, mantém o redirecionamento padrão
    return $redirect_url;
}

// Alternativa: Hook após login automático após registro
add_action('wp_login', 'redirect_new_user_to_cart_on_login', 10, 2);

function redirect_new_user_to_cart_on_login($user_login, $user) {
    // Verifica se é um novo usuário (registrado nos últimos 30 segundos)
    $user_registered = strtotime($user->user_registered);
    $now = current_time('timestamp');
    
    // Se foi registrado nos últimos 30 segundos
    if (($now - $user_registered) < 30 && class_exists('WooCommerce')) {
        // Adiciona flag para redirecionamento
        wp_safe_redirect(wc_get_cart_url());
        exit;
    }
}

// Redirecionar após registro via AJAX (se estiver usando)
add_action('wp_ajax_woocommerce_register', 'handle_ajax_registration_redirect');
add_action('wp_ajax_nopriv_woocommerce_register', 'handle_ajax_registration_redirect');

function handle_ajax_registration_redirect() {
    // Intercepta requisições AJAX de registro
    if (isset($_POST['register']) && class_exists('WooCommerce')) {
        // Retorna URL do carrinho para redirecionamento via JavaScript
        wp_send_json_success([
            'redirect' => wc_get_cart_url(),
            'message' => 'Cadastro realizado com sucesso! Redirecionando para o carrinho...'
        ]);
    }
}

// Hook mais direto para formulário de registro
add_action('woocommerce_created_customer', 'redirect_after_customer_creation');

function redirect_after_customer_creation($customer_id) {
    // Verifica se não está em área administrativa
    if (!is_admin() && !wp_doing_ajax() && class_exists('WooCommerce')) {
        // Define cookie para redirecionamento após reload
        setcookie('redirect_to_cart', '1', time() + 10, '/');
    }
}

// JavaScript para fazer o redirecionamento via cookie
add_action('wp_footer', 'add_cart_redirect_script');

function add_cart_redirect_script() {
    if (isset($_COOKIE['redirect_to_cart']) && class_exists('WooCommerce')) {
        // Remove o cookie
        setcookie('redirect_to_cart', '', time() - 3600, '/');
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Aguarda 1 segundo para garantir que o registro foi processado
            setTimeout(function() {
                window.location.href = '<?php echo esc_url(wc_get_cart_url()); ?>';
            }, 1000);
        });
        </script>
        <?php
    }
}
