define(function(require, exports, module) {
	var Handlebars = require("./handlebars");
	var isArray = function(value) {
        return Object.prototype.toString.call(value) === '[object Array]';
    }

    var ExpressionRegistry = function() {
        this.expressions = [];
    };

    ExpressionRegistry.prototype.add = function (operator, method) {
        this.expressions[operator] = method;
    };

    ExpressionRegistry.prototype.call = function (operator, left, right) {
        if ( ! this.expressions.hasOwnProperty(operator)) {
            throw new Error('Unknown operator "'+operator+'"');
        }

        return this.expressions[operator](left, right);
    };

    var eR = new ExpressionRegistry;
    eR.add('not', function(left, right) {
        return left != right;
    });
    eR.add('>', function(left, right) {
        return left > right;
    });
    eR.add('<', function(left, right) {
        return left < right;
    });
    eR.add('>=', function(left, right) {
        return left >= right;
    });
    eR.add('<=', function(left, right) {
        return left <= right;
    });
    eR.add('===', function(left, right) {
        return left === right;
    });
    eR.add('!==', function(left, right) {
        return left !== right;
    });
    eR.add('len>', function(left, right) {
        return left.length > right;
    });
    eR.add('len<', function(left, right) {
        return left.length < right;
    });
    eR.add('len=', function(left, right) {
        return left.length == right;
    });
    eR.add('in', function(left, right) {
        if ( ! isArray(right)) {
            right = right.split(',');
        }
        return right.indexOf(left) !== -1;
    });

    var isHelper = function() {
        var args = arguments
        ,   left = args[0]
        ,   operator = args[1]
        ,   right = args[2]
        ,   options = args[3]
        ;

        if (args.length == 2) {
            options = args[1];
            if (left) return options.fn(this);
            return options.inverse(this);
        }

        if (args.length == 3) {
            right = args[1];
            options = args[2];
            if (left == right) return options.fn(this);
            return options.inverse(this);
        }

        if (eR.call(operator, left, right)) {
            return options.fn(this);
        }
        return options.inverse(this);
    };

    Handlebars.registerHelper('is', isHelper);
    Handlebars.registerHelper('nl2br', function(text) {
        var nl2br = (text + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + '<br>' + '$2');
        return new Handlebars.SafeString(nl2br);
    });

    Handlebars.registerHelper('log', function() {
        console.log(['Values:'].concat(
            Array.prototype.slice.call(arguments, 0, -1)
        ));
    });

    Handlebars.registerHelper('debug', function() {
        console.log('Context:', this);
        console.log(['Values:'].concat(
            Array.prototype.slice.call(arguments, 0, -1)
        ));
    });
    Handlebars.registerHelper('dataPlace', function(str) {
        for(var i=1;i<arguments.length-1;i++){
            var reg = new RegExp("\\{"+(i-1)+"\\}","g");
            str = str.replace(reg,arguments[i]);
        }
        return new Handlebars.SafeString(str);
    });
    Handlebars.registerHelper('safeString', function(string) {
        return new Handlebars.SafeString(string);
    });
    Handlebars.registerHelper('eval', function(name,string) {
        return eval(name)(string);
    });
    Handlebars.registerHelper('exist', function(value,string,options) {
    	if(value.indexOf(string)!=-1){
    		return options.fn(value);
    	}else{
    		return options.inverse(value);
    	}
    });
    
    Handlebars.registerHelper("foreach",function(arr,options) {
		 if(options.inverse && !arr.length) return options.inverse(this);
		 return arr.map(function(item,index) {
			  item.$index = index;
			  item.$first = index === 0;
			  item.$last = index === arr.length-1;
			  return options.fn(item);
		 }).join('');
	});
    Handlebars.registerHelper("map",function(arr,index) {
    	var new_arr = arr;
    	if(!new_arr) return;
		for(var i=1;i<arguments.length-1;i++){
			if(!new_arr[arguments[i]]){
				continue;
			}
			new_arr = new_arr[arguments[i]]		
		}
		return new_arr;
	});
    Handlebars.registerHelper("map2",function(arr,index,options) {
		return options.fn(arr[index]);
	});
    Handlebars.registerHelper("iArr",function(str,options) {
		return options.fn(str.split(','));
	});
    
    Handlebars.registerHelper("join",function(arr,opts) {
		return arr.join(opts)
	});
    
    Handlebars.registerHelper("default",function(str,default_str) {
		return str ? str:default_str;
	});
    Handlebars.registerHelper("operation",function(value,name) {
		var Fns = {
			"mm":function(v){
				return Math.round(v/1000);
			},
			"hh":function(v){
				var x = v/1000;
				return Math.floor(15+(x/(30+x)*140));
			},
            "size_k":function(v){
                return Math.round(v*100/1024)/100;
            }
		}
		if(!Fns[name]) return value;
		return Fns[name](value);
	});
     Handlebars.registerHelper("imgOptWh",function(width,height,options) {
        var opt = options.hash;
        var cas = options.cas || 'chat';
        var Fns = {
            "chat":function(){
                var str = ''
                if(width>opt.minWidth){
                    str = "height:" + Math.floor(height*opt.minWidth/width) +"px;"
                }
                return str
            }
        }
        return Fns[cas]();
     })
    Handlebars.registerHelper("splitEach",function(context,opts,options) {
    	var arr = context.split(opts);
    	var ret = '';
    	for(var i=0;i<arr.length;i++){
    		ret = ret + options.fn(arr[i]);
    	}
		return ret;
	});
    Handlebars.registerHelper("forNum",function(start,end,options) {
        var ret = '';
        for(var i=start;i<end;i++){
            ret = ret + options.fn(this);
        }
        return ret;
    });
    Handlebars.registerHelper("slice",function(context,options) {
    	var start = options.hash.start,
    		end = options.hash.end,
    		ret = context;
    	if(!end){
    		ret = ret.slice(start)
    	}else{
    		ret = ret.slice(start,end)
    	}
		return options.fn(ret);
	});
    Handlebars.registerHelper('link', function(text, options) {  
	  var attrs = [];
	  for(var prop in options.hash) {
	    attrs.push(prop + '="' + options.hash[prop] + '"');
	  }
	  return new Handlebars.SafeString(
	    "<a " + attrs.join(" ") + ">" + text + "</a>"
	  );
	});
    Handlebars.registerHelper('staticDomainUrl', function(text) { 
        var staticDomain = window.HEALTH.staticDomain || "";
        return staticDomain+text;
     });
	var obj = {
		template:function(source){
			return Handlebars.compile(source);
		}
	}
	var template = function(source){
		return Handlebars.compile(source);
	}
	return template;
})