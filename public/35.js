const ashcanArr = ['rt', 'ft', 'ht', 'ot'];
var flag = true
var ashcanIndex;
var gEvent;
var rubbish = $("#rubbish");
var scoreObj = $("#score");
var ashcan = $(".ashcan img");

$(function () {
    setLj();
});
$(document).mousemove(function (event) {
    gEvent = event
});

function setLj() {
    ashcanIndex = Math.random() * 4 | 0;
    rubbishIndex = Math.random() * 15 | 0;
    rubbish.attr('src', "images/" + ashcanArr[ashcanIndex] + "_" + rubbishIndex + ".jpg");
}

rubbish.click(function () {
    if (flag) {
        flag = false;
        rubbish.mousemove(follow);
    } else {
        flag = true;
        ashcan.on("mouseover", function () {
            var id = $(this).attr('id');
            var score = Number(scoreObj.text());
            if (id == ashcanArr[ashcanIndex]) {
                scoreObj.text(score + 1)
                setLj();
            } else {
                alert("分类错误");
                scoreObj.text(score - 1)
            }
        });
        rubbish.css({
            position: "relative",
            left: 0,
            top: 0
        }).unbind("mousemove").hide().fadeIn(100, function () {
            ashcan.off("mouseover");
        });
    }
});

function follow() {
    var left = gEvent.clientX - 150;
    var top = gEvent.clientY - 150;
    rubbish.css({
        position: "absolute",
        left: left,
        top: top,
    });
}
