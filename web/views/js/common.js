//运行dotdotdot方法


document.addEventListener("touchstart", function (e) {
    startX = e.touches[0].screenX;
    startY = e.touches[0].screenY;
}, false)
document.addEventListener("touchend", function (e) {
    var endX = e.changedTouches[0].screenX;
    var endY = e.changedTouches[0].screenY;
    if ($(".nav-side-box").hasClass("nav-show")) return;

    var direction = getDirection(startX, startY, endX, endY);
    switch (direction) {
        case 1:
            console.log("向上滑");
            hideMenuNav();
            break;
        case 2:
            console.log("向右滑");
            break;
        case 3:
            console.log("向下滑");
            showMenuNav();
            break;
        case 4:
            console.log("向左滑");
    }
}, false)
// 返回方向, 1为上，2为右， 3为下， 4为左
function getDirection(startX, startY, endX, endY) {
    var dx = endX - startX;
    var dy = startY - endY;
    var angle;
    if (Math.abs(dx) <= 50 && Math.abs(dy) <= 50) {
        return 0;
    }

    angle = getAngle(dx, dy);
    switch (true) {
        case (angle >= -45 && angle < 45):
            return 2;
        case (angle >= 45 && angle < 135):
            return 1;
        case (angle >= -135 && angle < -45):
            return 3;
        case ((angle >= 135 && angle < 180) || (angle >= -180 && angle < -135)):
            return 4;
    }
}
// 返回角度
function getAngle(x, y) {
    return Math.atan2(y, x) * (180 / Math.PI);
}


//绑定菜单点击事件
$("#navMenu").click(function() {
    showSideBox();
    scroll().disableScroll();
    //添加毛玻璃效果
    $("body").children().not("nav, script").addClass("blur");
    $("#navMenu,#navSearch").addClass("blur");
});
$("#menuBack").click(function() {
    hideSideBox();
    scroll().enableScroll();
    //去除毛玻璃效果
    $("body").children().not("nav, script").removeClass("blur");
    $("#navMenu,#navSearch").removeClass("blur");
});
$(".nav-bg").click(function() {
    hideSideBox();
    scroll().enableScroll();
    //去除毛玻璃效果
    $("body").children().not("nav, script").removeClass("blur");
    $("#navMenu,#navSearch").removeClass("blur");
});
//导航搜索点击事件
$("#navSearch").click(function() {
    location.href = "?c=Search&a=showSearch";
});

// 隐藏菜单栏
function hideMenuNav() {
    var menu = $(".nav-menu");
    var search = $(".nav-search");
    if (!menu.hasClass("nav-hide") && !search.hasClass("nav-hide")) {
        menu.addClass("nav-hide");
        search.addClass("nav-hide");
    }
}
// 显示菜单栏
function showMenuNav() {
    var menu = $(".nav-menu");
    var search = $(".nav-search");
    if (menu.hasClass("nav-hide") && search.hasClass("nav-hide")) {
        menu.removeClass("nav-hide");
        search.removeClass("nav-hide");
    }
}
//显示侧边栏
function showSideBox() {
    if (!$(".nav-side-box").hasClass("nav-show")) {
        $(".nav-side-box").addClass("nav-show")
    }
    $(".nav-bg").css("z-index", "2");

}
//隐藏侧边栏
function hideSideBox() {
    if ($(".nav-side-box").hasClass("nav-show")) {
        $(".nav-side-box").removeClass("nav-show")
    }
    $(".nav-bg").css("z-index", "-1");

}

//显示元素
function srShow(element) {
    if (element.hasClass("sr-hide")) {
        element.removeClass("sr-hide");
    }
};
//隐藏元素
function srHide(element) {
    if (!element.hasClass("sr-hide")) {
        element.addClass("sr-hide");
    }
};

//监视搜索输入框
$("#search-input").bind('input propertychange', function() {// propertychange
    var cancel = $("#search-cancel");
    if ($("#search-input").val() == "") {
        srHide(cancel);
        return;
    }
    srShow(cancel);
});
//搜索框重置输入
$("#search-cancel").click(function() {
    $("#search-input").val("");
    srHide($(this));
});
//清空搜索记录
$("#clearRecord").click(function() {
    $(".search-tag .history").hide();
    $(this).hide();
})