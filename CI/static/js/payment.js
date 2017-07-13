function cbx(){
    var sub = $(".sut_prt>input[type='submit']");
    var selectChks = $(".service input[type=checkbox][name=agreement]:checked").length;
    if(selectChks == '1'){
        sub.css({"background":"#FD5B0A","cursor":"pointer"});
        sub.removeAttr("disabled");
    }else{
        sub.css({"background":"#333","cursor":"default"});
        sub.attr({"disabled":"disabled"});
    }
}
cbx();
$(function(){
    $("#checkbox").change(function(){
        cbx();
    })
});