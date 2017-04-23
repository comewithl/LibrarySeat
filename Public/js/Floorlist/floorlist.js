/**
 * Created by Administrator on 2017/4/23.
 */

(function(global){
    var pullFlag = true;
    var zz = document.querySelector(".zz");
    var more = document.querySelector(".more");
    var moreul = document.querySelector(".more-ul");
    var tanchuzz = document.querySelector(".stu-pic")
    tanchuzz.addEventListener("click", function() {
        var nav = document.querySelector("nav");
        if(!pullFlag) {
            nav.style.left = "-250px";
            zz.style.opacity = "0";
            zz.style.zIndex = "-2";
            pullFlag = true;
        } else {
            nav.style.left = "0px";
            zz.style.opacity = "0.5";
            zz.style.zIndex = "1";
            pullFlag = false;
        }
    })
    zz.addEventListener("click", function() {
        tanchuzz.click();
    })
    $(".more").mouseover(function(){
        $(this).css("opacity","0.6")
    })
    $(".more").mouseleave(function(){
        $(this).css("opacity","1")
    })
    $(".more").click(function(){
        $(".more-ul").toggle()
    })
})(window);