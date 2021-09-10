const path = require( 'path' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin'); //const OptimizeCssAssetsPlugin = require( 'optimize-css-assets-webpack-plugin' );
const TerserPlugin = require('terser-webpack-plugin'); //const UglifyJsPlugin = require( 'uglifyjs-webpack-plugin' );
//const cssnano = require( 'cssnano' );
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const CopyPlugin = require('copy-webpack-plugin');


// JS Directory path.
const JS_DIR = path.resolve( __dirname, 'src/js' );
const IMG_DIR = path.resolve( __dirname, 'src/img' );
const LIB_DIR = path.resolve( __dirname, 'src/library' );
const BUILD_DIR = path.resolve( __dirname, 'build' );

const entry = {
	main: JS_DIR + '/main.js',
	single: JS_DIR + '/single.js',
	editor: JS_DIR + '/editor.js',
};

const output = {
	path: BUILD_DIR,
	filename: 'js/[name].js'
};
/**
 * IMPORTANTSIMO
 * 
 * El plugin ugliftjs no fue instalado
 * ver https://stackoverflow.com/questions/65298689/uglifyjs-and-webpack-v5
 * 
 * El plugin optimize-css-assets-webpack-plugin no fue instalado, en su lugar
 * opté por utilizar css-minimizer-webpack-plugin ya que parece ir mejor con
 * esta version de webpack
 */


const rules = [
    {
		test: /\.js$/,
		include: [ JS_DIR ],
		exclude: /node_modules/,
		use: 'babel-loader'
	},
    {
		test: /\.scss$/,
		exclude: /node_modules/,
		use: [
			MiniCssExtractPlugin.loader,
			'css-loader',
			'sass-loader',
		]
	},
    {
		test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
		use: {
			loader: 'file-loader',
			options: {
				name: '[path][name].[ext]',
				publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../' //v56
			}
		}
	},
	{
		test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
		exclude: [ IMG_DIR, /node_modules/ ],
		use: {
			loader: 'file-loader',
			options: {
				name: '[path][name].[ext]',
				publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
			}
		}
	}
];


const plugins = ( argv ) => [
    new CleanWebpackPlugin( {
		cleanStaleWebpackAssets: ( 'production' === argv.mode  ) // Automatically remove all unused webpack assets on rebuild, when set to true in production. ( https://www.npmjs.com/package/clean-webpack-plugin#options-and-defaults-optional )
	} ),

    new MiniCssExtractPlugin( {
		filename: 'css/[name].css'
	} ),

	new CopyPlugin( {
		patterns: [
			{ from: LIB_DIR, to: BUILD_DIR + '/library' }
		]
	} ),
];


module.exports = ( env, argv) => ({
    entry: entry,
    output: output,
    devtool: 'source-map',
    module: {
        rules: rules
    },
	
	optimization: {
		minimizer: [
			new CssMinimizerPlugin(),
			new TerserPlugin()
		],
	},
	
	plugins: plugins( argv ),
});