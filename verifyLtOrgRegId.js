function verifyLtOrgRegId(regnr, d) {

	var l = regnr.length;
  
  if(d === undefined && l != 9) {
  	if(l != 11) {
      return false;
    }
  } 
  
  var s = 0,
  		n = 0,
      r = 0,
      t = false;
      
  if(d === undefined) {
  	d = 1;
    t = true;
  }
  
  for (var i = 0; i < l; i++) {
    var c = regnr.charAt(i);
    if(isNaN(c)) return false;
    n = Number(c);
    if(i+1 == l) break;
    d = (d > 9)?1:d;
    s += n * d++; 
  }
  
  console.log(l + ' ' + d + ' ' + s + ' ' + n);
  
  r = (s % 11);
  if(r == 10) {
    if(l==11 && t && r == 10) {
      return verifyLtOrgRegId(regnr, 3);
    }
    r = 0;
  }
	return r == n;
}

console.log(checkLtOrgRegId('67912292745'));