/**
 * Created by ngw9 on 2017/4/18.
 */
function abc(str) {
    alert(str);
}

function set(obj) {

    var lis = document.getElementsByTagName("li");
    switch (obj) {
        case 1:
            for (var i = 0; i < lis.length; i++) {
                lis[i].style.backgroundColor = "red"
            }
            break
        case 2 :
            for (var i = 0; i < lis.length; i++) {
                lis[i].style.backgroundColor = "white"
            }
            break
    }
}

function selectcity() {
    var citys = [["长沙", "益阳", "常德", "株洲", "张家界"],
        ["宜昌", "武汉", "荆门", "厂门"],
        ["杭州市", "宁波市", "温州市", "嘉兴市"],
        ["广州", "东莞", "深圳", "珠海"]
    ];
    var index1 = document.getElementById("sid").selectedIndex;//获得用户在省份组合框所选的选项序号  获得所选项的序列号，方便匹配上面二维数组添加
    var option1 = document.getElementById("ssid");//添加到该节点下，需要一一循环
    option1.options.length = 1;//直接设置总长度为1,留一个《请选择》，直接设置长度为1，，可以省去很多移除元素的麻烦

    for (var x = 0; x < citys[index1 - 1].length; x++) {//citys是一个二维数组  lenth citys[index1]
        var opt = document.createElement("option");
        opt.innerHTML = citys[index1 - 1][x];
        option1.appendChild(opt);
    }
}
function tijiao() {
    var pro = document.getElementById("sid");
    var city = document.getElementById("ssid");
    var proContent = getText(pro);
    var cityContent = getText(city);
    alert(proContent + cityContent);
}
function getText(obj) {
    var index = obj.selectedIndex;
    var text = obj.options[index].text;
    return text;
}
function finishload() {
    //jquery操作
    $(document).ready(function () {
        $("input").click(function () {
            $("ul").slideToggle();
        });
        $("div").children("img.plant")
        // js 操作
        firstVis();
    });

}
//默认第一个下划线显示
function firstVis() {
    var lis = $("ul").children("li.lname");
    lis[0].childNodes[1].className = "line_img_vis";
    var uls = $(".content_ul");
    uls[0].className = "vli_bac";
    for (var i = 0; i < lis.length; i++) {
        lis[i].onmousemove = function (i) {

            for (var i = 0; i < lis.length; i++) {
                lis[i].childNodes[1].className = "line_img";
            }
            this.childNodes[1].className = "line_img_vis";
            this.style.cursor = "hand";
        }
        /*  lis[i].onmouseout = function(){
         this.childNodes[1].className = "line_img";
         }*/
    }
}