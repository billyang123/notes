# alert notify module
# base on bs.alert
$ = jQuery
$.alert = (msg, status = 'info',pos = 'top-center') ->
  $.UIkit.notify msg,{status:status,pos:pos}