// Configure all GridViews in the page
$(function(){
    setupGridView();
});
 
// Setup the filter(s) controls
function setupGridView(grid)
{
    if(grid==null)
        grid = '.grid-view tr.filters';
    // Default handler for filter change event
    $('input,select', grid).change(function() {
        var grid = $(this).closest('.grid-view');
        $(document).data(grid.attr('id')+'-lastFocused', this.name);
    });
}
 
// Default handler for beforeAjaxUpdate event
function afterAjaxUpdate(id, options)
{
    var grid = $('#'+id);
    var lf = $(document).data(grid.attr('id')+'-lastFocused');
    // If the function was not activated
    if(lf == null) return;
    // Get the control
    fe = $('[name="'+lf+'"]', grid);
    // If the control exists..
    if(fe!=null)
    {
        if(fe.get(0).tagName == 'INPUT' && fe.attr('type') == 'text')
            // Focus and place the cursor at the end
            fe.cursorEnd();
        else
            // Just focus
            fe.focus();
    }
    // Setup the new filter controls
    setupGridView(grid);
}
 
// Place the cursor at the end of the text field
jQuery.fn.cursorEnd = function()
{
    return this.each(function(){
        if(this.setSelectionRange)
        {
            this.focus();
            this.setSelectionRange(this.value.length,this.value.length);
        }
        else if (this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', this.value.length);
            range.moveStart('character', this.value.length);
            range.select();
        }
        return false;
    });
}