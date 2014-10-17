<input id="select-tags" class="movies" placeholder="Find a movie...">
<select id="select-repo" class="repositories" placeholder="Pick a repository...">
	
</select>
<script type="text/javascript">
$('#select-tags').selectize({
    delimiter: ',',
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
});

</script>