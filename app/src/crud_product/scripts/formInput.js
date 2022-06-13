const formInput = {
    onchangeNumberOnly: (e, rupiah=false) => {
        e.target.value = e.target.value.replace(/[^0-9.]/g, "").replace(/(\..*?)\..*/g, "$1");
        if(rupiah)
            formInput.formatRupiah(e);
    },
    formatRupiah: (e) => {
        let val = "";
        let rev = e.target.value.toString().split("").reverse();
        for(var pos=0; pos < rev.length; pos++) {
            if(pos % 3 == 0 && pos != 0) {
                val += ".";
            }
            val += rev[pos];
        }
        e.target.value = val.split("").reverse().join("");
    },
    onkeydownNumberOnly: (e) => {
        var ASCIICode = (e.which) ? e.which : e.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    },
    init: () => {
        document.getElementById("price").onchange = (e) => formInput.onchangeNumberOnly(e, true);
        document.getElementById("stock").onchange = (e) => formInput.onchangeNumberOnly(e);

        document.getElementById("price").onkeydown = formInput.onkeydownNumberOnly;
        document.getElementById("stock").onkeydown = formInput.onkeydownNumberOnly;
    },
};

formInput.init();