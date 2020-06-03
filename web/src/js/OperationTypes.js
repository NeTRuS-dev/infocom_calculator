export const BinaryOperationTypes = Object.freeze({
    pow: '^',
    mod: '%',
    divide: '/',
    multiply: '*',
    subtract: '-',
    add: '+'
})


const UnaryOperationTypes = ['sin', 'cos', 'tg', 'arctg', 'log', 'ln', 'fact', '1divx', 'exp', 'negate']

export function makeUnaryOperationDescription(value, operationCode) {
    if (!UnaryOperationTypes.includes(operationCode)) {
        return
    }
    let returnValue = '';
    switch (operationCode) {
        case 'sin':
            returnValue = `sin(${value} радиан) = `
            break
        case 'cos':
            returnValue = `cos(${value} радиан) = `
            break
        case 'tg':
            returnValue = `tg(${value} радиан) = `
            break
        case 'arctg':
            returnValue = `arctg(${value}) = `
            break
        case 'log':
            returnValue = `log(${value}) = `
            break
        case 'ln':
            returnValue = `ln(${value}) = `
            break
        case 'fact':
            returnValue = `${value}! = `

            break
        case '1divx':
            returnValue = `1/${value} = `
            break
        case 'exp':
            returnValue = `e^${value} = `
            break
        case 'negate':
            returnValue = `-${value} = `
            break
    }
    return returnValue
}