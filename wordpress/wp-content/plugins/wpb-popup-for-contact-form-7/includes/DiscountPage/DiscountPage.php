<?php
if (! defined('ABSPATH')) {
	exit;
}

class WPBean_CF7_Popup_DiscountPage
{

	/**
	 * The discount page parameters array.
	 *
	 * @var array
	 */
	public $args = array(
		'page_title'  => 'Best WordPress Deals on Top Plugins Now! (2024)',
		'menu_title'  => 'Biggest Sale 2024',
		'menu_slug'   => 'wpbean-discount',
		'icon_url'    => '',
		'menu_type'   => 'submenu',                  // menu or submenu.
		'parent_slug' => 'wpcf7',   // for submenu only.
		'capability'  => 'manage_options',
		'position'    => 9
	);

	/**
	 * Class Constructor
	 */
	public function __construct()
	{
		add_action( 'admin_menu', array( $this, 'create_menu_page' ), 9999 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );

		add_action( 'admin_notices', array( $this, 'discount_admin_notice' ) );
		add_action( 'admin_init', array( $this, 'discount_admin_notice_dismissed' ) );
	}

	public function admin_scripts(){
		wp_enqueue_style( 'wpb_cf7_popup_discount_page_style', plugins_url( 'assets/css/discount-page.css', __FILE__ ), '', '1.0' );
	}

	/**
	 * Create admin menu for the shortcode builder.
	 *
	 * @return void
	 */
	public function create_menu_page() {
		$args = $this->args;

		if ( 'menu' === $args['menu_type'] ) {
			add_menu_page(
				( $args['page_title'] ? $args['page_title'] : $args['menu_title'] ),
				$args['menu_title'],
				$args['capability'],
				$args['menu_slug'],
				array( $this, 'menu_page_content' ),
				$args['icon_url'],
				$args['position']
			);
		} elseif ( 'submenu' === $args['menu_type'] ) {
			add_submenu_page(
				$args['parent_slug'],
				( $args['page_title'] ? $args['page_title'] : $args['menu_title'] ),
				$args['menu_title'],
				$args['capability'],
				$args['menu_slug'],
				array( $this, 'menu_page_content' )
			);
		}
	}

	/**
	 * Admin Page Content
	 *
	 * @return mixed
	 */
	public function menu_page_content() {
		$products = '';
		$key      = '31848190a56d7da81a49506b8ed06f28';
		$token    = 'dab93bcdb652857f1f4a9c7cbb2c568e';
		$tag      = '576';
		$response = wp_remote_get( "https://wpbean.com/edd-api/v2/products/?key={$key}&token={$token}&tag={$tag}&orderby=menu_order&order=DESC" );
		$code     = wp_remote_retrieve_response_code( $response );
		$body     = wp_remote_retrieve_body( $response );

		if( isset($code) && 200 === $code && isset($body) ){
			$products = json_decode($body)->products;
		}
		?>
		<div class="wpb-plugin-discount-page">
			<div class="wpb-plugin-discount-page-header">
				<img src="<?php echo plugins_url( 'assets/icons/black-friday.svg', __FILE__ ); ?>">
				<div>
					<h2>🚀 WPBean Premium Plugins' BIGGEST SALE OF 2024 is here!!! 🔥</h2>
					<p>Treat yourself to a hauntingly good deal with an exclusive 35% discount on our top-rated plugins! For a limited time, you can enhance your projects with powerful features at an unbeatable price. Don't miss out on this special offer to elevate your work and add some magic to your creative toolkit.</p>
					<p>Use this discount code: <b>BF2024</b></p>
					<a href="https://wpbean.com/plugins/?utm_content=WPB+Plugins+Page&utm_campaign=black-friday&utm_medium=black-friday-page&utm_source=FreeVersion" target="_blank" class="button">Grab the Deal</a>
				</div>
			</div>
			<div class="wpb-plugin-discount-page-body">
				<div class="wpb-plugin-discount-items">
					<?php 
						if( isset($products) && '' !== $products ){
							foreach( $products as $product ){
								$permalink =  add_query_arg( array(
									'utm_content'  => 'WPB+Plugins+Page',
									'utm_campaign' => 'black-friday',
									'utm_medium'   => 'black-friday-page',
									'utm_source'   => 'CF7PopupFreeVersion',
								), $product->info->permalink );

								?>
								<div class="wpb-plugin-discount-item">
									<a target="_blank" href="<?php echo esc_url( $permalink ); ?>"><img src="<?php echo esc_url( $product->info->thumbnail )?>" alt="<?php echo esc_html( $product->info->title ); ?>"></a>
									<div class="wpb-plugin-discount-item-content">
										<a target="_blank" href="<?php echo esc_url( $permalink ); ?>"><h3><?php echo esc_html( $product->info->title ); ?></h3></a>
										<p><?php echo esc_html( $product->info->yoast_metadesc ); ?></p>
										<a target="_blank" href="<?php echo esc_url( $permalink ); ?>" class="button">Details</a>
									</div>
								</div>
								<?php
							}
						}
					?>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Pro version discount admin notice.
	 *
	 * @return void
	 */
	public function discount_admin_notice() {
		$user_id     = get_current_user_id();
		$screen      = get_current_screen();
		$dismiss_url = wp_nonce_url(
			add_query_arg( 'wpbean-cf7-popup-discount-admin-notice-dismissed', 'true' ),
			'wpbean_cf7_popup_discount_admin_notice_dismissed',
			'wpbean_cf7_popup_discount_admin_notice_dismissed_nonce'
		);

		$discount_url =  add_query_arg( 'page', 'wpbean-discount', admin_url( 'admin.php' ) );

		if ( 'true' !== get_user_meta( $user_id, 'wpbean_cf7_popup_pro_blackfriday_discount_dismissed', true ) && $user_id && current_user_can( 'manage_options' ) && 'contact_page_wpbean-discount' !== $screen->base ) {
			?>
			<div class="wpb-plugin-discount-page-header notice updated is-dismissible">
				<img src="<?php echo plugins_url( 'assets/icons/black-friday.svg', __FILE__ ); ?>">
				<div>
					<h3>🚀 WPBean Premium Plugins' BIGGEST SALE OF 2024 is here!!! 🔥</h3>
					<p>Treat yourself to a hauntingly good deal with an exclusive 35% discount on our top-rated plugins! For a limited time, you can enhance your projects with powerful features at an unbeatable price. Don't miss out on this special offer to elevate your work and add some magic to your creative toolkit. Use this discount code: <b>BF2024</b>. <a href="<?php echo esc_url( $discount_url ); ?>">More Details</a></p>
					<a href="<?php echo esc_url( $dismiss_url ); ?>" class="notice-dismiss"></a>
				</div>
			</div>
			<?php
		}
	}

	/**
	 * Initialize the dismissed function
	 *
	 * @return void
	 */
	public function discount_admin_notice_dismissed() {
		$user_id = get_current_user_id();

		//delete_user_meta( $user_id, 'wpbean_cf7_popup_pro_blackfriday_discount_dismissed' );

		if ( ! empty( $_GET['wpbean-cf7-popup-discount-admin-notice-dismissed'] ) && $user_id && current_user_can( 'manage_options' ) ) { // WPCS: input var ok.
			check_admin_referer( 'wpbean_cf7_popup_discount_admin_notice_dismissed', 'wpbean_cf7_popup_discount_admin_notice_dismissed_nonce' );
			add_user_meta( $user_id, 'wpbean_cf7_popup_pro_blackfriday_discount_dismissed', 'true', true );
		}
	}
}
