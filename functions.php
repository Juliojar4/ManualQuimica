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

/*
|--------------------------------------------------------------------------
| Limite de Quantidade no Carrinho
|--------------------------------------------------------------------------
*/

// Limitar quantidade máxima de cada produto para 1 unidade
add_filter('woocommerce_quantity_input_args', 'force_single_product_quantity_limit', 10, 2);

function force_single_product_quantity_limit($args, $product) {
    // Define quantidade máxima como 1
    $args['max_value'] = 1;
    
    // Se já houver o produto no carrinho, define valor como 1
    if (is_admin() || !WC()->cart) {
        return $args;
    }
    
    // Verifica se o produto já está no carrinho
    $cart_contents = WC()->cart->get_cart_contents();
    foreach ($cart_contents as $cart_item) {
        if ($cart_item['product_id'] == $product->get_id()) {
            $args['input_value'] = 1;
            $args['min_value'] = 1;
            $args['max_value'] = 1;
            break;
        }
    }
    
    return $args;
}

// Prevenir adição de mais de 1 unidade do mesmo produto
add_filter('woocommerce_add_cart_item_data', 'prevent_duplicate_products_in_cart', 10, 3);

function prevent_duplicate_products_in_cart($cart_item_data, $product_id, $variation_id) {
    // Verifica se o produto já está no carrinho
    $cart = WC()->cart->get_cart();
    
    foreach ($cart as $cart_item_key => $cart_item) {
        if ($cart_item['product_id'] == $product_id) {
            // Se o produto já existe, remove o anterior e adiciona o novo
            WC()->cart->remove_cart_item($cart_item_key);
            
            // Adiciona mensagem informativa
            wc_add_notice(
                sprintf(
                    __('Produto "%s" já estava no carrinho. Quantidade atualizada para 1 unidade.', 'sage'),
                    get_the_title($product_id)
                ),
                'notice'
            );
            
            break;
        }
    }
    
    return $cart_item_data;
}

// Forçar quantidade para 1 quando produto é adicionado ao carrinho
add_filter('woocommerce_add_to_cart_quantity', 'force_cart_item_quantity_to_one', 10, 2);

function force_cart_item_quantity_to_one($quantity, $product_id) {
    // Sempre retorna 1 como quantidade
    return 1;
}

// Atualizar carrinho para manter apenas 1 de cada produto
add_action('woocommerce_before_calculate_totals', 'force_single_quantity_in_cart');

function force_single_quantity_in_cart($cart) {
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    // Evita loops infinitos
    if (did_action('woocommerce_before_calculate_totals') >= 2) {
        return;
    }

    // Percorre todos os itens do carrinho
    foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
        // Se a quantidade for maior que 1, força para 1
        if ($cart_item['quantity'] > 1) {
            $cart->set_quantity($cart_item_key, 1);
            
            // Adiciona mensagem apenas uma vez
            if (!wc_has_notice('Quantidade máxima de 1 unidade por produto.', 'notice')) {
                wc_add_notice(
                    __('Quantidade máxima de 1 unidade por produto.', 'sage'),
                    'notice'
                );
            }
        }
    }
}

// Remover botões de aumentar quantidade na página do carrinho
add_action('wp_head', 'hide_cart_quantity_buttons');

function hide_cart_quantity_buttons() {
    if (is_cart()) {
        ?>
        <style>
        .woocommerce .quantity .plus,
        .woocommerce .quantity .minus {
            display: none !important;
        }
        
        .woocommerce .quantity input.qty {
            text-align: center !important;
            width: 60px !important;
            background-color: #f8f9fa !important;
            border: 2px solid #14B8A6 !important;
            color: #14B8A6 !important;
            font-weight: bold !important;
            border-radius: 5px !important;
        }
        
        .woocommerce .quantity input.qty:focus {
            outline: none !important;
            border-color: #0891B2 !important;
            box-shadow: 0 0 0 2px rgba(20, 184, 166, 0.2) !important;
        }
        
        /* Adicionar ícone ou texto explicativo */
        .woocommerce .quantity::after {
            content: "Máx: 1";
            font-size: 10px;
            color: #6b7280;
            margin-left: 5px;
            vertical-align: middle;
        }
        </style>
        <?php
    }
}

// Validar quantidade antes de adicionar ao carrinho
add_filter('woocommerce_add_to_cart_validation', 'validate_single_product_quantity', 10, 5);

function validate_single_product_quantity($passed, $product_id, $quantity, $variation_id = '', $variations = '') {
    // Se tentativa de adicionar mais de 1, força para 1
    if ($quantity > 1) {
        $_POST['quantity'] = 1;
        
        wc_add_notice(
            __('Você pode adicionar apenas 1 unidade de cada produto ao carrinho.', 'sage'),
            'notice'
        );
    }
    
    return $passed;
}

// Adicionar JavaScript para desabilitar alteração de quantidade
add_action('wp_footer', 'disable_quantity_changes');

function disable_quantity_changes() {
    if (is_cart() || is_product()) {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Desabilita alteração de quantidade nos campos
            const quantityInputs = document.querySelectorAll('input.qty, input[name*="quantity"]');
            
            quantityInputs.forEach(function(input) {
                input.setAttribute('readonly', 'readonly');
                input.setAttribute('min', '1');
                input.setAttribute('max', '1');
                input.value = '1';
                
                // Previne alteração via teclado
                input.addEventListener('keydown', function(e) {
                    e.preventDefault();
                    return false;
                });
                
                // Sempre mantém valor como 1
                input.addEventListener('change', function() {
                    this.value = '1';
                });
            });
            
            // Remove botões de mais/menos se existirem
            const plusButtons = document.querySelectorAll('.quantity .plus, .plus');
            const minusButtons = document.querySelectorAll('.quantity .minus, .minus');
            
            plusButtons.forEach(btn => btn.style.display = 'none');
            minusButtons.forEach(btn => btn.style.display = 'none');
        });
        </script>
        <?php
    }
}

/*
|--------------------------------------------------------------------------
| Mensagem de Download na Confirmação de Pedido
|--------------------------------------------------------------------------
*/

// Adicionar mensagem personalizada no topo da página order-received
add_action('woocommerce_before_thankyou', 'add_download_message_after_checkout', 5, 1);

function add_download_message_after_checkout($order_id) {
    if (!$order_id) return;
    
    $order = wc_get_order($order_id);
    if (!$order) return;
    
    ?>
    <div class="woocommerce-order-download-simple" style="
        background: linear-gradient(135deg, #14B8A6, #0891B2);
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        margin: 20px 0;
        text-align: center;
        font-size: 0.95rem;
        box-shadow: 0 4px 12px rgba(20, 184, 166, 0.2);
    ">
        📚 <strong>Após a confirmação do pagamento</strong>, seus materiais estarão disponíveis em 
        <a href="<?php echo esc_url(wc_get_account_endpoint_url('downloads')); ?>" 
           style="color: white; text-decoration: underline; font-weight: bold;"
           onmouseover="this.style.color='#f0f9ff'"
           onmouseout="this.style.color='white'">
            Meus Downloads
        </a>
    </div>
    <?php
}
