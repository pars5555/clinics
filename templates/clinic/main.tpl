<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        {include file="$TEMPLATE_DIR/clinic/util/headerControls.tpl"}
    </head>
    <body>
        <div class="wrapper">
            <input type="hidden" id="initialLoad" name="initialLoad" value="clinic_main" />		
            <input type="hidden" id="contentLoad" value="{$ns.contentLoad}" />
            {include file="$TEMPLATE_DIR/clinic/util/header.tpl"} 
            <div class="dentist-panel-right-wrapper">
                {nest ns=content}
            </div>
            {include file="$TEMPLATE_DIR/clinic/util/footer.tpl"} 

        </div>
    </body>
</html>