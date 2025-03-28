// Load global variables.
const path = require( 'path' );

// Set the main block JSX files into the entry object.
const entries = {};

entries['main'] = [
	'./js/main-default.js',
	'./css/scss/main-default.scss',
];

module.exports = {
	entry: entries,
	output: {
		path: path.resolve( __dirname, 'dist' ),
		clean: true,
		filename: './js/[name].js',
	},
};
