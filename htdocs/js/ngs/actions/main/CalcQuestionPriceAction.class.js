ngs.CalcQuestionPriceAction = Class.create(ngs.AbstractAction, {
    initialize: function($super, shortCut, ajaxLoader) {
        $super(shortCut, "main", ajaxLoader);
    },
    getUrl: function() {
        return "do_calc_question_price";
    },
    getMethod: function() {
        return "POST";
    },
    beforeAction: function() {
    },
    afterAction: function(transport) {
        var data = transport.responseText.evalJSON();
        if (data.status === "ok") {
            jQuery('#f_right_ride_question_price').html(data.price+'.00'); 
            jQuery('#sliderPrice').html(data.price+'.00'); 
            jQuery('#talkToAnswerSliderPrice').html(data.price+'.00');         
        } else if (data.status === "err") {
            alert(data.errText);
        }
    }
});
