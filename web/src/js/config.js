const baseUrl = `http://${window.location.hostname}`
const evalUrl = `${baseUrl}/ajax/evaluate`
export const clearMemoryUrl = `${baseUrl}/ajax/clear`
export const unaryOperationUrl = `${evalUrl}/unary`
export const binaryOperationUrl = `${evalUrl}/binary`
export const memoryOperationUrl = `${evalUrl}/memory`
