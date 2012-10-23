module.exports = function (grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: '<json:package.json>',
		meta: {
			banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
			'<%= grunt.template.today("yyyy-mm-dd") %> */'
		},

		lint: {
			all: ['Gruntfile.js', 'assets/js/main.js']
		},

		concat: {
			deploy: {
				src: ['assets/js/main.js'],
				dest: 'assets/dist/js/main-<%= pkg.version %>.min.js'
			}
		},

		rubysass: {
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
					'assets/dist/css/main-<%= pkg.version %>.min.css': 'assets/scss/main.scss'
				}

			}
		},

		min: {
			deploy: {
				src: ['<config_process:meta.banner>', '<config:concat.deploy.dest>'],
				dest: 'assets/dist/js/main-<%= pkg.version %>.min.js'
			}
		},

		watch: {
			scss: {
				files: ['assets/scss/**/*.scss'],
				tasks: 'rubysass:dev'
			},

			js: {
				files: '<config:lint.all>',
				tasks: 'lint'
			}
		}
	});

	// Load some stuff
	grunt.loadNpmTasks('grunt-sass');


	// A task for development
	grunt.registerTask('dev', 'lint rubysass:dev');

	// A task for deployment
	grunt.registerTask('deploy', 'lint concat rubysass:deploy min');

	// Default task
	grunt.registerTask('default', 'lint concat rubysass:dev min');

};
