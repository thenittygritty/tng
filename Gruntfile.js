module.exports = function (grunt) {
	'use strict';

	// Project configuration.
	grunt.initConfig({
		pkg: require('./package'),
		meta: {
			banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
			'<%= grunt.template.today("yyyy-mm-dd") %> */'
		},
		jshint: {
			all: [
				'Gruntfile.js',
				'assets/js/main.js'
			],
			options: {
				jshintrc: '.jshintrc'
			}
		},

		concat: {
			deploy: {
				src: [
					'assets/js/vendor/prism.js',
					'assets/js/main.js'
				],
				dest: 'assets/dist/main-<%= pkg.version %>.min.js'
			}
		},

		sass: {
			dev: {
				options: {
					unixNewlines: true,
					style: 'expanded'
				},
				files: {
					'assets/css/main.css': 'assets/scss/main.scss'
				}
			},
			deploy: {
				options: {
					style: 'compressed'
				},
				files: {
					'assets/dist/main-<%= pkg.version %>.min.css': 'assets/scss/main.scss'
				}

			}
		},

		uglify: {
			deploy: {
				src: 'assets/dist/main-<%= pkg.version %>.min.js',
				dest: 'assets/dist/main-<%= pkg.version %>.min.js'
			}
		},

		watch: {
			scss: {
				files: ['assets/scss/**/*.scss'],
				tasks: 'sass:dev'
			},

			js: {
				files: [
					'Gruntfile.js',
					'assets/js/main.js'
				],
				tasks: 'jshint'
			}
		}
	});

	// Load some stuff
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');


	// A task for development
	grunt.registerTask('dev', 'jshint sass:dev');

	// A task for deployment
	grunt.registerTask('deploy', ['jshint', 'concat', 'sass:deploy', 'uglify']);

	// Default task
	grunt.registerTask('default', ['jshint', 'concat', 'sass:dev', 'uglify']);

};
