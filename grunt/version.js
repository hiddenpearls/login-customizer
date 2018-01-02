/**
 * Version File for Grunt
 *
 * @package feedzy-rss-feeds-pro
 */
/* jshint node:true */
// https://github.com/kswedberg/grunt-version
module.exports = {
	options: {
		pkg: {
			version: '<%= package.version %>'
		}
	},
	project: {
		src: [
			'package.json'
		]
	},
	style: {
		options: {
			prefix: 'Version\\:\.*\\s'
		},
		src: [
			'login-customizer.php'
		]
	},
	constants: {
		options: {
			prefix: 'LOGINCUST_VERSION\'\,\\s+\''
		},
		src: [
			'login-customizer.php',
		]
	}
};
