<?php
/*
	Plugin Name: Protagonist Support
	Plugin URI: http://www.protagonist.nl/
	Description: De Protagonist Support plugin activeert een venster in het dashboard van uw WordPress installatie, waarmee u direct in contact kunt komen met de Protagonist support-afdeling.
	Version: 0.3
	Author: Maarten Brakkee
	Author URI: http://maartenbrakkee.nl/

	Copyright (C) 2012  Maarten Brakkee

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if( !class_exists( 'ProtagonistSupport_DashboardWidget') ) {
	class ProtagonistSupport_DashboardWidget {
		function protagonist_support_dashboard_widget() {
			?>
				<div style="clear:both;min-height:80px">
					<img style="display:block;float:right" src="<?php echo plugins_url('logo.png', __FILE__);?>" width="118" height="80" />
					<p style="display:inline-block;vertical-align:top">
						<strong>Ondervindt u problemen met uw website?</strong><br/>
						<form method="post" action="<?php echo bloginfo('wpurl'); ?>/wp-content/plugins/protagonist-support/protagonist_versturen.php">
							<label for="naam">Naam:</label><br/>
								<input type="text" name="naam" id="naam" size="40" /><br/>
							<label for="email">E-mail:</label><br/>
								<input type="text" name="email" id="email" size="40" /><br/>
							<label for="klantnmummer">Klantnummer:</label><br/>
								<input type="text" name="klantnummer" id="klantnummer" size="40" /><br/>
							<label for="bericht">Bericht:</label><br />
								<textarea name="bericht" rows="5" cols="42" id="bericht"></textarea><br/>
								<input type="hidden" name="domein" id="domein" value="<?php echo get_site_url(); ?>" /><br/>
							<input type="submit" name="submit" value="Verstuur" />
						</form>
					</p>
				</div>
			<?php
		}

		function devmind_add_dashboard_widget() {
			wp_add_dashboard_widget( 'devmind-custom-widget', 'Protagonist Support', array( 'ProtagonistSupport_DashboardWidget', 'protagonist_support_dashboard_widget' ) );
		}		
	}
	add_action( 'wp_dashboard_setup', array( 'ProtagonistSupport_DashboardWidget', 'devmind_add_dashboard_widget' ) );
}
?>