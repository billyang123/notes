# Common ajax HTTP VERB actions
# base on ujs

$document = $ document

$document.on 'ajax:success', '[data-done], [data-target]', (evt, res) ->
  return if this isnt evt.target
  

  self = this
  $self = $ this
  $res = $ res
  target = $self.data 'target'
  done = $self.data 'done'


  hasIn = $res.hasClass 'in'
  $res.removeClass 'in' if hasIn


  if target
    $res.appendTo target

  if done

    (new Function 'res', 'r', '$r', done).call self, res, res, $res



  $res.prop 'offsetWidth' if hasIn 
  $res.addClass 'in' if hasIn

  do $self[0].reset if $self.is 'form'


$document.on 'ajax:send', 'a[data-remote], form[data-remote], button', (evt) ->
  return if this isnt evt.target

  $this = $ this
  if $this.is 'form'
    $this.find(':submit:enabled')
      .attr('disabled', 'disabled')
      .attr('data-disabled-by', 'ajax')
  else if $this.is ':enabled'
    $this.attr 'disabled', 'disabled'
  else
    $this.addClass 'disabled'
$document.on 'ajax:complete', 'a[data-remote], form[data-remote], button', (evt) ->
  return if this isnt evt.target

  $this = $ this
  if $this.is 'form'
    $this.find(':submit:disabled[data-disabled-by=ajax]')
      .removeAttr('disabled')
      .removeAttr('data-disabled-by')
  else if $this.is ':disabled'
    $this.removeAttr 'disabled'
  else
    $this.removeClass 'disabled'

    if $this.is '[data-remote-once=true]'
      $this.removeAttr 'data-remote'
      $this.on 'click', (evt) ->
        do evt.preventDefault


$document.on 'ajax:error', (evt, $xhr, status, error) ->
  if $xhr.responseText.length
    $.UIkit.notify $xhr.responseText, {status:'danger'}
  else
    $.UIkit.notify 'Something went wrong.', {status:'danger'}


$(window).on 'beforeunload', ->
  $document.off 'ajax:error'
  return 