
const dateType ="gregorian";
/** Constant for 2-digit years, used to switch between 1900 and 2000*/
/** e.g. y > 38 => 1900+y else 2000+y */
/** history: November 2016 : 29,
 *             August 2025 : 38 */
let TWODIGITYEAR = [ { datetype: "gregorian", switch: 38, oldyear: 1900, newyear: 2000} ];
/** Jalali difference to switch b/w 1300 and 1400 */
/** Jalali year is about -621 compared to Gregorian */
/** history: November 2016 : 00 (only 1300),
 *             August 2025 : 17 */
TWODIGITYEAR.push({ datetype: "jalali" , switch: 17, oldyear: 1300, newyear: 1400});

		const twodigit = TWODIGITYEAR.find(val => val.datetype === dateType);

console.log(twodigit);

y = 55;

(y < 100) && (y += (y > twodigit.switch) ? twodigit.oldyear : twodigit.newyear);

console.log(y);
