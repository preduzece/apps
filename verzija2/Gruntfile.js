module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
        options: {
            banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: 'src/<%= pkg.name %>.js',
        dest: 'build/<%= pkg.name %>.min.js'
      }
    },
    watch: {
        files: ['**/*'],
        tasks: ['jshint'],
    },
    browserSync: {
        dev: {
            bsFiles: {
                src : [
                    '**/*.css',
                    '**/*.html'
                ]
            },
            options: {
                watchTask: true // < VERY important
            }
        }
    }
  });

  // Load the plugin that provides tasks.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-browser-sync');

  // Default task(s).
  grunt.registerTask('default', ['browserSync', 'watch']);

};