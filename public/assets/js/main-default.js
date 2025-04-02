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
						var $thisForm = $( this );

						itInitForms.handleForm( $thisForm );
						itInitForms.initSchoolSelect( $thisForm );
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
					var form_data = {};

					// Get data with sanitization.

					if ( 'donatori' === $thisForm.attr( 'data-type' ) ) {
						var email          = itInitForms.escapeEmail( $thisForm.find( '#email' ).val() );
						var monthlySupport = itInitForms.escapeYesNo( $thisForm.find( '#monthly-support' ).val() );
						var amount          = itInitForms.escapeNumber( $thisForm.find( '#amount' ).val() );
						var message       = itInitForms.escapeHTML( $thisForm.find( '#message' ).val() );

						// Validate if mandatory fields are filled.
						if ( ! email || ! amount || ! monthlySupport ) {
							$response.empty().html( 'Molimo popunite sva obavezna polja.' );
							return;
						}

						// Set data.
						form_data = {
							type: $thisForm.attr( 'data-type' ),
							email: email,
							monthly_support: monthlySupport,
							amount: amount,
							message: message,
						};
					} else if ( 'delegati' === $thisForm.attr( 'data-type' ) ) {
						var email            = itInitForms.escapeEmail( $thisForm.find( '#email' ).val() );
						var phone            = itInitForms.escapeHTML( $thisForm.find( '#phone' ).val() );
						var full_name        = itInitForms.escapeHTML( $thisForm.find( '#full-name' ).val() );
						var school_type      = itInitForms.escapeSchoolType( $thisForm.find( '#school-type' ).val() );
						var city             = itInitForms.escapeHTML( $thisForm.find( '#city' ).val() );
						var school           = itInitForms.escapeHTML( $thisForm.find( '#school-name' ).val() );
						var suspended_number = itInitForms.escapeNumber( $thisForm.find( '#suspended-number' ).val() );
						var total_number     = itInitForms.escapeNumber( $thisForm.find( '#total-number' ).val() );
						var message          = itInitForms.escapeHTML( $thisForm.find( '#message' ).val() );

						// Validate if mandatory fields are filled.
						if ( ! email || ! full_name || ! school_type || ! city || ! school || ! suspended_number || ! total_number ) {
							$response.empty().html( 'Molimo popunite sva obavezna polja.' );
							return;
						}

						// Set data.
						form_data = {
							type: $thisForm.attr( 'data-type' ),
							email: email,
							full_name: full_name,
							school_type: school_type,
							city: city,
							school: school,
							suspended_number: suspended_number,
							total_number: total_number,
							message: message,
						};
					} else if ( 'osteceni' === $thisForm.attr( 'data-type' ) ) {
						var full_name    = itInitForms.escapeHTML( $thisForm.find( '#full-name' ).val() );
						var city         = itInitForms.escapeHTML( $thisForm.find( '#city' ).val() );
						var school       = itInitForms.escapeHTML( $thisForm.find( '#school-name' ).val() );
						var bank_account = itInitForms.escapeHTML( $thisForm.find( '#bank-account' ).val() );
						var amount       = itInitForms.escapeNumber( $thisForm.find( '#amount' ).val() );
console.log(school);
						// Validate if mandatory fields are filled.
						if ( ! full_name || ! city || ! school || ! bank_account || ! amount ) {
							$response.empty().html( 'Molimo popunite sva obavezna polja.' );
							return;
						}

						// Set data.
						form_data = {
							type: $thisForm.attr( 'data-type' ),
							full_name: full_name,
							city: city,
							school: school,
							bank_account: bank_account,
							amount: amount,
						};
					}

					// Send to API.
					this.submit();
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
		escapeYesNo: function ( value ) {
			return ['DA', 'NE'].includes( value ) ? value : 'NE';
		},
		escapeSchoolType: function ( value ) {
			return ['OŠ', 'SŠ', 'G'].includes( value ) ? value : '';
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
		initSchoolSelect: function ( $form ) {
			var $city   	= $form.find( '.it-school-city' );
			var $school 	= $form.find( '.it-school-name' );
			var $schoolName = $form.find( '.it-school-value' );

			if ( $city.length && $school.length ) {
				$city.on(
					'change',
					function () {
						var cityValue = $( this ).val();

						$school.hide();
						$form.find( '.it-school-name[data-city*="' + cityValue + '"]' ).show();
						$schoolName.val( '' );
					}
				);

				$school.on(
					'change',
					function () {
						$schoolName.val( $( this ).val() );
					}
				);
			}
		},
	};

})( jQuery );