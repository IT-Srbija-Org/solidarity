// Load specific variables.
const { merge } = require( 'webpack-merge' );
const common    = require( './webpack.common.js' );

const autoprefixer     = require( 'autoprefixer' );
const TerserJSPlugin       = require( 'terser-webpack-plugin' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const CssMinimizerPlugin   = require( 'css-minimizer-webpack-plugin' );
const HtmlWebpackPlugin    = require( 'html-webpack-plugin' );
const CopyPlugin           = require( 'copy-webpack-plugin' );

module.exports = merge(
	common,
	{
		mode: 'production',
		optimization: {
			minimizer: [
				new TerserJSPlugin(
					{
						terserOptions: {
							format: {
								comments: false,
							},
						},
						extractComments: false
					}
				),
				new CssMinimizerPlugin()
			],
		},
		plugins: [
			new MiniCssExtractPlugin(
				{
					filename: './css/[name].css',
				}
			),
			new HtmlWebpackPlugin( {
				template: './index.html',
			} ),
			new CopyPlugin({
				patterns: [
					{ from: 'icon.svg', to: 'icon.svg' },
					{ from: 'favicon.ico', to: 'favicon.ico' },
					{ from: 'icon.png', to: 'icon.png' },
				],
			}),
		],
		module: {
			rules: [
				{
					test: /\.(js)$/,
					exclude: /node_modules/,
					use: {
						loader: 'babel-loader',
						options: {
							presets: [
								'@babel/preset-env',
							]
						}
					}
				},
				{
					test: /(-default)\.scss$/,
					use: [
						{
							loader: MiniCssExtractPlugin.loader, // Extract CSS files as separate files
						},
						{
							loader: 'css-loader', // Translates CSS into CommonJS
						},
						{
							loader: 'postcss-loader',  // Modify CSS files (autoprefixer)
							options: {
								postcssOptions: {
									plugins: [
										autoprefixer()
									]
								}
							}
						},
						{
							loader: 'sass-loader', // Compiles Sass to CSS, using Node Sass by default
						},
						{
							loader: 'webpack-import-glob-loader', // Allow Sass wildcard
						},
					]
				},
			],
		},
		resolve: {
			extensions: ['.js', '.scss'],
			preferRelative: true,
		}
	}
);
