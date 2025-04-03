<?php

if ( isset( $error ) && is_array( $error ) ) {
	?>
	<div class="it-form-error">
		<?php
		foreach ( $error as $error_message ) {
			$svg_error = '<svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none"><path d="M2.20164 18.4695L10.1643 4.00506C10.9021 2.66498 13.0979 2.66498 13.8357 4.00506L21.7984 18.4695C22.4443 19.6428 21.4598 21 19.9627 21H4.0373C2.54022 21 1.55571 19.6428 2.20164 18.4695Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 9V13" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 17.0195V17" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>';

			if ( is_array( $error_message ) ) {
				foreach ( $error_message as $err ) {
					echo '<p>' . $svg_error . $err . '</p>';
				}
			} else {
				echo '<p>' . $svg_error . $error_message . '</p>';
			}
		}
		?>
	</div>
<?php }	?>
