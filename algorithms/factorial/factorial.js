/*
 * Вычисление факториала
 * 0, 1, 2, 3,  4,   5,   6,    7,     8,      9,      10, ..
 * 1, 1, 2, 6, 24, 120, 720, 5040, 40320, 362880, 3628800, ..
 */

'use strict'

class Factorial {
    /*
     * Рекурсивная функция
     */
    countRecursive = x => x < 2 ? 1 : x * this.countRecursive(x - 1);

    /*
     * Функция с циклом
     */
    countWhile(x) {
        let result = 1;
        for (let y = 2; y <= x; y++) {
            result *= y;
        } 
        return result;
    }
}
var factorial = new Factorial;

console.log('Recursive:\t' + factorial.countRecursive(7));
console.log('While:\t\t' + factorial.countWhile(7));
