exports.config =
  paths:
    watched: ['styles', 'scripts', 'images']
    public: '../public' # export path
  files:
    javascripts:
      joinTo: 'app.js'

    stylesheets:
      joinTo: 'app.css'
      order:
        before: ['styles/module/uikit.less']

    # templates:
    #   joinTo: 'templates.js'

  modules:
    nameCleaner: (path) ->
      path.replace(/^scripts\//, '') # root dir
  #   wrapper: (path, data) ->
  #     return 'require.define({#{path}, function (exports, require, module) {#{data}}});\n\n'
  # conventions:
  #   assets: /images(\/|\)/