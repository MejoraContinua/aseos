In your view include the widget:

<?php $this->widget('application.extensions.ajaxvalidationmessages.EAjaxValidationMessages',
                    array(
                       'errorCssClass'=>'clsError',
                       'errorMessageCssClass'=>'clsErrorMessage',
                       'errorSummaryCssClass'=>'clsErrorSummary')); ?>


In your view, in your AJAX callbacks for ajaxSubmitButton which validate, call
the plugin's methods:

 'success'=>"function(html) {
    if (html.indexOf('{')==0) {
       jQuery('#the-form').ajaxvalidationmessages('show', html);
    }
    else {
       jQuery('#the-form').ajaxvalidationmessages('hide');
    }
 }",
 'error'=>"function(html) {
    jQuery('#the-form').ajaxvalidationmessages('hide');
 }",

where the-form is the id of your form.
