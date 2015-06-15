/**
 *
 */

//Airquote Autofill function
function airAutofill(x) {

    if (x == "Blueberry") {
        quoteinformation.weightpercase.value = "2.14";
        quoteinformation.NoCS.value = "192";
        quoteinformation.Trucking.value = "";
        quoteinformation.OtherPalletCharge.value = "45.00";
        quoteinformation.GelPack.value = "30.00";
        quoteinformation.coolguard.value = "45.00";
        quoteinformation.temperRecorder.value = "25.00";
        quoteinformation.documentfee.value = "50.00";
        quoteinformation.phyto.value = "25.00";
    }

    if (x == "Apple") {
        quoteinformation.weightpercase.value = "";
        quoteinformation.NoCS.value = "";
        quoteinformation.Trucking.value = "";
        quoteinformation.OtherPalletCharge.value = "";
        quoteinformation.GelPack.value = "N/A";
        quoteinformation.temperRecorder.value = "";
        quoteinformation.documentfee.value = "";
        quoteinformation.phyto.value = "";
    }

    if (x == "Avocado") {
        quoteinformation.weightpercase.value = "6.5";
        quoteinformation.NoCS.value = "112";
        quoteinformation.Trucking.value = "";
        quoteinformation.OtherPalletCharge.value = "";
        quoteinformation.GelPack.value = "N/A";
        quoteinformation.temperRecorder.value = "25";
        quoteinformation.documentfee.value = "50";
        quoteinformation.phyto.value = "25";
    }

    if (x == "Grape") {
        quoteinformation.weightpercase.value = "9.9";
        quoteinformation.NoCS.value = "78";
        quoteinformation.Trucking.value = "150";
        quoteinformation.OtherPalletCharge.value = "";
        quoteinformation.GelPack.value = "N/A";
        quoteinformation.temperRecorder.value = "24";
        quoteinformation.documentfee.value = "50";
        quoteinformation.phyto.value = "25";
    }

    if (x == "StoneFruit-2Layer") {
        quoteinformation.weightpercase.value = "10.00";
        quoteinformation.NoCS.value = "64";
        quoteinformation.Trucking.value = "";
        quoteinformation.OtherPalletCharge.value = "";
        quoteinformation.GelPack.value = "N/A";
        quoteinformation.coolguard.value = "N/A";
        quoteinformation.temperRecorder.value = "24";
        quoteinformation.documentfee.value = "50";
        quoteinformation.phyto.value = "25";
    }

    if (x == "StoneFruit-VF") {
        quoteinformation.weightpercase.value = "13.25";
        quoteinformation.NoCS.value = "64";
        quoteinformation.Trucking.value = "";
        quoteinformation.OtherPalletCharge.value = "";
        quoteinformation.GelPack.value = "N/A";
        quoteinformation.coolguard.value = "N/A";
        quoteinformation.temperRecorder.value = "24";
        quoteinformation.documentfee.value = "50";
        quoteinformation.phyto.value = "25";
    }
}

/////////////////////////////////////////////////////////////////////////////////////////

//go Action to submit form to different url
function goAction(url) {
    if (url != '') {
        quoteinformation.target = "_blank";//通过对目标的判定决定是否在新窗口打开网页
    }
    quoteinformation.action = url;//formname为当前form的name 多个form时 在此处获取form即可
    quoteinformation.submit();//提交表单
}


function weight() {
    var weightperpallet = document.getElementById("weightperpallet");
    var NoCS = document.getElementById("NoCS");
    var weightpercase = document.getElementById("weightpercase");

    NoCS.addEventListener("input", function () {
        weightperpallet.value = (weightpercase.value * NoCS.value).toFixed(2);
    });
    weightperpallet.addEventListener("input", function () {
        weightpercase.value = (weightperpallet.value / NoCS.value).toFixed(2);
    });
    weightpercase.addEventListener("input", function () {
        weightperpallet.value = (weightpercase.value * NoCS.value).toFixed(2);
    });
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

