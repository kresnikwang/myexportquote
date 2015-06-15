/**
 *
 */

/////////////////////////////////////////////////////////////////////////////////////////


function oceanAutofill(x) {

    if (x == "Blueberry") {
        quoteinformation.PreCarriage.value = "";
        quoteinformation.temperRecorder.value = "45";
        quoteinformation.purfresh.value = "1500.00";
        quoteinformation.Document.value = "50.00";
        quoteinformation.phyto.value = "25.00";
        quoteinformation.NoCS.value = "7500";
    }

    if (x == "Apple") {
        quoteinformation.PreCarriage.value = "";
        quoteinformation.temperRecorder.value = "45";
        quoteinformation.purfresh.value = "1500.00";
        quoteinformation.Document.value = "50";
        quoteinformation.phyto.value = "25";
        quoteinformation.NoCS.value = "1029";
    }

    if (x == "Avocado") {
        quoteinformation.PreCarriage.value = "";
        quoteinformation.temperRecorder.value = "45";
        quoteinformation.purfresh.value = "1500.00";
        quoteinformation.Document.value = "50.00";
        quoteinformation.phyto.value = "25.00";
        quoteinformation.NoCS.value = "1600";
    }

    if (x == "Grape") {
        quoteinformation.PreCarriage.value = "";
        quoteinformation.temperRecorder.value = "45";
        quoteinformation.purfresh.value = "1500.00";
        quoteinformation.Document.value = "50.00";
        quoteinformation.phyto.value = "25.00";
        quoteinformation.NoCS.value = "1560";
    }
}

/////////////////////////////////////////////////////////////////////////////


//go Action to submit form to different url
function goAction(url) {
    if (url != '') {
        quoteinformation.target = "_blank";//通过对目标的判定决定是否在新窗口打开网页
    }
    quoteinformation.action = url;//formname为当前form的name 多个form时 在此处获取form即可
    quoteinformation.submit();//提交表单
}

function OrderProfit() {
    var FOBprice = document.getElementById("FOBprice");
    var commissionRate = document.getElementById("commissionRate");
    var netProfit = document.getElementById("netProfit");

    FOBprice.addEventListener("input", function () {
        netProfit.value = (FOBprice.value * commissionRate.value / 100).toFixed(2);
    });
    commissionRate.addEventListener("input", function () {
        netProfit.value = (FOBprice.value * commissionRate.value / 100).toFixed(2);
    });
    netProfit.addEventListener("input", function () {
        commissionRate.value = (netProfit.value / FOBprice.value * 100).toFixed(1);
    });
}