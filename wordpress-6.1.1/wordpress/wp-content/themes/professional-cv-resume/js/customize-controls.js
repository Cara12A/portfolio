( function( api ) {

	// Extends our custom "professional-cv-resume" section.
	api.sectionConstructor['professional-cv-resume'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );