var fs = require("fs");
var path = require("path");
//var iconv = require('iconv-lite');
var assetsPath = "patform";
//var assetsPath = "../../bulid";
Date.prototype.Format = function(fmt){ //author: meizz
  var o = {   
    "M+" : this.getMonth()+1,                 //月份
    "d+" : this.getDate(),                    //日
    "h+" : this.getHours(),                   //小时
    "m+" : this.getMinutes(),                 //分
    "s+" : this.getSeconds(),                 //秒
    "q+" : Math.floor((this.getMonth()+3)/3), //季度
    "S"  : this.getMilliseconds()             //毫秒
  };   
  if(/(y+)/.test(fmt))   
    fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));   
  for(var k in o)   
    if(new RegExp("("+ k +")").test(fmt))   
  fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));   
  return fmt;   
}
var _writeFile = function(paths,data){
	fs.writeFile(paths, data, 'ascii', function(err){ 
   		 if(err){ 
   			 console.log('write error:'+paths); 
   		 }else{
   			 console.log('write success please copy the version'+version); 
   		 } 
   	})
}
function stylesFilesFn(path,dest){
	var _lessdir = {};
	files = fs.readdirSync(path);
	files.forEach(function(item) {
    	var tmpPath = path + '/' + item;
        var stats = fs.statSync(tmpPath);
        if (!stats.isDirectory()) {
            if(item.indexOf(".less") > 0){
				var arr = item.split('.');
				_lessdir[dest+"/"+arr[0]+".css"] = tmpPath
			}
        }  
    });
    return _lessdir;
}
var getfiles = function(t){
    	var defFiles = ["lib","plugins","scripts","styles"];
    	var resFiles = [];
    	for(var i=0;i<defFiles.length;i++){
    		resFiles.push(defFiles[i]+'/**/*'+t)
    	}
    	return resFiles;
    }
var version = '';//(new Date()).Format("yyyyMM-ddhhmm");//new Date().getTime();
module.exports = function(grunt) {
    var configFile = "dev/sea/config.js";//grunt.option("config");
    var isBeautify = grunt.option("isBeautify");
    if (!configFile) {
        grunt.log.error("helps:");
        grunt.log.error("--config : config file for seajs");
        grunt.log.error("--isBeautify : is beautify for output");
        return;
    }
    if (!fs.existsSync(configFile)) {
        grunt.log.error("Config file: " + configFile + " does not exist");
        return;
    }
    if (!fs.existsSync("package.json")) {
        grunt.log.error("package file does not exist");
        return;
    }
    var packfile = fs.readFileSync("package.json","utf-8");
    //var packfile = fs.readFileSync("../src/main/webapp/WEB_INF/velocity/pages/common/version/","utf-8");
    var packJson = eval("(" + packfile + ")");
    packJson.version = version;
    assetsPath = assetsPath+'/'+packJson.version;
    var configFileContent = fs.readFileSync(configFile,"utf-8");
    console.log('~o~ please wating...version:'+version);
    
    //configFileContent = iconv.decode(configFileContent)
    configFileContent = eval(configFileContent);

     var config = {};
     //return console.log(path.join(process.cwd(), "src"));
    config.cmd_transport = {
        options: {
            debug: false,
            logLevel: "WARNING",
            useCache: true,
            rootPath: path.join(process.cwd(), "dev"),
            paths: [
                path.join(process.cwd(), "dev")
            ],
            alias: configFileContent.alias,
            aliasPaths: configFileContent.paths,
            handlebars: {
                id: 'plugins/template/handlebars',
                knownHelpers: [
                    "if",
                    "each",
                    "with"
                ]
            }
        },
        release: {
            files: [
                {
                    src: ["**/*.js"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".js",
                    cwd: "dev",
                    filter: "isFile" 
                },
                {
                    src:["**/*.handlebars"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".handlebars.js",
                    cwd: "dev",
                    filter: "isFile"
                },
                {
                    src:["**/*.css"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".css.js",
                    cwd: "dev",
                    filter: "isFile"
                }
            ]
        }
    };

    config.cmd_concat = {
        options: {
            paths: [
                path.normalize(path.join(__dirname,  assetsPath))
            ],
            logLevel: "WARNING",
            useCache: true,
            filters: false,
            include: "all"
        },
        release: {
            files: [
                {
                    src: ["**/*.js"],
                    dest: assetsPath,
                    expand: true,
//                    ext: ".js",
                    cwd: assetsPath,
                    filter: "isFile"
                }
            ]
        }
    };

    // https://github.com/gruntjs/grunt-contrib-uglify
    config.uglify = {
        options: {
            mangle: true,
            beautify: isBeautify,
            report: "min",
            preserveComments: false,
            compress: isBeautify ? false : {
                warnings: false
            }
        },
        release: {
            files: [
                {
                    src: ["**/*.js"],
                    dest: assetsPath,
                    expand: true,
                    //ext: ".js",
                    cwd: assetsPath,
                    filter: function(file) {
                        var stats = fs.lstatSync(file);
                        return stats.isFile() && !/\-debug\.*\.js$/.test(file);
                    },
                    rename: function (dest, src) {
                       var folder = src.substring(0, src.lastIndexOf('/'));  
                       var filename = src.substring(src.lastIndexOf('/'), src.length);   
                       filename = filename.substring(0, filename.lastIndexOf('.'));  
  						console.log(dest+ "/" + folder + filename + '.js')
                       return dest+ "/" + folder + filename + '.js';  
                    }
                }
            ]
        }
    };

    // less: https://github.com/gruntjs/grunt-contrib-less
    config.less = {
        options: {
            paths: [
                path.normalize(path.join(__dirname, "dev", "css"))
            ],
            cleancss: !isBeautify,
            compress: !isBeautify,
            ieCompat: true
        },
        release: {
            files: stylesFilesFn('dev/less',assetsPath+"/css")
        },
        develop: {
            files: stylesFilesFn('dev/less',"dev/css")
        }
    };

    // css min: https://github.com/gruntjs/grunt-contrib-cssmin
    config.cssmin = {
        options: {
            keepSpecialComments: 0,
            report: "min"
        },
        release: {
            files: [
                {
                    src: ["**/*.css"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".css",
                    cwd: "dev",
                    filter: "isFile"
                }
            ]
        }
    };

    // copy images
    config.copy = {
        release: {
            files: [
				{
				    src: ["**/*.js"],
				    dest: assetsPath,
				    expand: true,
				    ext: ".js",
				    cwd: "dev",
				    filter: "isFile"
				},
                {
                    src: ["**/*.png"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".png",
                    cwd: "dev",
                    filter: "isFile"
                },
                {
                    src: ["**/*.jpg"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".jpg",
                    cwd: "dev",
                    filter: "isFile"
                },
                {
                    src: ["**/*.cur"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".cur",
                    cwd: "dev",
                    filter: "isFile"
                },
                {
                    src: ["**/*.jpeg"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".jpeg",
                    cwd: "dev",
                    filter: "isFile"
                },
                {
                    src: ["**/*.gif"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".gif",
                    cwd: "dev",
                    filter: "isFile"
                },
                {
                    src: ["**/*.eot"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".eot",
                    cwd: "dev",
                    filter: "isFile"
                },
                {
                    src: ["**/*.otf"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".otf",
                    cwd: "dev",
                    filter: "isFile"
                },
                {
                    src: ["**/*.svg"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".svg",
                    cwd: "dev",
                    filter: "isFile"
                },
                {
                    src: ["**/*.ttf"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".ttf",
                    cwd: "dev",
                    filter: "isFile"
                },
                {
                    src: ["**/*.woff"],
                    dest: assetsPath,
                    expand: true,
                    ext: ".woff",
                    cwd: "dev",
                    filter: "isFile"
                }
            ]
        }
    };
    // jade: https://github.com/gruntjs/grunt-contrib-jade    
    // config.jade = {
    //  compile: {
    //         options: {
    //             client: false,
    //             pretty: true
    //         },
    //         files: [ {
    //           src: ["*.jade"],
    //           dest: "src/pages/",
    //           ext: ".html",
    //           cwd: "src/templates/",
    //           expand: true
    //         } ]
    //     }
    // }
    // watch for develop
    config.watch = {
        develop: {
            files: ["dev/less/**/*.less"],
            tasks: ["less:develop"]
        }
        // ,
        // compile: {
        //  files: ["src/templates/**/*.jade"],
        //     tasks: ["jade:compile"]
        // } 
    };
    
    grunt.initConfig(config); 
    grunt.loadNpmTasks("grunt-cmd-nice");
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks("grunt-contrib-less");
    grunt.loadNpmTasks("grunt-contrib-cssmin");
    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks('grunt-contrib-copy');

    //grunt.loadNpmTasks('grunt-contrib-jade');
    var tasks = [
        "copy",
        //"less:release",
        "cssmin",
        "cmd_transport",
        "cmd_concat"
    ];
    if (!isBeautify) {
        tasks.push("uglify");
    }
    
    //return grunt.registerTask("default", ["cmd_transport"]);
    grunt.registerTask("c", ["copy"]);
    grunt.registerTask("l", ["less:release"]);
    grunt.registerTask("cs", ["cssmin"]);
    grunt.registerTask("ct", ["cmd_transport"]);
    grunt.registerTask("cc", ["cmd_concat"]);
    grunt.registerTask("base", ["copy","less:release","cssmin","cmd_transport"]);
    grunt.registerTask("default", '一个最简单的任务演示，根据参数打印不同的输出.',function(){
    	var writePath = {
	    	//'../src/main/resources/conf/staticDomainVersion.properties':'static.domain.version = '+version,
	    	'package.json':JSON.stringify(packJson)
	    };
    	console.log(packJson)
	    for ( var p in writePath ){
	    	_writeFile(p, writePath[p]);
	    }
	    grunt.task.run(tasks);
    });
    grunt.registerTask("css", [
        "less:release"
    ]);
    grunt.registerTask("test", [
        "less:develop"
    ]);
    grunt.registerTask("w", [
        "watch"
    ]);
    
};