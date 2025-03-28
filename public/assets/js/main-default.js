(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			itInitForms.init();
		}
	);

	var itInitForms = {
		init: function () {
			var $form1 = $( '#it-donatori-form' );
			var $form2 = $( '#it-delegati-form' );
			var $form3 = $( '#it-osteceni-form' );
			if ($form1.length > 0) {
				itInitForms.handleForm1( $form1 );
			}
			if ($form2.length > 0) {
				itInitForms.handleForm2( $form2 );
			}
			if ($form3.length > 0) {
				itInitForms.handleForm3( $form3 );
			}
		},

		handleForm2: function ( $form ) {
			$form.on(
				'submit',
				function ( event ) {
					event.preventDefault();

					// Main selectors.
					var $thisForm = $(this);
					var $response = $thisForm.find('.it-form-response');

					// Get data with sanitization.
					var email = itInitForms.escapeEmail($thisForm.find('#email').val());
					var name = itInitForms.escapeYesNo($thisForm.find('#name').val());

					// Validate if mandatory fields are filled.
					if (!email || !name) {
						$response.empty().html('Molimo popunite sva obavezna polja.');
						return;
					}
					this.submit();
				}
			);
		},

		handleForm1: function ( $form ) {
			$form.on(
				'submit',
				function ( event ) {
					event.preventDefault();

					// Main selectors.
					var $thisForm = $( this );
					var $response = $thisForm.find( '.it-form-response' );

					// Get data with sanitization.
					var email          = itInitForms.escapeEmail( $thisForm.find( '#email' ).val() );
					var mesecnaPodrska = itInitForms.escapeYesNo( $thisForm.find( '#monthly-support' ).val() );
					var iznos          = itInitForms.escapeNumber( $thisForm.find( '#amount' ).val() );
					var komentar       = itInitForms.escapeHTML( $thisForm.find( '#message' ).val() );

					// Validate if mandatory fields are filled.
					if ( ! email || ! iznos ) {
						$response.empty().html( 'Molimo popunite sva obavezna polja.' );
						return;
					}
					this.submit();

					// Set data.
					// var form_data = {
					// 	email: email,
					// 	monthly: mesecnaPodrska,
					// 	amount: iznos,
					// 	comment: komentar
					// };

					return;

					// Send to API.
					// $.ajax( {
					// 	url: 'http://solidforms.local/donorForm',
					// 	type: 'POST',
					// 	contentType: 'application/json',
					// 	dataType: "json",
					// 	data: JSON.stringify( form_data ),
					// 	success: function ( response ) {
					// 		console.log($response.json());
					// 		$response.empty().html( 'Donator je uspešno registrovan.' );
					// 	},
					// 	error: function ( xhr, status, error ) {
					// 		var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : error;
					// 		$response.empty().html( 'Došlo je do greške: ' + errorMessage );
					// 	}
					// } );
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