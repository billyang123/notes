# direct common self-executing modules

require 'module/ajax'
require 'module/highlight'

$('script[data-main][data-main!=""]:first').each ->
	$.each $.trim($(this).data 'main').split(/[\s,]+/), (i,m) ->
		require m