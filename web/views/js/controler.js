$("#edit").on("click", showBox);
$("#ok").on("click", hideBox);
$(".collect-ul>li>a").on("click",showArt);
// $("#js").on("click",showartEdit);
//显示编辑层
function showBox() {
    $("#edit").addClass("sr-hide");
    $("#ok").removeClass("sr-hide");
    $(".icon-add1").removeClass("sr-hide");
    $(".collect-scan").find("span:first-child").addClass("sr-hide");
    $(".collect-article").addClass("sr-hide");
    $(".collect-scan").find("span:nth-child(2)").removeClass("sr-hide");
    hideMenuNav();
}
//隐藏编辑层
function hideBox() {
    $("#ok").addClass("sr-hide");
    $("#edit").removeClass("sr-hide");
    $(".icon-add1,.icon-ok1").addClass("sr-hide");
    $(".collect-scan").find("span:first-child").removeClass("sr-hide");
    $(".collect-scan").find("span:nth-child(2)").addClass("sr-hide");
    showMenuNav();
}


//显示分类下的文章
function showArt() {
    if(!$(this).children(".icon-right").hasClass("sr-hide"))
    {
        $(".icon-right").removeClass("sr-hide");
        $(".icon-down2").addClass("sr-hide");
        $(this).children(".icon-right").addClass("sr-hide");
        $(this).children(".icon-down2").removeClass("sr-hide");
        $(".collect-article").css("display", "none");
        $(this).next().next().css("display", "block");
    }

    else {
        $(this).children(".icon-right").removeClass("sr-hide");
        $(this).children(".icon-down2").addClass("sr-hide");
        $(".collect-article").css("display", "none");
    }
}
// function showA() {
// else if(!$(this).children(".icon-right").hasClass("sr-hide")&&$("#edit").hasClass("sr-hide"))
//     {
//         $(".collect-scan").find("span:nth-child(2)").addClass("sr-hide");
//         $(".collect-scan").find("span:first-child").addClass("sr-hide");

//         $(".icon-circle1").removeClass("sr-hide");
//         $(".article-main").css("left","25%");
//         $(".article-img").css("left","5%");
//         $(".icon-right").removeClass("sr-hide");
//         $(".icon-down2").addClass("sr-hide");
//         $(this).children(".icon-right").addClass("sr-hide");
//         $(this).children(".icon-down2").removeClass("sr-hide");
//         $(".collect-article").addClass("sr-hide");
//         $(this).next().next().removeClass("sr-hide");
//     }
// }