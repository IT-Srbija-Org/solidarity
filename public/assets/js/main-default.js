(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			itInitForms.init();
		}
	);

	var itInitForms = {
		init: function () {
			var $forms = $( '.it-form' );

			if ( $forms.length ) {
				$forms.each(
					function () {
						itInitForms.handleForm( $( this ) );
					}
				);
			}
		},

		handleForm: function ( $form ) {
			$form.on(
				'submit',
				function ( event ) {
					event.preventDefault();

					// Main selectors.
					var $thisForm = $( this );
					var $response = $thisForm.find( '.it-form-response' );

					// Get data with sanitization.
					var email          = itInitForms.escapeEmail( $thisForm.find( '#email' ).val() );
					var mesecnaPodrska = itInitForms.escapeYesNo( $thisForm.find( '#mesecna-podrska' ).val() );
					var iznos          = itInitForms.escapeNumber( $thisForm.find( '#iznos' ).val() );
					var komentar       = itInitForms.escapeHTML( $thisForm.find( '#komentar' ).val() );

					// Validate if mandatory fields are filled.
					if ( ! email || ! iznos || ! komentar ) {
						$response.empty().html( 'Molimo popunite sva obavezna polja.' );
						return;
					}

					// Set data.
					var form_data = {
						email: email,
						mesecna_podrska: mesecnaPodrska,
						iznos: iznos,
						komentar: komentar
					};

					// Send to API.
					$.ajax( {
						url: 'https://api.donacije.com/register',
						type: 'POST',
						contentType: 'application/json',
						data: JSON.stringify( form_data ),
						success: function ( response ) {
							$response.empty().html( 'Donator je uspešno registrovan.' );
						},
						error: function ( xhr, status, error ) {
							var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : error;
							$response.empty().html( 'Došlo je do greške: ' + errorMessage );
						}
					} );
				}
			);
		},

		escapeEmail: function ( email ) {
			if ( email ) {
				email = email.trim().toLowerCase();

				var emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;

				return emailRegex.test( email ) ? email : '';
			}

			return '';
		},

		escapeNumber: function ( number ) {
			if ( number ) {
				number = parseFloat( number );

				if ( isNaN( number ) || number <= 0 ) {
					return 0;
				}

				return number.toFixed( 2 );
			}

			return 0;
		},

		escapeYesNo: function ( yes_no_value ) {
			return (yes_no_value === 'DA' || yes_no_value === 'NE') ? yes_no_value : 'NE';
		},

		escapeHTML: function ( text ) {
			var element = document.createElement( 'div' );

			if ( text ) {
				element.innerText   = text;
				element.textContent = text;

				return element.innerHTML;
			}

			return '';
		},
	};

})( jQuery );