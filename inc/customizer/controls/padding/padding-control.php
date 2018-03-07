<?php
/**
 * Toggle Customizer Control - O2 Customizer Library
 *
 * This control adds a toggle box to the Customizer which allows
 * you to have a checkbox field with toggle control.
 *
 * Toggle is a part of O2 library, which is a
 * free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this library. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package O2 Customizer Library
 * @subpackage Toggle
 * @since 0.1
 */
if ( ! function_exists( 'logincust_padding_control' ) ) :

	function logincust_padding_control( $wp_customize ) {
		class LoginCust_Padding_Control extends WP_Customize_Control {

			public $type = 'logincust-padding';

			public function enqueue() {
				wp_enqueue_script( 'logincust-padding', LOGINCUST_FREE_URL . 'inc/customizer/controls/padding/assets/js/padding-control.js', '', '', true );
				wp_enqueue_style( 'logincust-padding', LOGINCUST_FREE_URL . 'inc/customizer/controls/padding/assets/css/padding-control.css' );
			}

			public function render_content() {
			?>
				<label>
					<div id="<?php echo esc_attr( $this->id ); ?>">
						<?php if ( ! empty( $this->label ) ) : ?>
							<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $this->description ) ) : ?>
							<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
						<?php endif; ?>
						<div class="field-area">
							<div class="field-icon"><i class="dashicons dashicons-arrow-up"></i><?php _e( 'Top', 'login-customizer' ); ?></div>
							<input type="number" value="10" min="0" max="1000" />
							<div class="field-icon"><i class="dashicons dashicons-arrow-right"></i><?php _e( 'Right', 'login-customizer' ); ?></div>
							<input type="number" value="10" min="0" max="1000" />
						</div>
						<div class="field-area">
							<div class="field-icon"><i class="dashicons dashicons-arrow-down"></i><?php _e( 'Down', 'login-customizer' ); ?></div>
							<input type="number" value="10" min="0" max="1000" />
							<div class="field-icon"><i class="dashicons dashicons-arrow-left"></i><?php _e( 'Left', 'login-customizer' ); ?></div>
							<input type="number" value="10" min="0" max="1000" />
						</div>
						<input type="text" value="<?php echo esc_html( $this->value() ); ?>" <?php $this->link(); ?> />
					</div>
				</label>
			<?php }

		}
	}
	add_action( 'customize_register', 'logincust_padding_control' );

endif;