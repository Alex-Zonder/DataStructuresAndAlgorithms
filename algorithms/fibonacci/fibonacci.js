/*
 * Числа Фибоначи
 * 0, 1, 2, 3, 4, 5, 6,  7,  8,  9, 10, ..
 * 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, ..
 */

'use strict'

class Fibonacci {
    /*
     * Рекурсивная функция
     */
    countRecursive = x => x < 2 ? x : this.countRecursive(x - 1) + this.countRecursive(x - 2);

    /*
     * Рекурсивная функция с мемоизацией
     */
    fibMemo = [];
    countRecursiveMemo(x) {
        if (typeof this.fibMemo[x] !== 'undefined')
            return this.fibMemo[x];

        if (x < 2) return x;

        this.fibMemo[x] = this.countRecursiveMemo(x - 1) + this.countRecursiveMemo(x - 2);

        return this.fibMemo[x];
    }

     /*
     * Функция с циклом
     */
    countWhile(x) {
        let result = [0, 1];
        for (let y = 2; y <= x; y++)
            result[y] = result[y - 1] + result[y - 2];
        return result[x];
    }
}
const fibonacci = new Fibonacci;

console.log('Recursive:\t' + fibonacci.countRecursive(40));
console.log('RecursiveMemo:\t' + fibonacci.countRecursiveMemo(40));
console.log('While:\t\t' + fibonacci.countWhile(40));
