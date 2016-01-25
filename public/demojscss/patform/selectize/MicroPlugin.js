define("selectize/MicroPlugin",[],function(a,b){var c={};c.mixin=function(a){a.plugins={},a.prototype.initializePlugins=function(a){var b,c,e,f=this,g=[];if(f.plugins={names:[],settings:{},requested:{},loaded:{}},d.isArray(a))for(b=0,c=a.length;c>b;b++)"string"==typeof a[b]?g.push(a[b]):(f.plugins.settings[a[b].name]=a[b].options,g.push(a[b].name));else if(a)for(e in a)a.hasOwnProperty(e)&&(f.plugins.settings[e]=a[e],g.push(e));for(;g.length;)f.require(g.shift())},a.prototype.loadPlugin=function(b){var c=this,d=c.plugins,e=a.plugins[b];if(!a.plugins.hasOwnProperty(b))throw new Error('Unable to find "'+b+'" plugin');d.requested[b]=!0,d.loaded[b]=e.fn.apply(c,[c.plugins.settings[b]||{}]),d.names.push(b)},a.prototype.require=function(a){var b=this,c=b.plugins;if(!b.plugins.loaded.hasOwnProperty(a)){if(c.requested[a])throw new Error('Plugin has circular dependency ("'+a+'")');b.loadPlugin(a)}return c.loaded[a]},a.define=function(b,c){a.plugins[b]={name:b,fn:c}}};var d={isArray:Array.isArray||function(a){return"[object Array]"===Object.prototype.toString.call(a)}};return c});