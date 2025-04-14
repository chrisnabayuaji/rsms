function toDate(date) {
  var d = date.split("-");
  return d[2] + "-" + d[1] + "-" + d[0];
}

function numSys(x) {
  x = x.replace(/\./g, "");
  x = x.replace(',', '.');
  return x;
}

function numId(bilangan) {
  var negativ = false;

  if (bilangan < 0) {
    bilangan = bilangan * -1;
    negativ = true;
  };

  var number_string = bilangan.toString(),
    split = number_string.split('.'),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

  if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

  // Cetak hasil
  if (negativ == true) {
    rupiah = '-' + rupiah;
  }
  return rupiah;
}

function sys_to_inddec(bilangan) {
  var negativ = false;

  if (bilangan < 0) {
    bilangan = bilangan * -1;
    negativ = true;
  };

  var number_string = bilangan.toString(),
    split = number_string.split('.'),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

  if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }
  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  // rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

  // Cetak hasil
  if (negativ == true) {
    rupiah = '-' + rupiah;
  }
  return rupiah;
}

function objectifyForm(formArray) {//serialize data function
  var returnArray = {};
  for (var i = 0; i < formArray.length; i++) {
    returnArray[formArray[i]['name']] = formArray[i]['value'];
  }
  return returnArray;
}
