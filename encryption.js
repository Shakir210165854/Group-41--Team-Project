function encryptTxt(txt) {
    let i;
    let aChar;
    let txtChars = txt.split(''); 
    let intChar;
    let charsTxt = new Array(txt.length);
    let encryptedTxt = '';

    for (i = 0; i < txtChars.length; i++) {
        intChar = txtChars[i].charCodeAt(0);

        if (intChar >= 32 && intChar <= 126) {
            
            intChar = intChar + 3;

            if (intChar > 126) {
                intChar = 32 + (intChar % 126);
            }

            charsTxt[i] = intChar;
        } else {

        }
    }

    for (i = 0; i < txtChars.length; i++) {
        aChar = String.fromCharCode(charsTxt[i]);
        encryptedTxt += aChar;
    }

    return encryptedTxt;
}

const plaintext = 'PASSWORD';
const encrypted = encryptTxt(plaintext);
console.log(`Original: ${plaintext}`);
console.log(`Encrypted: ${encrypted}`);