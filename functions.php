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

// Remover restrições de força de senha do WooCommerce
add_action('wp_print_scripts', 'remove_woocommerce_password_strength', 100);

function remove_woocommerce_password_strength() {
    if (wp_script_is('woocommerce', 'enqueued')) {
        wp_dequeue_script('woocommerce');
    }
    if (wp_script_is('wc-password-strength-meter', 'enqueued')) {
        wp_dequeue_script('wc-password-strength-meter');
    }
}

// Desabilitar medidor de força de senha
add_action('wp_print_scripts', 'disable_woocommerce_password_meter');

function disable_woocommerce_password_meter() {
    wp_add_inline_script('jquery', '
        jQuery(document).ready(function($) {
            // Remove validação de força de senha
            $("body").on("keyup", "input[name=password], input[name=account_password]", function() {
                $(this).removeClass("short bad good strong");
                $(this).next(".woocommerce-password-hint").remove();
                $(".woocommerce-password-strength").remove();
            });
            
            // Remove hints de senha
            $(".woocommerce-password-hint").remove();
            $(".woocommerce-password-strength").remove();
        });
    ');
}

// Permitir senhas fracas programaticamente
add_filter('woocommerce_min_password_strength', '__return_zero');

// Remover validação de senha no backend
add_action('woocommerce_save_account_details_errors', 'remove_password_validation', 10, 2);

function remove_password_validation($errors, $user) {
    // Remove erros relacionados à força de senha
    $error_codes = $errors->get_error_codes();
    
    foreach ($error_codes as $code) {
        if (strpos($code, 'password') !== false) {
            $errors->remove($code);
        }
    }
}

// CSS para esconder elementos de força de senha
add_action('wp_head', 'hide_password_strength_elements');

function hide_password_strength_elements() {
    if (is_account_page() || is_checkout()) {
        ?>
        <style>
        .woocommerce-password-strength,
        .woocommerce-password-hint,
        .woocommerce form .form-row .password-input,
        .woocommerce .woocommerce-password-strength,
        .woocommerce .woocommerce-password-hint {
            display: none !important;
        }
        
        /* Estilos para campos de senha */
        .woocommerce input[type="password"] {
            border: 1px solid #ddd !important;
        }
        
        .woocommerce input[type="password"]:focus {
            border-color: #14B8A6 !important;
            box-shadow: 0 0 0 1px #14B8A6 !important;
        }
        </style>
        <?php
    }
}

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
