# base on selectize

bind = ->
  $('.js-tags-complete').each ->
    $(this).removeClass 'js-tags-complete'
  .selectize
    plugins: ['remove_button']
    delimiter: ','
    valueField: 'tag_name'
    labelField: 'tag_name'
    searchField: 'tag_name'
    sortField: null
    # persist: false
    maxOptions: 10
    preload: true
    create: (input) ->
     tag_name: input
     # value:input
     # text:input
    load: (query, callback) ->
    	if !query.length 
         return do callback
        $.get('/index.php/tags/search/'+query)
      		.done(callback)
        # $.ajax
        #    url : '/index.php/tags/search/'+query
        #    method : 'get'
        #    dataType : 'json'
        #    success : (data) ->
        #         callback(data.content)
        #    error : (xhr, status, error) ->
        #         do callback
    render:
      option: (item, escape) ->
        "<div>#{item.tag_name}</div>"

do bind
$(document).on 'ajax:success', bind